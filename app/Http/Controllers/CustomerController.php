<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use App\Http\Requests;
use Auth;
use Illuminate\Support\Facades\Redirect;
session_start();

class CustomerController extends Controller
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
        $customer_group = DB::table('tbl_customer_group')->orderby('customer_group_id','asc')->get();
        $sex = DB::table('tbl_sex')->orderby('sex_id','asc')->get(); 
        $service = DB::table('tbl_service')->orderby('service_id','desc')->get();
        return view('customer.add')->with('customer_group',$customer_group)->with('sex',$sex)->with('service',$service);   
    }

    public function show(){
        $this->AuthLogin();
        $customer= DB::table('tbl_customer')->join('tbl_sex','tbl_sex.sex_id','=','tbl_customer.sex_id')->join('tbl_customer_group','tbl_customer_group.customer_group_id','=','tbl_customer.customer_group_id')->join('tbl_service','tbl_service.service_id','=','tbl_customer.service_id')->orderby('tbl_customer_group.customer_group_id','desc')->get();
        $show= view('customer.show')->with('customer', $customer);
        return view('admin_layout')->with('customer', $show);
    }

    public function save(Request $request){
            $this->AuthLogin();
            $this->validate($request,
        [
            'name' => 'bail|required',
            'email' => 'bail|unique:tbl_customer,customer_email|required|email',
            'address' => 'bail|required',
            'phone' => 'bail|required|alpha_num',
        ],

        [
            'required' => ':attribute Không được để trống',
            'alpha_num' => ':attribute chỉ được nhập số',
            'email' => ':attribute không đúng định dạng',
            'unique' => ':attribute đã tồn tại',
        ],

        [
            'name' => 'Tên khách hàng',
            'email' => 'Email',
            'address' => 'Địa chỉ',
            'phone' => 'Số điện thoại',         
        ]

    );
        $data = array();
        $data['customer_name'] = $request->name;
        $data['customer_email'] = $request->email;
        $data['customer_address'] = $request->address;
        $data['customer_phone'] = $request->phone;
        $data['sex_id'] = $request->sex;
        $data['customer_group_id'] = $request->customer_group;
        $data['service_id'] = $request->service;
        $data['customer_note'] = $request->note;
        $data['customer_image'] = $request->image;
        $data['customer_created_day'] =Carbon::now('Asia/Ho_Chi_Minh');
        $get_image = $request->file('image');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/avatar',  $new_image);
            $data['customer_image'] = $new_image;
        }

        DB::table('tbl_customer')->insert($data);
        Session::put('message','Thêm khách hàng thành công');
        return Redirect::to('all-customer');

   
    }
   
    public function edit($customer_id){
        $this->AuthLogin();
        $customer= DB::table('tbl_customer')->where('customer_id', $customer_id)->get();
        $sex= DB::table('tbl_sex')->get();
        $customer_group= DB::table('tbl_customer_group')->get();
        $service= DB::table('tbl_service')->get();
        $show = view('customer.edit')->with('customer', $customer)->with('sex', $sex)->with('customer_group', $customer_group)->with('service', $service);
        return view('admin_layout')->with('customer', $show);
    }

    public function update(Request $request, $customer_id){
        $this->AuthLogin();
        $this->validate($request,
        [
            'name' => 'bail|required',
            'email' => 'bail|required|email',
            'address' => 'bail|required',
            'phone' => 'bail|required|alpha_num',
        ],

        [
            'required' => ':attribute Không được để trống',
            'alpha_num' => ':attribute chỉ được nhập số',
            'email' => ':attribute không đúng định dạng',
        ],

        [
            'name' => 'Tên khách hàng',
            'email' => 'Email',
            'address' => 'Địa chỉ',
            'phone' => 'Số điện thoại',         
        ]

    );
        	
        $data = array();
        $data['customer_name'] = $request->name;
        $data['customer_email'] = $request->email;
        $data['customer_address'] = $request->address;
        $data['customer_phone'] = $request->phone;
        $data['sex_id'] = $request->sex;
        $data['customer_group_id'] = $request->customer_group;
        $data['service_id'] = $request->service;
        $data['customer_note'] = $request->note;
        $data['customer_created_day'] =Carbon::now('Asia/Ho_Chi_Minh');
        $get_image = $request->file('image');
        
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/avatar',$new_image);
            $data['customer_image'] = $new_image;
        }
        DB::table('tbl_customer')->where('customer_id',$customer_id)->update($data);
        Session::put('message','Cập nhật thông tin thành công');
        return Redirect::to('all-customer');
    }

    public function delete($customer_id){
        $this->AuthLogin();
        DB::table('tbl_customer')->where('customer_id',$customer_id)->delete();
        Session::put('message','Xóa khách hàng thành công');
        return Redirect::to('all-customer');
    }
}
