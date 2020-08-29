<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Roles;
use App\Permission;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();



class RolesController extends Controller
{
    private $role;
    private $permission;
    public function __construct(Roles $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }


    public function all_roles(){
      

     
         $all_role= DB::table('tbl_roles')->get();
        // ->->join('admin_roles','tbl_roles.id_roles','=','admin_roles.roles_id_roles')
        // ->get();
        // $all_permission =DB::table('roles_permission')
        // ->join('tbl_roles','tbl_roles.id_roles','=','roles_permission.roles_id_roles')
        // ->join('tbl_permission','tbl_permission.id_permission','=','roles_permission.permission_id_permission')
        // ->get();
        $all_employee=DB::table('tbl_e')->get();
        $all_roles=DB::table('admin_roles')
        ->join('tbl_roles','tbl_roles.id_roles','=','admin_roles.roles_id_roles')
        ->join('tbl_e','tbl_e.e_id','=','admin_roles.admin_e_id')
        ->get();
        

        return view('all_roles',compact('all_roles','all_employee','all_role'));
        

        }
  
    public function add_roles()
    {

        $all_employee=DB::table('tbl_e')->get();
        $permission=DB::table('tbl_roles')->get();

        return view('add_roles',compact('permission','all_employee'));     

}
    public function all_position(){

        $all_position= DB::table('tbl_position')->get();
        $manager_position = view('all_position')->with('all_position', $all_position);
        return view('admin_layout')->with('all_position', $manager_position);

        }

    public function save_roles(Request $request){
      

             $data1=array();
         foreach($request->permission as  $value) {
             $data1['admin_e_id']= $request->e_id;
             $data1['roles_id_roles']= $value;
             DB::table('admin_roles')->insert($data1);
          
         }
          
       
            Session::put('message','Thêm vai trò thành công');
            return redirect()->route('admin.roles.add');
    }
    
    
       public function edit_roles($id)
    {
         $hasrole=DB::table('admin_roles')
        ->join('tbl_roles','tbl_roles.id_roles','=','admin_roles.roles_id_roles')
        ->join('tbl_e','tbl_e.e_id','=','admin_roles.admin_e_id')->where('admin_roles.admin_e_id',$id)
        ->get()->pluck('roles_id_roles');
         $e=DB::table('tbl_e')->where('e_id',$id)->first();
        $permission=DB::table('tbl_roles')->get();
  
        return view('edit_roles', compact('permission', 'hasrole','e'));
    }

    public function update_roles(Request $request, $id)
    {       
            // $this->role->where('id_roles', $id)->update([
            //     'name' => $request->name,
            //     'roles_note' => $request->roles_note
            // ]);
             
         
             

            DB::table('admin_roles')->where('admin_e_id', $id)->delete();
            // $roleCreate = $this->role->find($id);

            // $roleCreate->Permissions()->attach($request->permission);
            if($request->permission){
            foreach ($request->permission as $key => $value) {
                if($value){
                $data=array();
                $data['admin_e_id']=$id;
                $data['roles_id_roles']=$value;
                DB::table('admin_roles')->insert($data);
                $data="";

            } 
            }
            }
            
            Session::put('message','Sửa vai trò thành công');
            return redirect()->route('admin.roles.all');
      
        }
         public function delete_roles($id){
       
      
        DB::table('admin_roles')->where('admin_e_id',$id) ->delete();
     
        Session::put('message', 'Xóa vai trò thành công');
        return Redirect::to('all-roles');
    }
    
}
