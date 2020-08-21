<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();



class PositionController1 extends Controller
{
    public function add_position()
    {

        return view('add_position');     
    }

    public function all_position(){

        $all_position= DB::table('tbl_position')->get();
        $manager_position = view('all_position')->with('all_position', $all_position);
        return view('admin_layout')->with('all_position', $manager_position);

        }

    public function save_position(Request $request){

        $data = array();
        $data['position_name']= $request->position_name;
        $data['position_note']= $request->position_note;
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
        Session::put('message', 'Thêm phòng ban thành công');
        return Redirect::to('add-position');
    }

   
    
     public function detail_position($position_id){
       
        $detail_position = DB::table('tbl_position')->where('position_id',$position_id)->get();
        $detail_employee = DB::table('tbl_e')->where('position_id',$position_id)->get();
    
        
        $manager_position  = view('detail_position')->with('detail_position',$detail_position)->with('detail_employee',$detail_employee);
        return view('admin_layout')->with('detail_position', $manager_position);

    }
    public function edit_position($position_id){

        $edit_position= DB::table('tbl_position')->where('position_id', $position_id)->get();
        $manager_position = view('edit_position')->with('edit_position', $edit_position);
        return view('admin_layout')->with('edit_position', $manager_position);
        Textarea::get('description');
    }

    public function update_position(Request $request, $position_id){

       
        $data = array();
        $data['position_name']= $request->position_name;
        $data['position_note']= $request->position_note;
        DB::table('tbl_position')->where('position_id', $position_id)->update($data);
        Session::put('message', 'Cập nhật phòng ban thành công');
        return Redirect::to('all-position');
    }

    public function delete_position($position_id){

        DB::table('tbl_position')->where('position_id', $position_id)->delete();
        Session::put('message', 'Xóa phòng ban thành công');
        return Redirect::to('all-position');
    }
}
