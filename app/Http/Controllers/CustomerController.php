<?php

namespace App\Http\Controllers;

use App\Models\Collections;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function loginPage(){
        return view('login');
    }

    public function registerPage(){
        return view('register');
    }
    public function customerDashboard(Request $request){
        $customer_mail = $request->customer_mail;
        $customer_password = md5($request->customer_password);
        // $customer_password = md5($request->customer_password);
        $result = DB::table('tbl_customers')->where('customer_mail',$customer_mail)->where('customer_password',$customer_password)->first();
        if($result){
            Session::put('customer_name',$result->customer_name);
            Session::put('customer_id',$result->customer_id);
            Session::flash('message', 'Đăng nhập tài khoản thành công');
            return Redirect::to('/index');
        }else{
            Session::put('message','Mật khẩu hoặc mail chưa đúng!');
            return Redirect::to('/login');
        }
    }
    public function customerLogin(){
        $customerID = Session::get('customer_id');
        if(!$customerID){
            return Redirect::to('/');
        }
    }
    public function showIndex(Request $request){
        $this->customerLogin();
        return view('home');
    }
    public function customerLogout(){
        $this->customerLogin();
        Session::put('customer_name',null);
        Session::put('customer_id',null);
        return Redirect::to('/');
    }

    public function customerRegister(Request $request){
        $existingCustomer = DB::table('tbl_customers')
        ->where('customer_mail', $request->customer_mail)
        ->first();

        if ($existingCustomer) {
            Session::flash('message', 'Tài khoản đã tồn tại');
            return Redirect::to('/register');
        }

        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_birth'] = $request->customer_birth;
        $data['customer_mail'] = $request->customer_mail;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_address'] = $request->customer_address;
        $data['customer_password'] = md5($request->customer_password);

        DB::table('tbl_customers')->insert($data);
        Session::flash('message', 'Đăng ký tài khoản thành công');
        return Redirect::to('/login');
    }

    public function allCustomer(Request $request){
        $all_customer = Customers::orderby('customer_id','ASC')->get();
        return view('all_customer', compact('all_customer'));
    }
}
