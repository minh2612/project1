<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Roles;

class Admin extends Authenticatable
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'e_email', 'e_password', 'e_name','e_phone','e_address','e_sex','department_id','position_id'];

    protected $primaryKey = 'e_id';
 	protected $table = 'tbl_e';

 	public function roles(){
 		return $this->belongsToMany('App\Roles');
 	}
 	 public function getAuthPassword(){
        return $this->e_password;
    }
    public function hasAnyRoles($roles){

 		return null!==$this->roles()->whereIn('name',$roles)->first();
 	}
 	public function hasRole($role){
 		return null!==$this->roles()->where('name',$role)->first();

 	}

 	
}
