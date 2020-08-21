<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CustomerGroupController extends Controller
{
    

    public function add_customer_group()
    {
       // $this->AuthAdmin();
        return view('add_customer_group');     
    }

    public function all_customer_group(){
        //$this->AuthAdmin();
        $all_customer_group= DB::table('tbl_customer_group')->get();
        $manager_customer_group = view('all_customer_group')->with('all_customer_group', $all_customer_group);
        return view('admin_layout')->with('all_customer_group', $manager_customer_group);

        }

    public function save_customer_group(Request $request){
        //$this->AuthAdmin();
        $data = array();
        $data['customer_group_name']= $request->customer_group_name;
              $this->validate($request,
        [
                       
            'customer_group_name' => 'bail|required|unique:tbl_customer_group',
            
            
                
        ],

        [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại',
        ],

        [
            
            'customer_group_name' => 'Tên nhóm khách hàng',
      ]

    );
        DB::table('tbl_customer_group')->insert($data);
        Session::put('message', 'Thêm nhóm khách hàng thành công');
        return Redirect::to('all-customer-group');
    }

   public function detail_customer_group($customer_group_id){
      //  $this->AuthAdmin();

        //$this->AuthLogin();
        $detail_customer_group = DB::table('tbl_customer_group')->where('customer_group_id',$customer_group_id)->get();
        $detail_customer= DB::table('tbl_customer')->where('customer_group_id',$customer_group_id)->get();
    
        
        $manager_customer_group  = view('detail_customer_group')->with('detail_customer_group',$detail_customer_group)->with('detail_customer',$detail_customer);
        return view('admin_layout')->with('detail_customer_group', $manager_customer_group);

    }
    public function edit_customer_group($customer_group_id){
       // $this->AuthAdmin();
        $edit_customer_group= DB::table('tbl_customer_group')->where('customer_group_id', $customer_group_id)->get();
        $manager_customer_group = view('edit_customer_group')->with('edit_customer_group', $edit_customer_group);
        return view('admin_layout')->with('edit_customer_group', $manager_customer_group);
    }

    public function update_customer_group(Request $request, $customer_group_id){
        //$this->AuthAdmin();
        $data = array();
        $data['customer_group_name']= $request->customer_group_name;
        DB::table('tbl_customer_group')->where('customer_group_id', $customer_group_id)->update($data);
        Session::put('message', 'Cập nhật thông tin thành công');
        return Redirect::to('all-customer-group');
    }

    public function delete_customer_group($customer_group_id){
       // $this->AuthAdmin();
        DB::table('tbl_customer_group')->where('customer_group_id', $customer_group_id)->delete();
        Session::put('message', 'Xóa thành công');
        return Redirect::to('all-customer-group');
    }
}
