<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Roles;
use Auth;

class AuthController extends Controller
{
    public function register_auth(){
    	return view('phanquyen.register');
    }
 
    public function register(Request $request){
    	$data=$request->all();
    	$admin= new Admin();
    	$admin->e_name=$data['e_name'];
    	$admin->e_email=$data['e_email'];
    	$admin->e_password=md5($data['e_password']);

    	$admin->save();
    	return redirect('/register-auth');
    }

    public function login_auth(Request $request){
    	
    	$admin= new Admin();
    	if(Auth::attempt(['e_email'=>$request->e_email,'e_password'=>$request->e_password])){
             return redirect('/admin-dashboard');
    	}
    	else{
    		return redirect('/');
    	}
    }
    public function admin_dashboard(){
        return view('admin_dashboard ');
    }

   


}
