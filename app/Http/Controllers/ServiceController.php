<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ServiceController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('admin-dashboard');
        }else{
            return Redirect::to('/')->send();
        }
    }

    public function add()
    {
        $this->AuthLogin();
        $service = DB::table('tbl_service')->orderby('service_id','desc')->get(); 
        return view('service.add')->with('service',$service);   
    }

    public function save(Request $request){
            $this->AuthLogin();
            $this->validate($request,
        [
            'name' => 'bail|required',
            
        ],

        [
            'required' => ':attribute Không được để trống',

        ],

        [
            'name' => 'Tên dịch vụ',

        ]

    );
        $data = array();
        $data['service_name'] = $request->name;
        $data['service_note'] = $request->note;
        DB::table('tbl_service')->insert($data);
        Session::put('message', 'Thêm dịch vụ thành công');
        return Redirect::to('all-service');
   
    }

    public function show(){
        $this->AuthLogin();
        $service= DB::table('tbl_service')->get();
        $show= view('service.show')->with('service', $service);
        return view('admin_layout')->with('service', $show);
    }

    public function edit($service_id){
        $this->AuthLogin();
        $service= DB::table('tbl_service')->where('service_id', $service_id)->get();
        $show = view('service.edit')->with('service', $service);
        return view('admin_layout')->with('service', $show);
    }

    public function update(Request $request, $service_id){
        $this->AuthLogin();
        $this->validate($request,
        [
            'name' => 'bail|required',
            
        ],

        [
            'required' => ':attribute Không được để trống',

        ],

        [
            'name' => 'Tên dịch vụ',

        ]

    );
        	
        $data = array();
        $data['service_name'] = $request->name;
        // $data['service_note']  = $_POST['note'];
        $data['service_note'] = $request->note;
        DB::table('tbl_service')->where('service_id',$service_id)->update($data);
        Session::put('message','Cập nhật dịch vụ thành công');
        return Redirect::to('all-service');
    }

    public function delete($service_id){
        $this->AuthLogin();
        DB::table('tbl_service')->where('service_id',$service_id)->delete();
        Session::put('message','Xóa dịch vụ thành công');
        return Redirect::to('all-service');
    }
}
