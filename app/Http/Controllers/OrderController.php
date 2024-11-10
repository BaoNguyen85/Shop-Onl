<?php

namespace App\Http\Controllers;

use App\Models\Collections;
use App\Models\Customers;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Products;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function orderPage(){
        $all_customer = Customers::orderby('customer_id','ASC')->get();
        return view('order', compact('all_customer'));
    }
    public function thankyouPage(){
        return view('thank_you');
    }
    public function confirm_order(Request $request){
        $data = $request->all();
        $checkout_code = substr(md5(microtime()),rand(0,26),5);
        
        $order = new Order();
        $order->customer_id = Session::get('customer_id');
        $order->order_status = 1;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        // $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        // $order->created_at = now();
        $order->order_code = $checkout_code;
        $order->order_payment_status = $data['payment_status'];
        $order->order_total = $data['order_total'];
        // $order->created_at = $today;
        $order->order_date = $order_date;
        $order->save();

        $customer = DB::table('tbl_customers')->where('customer_id', Session::get('customer_id'))->first();
        $customerName = $customer->customer_name;
        $customerMail = $customer->customer_mail;
        $customerPhone = $customer->customer_phone;
        $customerAddress = $customer->customer_address;

        if(Session::get('cart')==true){
            foreach(Session::get('cart') as $key => $cart){
                $order_details = new OrderDetails();
                $order_details->order_code = $checkout_code;
                $order_details->product_id = $cart['id'];
                $order_details->product_name = $cart['name'];
                $order_details->product_price = $cart['price'];
                $order_details->product_quantity = $cart['quantity'];
                $order_details->product_size = $cart['size'];
                $order_details->product_collection = $cart['collection'];
                $order_details->save();
            }
        }

        $orderInfo = [
            'customer_name' => $customerName,
            'customer_mail' => $customerMail,
            'customer_phone' => $customerPhone,
            'customer_address' => $customerAddress,
            'order_code' => $checkout_code,
            'product_name' => $order_details->product_name,
            'product_price' => $order_details->product_price,
            'product_quantity' => $order_details->product_quantity,
            'product_size' => $order_details->product_size
        ];

        $this->sendConfirmationEmail($orderInfo);

        Session::forget('cart');
        return Redirect::to('/thank-you');
    }

    //admin
    public function showOrder(Request $request){
        $all_customer = Customers::orderby('customer_id','ASC')->get();
        $all_order = Order::orderby('order_id','ASC')->get();
        $all_order_details = OrderDetails::orderby('order_detail_id','ASC')->get();
        return view('all_order', compact('all_customer', 'all_order', 'all_order_details'));
    }

    public function view_order($order_code){
        $all_product = Products::orderby('product_id','ASC')->get();
        $all_size = Size::orderby('size_id','ASC')->get();
        $all_collection = Collections::orderBy('collection_id', 'ASC')->get();
        $order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
        $order = Order::where('order_code',$order_code)->get();
        foreach($order as $key => $ord){
            $customer_id = $ord->customer_id;
            $order_status = $ord->order_status;
        }
        $customer = Customers::where('customer_id',$customer_id)->first();
        $order_details_product = OrderDetails::with('product')->where('order_code',$order_code)->get();
        return view('order_detail')->with(compact('all_product', 'order_details','customer','order','order_status','order_details_product','all_collection','all_size'));
    }

    // public function confirm_ordermail(Request $request){
    //     $data = $request->all();
    //     $customerName = $data['customer_name'];
    //     // Lấy thông tin đơn hàng
    //     $orderInfo = [
    //         'customer_name' => $customerName,
    //     ];
    
    //     // Gửi email xác nhận
    //     $this->sendConfirmationEmail($orderInfo);
    // }

    private function sendConfirmationEmail($orderInfo){
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_mail = "Đơn hàng xác nhận ngày".' '.$now; 
        // $customer = Customers::find(Session::get('customer_id'));
        // $email = $customer->customer_mail;
        $email = 'baonguyen382446@gmail.com';

        if(Session::get('cart')==true){
            foreach(Session::get('cart') as $key => $cart_mail){
                $cart_array[] = array(
                    'product_name' => $cart_mail['name'],
                    'product_price' => $cart_mail['price'],
                    'product_quantity' => $cart_mail['quantity'],
                    'product_size' => $cart_mail['size'],
                    'product_image' => $cart_mail['image']
                );
            }
        }
    
        // Gửi email
        Mail::send('mail_order', ['cart_array'=>$cart_array,'orderInfo' => $orderInfo], function($message) use ($title_mail, $email){
            $message->to($email)->subject($title_mail);
            $message->from($email, $title_mail);
        });
    }
}
