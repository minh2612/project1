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
        $all_permission =DB::table('roles_permission')
        ->join('tbl_roles','tbl_roles.id_roles','=','roles_permission.roles_id_roles')
        ->join('tbl_permission','tbl_permission.id_permission','=','roles_permission.permission_id_permission')
        ->get();
        $all_employee=DB::table('admin_roles')
        ->join('tbl_roles','tbl_roles.id_roles','=','admin_roles.roles_id_roles')
        ->join('tbl_e','tbl_e.e_id','=','admin_roles.admin_e_id')
        ->get();


        return view('all_roles',compact('all_roles','all_permission','all_employee'));
        

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
          $this->validate($request,
         [
            'name' => 'bail|required|unique:tbl_roles',
            'roles_note' => 'bail|required',
        ],

        [    'unique' => ':attribute đã tồn tại',
            'required' => ':attribute không được để trống',
        ],

        [
            'name' => 'Vai trò',
            'roles_note' => 'Mô tả',     
        ]

    );  
           
         $roleCreate = $this->role->create([
                'name' => $request->name,
                'roles_note' => $request->roles_note
                
            ]);
            // $data= array();
            // $data['name']=$request->name;
            // $data['roles_note']=$request->roles_note;
            // DB::table('tbl_roles')->insert($data);

            // Insert data to role_permission
            $roleCreate->Permission()->attach($request->permission);
            Session::put('message','Thêm vai trò thành công');
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
             $this->validate($request,
         [
            'name' => 'bail|required',
            'roles_note' => 'bail|required',
        ],

        [  
            'required' => ':attribute không được để trống',
        ],

        [
            'name' => 'Vai trò',
            'roles_note' => 'Mô tả',     
        ]

    );  
            // $this->role->where('id_roles', $id)->update([
            //     'name' => $request->name,
            //     'roles_note' => $request->roles_note
            // ]);
             $data= array();
             $data['name']=$request->name;
             $data['roles_note']=$request->roles_note;
             DB::table('tbl_roles')->where('id_roles', $id)->update($data);

            DB::table('roles_permission')->where('roles_id_roles', $id)->delete();
            // $roleCreate = $this->role->find($id);

            // $roleCreate->Permissions()->attach($request->permission);
            if($request->permission){
            foreach ($request->permission as $key => $value) {
                if($value){
                $data=array();
                $data['roles_id_roles']=$id;
                $data['permission_id_permission']=$value;
                DB::table('roles_permission')->insert($data);
                $data="";

            } 
            }
            }
            
            Session::put('message','Sửa vai trò thành công');
            return redirect()->route('admin.roles.all');
      
        }
         public function delete_roles($id){
       
        DB::table('roles_permission')->where('roles_id_roles',$id) ->delete();
        DB::table('admin_roles')->where('roles_id_roles',$id) ->delete();
        DB::table('tbl_roles')->where('id_roles',$id) ->delete();
        Session::put('message', 'Xóa vai trò thành công');
        return Redirect::to('all-roles');
    }
    
}
