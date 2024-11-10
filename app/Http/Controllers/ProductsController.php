<?php

namespace App\Http\Controllers;

use App\Models\Collections;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Size;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function productsPage(Request $request){
        $all_products = Products::orderby('product_id','ASC')->get();
        return view('products',compact('all_products'));
    }

    public function filterByCategory($cate_id){
        $all_products = Products::where('product_cate', $cate_id)->get();
        return view('products',compact('all_products'));
    }
    public function productDetail($product_id){
        $all_size = Size::orderBy('size_id', 'ASC')->get();
        $product = Products::where('product_id', $product_id)->get();
        $product_cate = Products::where('product_id', $product_id)->first();
        $related_product = Products::where('product_cate', $product_cate->product_cate)->get();
        return view('product_detail',compact('product','all_size','related_product','product_cate'));
    }

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if(!$admin_id){
            return Redirect::to('/admin-login')->send();
        }else{
            return Redirect::to('/add-product-page');
        }
    }
    public function addProductPage(Request $request){
        $this->AuthLogin();
        $all_collection = Collections::orderBy('collection_id', 'ASC')->get();
        $all_size = Size::orderBy('size_id', 'ASC')->get();
        return view('add_product', compact('all_collection', 'all_size'));
    }
    public function allProductPage(Request $request){
        $this->AuthLogin();
        $all_collection = Collections::orderBy('collection_id', 'ASC')->get();
        $all_size = Size::orderBy('size_id', 'ASC')->get();
        $all_product = Products::orderBy('product_id', 'ASC')->get();
        return view('all_product', compact('all_collection', 'all_size', 'all_product'));
    }

    public function save_product(Request $request){
        $this->AuthLogin();
        // $this->validation($request);
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_oldprice'] = $request->product_oldprice;
        $data['product_price'] = $request->product_price;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_size'] = $request->product_size;
        $data['product_cate'] = $request->product_cate;
        $data['product_collection'] = $request->product_collection;

        $get_image = $request-> file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_products')->insert($data);
            Session::flash('message', 'Thêm sản phẩm thành công');
            return Redirect::to('add-product-page');
        }
        $data['product_image'] = '';

        DB::table('tbl_products')->insert($data);
        Session::flash('message', 'Thêm sản phẩm thành công');
        return Redirect::to('add-product-page');
    }
    public function editProductPage($product_id){
        $this->AuthLogin();
        $all_collection = Collections::orderBy('collection_id', 'ASC')->get();
        $all_size = Size::orderBy('size_id', 'ASC')->get();

        $edit_product = DB::table('tbl_products')->where('product_id',$product_id)->get();
        return view('edit_product', compact('all_collection','all_size','edit_product'));
    }
    public function update_product(Request $request,$product_id){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_oldprice'] = $request->product_oldprice;
        $data['product_price'] = $request->product_price;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_size'] = $request->product_size;
        $data['product_cate'] = $request->product_cate;
        $data['product_collection'] = $request->product_collection;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_products')->where('product_id',$product_id)->update($data);
            Session::flash('message', 'Cập nhật sản phẩm thành công');
            return Redirect::to('all-products');
        }
        DB::table('tbl_products')->where('product_id',$product_id)->update($data);
        Session::flash('message', 'Cập nhật sản phẩm thành công');
        return Redirect::to('all-products');
    }
    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_products')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('all-products');
    }
}
