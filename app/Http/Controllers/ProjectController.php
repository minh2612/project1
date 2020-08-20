<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Carbon\Carbon;

class ProjectController extends Controller
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
    public function add_project(){
        $this->AuthAdmin();
        $e=DB::table('tbl_e')->get();
        $customer= DB::table('tbl_customer')->get();
        return view('add_project')->with('e',$e)->with('customer',$customer);      
    }

    public function add_task(){
        $this->AuthAdmin();
        $e=DB::table('tbl_e')->get();
        $project= DB::table('tbl_project')->get();
        return view('add_task')->with('e',$e)->with('project',$project);      
    }


    public function all_project()
    {
        $this->AuthAdmin();
        $all_task= DB::table('tbl_task')->get();
        $all_project= DB::table('tbl_project')->get();
        $all_customer= DB::table('tbl_customer')->get();
        $all_employee= DB::table('tbl_e')->get();

        // $all_employee=DB::table('tbl_employee_project')
        // ->join('tbl_project','tbl_project.project_id','=','tbl_employee_project.project_id')
        // ->join('tbl_e','tbl_employee_project.employee_id','=','tbl_e.e_id')->get();


        $manager_project = view('all_project')->with('all_project', $all_project)->with('all_customer',  $all_customer)->with('all_task',$all_task)->with('all_employee',$all_employee);
        return view('admin_layout')->with('all_project', $manager_project);
    }
    
    public function all_task()
    {
        $this->AuthAdmin();
        $all_task= DB::table('tbl_task')->get();
        $all_project= DB::table('tbl_project')->get();
        $all_employee=DB::table('tbl_employee_task')
        ->join('tbl_e','tbl_employee_task.employee_id','=','tbl_e.e_id')->get();


        $manager_task = view('all_task')->with('all_employee',  $all_employee)->with('all_task',$all_task)->with('all_project',  $all_project);
        return view('admin_layout')->with('all_task', $manager_task);
    }

    public function detail_project($project_id){
        $this->AuthAdmin();

        //$this->AuthLogin();
        $detail_project = DB::table('tbl_project')->get();

        $manager_project  = view('detail_project')->with('detail_project',$detail_project);
        return view('admin_layout')->with('detail_project', $manager_project);

    }
    public function delete_project($project_id){
        $this->AuthAdmin();
        DB::table('tbl_project')->where('project_id', $project_id)->delete();
        Session::put('message', 'Xóa dự án thành công');
        return Redirect::to('all-project');
    }

	public function info_task($project_id){
        $this->AuthAdmin();
       $info_task= DB::table('tbl_task')->where('project_id',$project_id)->get();

       $all_user= DB::table('tbl_employee_task')
        ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')
        ->join('tbl_e','tbl_employee_task.employee_id','=','tbl_e.e_id')->get();

        $manager_task = view('info_task')->with('info_task', $info_task)->with('all_user', $all_user);
        return view('admin_layout')->with('info_task', $manager_task);
   	}

   	public function sm_task(){
        $this->AuthAdmin();
       $sm_task= DB::table('tbl_task')->where('task_status',2)->get();
        $manager_sm = view('sm_task')->with('sm_task', $sm_task);
        return view('admin_layout')->with('sm_task', $manager_sm);
   	}

   	public function save_task(Request $request){
        $this->AuthAdmin();
        
        
        $data =array();
        $data1=array();
        $data['task_name'] = $request->task_name;
        $data['task_start'] = $request->task_start;
        $data['task_end'] = $request->task_end;
        $data['task_note'] = $request->task_note;
        
        if($request->task_start<=Carbon::now('Asia/Ho_Chi_Minh')){
        $data['task_status'] = 1;
    }
    else{
        $data['task_status'] = 0;
    }
        $data['project_id']=$request->project_id;
        $get_image= $request->file('task_file');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public',  $new_image);
            $data['task_file'] = $new_image;
        }
        $id=DB::table('tbl_task')->insertGetId($data);
       foreach($request->employee_task as  $value) {
             $data1['task_id']= $id;
             $data1['employee_id']= $value;
             DB::table('tbl_employee_task')->insert($data1);
         }
        Session::put('message','Thêm công việc thành công');
        return Redirect::to('all-task/');
  
   	}

 

    public function save_project(Request $request){
        $this->AuthAdmin();
        // $this->AuthLogin();
        $data = array();
        $data1=array();

         $this->validate($request,
         [
            'project_name' => 'bail|required|unique:tbl_project',
            'project_manager' => 'bail|required',
            'project_start' => 'bail|required',
            'project_end' => 'bail|required|after:project_start',
          
            
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
            'project_manager' => 'Người giao',
            'project_start' => 'Ngày bắt đầu',
            'project_end' => 'Ngày kết thúc',
            
        ]

    );
        $data['project_name'] = $request->project_name;
        $data['project_manager'] = $request->project_manager;
        $data['project_start'] = $request->project_start;
        $data['project_end'] = $request->project_end;
        $data['project_node'] = $request->project_node;
        $data['project_status']=0;
        $data['customer_id']=$request->customer_id;
        $data['project_file']=$request->project_file;
        $get_image= $request->file('project_file');
       // $data1['employee_id']=$request->employee_project;
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public',  $new_image);
            $data['project_file'] = $new_image;
        }

        $id=DB::table('tbl_project')->insertGetId($data);
        Session::put('message','Thêm dự án thành công');
        return Redirect::to('all-project');
    }
   
    
    public function start_task($task_id){
        $this->AuthAdmin();
        //$this->AuthLogin();
        DB::table('tbl_task')->where('task_id',$task_id)->update(['task_status'=>1]);
        return Redirect::to('all-task');

    }

    public function submit_task($task_id){
     
        //$this->AuthLogin();
         DB::table('tbl_task')->where('task_id',$task_id)->update(['task_status'=>2]);
        return Redirect::to('all-task');
 	}

   	public function end_task($task_id){
        $this->AuthAdmin();
        //$this->AuthLogin();
         DB::table('tbl_task')->where('task_id',$task_id)->update(['task_status'=>3]);
         $project=  DB::table('tbl_task')->first();

        return Redirect::to('admin-dashboard');
 	}

    public function refuse_task($task_id){
        $this->AuthAdmin();
        //$this->AuthLogin();
         DB::table('tbl_task')->where('task_id',$task_id)->update(['task_status'=>4]);
         $project=  DB::table('tbl_task')->first();

        return Redirect::to('admin-dashboard');
 	}

   	public function edit_task($task_id){
        $this->AuthAdmin();
        $edit_task=DB::table('tbl_task')->where('task_id',$task_id)->get();
        $manager_task = view('edit_task')->with('edit_task',$edit_task);

        return view('admin_layout')->with('edit_task', $manager_task);

   	}

   	public function update_task(Request $request,$task_id){
        $this->AuthAdmin();
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
            return Redirect::to('all-task/');
 	}

}
