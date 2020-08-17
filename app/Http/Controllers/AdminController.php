<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    // public function dashboard()
    // {
    //     return view('admin_dashboard');     
    // }
    public function dashboard(Request $request){
    	$admin_email= $request->e_email;
    	$admin_password = md5($request->e_password);

    	$result= DB::table('tbl_e')->where('e_email', $admin_email)->where('e_password', $admin_password)->first();

    	if($result){
    		
    		return view('home')->with('result',$result);
    	}
    	else{
    		Session::put('message', 'Tài khoản hoặc mật khẩu không đúng!');
    		return Redirect::to('/log_in');
    	}
	}
	public function logout(){
    	Session::put('e_name', null);
    	Session::put('e_id', null);	
    	return view('log_in');
    }
    
}

