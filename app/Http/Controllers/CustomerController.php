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

    public function add_customer()
    {
      $this->AuthLogin();
        $customer_employee = DB::table('tbl_e')->orderby('e_id','desc')->get(); 
        $customer_groups = DB::table('tbl_customer_group')->orderby('customer_group_id','desc')->get(); 
       

        return view('add_customer')->with('customer_employee',$customer_employee)->with('customer_groups',$customer_groups);   
    }

    public function all_customer(){
        $this->AuthLogin();
        $all_customer = DB::table('tbl_customer')
        ->join('tbl_e','tbl_e.e_id','=','tbl_customer.e_id')
        ->join('tbl_customer_group','tbl_customer_group.customer_group_id','=','tbl_customer.customer_group_id')
        ->orderby('tbl_customer_group.customer_group_id','desc')->get();
        $manager_customer  = view('all_customer')->with('all_customer',$all_customer);
        return view('admin_layout')->with('all_customer', $manager_customer);

    }

     public function detail_customer($customer_id){
         $this->AuthLogin();
        $detail_customer = DB::table('tbl_customer')
        ->join('tbl_e','tbl_e.e_id','=','tbl_customer.e_id')
        ->join('tbl_customer_group','tbl_customer_group.customer_group_id','=','tbl_customer.customer_group_id')
        ->orderby('tbl_customer_group.customer_group_id','desc')->where('customer_id',$customer_id)->get();

        
        $manager_customer  = view('detail_customer')->with('detail_customer',$detail_customer);
        return view('admin_layout')->with('detail_customer', $manager_customer);

    }


    public function save_customer(Request $request){
             $this->AuthLogin();
            $this->validate($request,
        [
            'customer_avatar' => 'bail|required',
            'customer_name' => 'bail|required||max:50',
            'customer_email' => 'bail|unique:tbl_customer|required|email|min:5|max:25',
            'customer_address' => 'bail|required',
            'customer_phone' => 'bail|required|alpha_num',
            'customer_born_year' => 'bail|required|max:4',
            'customer_sex' => 'bail|required',
            
            'e_id' => 'bail|required',
            'customer_code' => 'bail|required|min:3|max:5',
            'customer_group_id' => 'bail|required',
            
        ],

        [
            'required' => ':attribute Không được để trống',
            'min' => ':attribute không được nhỏ hơn :min',
            'max' => ':attribute không được lớn hơn :max',
            'alpha_num' => ':attribute chỉ được nhập số',
            'alpha' => ':attribute không được nhập kí tự đặc biệt',
            'email' => ':attribute không đúng định dạng',
            'unique' => ':attribute đã tồn tại',
        ],

        [
            'customer_born_year' => 'Năm sinh',
            'customer_name' => 'Tên khách hàng',
            'customer_email' => 'Email',
            'customer_address' => 'Địa chỉ',
            'customer_phone' => 'Số điện thoại',
            'customer_sex' => 'Giới tính',
            'e_id' => 'Tên nhân viên',
           	'customer_code_id' => 'Phòng ban',
           	'customer_group_id' => 'Nhóm khách hàng',
            
            'customer_avatar' => 'Ảnh đại diện',

        ]

    );
        // $this->AuthLogin();
        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_address'] = $request->customer_address;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_sex'] = $request->customer_sex; 
        $data['customer_born_year'] = $request->customer_born_year; 
        $data['customer_code'] = $request->customer_code;
        $data['customer_avatar'] = ($request->customer_avatar);
        $data['e_id'] = $request->e_id;
        $data['customer_group_id'] = ($request->customer_group_id);
        $data['customer_created_day'] =Carbon::now('Asia/Ho_Chi_Minh');
        $get_image = $request->file('customer_avatar');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/avatar',  $new_image);
            $data['customer_avatar'] = $new_image;
            DB::table('tbl_customer')->insert($data);
            Session::put('message','Thêm khách hàng thành công');
             return Redirect::to('all-customer');
        }
   
    }
   
    public function edit_customer($customer_id){
         $this->AuthLogin();
        $customer_employee = DB::table('tbl_e')->orderby('e_id','desc')->get(); 
        $customer_groups = DB::table('tbl_customer_group')->orderby('customer_group_id','desc')->get();

        $edit_customer = DB::table('tbl_customer')->where('customer_id',$customer_id)->get();

        $manager_customer  = view('edit_customer')->with('edit_customer',$edit_customer)->with('customer_employee',$customer_employee)->with('customer_groups',$customer_groups);


        return view('admin_layout')->with('edit_customer', $manager_customer);
    }

    public function update_customer(Request $request, $customer_id){
          $this->AuthLogin();
            $this->validate($request,
         [
            
            'customer_name' => 'bail|required||max:50',
            'customer_email' => 'bail|required|email|min:5|max:25',
            'customer_address' => 'bail|required',
            'customer_phone' => 'bail|required|alpha_num',
            'customer_born_year' => 'bail|required|max:4',
            'customer_sex' => 'bail|required',
            
            'e_id' => 'bail|required',
            'customer_code' => 'bail|required|min:3|max:5',
            'customer_group_id' => 'bail|required',
            
        ],

        [
            'required' => ':attribute Không được để trống',
            'min' => ':attribute không được nhỏ hơn :min',
            'max' => ':attribute không được lớn hơn :max',
            'alpha_num' => ':attribute chỉ được nhập số',
            'alpha' => ':attribute không được nhập kí tự đặc biệt',
            'email' => ':attribute không đúng định dạng',
            'unique' => ':attribute đã tồn tại',
        ],

        [
            'customer_born_year' => 'Năm sinh',
            'customer_name' => 'Tên khách hàng',
            'customer_email' => 'Email',
            'customer_address' => 'Địa chỉ',
            'customer_phone' => 'Số điện thoại',
            'customer_sex' => 'Giới tính',
            'e_id' => 'Tên nhân viên',
           	'customer_code_id' => 'Phòng ban',
           	'customer_group_id' => 'Nhóm khách hàng',
            
            'customer_avatar' => 'Ảnh đại diện',

        ]

    );
        	
        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_address'] = $request->customer_address;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_sex'] = $request->customer_sex; 
        $data['customer_born_year'] = $request->customer_born_year; 
        $data['customer_code'] = $request->customer_code;
        $data['customer_avatar'] = ($request->customer_avatar);
        $data['e_id'] = $request->e_id;
        $data['customer_group_id'] = ($request->customer_group_id);
        $get_image = $request->file('customer_avatar');
        
        if($get_image){
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                    $get_image->move('public/avatar',$new_image);
                    $data['customer_avatar'] = $new_image;
                    DB::table('tbl_customer')->where('customer_id',$customer_id)->update($data);
                    Session::put('message','Cập nhật khách hàng thành công');
                    return Redirect::to('all-customer');
        }
        else{
        DB::table('tbl_customer')->where('customer_id',$customer_id)->update($data);
        Session::put('message','Cập nhật thông tin thành công');
        return Redirect::to('all-customer');
    }
    }

    public function delete_customer($customer_id){
         $this->AuthLogin();
        DB::table('tbl_customer')->where('customer_id',$customer_id)->delete();
        Session::put('message','Xóa khách hàng thành công');
        return Redirect::to('all-customer');
    }
}
