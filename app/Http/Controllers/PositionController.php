<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
use Validator;
session_start();

class PositionController extends Controller
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

    public function add_position()
    {
        $this->AuthAdmin();
        return view('add_position');     
    }

    public function all_position(){
        $this->AuthAdmin();
        $all_position= DB::table('tbl_position')->get();
        $manager_position = view('all_position')->with('all_position', $all_position);
        return view('admin_layout')->with('all_position', $manager_position);

    }

    public function save_position(Request $request){
        $this->AuthAdmin();
     
        $data = array();
        $data['position_name']= $request->position_name;
        
              $this->validate($request,
        [
                       
            'position_name' => 'bail|required|unique:tbl_position',
            
            
                
        ],

        [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại',
        ],

        [
            
            'position_name' => 'Tên phòng ban',
      ]

    );

        DB::table('tbl_position')->insert($data);
        Session::put('message', 'Thêm chức vụ thành công');
        return Redirect::to('add-position');
        }
    
 
    public function edit_position($position_id){
        $this->AuthAdmin();
        $edit_position= DB::table('tbl_position')->where('position_id', $position_id)->get();
        $manager_position = view('edit_position')->with('edit_position', $edit_position);
        return view('admin_layout')->with('edit_position', $manager_position);
    }
    public function update_position(Request $request, $position_id){
        $this->AuthAdmin();
        $data = array();
        $data['position_name']= $request->position_name;
        DB::table('tbl_position')->where('position_id', $position_id)->update($data);
        Session::put('message', 'Cập nhật chức vụ thành công');
        return Redirect::to('all-position');
    }
    public function delete_position($position_id){
        $this->AuthAdmin();
        DB::table('tbl_position')->where('position_id', $position_id)->delete();
        Session::put('message', 'Xóa chức vụ thành công');
        return Redirect::to('all-position');
    }               
}
