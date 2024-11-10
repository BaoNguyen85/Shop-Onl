<?php

namespace App\Http\Controllers;

use App\Models\Collections;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{
    public function collectionPage(Request $request, $collection_id){
        $collection = Collections::find($collection_id);
        $products = Products::orderby('product_id','ASC')->where('product_collection', $collection_id)->get();
        return view('collections',compact('products','collection'));
    }
    public function addCollectionPage(Request $request){
        return view('add_collection');
    }
    public function allCollectionPage(Request $request){
        $all_collection = Collections::orderBy('collection_id', 'ASC')->get();
        return view('all_collection', compact('all_collection'));
    }
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if(!$admin_id){
            return Redirect::to('/admin-login')->send();
        }else{
            return Redirect::to('/add-product-page');
        }
    }
    public function save_collection(Request $request){
        $this->AuthLogin();
        // $this->validation($request);
        $data = array();
        $data['collection_name'] = $request->collection_name;
        $data['collection_title'] = $request->collection_title;
        $data['collection_description'] = $request->collection_description;
        $data['collection_content'] = $request->collection_content;

        $get_image = $request-> file('collection_img');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/collection',$new_image);
            $data['collection_img'] = $new_image;
            DB::table('tbl_collections')->insert($data);
            Session::flash('message', 'Thêm bộ sưu tập thành công');
            return Redirect::to('add-collection-page');
        }
        $data['collection_img'] = '';

        DB::table('tbl_products')->insert($data);
        Session::flash('message', 'Thêm bộ sưu tập thành công');
        return Redirect::to('add-collection-page');
    }
}
