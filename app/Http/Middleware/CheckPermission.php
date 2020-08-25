<?php

namespace App\Http\Middleware;

use App\Permission;
use Closure;
use DB;
use Auth;
use App\User;
use App\Role;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission=null)
    {
        // Lay tat ca cac quyen khi user login vao he thong
        // 1. Lay tat ca cac role cua user login vao he thong

       $listRoleOfUser = DB::table('tbl_e')
           ->join('admin_roles', 'tbl_e.e_id', '=', 'admin_roles.admin_e_id')
           ->join('tbl_roles', 'tbl_roles.id_roles', '=', 'admin_roles.roles_id_roles')
           ->where('tbl_e.e_id', auth()->id())
           ->get()->pluck('id_roles')->toArray();

        // $listRoleOfUser = User::find(auth()->id())->roles()->select('roles.id')->pluck('id')->toArray();
        // //2. lay tat ca cac quyen khi user login vao he thong
        $listRoleOfUser1 = DB::table('tbl_roles')
            ->join('roles_permission', 'tbl_roles.id_roles', '=', 'roles_permission.roles_id_roles')
            ->join('tbl_permission', 'roles_permission.permission_id_permission', '=', 'tbl_permission.id_permission')
            ->whereIn('tbl_roles.id_roles', $listRoleOfUser)
            ->get()->pluck('id_permission')->unique();
        
     
        $checkPermission = DB::table('tbl_permission')->where('permission_name', $permission)->value('id_permission');
      
        // kiem tra user dc phep vao man hinh nay khong?
        if ( $listRoleOfUser1->contains($checkPermission) ) {
            return $next($request);
      }
         return abort(401);


    }
}
