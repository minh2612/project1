<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class UserProject extends Controller
{
    
   public function AuthUser(){
            $admin_id = Auth::id();
            if($admin_id){
                return Redirect::to('admin-dashboard');
            }else{
                return Redirect::to('/')->send();
            }
        }
   

  
         public function loading_task(){
            $this->AuthUser();
             $status=1;
            //$name=DB::table('tbl_e')->where('e_id',$id)->get();
             $all_task= DB::table('tbl_employee_task')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')
             ->join('tbl_project','tbl_project.project_id','=','tbl_employee_task.project_id')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')->where('employee_id',$id)->where('tbl_task.task_status',$status) ->get();

           $all_employee=DB::table('tbl_employee_task')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')->get();
              

             $manager_task = view('loading_task ')->with('all_task', $all_task)->with('all_employee',$all_employee);
             return view('admin_layout')->with('$all_task', $manager_task);
           // return view('users_dashboard')->with('name',$name);
        }

        public function wait_user_task(){
            $this->AuthUser();
        $user_id = Session::get('e_id');
             $id=Session::get('e_id');
             $status=2;
            //$name=DB::table('tbl_e')->where('e_id',$id)->get();
             $all_task= DB::table('tbl_employee_task')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')
             ->join('tbl_project','tbl_project.project_id','=','tbl_employee_task.project_id')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')->where('employee_id',$id)->where('tbl_task.task_status',$status) ->get();

           $all_employee=DB::table('tbl_employee_task')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')->get();
              

             $manager_task = view('wait_user_task ')->with('all_task', $all_task)->with('all_employee',$all_employee);
             return view('users_layout')->with('$all_task', $manager_task);
           // return view('users_dashboard')->with('name',$name);
        }

         public function end_user_task(){
            $this->AuthUser();
        $user_id = Session::get('e_id');
             $id=Session::get('e_id');
             $status=3;
            //$name=DB::table('tbl_e')->where('e_id',$id)->get();
             $all_task= DB::table('tbl_employee_task')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')
             ->join('tbl_project','tbl_project.project_id','=','tbl_employee_task.project_id')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')->where('employee_id',$id)->where('tbl_task.task_status',$status) ->get();

           $all_employee=DB::table('tbl_employee_task')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')->get();
              

             $manager_task = view('end_user_task ')->with('all_task', $all_task)->with('all_employee',$all_employee);
             return view('users_layout')->with('$all_task', $manager_task);
           // return view('users_dashboard')->with('name',$name);
        }

        public function refuse_user_task(){
            $this->AuthUser();
        $user_id = Session::get('e_id');
             $id=Session::get('e_id');
             $status=4;
            //$name=DB::table('tbl_e')->where('e_id',$id)->get();
             $all_task= DB::table('tbl_employee_task')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')
             ->join('tbl_project','tbl_project.project_id','=','tbl_employee_task.project_id')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')->where('employee_id',$id)->where('tbl_task.task_status',$status) ->get();

           $all_employee=DB::table('tbl_employee_task')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')->get();
              

             $manager_task = view('refuse_user_task')->with('all_task', $all_task)->with('all_employee',$all_employee);
             return view('users_layout')->with('$all_task', $manager_task);
           // return view('users_dashboard')->with('name',$name);
        }

    
        public function restart_user_task($task_id){
            $this->AuthUser();
            //$this->AuthLogin();
            DB::table('tbl_task')->where('task_id',$task_id)->update(['task_status'=>1]);
           
            return Redirect::to('user-dashboard');
        }

  
   
     public function start_user_task($task_id){
        $this->AuthUser();
        //$this->AuthLogin();
        DB::table('tbl_task')->where('task_id',$task_id)->update(['task_status'=>1]);
       
        return Redirect::to('user-dashboard');

    }

     public function submit_user_task($task_id){
        $this->AuthUser();
        //$this->AuthLogin();
         DB::table('tbl_task')->where('task_id',$task_id)->update(['task_status'=>2]);
         
        return Redirect::to('user-dashboard');
 }





 

   

   
   
    

}

           

