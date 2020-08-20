<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use CarbonCarbon;

class ProjectController extends Controller
{
  
    public function add_project(){
      
        $e=DB::table('tbl_e')->get();
        return view('add_project')->with('e',$e);      
    }

    public function add_task($project_id){
      
        
        $e=DB::table('tbl_e')->get();
        $project_id= DB::table('tbl_project')->where('project_id',$project_id)->get();
        return view('add_task')->with('e',$e)->with('project_id',$project_id);      
    }

    public function all_project()
    {

        $all_task= DB::table('tbl_task')->get();

        $all_project= DB::table('tbl_project')->join('tbl_e','tbl_project.project_admin','=','tbl_e.e_id')->get();


        $all_employee=DB::table('tbl_employee_project')
        ->join('tbl_project','tbl_project.project_id','=','tbl_employee_project.project_id')
        ->join('tbl_e','tbl_employee_project.employee_id','=','tbl_e.e_id')->get();


        $manager_project = view('all_project')->with('all_project', $all_project)->with('all_employee',  $all_employee)->with('all_task',$all_task);
        return view('admin_layout')->with('all_project', $manager_project);
    }
    
    public function delete_project($project_id){
   
        DB::table('tbl_project')->where('project_id', $project_id)->delete();
        Session::put('message', 'Xóa dự án thành công');
        return Redirect::to('all-project');
    }

	public function info_task($project_id){
      
       $info_task= DB::table('tbl_task')->where('project_id',$project_id)->get();

       $all_user= DB::table('tbl_employee_task')
        ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')
        ->join('tbl_e','tbl_employee_task.employee_id','=','tbl_e.e_id')->get();

        $manager_task = view('info_task')->with('info_task', $info_task)->with('all_user', $all_user);
        return view('admin_layout')->with('info_task', $manager_task);
   	}

   	public function sm_task(){
        
       $sm_task= DB::table('tbl_task')->where('task_status',2)->get();
        $manager_sm = view('sm_task')->with('sm_task', $sm_task);
        return view('admin_layout')->with('sm_task', $manager_sm);
   	}

   	public function save_task(Request $request,$project_id){
        
        
        
        $data =array();
        $data1=array();
        $data['task_name'] = $request->task_name;
        $data['task_admin'] = $request->task_admin;
        $data['task_start'] = $request->task_start;
        $data['task_end'] = $request->task_end;
        $data['task_note'] = $request->task_note;
        $data['task_status'] = $request->task_status;
        $data['project_id']=$project_id;
        $id=DB::table('tbl_task')->insertGetId($data);
       foreach($request->employee_task as  $value) {
             $data1['project_id']=$project_id;
             $data1['task_id']= $id;
             $data1['employee_id']= $value;
             DB::table('tbl_employee_task')->insert($data1);
         }
        Session::put('message','Thêm công việc thành công');
        return Redirect::to('add-task/'.$project_id);
  
   	}

 

    public function save_project(Request $request){
       
        
        $data = array();
        $data1=array();

         $this->validate($request,
         [
            'project_name' => 'bail|required|unique:tbl_project',
            'project_admin' => 'bail|required',
            'project_start' => 'bail|required',
            'project_end' => 'bail|required|after:project_start',
            'project_status' => 'bail|required',
            'project_node' => 'bail|required|min:10',
          
            
        ],

        [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại',
            'min' => ':attribute không được nhỏ hơn :min',
            'max' => ':attribute không được lớn hơn :max',
            'after' => ':attribute phải lớn hơn ngày bắt đầu',

        ],

        [
            'project_name' => 'Tên dự án',
            'project_admin' => 'Người giao',
            'project_start' => 'Ngày bắt đầu',
            'project_end' => 'Ngày kết thúc',
            'project_status' => 'Tình trạng',
            'project_node' => 'Ghi chú',
            
            
        ]

    );
        $data['project_name'] = $request->project_name;
        $data['project_admin'] = $request->project_admin;
        $data['project_start'] = $request->project_start;
        $data['project_end'] = $request->project_end;
        $data['project_node'] = $request->project_node;
        $data['project_status']=$request->project_status;
       // $data1['employee_id']=$request->employee_project;
        

        $id=DB::table('tbl_project')->insertGetId($data);
       foreach($request->employee_project as  $value) {
            $data1['project_id']=$id;
            $data1['employee_id']=$value;
            DB::table('tbl_employee_project')->insert($data1);
        }
        Session::put('message','Thêm dự án thành công');
        return Redirect::to('all-project');
    }

    public function unactive_project($project_id){
      
        //$this->AuthLogin();
        DB::table('tbl_project')->where('project_id',$project_id)->update(['project_status'=>0]);
        Session::put('message','Dự án đã bắt đầu hoạt động');
        return Redirect::to('all-project');

    }

    public function active_project($project_id){
      
        //$this->AuthLogin();
        DB::table('tbl_project')->where('project_id',$project_id)->update(['project_status'=>1]);
        Session::put('message','Tạm ngưng dự án thành công');
        return Redirect::to('all-project');
    }
   
    
    public function start_task($task_id){
    
        //$this->AuthLogin();
        DB::table('tbl_task')->where('task_id',$task_id)->update(['task_status'=>1]);
        return Redirect::to('info-task');

    }

    public function submit_task($task_id){
   
        //$this->AuthLogin();
         DB::table('tbl_task')->where('task_id',$task_id)->update(['task_status'=>2]);
        return Redirect::to('info-task');
 	}

   	public function end_task($task_id){
    
        //$this->AuthLogin();
         DB::table('tbl_task')->where('task_id',$task_id)->update(['task_status'=>3]);
         $project=  DB::table('tbl_task')->first();

        return Redirect::to('admin-dashboard');
 	}

    public function refuse_task($task_id){
       
        //$this->AuthLogin();
         DB::table('tbl_task')->where('task_id',$task_id)->update(['task_status'=>4]);
         $project=  DB::table('tbl_task')->first();

        return Redirect::to('admin-dashboard');
 	}

   	public function edit_task($task_id){
   
        $edit_task=DB::table('tbl_task')->where('task_id',$task_id)->get();
        $manager_task = view('edit_task')->with('edit_task',$edit_task);

        return view('admin_layout')->with('edit_task', $manager_task);

   	}

   	public function update_task(Request $request,$task_id){

        $data = array();
        $data['task_name'] = $request->task_name;
        $data['task_admin'] = $request->task_admin;
        $data['task_start'] = $request->task_start;
        $data['task_end'] = $request->task_end;
        $data['task_status'] = $request->task_status; 
        if( $request->task_name==""){
            Session::put('message','Mời nhập đầy đủ thông tin');
             return Redirect::to('edit-task/'.$task_id);
        } 
        else{
        DB::table('tbl_task')->where('task_id',$task_id)->update($data);
        Session::put('message','Cập nhật  công việc thành công');
        return Redirect::to('edit-task/'.$task_id); 
        }  
   	}
   
    public function delete_task($task_id){
           $id= DB::table('tbl_task')->first();

           
            DB::table('tbl_task')->where('task_id',$task_id)->delete();
            Session::put('message','Xóa công việc thành công');
            return Redirect::to('info-task/'.$id->project_id);
 	}

}
