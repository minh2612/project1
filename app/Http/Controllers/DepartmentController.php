<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Route;  

use Session;
use Carbon\Carbon;
use App\Http\Requests;
use Auth;
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


    public function add()
    {
        $this->AuthLogin();
        return view('department.add');     
    }


    public function show(){
        $this->AuthLogin();
        $department= DB::table('tbl_department')->get();
        $show = view('department.show')->with('department', $department);
        return view('admin_layout')->with('department', $show);

        }
    


    public function save(Request $request){
        $this->AuthLogin();
        $this->validate($request,

        [
                       
            'name' => 'bail|required|unique:tbl_department,department_name',
            
            
                
        ],

        [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại',
        ],

        [
            
            'name' => 'Tên phòng ban',
        ]

    );
        $data = array();
        $data['department_name']= $request->name;
        $data['department_note']= $request->note;
        DB::table('tbl_department')->insert($data);
        Session::put('message', 'Thêm phòng ban thành công');
        return Redirect::to('all-department');
    }

    public function edit($department_id){
        $this->AuthLogin();
        $department= DB::table('tbl_department')->where('department_id', $department_id)->get();
        $show= view('department.edit')->with('department', $department);
        return view('admin_layout')->with('department.edit', $show);
    }

    public function update(Request $request, $department_id){
        $this->AuthLogin();
        $this->validate($request,
        [                 
            'name' => 'bail|required',     
        ],

        [
            'required' => ':attribute không được để trống',
        ],

        [
            'name' => 'Tên phòng ban',
        ]

    );
        $data = array();
        $data['department_name']= $request->name;
        $data['department_note']= $request->note;
        DB::table('tbl_department')->where('department_id', $department_id)->update($data);
        Session::put('message', 'Cập nhật phòng ban thành công');
        return Redirect::to('all-department');
    }

    public function delete($department_id){
        $this->AuthLogin();
        DB::table('tbl_department')->where('department_id', $department_id)->delete();
        Session::put('message', 'Xóa phòng ban thành công');
        return Redirect::to('all-department');
    }
}
