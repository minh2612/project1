<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\Roles;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         $adminRoles= Roles::where('name','admin')->first();
         $managerRoles= Roles::where('name','manager')->first();
         $userRoles= Roles::where('name','user')->first();

         $admin=Admin::create([
         	'e_name'=>'tien dat',
         	'e_email'=>'tiendat9827@gmail.com',
         	'e_password'=>md5('123456')
         ]);

           $manager=Admin::create([
         	'e_name'=>'tien minh',
         	'e_email'=>'tienminh9827@gmail.com',
         	'e_password'=>md5('123456')
         ]);

           $user=Admin::create([
         	'e_name'=>'tien luong',
         	'e_email'=>'tienluong9827@gmail.com',
         	'e_password'=>md5('123456')
         ]);

         $admin->roles()->attach($adminRoles);
         $manager->roles()->attach($managerRoles);
         $user->roles()->attach($userRoles);



    }
}
