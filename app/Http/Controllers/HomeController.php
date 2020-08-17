<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
use App\Http\Requests;
session_start();	

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function AuthAdmin(){
        $admin_id = Session::get('e_id');
        if($admin_id){
            return Redirect::to('/admin-dashboard');
        }else{
            return Redirect::to('log_in1')->send();
        }
    }

       

    public function index()
    {
        return view('login');	
    }
    
    public function home()
    {
        return view('home');
    }

     public function trang_admin()
    {

        
          $user_id = Session::get('e_id');
        if($user_id){
            return view('admin_dashboard');
        }else{
             return view('login');
        }
    }
        

    public function show_dashboard(){
         $user_id = Session::get('e_id');
         $id=DB::table('tbl_e')->where('e_id',$user_id)->first();
         $id1=$id->is_admin;
         
        if($user_id && $id1==1  ){
             $info_task= DB::table('tbl_task')->where('task_status',2)->get();
            $all_user= DB::table('tbl_employee_task')
            ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')
            ->join('tbl_e','tbl_employee_task.employee_id','=','tbl_e.e_id')->get();
          

        $manager_task = view('admin_dashboard')->with('info_task', $info_task)->with('all_user', $all_user);
        return view('admin_layout')->with('admin_dashboard', $manager_task);
            
        }else{
             return view('login');
        }
    }

     public function user_dashboard(){
        $user_id = Session::get('e_id');
        $id=DB::table('tbl_e')->where('e_id',$user_id)->first();
         $id1=$id->is_admin;
        if($user_id && $id1==0){
             $id=Session::get('e_id');
            //$name=DB::table('tbl_e')->where('e_id',$id)->get();
             $all_task= DB::table('tbl_employee_task')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')
             ->join('tbl_project','tbl_project.project_id','=','tbl_employee_task.project_id')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')->where('employee_id',$id)
             ->get();

           $all_employee=DB::table('tbl_employee_task')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')->get();
              

             $manager_task = view('users_dashboard')->with('all_task', $all_task)->with('all_employee',$all_employee);
             return view('users_layout')->with('$all_task', $manager_task);
           // return view('users_dashboard')->with('name',$name);
        }else{
             return view('login');
        }
    }

    

      public function logout(){
       
        Session::put('e_name',null);
        Session::put('e_id',null);
        return Redirect::to('/');
    }

    public function login(Request $request)
    {
    	 
         $result= DB::table('tbl_e')->where('e_email', $request->e_email)->where('e_password', md5($request->e_password))->first();
        

           $this->validate($request,
        [
            'e_email' => 'bail|email|required',
            'e_password' => 'required',
        ],

        [
            'required' => ':attribute không được để trống',
           
            'email' => ':attribute không đúng định dạng',
        ],

        [
            'e_email' => 'Email',
            'e_password' => 'Mật khẩu',
            'admin_name' => $request->name
        ]

    );
        if($result){
            if( $result->is_admin != 1){
            	
            	Session::put('e_id',$result->e_id);
                Session::put('e_name',$result->e_name);
                return Redirect::to('/user-dashboard');
            }else{
            	
            	
                
                Session::put('e_id',$result->e_id);
                Session::put('e_name',$result->e_name);
                 return Redirect::to('/admin-dashboard');
            }
             }
         else{
            Session::put('message','Sai tên đăng nhập hoặc mật khẩu');
            return view('login');
         }    
       }
   }
		
		    
       // return view('home');
    
    // public function admin()
    // {
    // 	if (Gate::allows('is-admin')) {
    // 		return view('admin_dashboard');	
    // }else{
    //     abort(403);
    // }
    // }
    

