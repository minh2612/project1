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
      

     
        $all_roles= DB::table('tbl_roles')->get();

        return view('all_roles',compact('all_roles'));
        

        }
  
    public function add_roles()
    {
        $permission=DB::table('tbl_permission')->get();

        return view('add_roles',compact('permission',$permission));     

}
    public function all_position(){

        $all_position= DB::table('tbl_position')->get();
        $manager_position = view('all_position')->with('all_position', $all_position);
        return view('admin_layout')->with('all_position', $manager_position);

        }

    public function save_roles(Request $request){
           
         $roleCreate = $this->role->create([
                'name' => $request->roles_name,
                
            ]);

            // Insert data to role_permission
            $roleCreate->Permission()->attach($request->permission);
            return redirect()->route('admin.roles.add');
    }
    
    
       public function edit_roles($id)
    {
        $permission = $this->permission->all();

        $role = $this->role->findOrfail($id);
       
        $getAllPermissionOfRole = DB::table('roles_permission')->where('roles_id_roles', $id)->pluck('permission_id_permission');
  
        return view('edit_roles', compact('permission', 'role', 'getAllPermissionOfRole'));
    }

    public function update_roles(Request $request, $id)
    {
            $this->role->where('id_roles', $id)->update([
                'name' => $request->name,
            ]);

            DB::table('roles_permission')->where('roles_id_roles', $id)->delete();
            // $roleCreate = $this->role->find($id);

            // $roleCreate->Permissions()->attach($request->permission);
            foreach ($request->permission as $key => $value) {
                if($value){
                $data=array();
                $data['roles_id_roles']=$id;
                $data['permission_id_permission']=$value;
                DB::table('roles_permission')->insert($data);
                $data="";

            }
                
            }
            

            return redirect()->route('admin.roles.all');
      
        }
    
}
