<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CustomerGroupController extends Controller
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
        return view('customer_group.add');     
    }

    public function show(){
        $this->AuthLogin();
        $customer_group= DB::table('tbl_customer_group')->get();
        $show = view('customer_group.show')->with('customer_group', $customer_group);
        return view('admin_layout')->with('customer_group', $show);
    }

    public function save(Request $request){
        $this->AuthLogin();
        $this->validate($request,
        [
                       
            'name' => 'bail|required|unique:tbl_customer_group,customer_group_name',          
        ],

        [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại',
        ],

        [
            
            'name' => 'Tên nhóm khách hàng',
        ]
    );
        $data = array();
        $data['customer_group_name']= $request->name;
        $data['customer_group_note']= $request->note;
        DB::table('tbl_customer_group')->insert($data);
        Session::put('message', 'Thêm nhóm khách hàng thành công');
        return Redirect::to('all-customer-group');
    }

    public function edit($customer_group_id){
        $this->AuthLogin();
        $customer_group= DB::table('tbl_customer_group')->where('customer_group_id', $customer_group_id)->get();
        $show = view('customer_group.edit')->with('customer_group', $customer_group);
        return view('admin_layout')->with('customer_group', $show);
    }

    public function update(Request $request, $customer_group_id){
        $this->AuthLogin();
        $this->validate($request,
        [
                       
            'name' => 'bail|required|',          
        ],

        [
            'required' => ':attribute không được để trống',
        ],

        [
            
            'name' => 'Tên nhóm khách hàng',
        ]
    );
        $data = array();
        $data['customer_group_name']= $request->name;
        $data['customer_group_note']= $request->note;
        DB::table('tbl_customer_group')->where('customer_group_id', $customer_group_id)->update($data);
        Session::put('message', 'Cập nhật thông tin thành công');
        return Redirect::to('all-customer-group');
    }

    public function delete($customer_group_id){
        $this->AuthLogin();
        DB::table('tbl_customer_group')->where('customer_group_id', $customer_group_id)->delete();
        Session::put('message', 'Xóa thành công');
        return Redirect::to('all-customer-group');
    }
}
