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

class Position_Controller extends Controller
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
        return view('position.add');     
    }

    public function show(){
        $this->AuthLogin();
        $position= DB::table('tbl_position')->get();
        $show = view('position.show')->with('position', $position);
        return view('admin_layout')->with('position', $show);
        }

    public function save(Request $request){
        $this->AuthLogin();
        $this->validate($request,
        [
                       
            'name' => 'bail|required|unique:tbl_position,position_name',
            
            
                
        ],

        [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại',
        ],

        [
            
            'name' => 'Tên chức vụ',
        ]

    );
        $data = array();
        $data['position_name']= $request->name;
        $data['position_note']= $request->note;
        DB::table('tbl_position')->insert($data);
        Session::put('message', 'Thêm chức vụ thành công');
        return Redirect::to('all-position');
    }

    public function edit($position_id){
        $this->AuthLogin();
        $position= DB::table('tbl_position')->where('position_id', $position_id)->get();
        $show= view('position.edit')->with('position', $position);
        return view('admin_layout')->with('position.edit', $show);
    }

    public function update(Request $request, $position_id){
        $this->AuthLogin();
        $this->validate($request,
        [                 
            'name' => 'bail|required',     
        ],

        [
            'required' => ':attribute không được để trống',
        ],

        [
            'name' => 'Tên chức vụ',
        ]

    );
        $data = array();
        $data['position_name']= $request->name;
        $data['position_note']= $request->note;
        DB::table('tbl_position')->where('position_id', $position_id)->update($data);
        Session::put('message', 'Cập nhật chức vụ thành công');
        return Redirect::to('all-position');
    }

    public function delete($position_id){
        $this->AuthLogin();
        DB::table('tbl_position')->where('position_id', $position_id)->delete();
        Session::put('message', 'Xóa chức vụ thành công');
        return Redirect::to('all-position');
    }
}
