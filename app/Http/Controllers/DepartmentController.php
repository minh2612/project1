<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class DepartmentController extends Controller
{
   public function AuthLogin(){
            $admin_id = Auth::id();
            if($admin_id){
                return Redirect::to('admin-dashboard');
            }else{
                return Redirect::to('/')->send();
            }
        }

    public function add_department()
    {
       $this->AuthLogin();
        return view('add_department');     
    }

    public function all_department(){
         $this->AuthLogin();
        $all_department= DB::table('tbl_department')->get();
        $manager_department = view('all_department')->with('all_department', $all_department);
        return view('admin_layout')->with('all_department', $manager_department);

        }

    public function save_department(Request $request){
         $this->AuthLogin();
        $data = array();
        $data['department_name']= $request->department_name;
              $this->validate($request,
        [
                       
            'department_name' => 'bail|required|unique:tbl_department',
            
            
                
        ],

        [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại',
        ],

        [
            
            'department_name' => 'Tên phòng ban',
      ]

    );
        DB::table('tbl_department')->insert($data);
        Session::put('message', 'Thêm phòng ban thành công');
        return Redirect::to('add-department');
    }

   public function detail_department($department_id){
     

        $this->AuthLogin();
        $detail_department = DB::table('tbl_department')->where('department_id',$department_id)->get();
        $detail_employee = DB::table('tbl_e')->where('department_id',$department_id)->get();
    
        
        $manager_department  = view('detail_department')->with('detail_department',$detail_department)->with('detail_employee',$detail_employee);
        return view('admin_layout')->with('detail_department', $manager_department);

    }
    public function edit_department($department_id){
         $this->AuthLogin();
        $edit_department= DB::table('tbl_department')->where('department_id', $department_id)->get();
        $manager_department = view('edit_department')->with('edit_department', $edit_department);
        return view('admin_layout')->with('edit_department', $manager_department);
    }

    public function update_department(Request $request, $department_id){
         $this->AuthLogin();
        $data = array();
        $data['department_name']= $request->department_name;
        DB::table('tbl_department')->where('department_id', $department_id)->update($data);
        Session::put('message', 'Cập nhật phòng ban thành công');
        return Redirect::to('all-department');
    }

    public function delete_department($department_id){
       $this->AuthLogin();
        DB::table('tbl_department')->where('department_id', $department_id)->delete();
        Session::put('message', 'Xóa phòng ban thành công');
        return Redirect::to('all-department');
    }

}
