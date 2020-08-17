<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;

class UsersController extends Controller

{
    // public function dashboard(Request $request){
    	
        

 //    	$admin_email= $request->e_email;
 //    	$admin_password = md5($request->e_password);

 //    	$result= DB::table('tbl_e')->where('e_email', $admin_email)->where('e_password', $admin_password)->first();

 //    	if($result){
    		
 //    		return view('home')->with('result',$result);
 //    	}
 //    	else{
 //    		Session::put('message', 'Tài khoản hoặc mật khẩu không đúng!');
 //    		return Redirect::to('/log_in');
 //    	}
	// }
	// public function logout(){
 //    	Session::put('e_name', null);
 //    	Session::put('e_id', null);	
 //    	return view('log_in');
 //    }
     public function index(){
        return view('users_dashboard');
    }
    public function dashboard(Request $request){
        $admin_email= $request->e_email;
        $admin_password = md5($request->e_password);

        $result= DB::table('tbl_e')->where('e_email', $admin_email)->where('e_password', $admin_password)->first();
        if($result){
            Session::put('e_name', $result->e_name);
            Session::put('e_id', $result->e_id);
            return view('users_dashboard')->with('e_name',$result->e_name);
        }
        else{
            Session::put('message', 'Tài khoản hoặc mật khẩu không đúng!');
            return Redirect::to('/log_in');
        }
        
    }
    public function logout(){
        Session::put('e_name', null);
        Session::put('e_id', null); 
        return Redirect::to('/log_in');
    }
}
