<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'name','roles_note'
    ];
    protected $primaryKey = 'id_roles';
 	protected $table = 'tbl_roles';

 	public function permission(){
 		
 		return $this->belongsToMany('App\Permission', 'roles_permission');
 	}
}
