<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\Admin;
use App\Roles;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class EmployeeController extends Controller
{
      public function AuthLogin(){
            $admin_id = Auth::id();
            if($admin_id){
                return Redirect::to('admin-dashboard');
            }else{
                return Redirect::to('/')->send();
            }
        }

    public function add_employee()
    {
        $this->AuthLogin();
        $e_department = DB::table('tbl_department')->orderby('department_id','desc')->get(); 
        $e_position = DB::table('tbl_position')->orderby('position_id','desc')->get(); 
       
        $roles=DB::table('tbl_roles')->get();
        return view('add_employee')->with('e_department',$e_department)->with('e_position',$e_position)->with('roles',$roles);   
    }

    public function all_employee(){
       
        $this->AuthLogin();
        $all_employee = Admin::with('roles')->orderBy('e_id','DESC')->get();

        $manager_employee  = view('all_employee')->with('all_employee',$all_employee);
        return view('admin_layout')->with('all_employee', $manager_employee);

    }

    public function assign_roles(Request $request){
        $this->AuthLogin();
       $data = $request->all();
        $user = Admin::where('e_email',$data['e_email'])->first();
      
        $user->roles()->detach();
        if($request['admin_role']){
           $user->roles()->attach(Roles::where('name','admin')->first());     
        }
        if($request['manager_role']){
           $user->roles()->attach(Roles::where('name','manager')->first());     
        }
        if($request['user_role']){
           $user->roles()->attach(Roles::where('name','user')->first());     
        }
        return redirect()->back()->with('message','Cấp quyền thành công');
    }

     public function detail_employee($e_id){
        

        $this->AuthLogin();
        $detail_employee = DB::table('tbl_e')
        ->join('tbl_position','tbl_position.position_id','=','tbl_e.position_id')
        ->join('tbl_department','tbl_department.department_id','=','tbl_e.department_id')
        ->orderby('tbl_e.department_id','desc')->where('e_id',$e_id)->get();

        
        $manager_employee  = view('detail_employee')->with('detail_employee',$detail_employee);
        return view('admin_layout')->with('detail_employee', $manager_employee);

    }


    public function save_employee(Request $request){
            $this->AuthLogin();
            $this->validate($request,
        [
             'e_avatar' => 'bail|required',
            'department_id' => 'bail|required',
            'e_name' => 'bail|required||max:50',
            'e_email' => 'bail|unique:tbl_e|required|email|min:5|max:255',
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
        $data1 = array();
        $data['department_id'] = $request->department_id;
        $data['e_name'] = $request->e_name;
        $data['e_email'] = $request->e_email;
        $data['e_address'] = $request->e_address;
        $data['e_phone'] = $request->e_phone;
        $data['e_sex'] = $request->e_sex; 
        $data['e_cmnd'] = $request->e_cmnd; 
        $data['position_id'] = $request->position_id;
        $data['e_password'] = md5($request->e_password);
       
        $data['e_avatar'] = ($request->e_avatar);
        $get_image = $request->file('e_avatar');
        
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/avatar',  $new_image);
            $data['e_avatar'] = $new_image;
        
        }
            $id=DB::table('tbl_e')->insertGetId($data);
        
            Session::put('message','Thêm nhân viên thành công');
             return Redirect::to('add-employee');
   
    }
   
    public function edit_employee($e_id){
        
         $this->AuthLogin();

        $e_department = DB::table('tbl_department')->get(); 
        $e_position = DB::table('tbl_position')->orderby('position_id','desc')->get();  

        $edit_employee = DB::table('tbl_e')->where('e_id',$e_id)->get();

        $manager_employee  = view('edit_employee')->with('edit_employee',$edit_employee)->with('e_position',$e_position )->with('e_department', $e_department);


        return view('admin_layout')->with('edit_employee', $manager_employee);
    }

    public function update_employee(Request $request, $e_id){
        
        $this->AuthLogin();
            $this->validate($request,
        [
                       
            'e_email' => 'bail|email|min:5|max:255',
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
        $get_image = $request->file('e_avatar');
        
        if($get_image){
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                    $get_image->move('public/avatar',$new_image);
                    $data['e_avatar'] = $new_image;
        }
        DB::table('tbl_e')->where('e_id',$e_id)->update($data);
        Session::put('message','Cập nhật nhân viên thành công');
        return Redirect::to('all-employee');
    }
    

    public function delete_employee($e_id){
       
        $this->AuthLogin();
        if(Auth::id()==$e_id){
             return redirect()->back()->with('message','Bạn không được xóa chính mình');
        }
        else{
        DB::table('tbl_e')->where('e_id',$e_id)->delete();
        Session::put('message','Xóa nhân viên thành công');
        return Redirect::to('all-employee');
    }
    }

}
