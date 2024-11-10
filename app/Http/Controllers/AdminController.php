<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function loginAdminPage(){
        return view('admin_login');
    }
    public function dashboardPage(){
        return view('dashboard');
    }
    public function adminDashboard(Request $request){
        $admin_mail = $request->admin_mail;
        $admin_password = $request->admin_password;
        // $admin_password = md5($request->admin_password);
        $result = DB::table('tbl_admin')->where('admin_mail',$admin_mail)->where('admin_password',$admin_password)->first();
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/welcome-admin');
        }else{
            Session::flash('message','Mật khẩu hoặc mail chưa đúng!');
            return Redirect::to('/admin-login');
        }
    }
    public function adminLogin(){
        $adminID = Session::get('admin_id');
        if(!$adminID){
            return Redirect::to('/admin-login');
        }else{
            return view('dashboard');
        }
    }
    public function showAdminIndex(Request $request){
        $this->adminLogin();
        $adminID = Session::get('admin_id');
        $adminName = Session::get('admin_name');
        return view('dashboard', compact('adminID','adminName'));
    }
    public function adminLogout(){
        $this->adminLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin-login');
    }
}
