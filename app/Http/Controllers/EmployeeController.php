<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class EmployeeController extends Controller
{
  public function AuthAdmin(){
        $admin_id = Session::get('e_id');
        $id=DB::table('tbl_e')->where('e_id',$admin_id)->first();
         $id1=$id->is_admin;

        if($admin_id && $id1==1){
            return Redirect::to('admin-dashboard');
        }else{
            return Redirect::to('/')->send();
        }
    }

    public function add_employee()
    {
        $this->AuthAdmin();
        $e_department = DB::table('tbl_department')->orderby('department_id','desc')->get(); 
        $e_position = DB::table('tbl_position')->orderby('position_id','desc')->get(); 
       

        return view('add_employee')->with('e_department',$e_department)->with('e_position',$e_position);   
    }

    public function all_employee(){
        $this->AuthAdmin();
        //$this->AuthLogin();
        $all_employee = DB::table('tbl_e')
        ->join('tbl_position','tbl_position.position_id','=','tbl_e.position_id')
        ->join('tbl_department','tbl_department.department_id','=','tbl_e.department_id')
        ->orderby('tbl_e.department_id','desc')->paginate(10);;
        $manager_employee  = view('all_employee', compact('all_employee'))->with('all_employee',$all_employee);
        return view('admin_layout')->with('all_employee', $manager_employee);

    }

     public function detail_employee($e_id){
        $this->AuthAdmin();

        //$this->AuthLogin();
        $detail_employee = DB::table('tbl_e')
        ->join('tbl_position','tbl_position.position_id','=','tbl_e.position_id')
        ->join('tbl_department','tbl_department.department_id','=','tbl_e.department_id')
        ->orderby('tbl_e.department_id','desc')->where('e_id',$e_id)->get();

        
        $manager_employee  = view('detail_employee')->with('detail_employee',$detail_employee);
        return view('admin_layout')->with('detail_employee', $manager_employee);

    }


    public function save_employee(Request $request){
        $this->AuthAdmin();
            $this->validate($request,
        [
             'e_avatar' => 'bail|required',
            'department_id' => 'bail|required',
            'e_name' => 'bail|required||max:50',
            'e_email' => 'bail|unique:tbl_e|required|email|min:5|max:25',
            'e_address' => 'bail|required',
            'e_phone' => 'bail|required|alpha_num',
            'e_cmnd' => 'bail|required|alpha_num',
            'e_sex' => 'bail|required',
            'position_id' => 'bail|required',
            'e_password' =>'bail|required|min:5|max:25',
            
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
            'e_cmnd' => 'Chứng minh nhân dân',
            'department_id' => 'Phòng ban',
            'e_name' => 'Tên nhân viên',
            'e_email' => 'Email',
            'e_address' => 'Địa chỉ',
            'e_phone' => 'Số điện thoại',
            'e_sex' => 'Giới tính',
            'position_id' => 'Ví trí',
            'e_password' => 'Mật khẩu',
            'is_admin' => 'Quyền',
            'e_avatar' => 'Ảnh đại diện',

        ]

    );
        // $this->AuthLogin();
        $data = array();
        $data['department_id'] = $request->department_id;
        $data['e_name'] = $request->e_name;
        $data['e_email'] = $request->e_email;
        $data['e_address'] = $request->e_address;
        $data['e_phone'] = $request->e_phone;
        $data['e_sex'] = $request->e_sex; 
        $data['e_cmnd'] = $request->e_cmnd; 
        $data['position_id'] = $request->position_id;
        $data['e_password'] = md5($request->e_password);
        $data['is_admin'] = ($request->is_admin);
        $data['e_avatar'] = ($request->e_avatar);
        $get_image = $request->file('e_avatar');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/avatar',  $new_image);
            $data['e_avatar'] = $new_image;
            DB::table('tbl_e')->insert($data);
            Session::put('message','Thêm nhân viên thành công');
             return Redirect::to('add-employee');
        }
   
    }
   
    public function edit_employee($e_id){
        $this->AuthAdmin();
        // $this->AuthLogin();

        $e_department = DB::table('tbl_department')->get(); 
        $e_position = DB::table('tbl_position')->orderby('position_id','desc')->get();  

        $edit_employee = DB::table('tbl_e')->where('e_id',$e_id)->get();

        $manager_employee  = view('edit_employee')->with('edit_employee',$edit_employee)->with('e_position',$e_position )->with('e_department', $e_department);


        return view('admin_layout')->with('edit_employee', $manager_employee);
    }

    public function update_employee(Request $request, $e_id){
        $this->AuthAdmin();
        // $this->AuthLogin();
            $this->validate($request,
        [
                       
            'e_email' => 'bail|email|min:5|max:25',
            'e_password' =>'bail|min:5|max:50',
            'e_phone' => 'bail|alpha_num',
            
                
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
            
            'e_email' => 'Email',
            'e_phone' => 'Số điện thoại',
            'e_password' =>'Mật khẩu'
           
            

        ]

    );
        $data = array();
        $data['e_name'] = $request->e_name;
       
        $data['e_email'] = $request->e_email;
        $data['e_address'] = $request->e_address;
        $data['e_phone'] = $request->e_phone;
        $data['e_sex'] = $request->e_sex;
        $data['department_id'] = $request->department_id;
        $data['position_id'] = $request->position_id;
        $data['e_password'] = md5($request->e_password);
        DB::table('tbl_e')->where('e_id',$e_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-employee');
    }

    public function delete_employee($e_id){
        $this->AuthAdmin();
        //$this->AuthLogin();
        DB::table('tbl_e')->where('e_id',$e_id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('all-employee');
    }

}
