<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Home
Route::get('/','HomeController@index')->name('admin.index');
Route::post('/login','HomeController@login')->name('admin.login');
Route::get('/admin-dashboard', 'HomeController@show_dashboard')->name('admin.dashboard');
Route::get('/logout', 'HomeController@logout')->name('admin.logout');
Route::post('assign-roles','EmployeeController@assign_roles')->name('admin.asign.roles');

//permission controleer
Route::get('/add-role','RoleControler@add_role');
Route::post('/save-role','RoleControler@save_role');

//Admin-Employee
//Route::group(['middleware' => 'roles', 'roles'=>['admin','author']], function () {
Route::get('/add-employee','EmployeeController@add_employee')->name('admin.employee.add')->middleware('permission:admin.employee.add');
Route::get('/all-employee','EmployeeController@all_employee')->name('admin.employee.all')->middleware('permission:admin.employee.all');
Route::post('/save-employee', 'EmployeeController@save_employee')->name('admin.employee.save');
Route::get('/edit-employee/{e_id}', 'EmployeeController@edit_employee')->name('admin.employee.edit')->middleware('permission:admin.employee.edit');
Route::get('/delete-employee/{e_id}', 'EmployeeController@delete_employee')->name('admin.employee.delete')->middleware('permission:admin.employee.delete');
Route::post('/update-employee/{e_id}', 'EmployeeController@update_employee')->name('admin.employee.update');
//});
//Admin-Project
Route::get('/add-project','ProjectController@add_project')->name('admin.project.add');
Route::get('/edit-project/{project_id}', 'ProjectController@edit_project')->name('admin.project.edit');
Route::get('/detail-project/{project_id}', 'ProjectController@detail_project')->name('admin.project.detail');
Route::get('/delete-project/{project_id}', 'ProjectController@delete_project')->name('admin.project.delete');
Route::get('/all-project','ProjectController@all_project')->name('admin.project.all');
Route::get('/all-task','ProjectController@all_task')->name('admin.task.all');
Route::get('/add-task', 'ProjectController@add_task')->name('admin.task.add');
Route::get('/info-task/{project_id}','ProjectController@info_task')->name('admin.task.info');
Route::get('/download/{task_id}','ProjectController@download')->name('admin.task.dowload');

Route::get('/my-project','ProjectController@my_project')->name('admin.project.my');
Route::get('/my-task','ProjectController@my_task')->name('admin.task.my');
Route::get('/add-my-task', 'ProjectController@add_my_task')->name('admin.task.addmy');


Route::get('/start-task/{task_id}','ProjectController@start_task')->name('admin.task.start');
Route::get('/detail-task/{task_id}', 'ProjectController@detail_task')->name('admin.task.detail');
Route::get('/submit-task/{task_id}','ProjectController@submit_task')->name('admin.task.submit');
Route::get('/refuse-task/{task_id}','ProjectController@refuse_task')->name('admin.task.end');
Route::get('/end-task/{task_id}','ProjectController@end_task')->name('admin.task.end');
Route::get('/edit-task/{task_id}', 'ProjectController@edit_task')->name('admin.task.edit');
Route::get('/delete-task/{task_id}', 'ProjectController@delete_task')->name('admin.task.delete');
Route::get('/sm-task', 'ProjectController@sm_task')->name('admin.task.sm');

Route::post('/save-project','ProjectController@save_project')->name('admin.project.save');
Route::post('/save-task', 'ProjectController@save_task')->name('admin.task.save');
Route::post('/save-my-task', 'ProjectController@save_my_task')->name('admin.task.savemy');
Route::post('/update-project/{project_id}', 'ProjectController@update_project')->name('admin.project.update');
Route::post('/update-task/{task_id}', 'ProjectController@update_task')->name('admin.task.update');



Route::get('/add-department','DepartmentController@add')->name('admin.department.add');
Route::get('/all-department','DepartmentController@show')->name('admin.department.all');
Route::post('/save-department','DepartmentController@save')->name('admin.department.save');;
Route::get('/edit-department/{department_id}', 'DepartmentController@edit')->name('admin.department.edit');
Route::get('/delete-department/{department_id}', 'DepartmentController@delete')->name('admin.department.delete');
Route::post('/update-department/{department_id}', 'DepartmentController@update')->name('admin.department.update');

//Admin-Position
Route::get('/add-position','Position_Controller@add')->name('admin.position.add');
Route::get('/all-position','Position_Controller@show')->name('admin.position.all');
Route::post('/save-position','Position_Controller@save')->name('admin.position.save');
Route::get('/edit-position/{position_id}', 'Position_Controller@edit')->name('admin.position.edit');
Route::get('/delete-position/{position_id}', 'Position_Controller@delete')->name('admin.position.delete');
Route::post('/update-position/{position_id}', 'Position_Controller@update')->name('admin.position.update');



//Admin-Customer
Route::get('/add-customer','CustomerController@add')->name('admin.customer.add');
Route::get('/all-customer','CustomerController@show')->name('admin.customer.all');
Route::post('/save-customer', 'CustomerController@save')->name('admin.customer.save');
Route::get('/edit-customer/{customer_id}', 'CustomerController@edit')->name('admin.customer.edit');
Route::get('/delete-customer/{customer_id}', 'CustomerController@delete')->name('admin.customer.delete');
Route::post('/update-customer/{customer_id}', 'CustomerController@update')->name('admin.customer.update');


//Admin-Customer-Group
Route::get('/add-customer-group','CustomerGroupController@add')->name('admin.customer_group.add');
Route::get('/all-customer-group','CustomerGroupController@show')->name('admin.customer_group.all');
Route::post('/save-customer-group','CustomerGroupController@save')->name('admin.customer_group.save');
Route::get('/edit-customer-group/{customer_group_id}', 'CustomerGroupController@edit')->name('admin.customer_group.edit');
Route::get('/delete-customer-group/{customer_group_id}', 'CustomerGroupController@delete')->name('admin.customer_group.delete');
Route::post('/update-customer-group/{customer_group_id}', 'CustomerGroupController@update')->name('admin.customer_group.update');


//Admin-Service
Route::get('/add-service','ServiceController@add');
Route::get('/all-service','ServiceController@show');
Route::post('/save-service', 'ServiceController@save');
Route::get('/edit-service/{service_id}', 'ServiceController@edit');
Route::get('/delete-service/{service_id}', 'ServiceController@delete');
Route::post('/update-service/{service_id}', 'ServiceController@update');



//Users

Route::get('/count-task','UserProject@count_task')->name('user.task.count');
Route::get('/loading-task','UserProject@loading_task')->name('user.task.loading');
Route::get('/wait-user-task','UserProject@wait_user_task')->name('user.task.wait');
Route::get('/refuse-user-task','UserProject@refuse_user_task')->name('user.task.refuse');
Route::get('/end-user-task','UserProject@end_user_task')->name('user.task.end');
Route::get('/stack-user-task','UserProject@stack_user_task')->name('user.task.stack');
Route::get('/start-user-task/{task_id}','UserProject@start_user_task')->name('user.task.start');
Route::get('/submit-user-task/{task_id}','UserProject@submit_user_task')->name('user.task.submit');

//permission
Route::get('/add-roles','RolesController@add_roles')->name('admin.roles.add');
Route::post('/save-roles','RolesController@save_roles')->name('admin.roles.save');
Route::get('/all-roles','RolesController@all_roles')->name('admin.roles.all');

Route::get('/edit-roles/{id}','RolesController@edit_roles')->name('admin.roles.edit');
Route::get('/delete-roles/{id}','RolesController@delete_roles')->name('admin.roles.delete');
Route::post('/update-roles/{id}','RolesController@update_roles')->name('admin.roles.update');


//Admin-Employee
// Route::get('/users-show-employee','UsersController@show_employee')->name('user.employee.show');


//Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home', 'HomeController@home')->name('home');

//auth role
// Route::get('/register-auth','AuthController@register_auth');
// Route::post('/register','AuthController@register');



