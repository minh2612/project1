<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'permission_name'
    ];
    protected $primaryKey = 'id_permission';
 	protected $table = 'tbl_permission';

 	public function roles(){
 	
 		return $this->belongsToMany('App\Roles', 'roles_permission');
 	}
}