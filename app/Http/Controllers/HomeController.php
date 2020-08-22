<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
use App\Http\Requests;
use App\Admin;
use App\Roles;
use Auth;
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
    //  public function AuthAdmin(){
    //     $admin_id = Session::get('e_id');
    //     if($admin_id){
    //         return Redirect::to('/admin-dashboard');
    //     }else{
    //         return Redirect::to('log_in1')->send();
    //     }
    // }

       

    public function index()
    {
        return view('login');	
    }
    

    public function show_dashboard(Request $request){
             $id=Auth::user()->e_id;
             
             $task_user=DB::table('tbl_employee_task')
             ->join('tbl_task','tbl_task.task_id','=','tbl_employee_task.task_id')
             ->join('tbl_e','tbl_e.e_id','=','tbl_employee_task.employee_id')
             ->where('tbl_employee_task.employee_id',$id)->orderBy('task_priority', 'asc')->get();
             $all_project=DB::table('tbl_project')->get();
           
       
             return view('admin_dashboard')->with( 'task_user',$task_user)->with( 'all_project',$all_project);
      }
    

        public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }
    

    public function login(Request $request)
    {
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
         $admin= new Admin();
         if(Auth::attempt(['e_email'=>$request->e_email,'e_password'=>$request->e_password]) ){
           
                 return Redirect('/admin-dashboard');
            }
             
         else{
            Session::put('message','Sai tên đăng nhập hoặc mật khẩu');
            return view('/');
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
    

