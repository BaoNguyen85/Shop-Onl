<?php

namespace App\Http\Controllers;

use App\Models\Collections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
class CartController extends Controller
{
    public function showCart(){
        return view('cart');
    }
    public function addToCart(Request $request)
    {
        $customerName = Session::get('customer_name');
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1); // Lấy số lượng, mặc định là 1
        $product = Products::find($productId);

        if(!$customerName) {
            return response()->json(['message' => 'Vui lòng đăng nhập!']);
        }
        if(!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
        }

        $cart = session()->get('cart', []);

        // Nếu sản phẩm đã tồn tại trong giỏ hàng
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            // Thêm sản phẩm mới vào giỏ hàng
            $cart[$productId] = [
                'id' => $product->product_id,
                'name' => $product->product_name,
                'quantity' => $quantity,
                'size' => $product->product_size,
                'price' => $product->product_price,
                'image' => $product->product_image,
                'collection' => $product->product_collection
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['message' => 'Sản phẩm đã được thêm vào giỏ hàng']);
    }
    public function removeFromCart($id){
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
    }
    public function update(Request $request){
        $cart = Session::get('cart');
        $productId = $request->product_id;
    
        if ($request->action == 'increase') {
            $cart[$productId]['quantity'] += 1;
        } elseif ($request->action == 'decrease' && $cart[$productId]['quantity'] > 1) {
            $cart[$productId]['quantity'] -= 1;
        }
    
        Session::put('cart', $cart);  // Cập nhật giỏ hàng trong session
    
        return response()->json(['message' => 'Cập nhật số lượng thành công']);
    }
    


}
