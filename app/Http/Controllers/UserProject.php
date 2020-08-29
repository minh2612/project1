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
             $id=Auth::user()->e_id;
              $task_all=DB::table('tbl_employee_task')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')
             ->where('tbl_employee_task.employee_id',$id)
             
             ->get();
             $task_user=DB::table('tbl_employee_task')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')
             ->where('tbl_employee_task.employee_id',$id)
             ->where('tbl_task.task_status',$status)
             ->orderBy('tbl_task.priority_id', 'DESC')
            ->orderBy('tbl_task.task_end', 'asc')
             ->get();

            $all_project=DB::table('tbl_project')->get();
            $all_priority=DB::table('tbl_priority')->get();
            $all_employee=DB::table('tbl_e')->get();



            return view('loading_task',compact('task_user','all_project','all_priority','all_employee','task_all'));
            
           // return view('users_dashboard')->with('name',$name);
        }

        public function wait_user_task(){
              $this->AuthUser();
             $status=2;
             $id=Auth::user()->e_id;
              $task_all=DB::table('tbl_employee_task')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')
             ->where('tbl_employee_task.employee_id',$id)
             
             ->get();
             $task_user=DB::table('tbl_employee_task')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')
             ->where('tbl_employee_task.employee_id',$id)
             ->where('tbl_task.task_status',$status)
             ->orderBy('tbl_task.priority_id', 'DESC')
            ->orderBy('tbl_task.task_end', 'asc')
             ->get();

            $all_project=DB::table('tbl_project')->get();
            $all_priority=DB::table('tbl_priority')->get();
            $all_employee=DB::table('tbl_e')->get();



            return view('wait_user_task',compact('task_user','all_project','all_priority','all_employee','task_all'));
        }

         public function end_user_task(){
              $this->AuthUser();
             $status=3;
             $id=Auth::user()->e_id;
              $task_all=DB::table('tbl_employee_task')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')
             ->where('tbl_employee_task.employee_id',$id)
             
             ->get();
             $task_user=DB::table('tbl_employee_task')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')
             ->where('tbl_employee_task.employee_id',$id)
             ->where('tbl_task.task_status',$status)
             ->orderBy('tbl_task.priority_id', 'DESC')
            ->orderBy('tbl_task.task_end', 'asc')
             ->get();

            $all_project=DB::table('tbl_project')->get();
            $all_priority=DB::table('tbl_priority')->get();
            $all_employee=DB::table('tbl_e')->get();



            return view('end_user_task',compact('task_user','all_project','all_priority','all_employee','task_all'));
        }

        public function refuse_user_task(){
            $this->AuthUser();
             $status=4;
             $id=Auth::user()->e_id;
              $task_all=DB::table('tbl_employee_task')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')
             ->where('tbl_employee_task.employee_id',$id)
             ->get();
             $task_user=DB::table('tbl_employee_task')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')
             ->where('tbl_employee_task.employee_id',$id)
             ->where('tbl_task.task_status',$status)
             ->orderBy('tbl_task.priority_id', 'DESC')
            ->orderBy('tbl_task.task_end', 'asc')
             ->get();

            $all_project=DB::table('tbl_project')->get();
            $all_priority=DB::table('tbl_priority')->get();
            $all_employee=DB::table('tbl_e')->get();



            return view('refuse_user_task',compact('task_user','all_project','all_priority','all_employee','task_all'));
        }
      
         public function stack_user_task(){
           $this->AuthUser();
             $status=0;
             $id=Auth::user()->e_id;
              $task_all=DB::table('tbl_employee_task')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')
             ->where('tbl_employee_task.employee_id',$id)
             ->get();
             $task_user=DB::table('tbl_employee_task')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')
             ->where('tbl_employee_task.employee_id',$id)
             ->where('tbl_task.task_status',$status)
             ->orderBy('tbl_task.priority_id', 'DESC')
            ->orderBy('tbl_task.task_end', 'asc')
             ->get();

            $all_project=DB::table('tbl_project')->get();
            $all_priority=DB::table('tbl_priority')->get();
            $all_employee=DB::table('tbl_e')->get();



            return view('loading_task',compact('task_user','all_project','all_priority','all_employee','task_all'));
        }

    
        public function restart_user_task($task_id){
            $this->AuthUser();
            //$this->AuthLogin();
            DB::table('tbl_task')->where('task_id',$task_id)->update(['task_status'=>1]);
           
            return Redirect::to('refuse-user-task');
        }

  
   
     public function start_user_task($task_id){
        $this->AuthUser();
        //$this->AuthLogin();
        DB::table('tbl_task')->where('task_id',$task_id)->update(['task_status'=>1]);
       
        return Redirect::to('stack-user-task');

    }

     public function submit_user_task($task_id){
        $this->AuthUser();
        //$this->AuthLogin();
         DB::table('tbl_task')->where('task_id',$task_id)->update(['task_status'=>2]);
         
        return Redirect::to('loading-task');
 }





 

   

   
   
    

}

           

