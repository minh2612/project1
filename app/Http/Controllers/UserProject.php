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
           
             $all_task= DB::table('tbl_employee_task')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')
              ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')
             ->where('employee_id',$id)->where('tbl_task.task_status',$status)->get();
          

           $all_employee=DB::table('tbl_employee_task')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')->get();
              

             $manager_task = view('loading_task')->with('all_task', $all_task)->with('all_employee',$all_employee);
             return view('admin_layout')->with('loading_task', $manager_task);
           // return view('users_dashboard')->with('name',$name);
        }

        public function wait_user_task(){
             $this->AuthUser();
             $status=2;
             $id=Auth::user()->e_id;
            //$name=DB::table('tbl_e')->where('e_id',$id)->get();
             $all_task= DB::table('tbl_employee_task')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')
              ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')
             ->where('employee_id',$id)->where('tbl_task.task_status',$status)->get();
          

           $all_employee=DB::table('tbl_employee_task')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')->get();
              

             $manager_task = view('wait_user_task')->with('all_task', $all_task)->with('all_employee',$all_employee);
             return view('admin_layout')->with('wait_user_task', $manager_task);
           // return view('users_dashboard')->with('name',$name);
        }

         public function end_user_task(){
            $this->AuthUser();
             $status=3;
             $id=Auth::user()->e_id;
            //$name=DB::table('tbl_e')->where('e_id',$id)->get();
             $all_task= DB::table('tbl_employee_task')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')
              ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')
             ->where('employee_id',$id)->where('tbl_task.task_status',$status)->get();
          

           $all_employee=DB::table('tbl_employee_task')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')->get();
              

             $manager_task = view('refuse_user_task')->with('all_task', $all_task)->with('all_employee',$all_employee);
             return view('admin_layout')->with('refuse_user_task', $manager_task);
           // return view('users_dashboard')->with('name',$name);
        }

        public function refuse_user_task(){
            $this->AuthUser();
             $status=4;
             $id=Auth::user()->e_id;
            //$name=DB::table('tbl_e')->where('e_id',$id)->get();
             $all_task= DB::table('tbl_employee_task')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')
              ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')
             ->where('employee_id',$id)->where('tbl_task.task_status',$status)->get();
          

           $all_employee=DB::table('tbl_employee_task')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')->get();
              

             $manager_task = view('refuse_user_task')->with('all_task', $all_task)->with('all_employee',$all_employee);
             return view('admin_layout')->with('refuse_user_task', $manager_task);
           // return view('users_dashboard')->with('name',$name);
        }
         public function count_task(){
            $id=Auth::user()->e_id;
            $run_task=DB::table('tbl_employee_task')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')
             ->where('tbl_task.task_status',1)->where('employee_id',$id)->count();


              return view('admin_layout')->with('run_task', $run_task);

         }
         public function stack_user_task(){
            $this->AuthUser();
             $status=0;
             $id=Auth::user()->e_id;
            //$name=DB::table('tbl_e')->where('e_id',$id)->get();
             $all_task= DB::table('tbl_employee_task')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')
              ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')
             ->where('employee_id',$id)->where('tbl_task.task_status',$status)->get();
          

           $all_employee=DB::table('tbl_employee_task')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')->get();
              

             $manager_task = view('refuse_user_task')->with('all_task', $all_task)->with('all_employee',$all_employee);
             return view('admin_layout')->with('refuse_user_task', $manager_task);
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

           

