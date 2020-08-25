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
Route::get('/','HomeController@index');
Route::post('/login','HomeController@login');
Route::get('/admin-dashboard', 'HomeController@show_dashboard');
Route::get('/logout', 'HomeController@logout');
Route::post('assign-roles','EmployeeController@assign_roles');

//Admin-Employee
//Route::group(['middleware' => 'roles', 'roles'=>['admin','author']], function () {
Route::get('/add-employee','EmployeeController@add_employee')->middleware('auth.roles');
Route::get('/all-employee','EmployeeController@all_employee');
Route::post('/save-employee', 'EmployeeController@save_employee');
Route::get('/edit-employee/{e_id}', 'EmployeeController@edit_employee');
Route::get('/detail-employee/{e_id}', 'EmployeeController@detail_employee');
Route::get('/delete-employee/{e_id}', 'EmployeeController@delete_employee');
Route::post('/update-employee/{e_id}', 'EmployeeController@update_employee');
//});
//Admin-Project
Route::get('/add-project','ProjectController@add_project');
Route::get('/edit-project/{project_id}', 'ProjectController@edit_project');
Route::get('/detail-project/{project_id}', 'ProjectController@detail_project');
Route::get('/delete-project/{project_id}', 'ProjectController@delete_project');
Route::get('/all-project','ProjectController@all_project');
Route::get('/all-task','ProjectController@all_task');
Route::get('/add-task', 'ProjectController@add_task');
Route::get('/info-task/{project_id}','ProjectController@info_task');
Route::get('/download/{task_id}','ProjectController@download');

Route::get('/unactive-project/{project_id}','ProjectController@unactive_project');
Route::get('/active-project/{project_id}','ProjectController@active_project');

Route::get('/start-task/{task_id}','ProjectController@start_task');
Route::get('/detail-task/{task_id}', 'ProjectController@detail_task');
Route::get('/submit-task/{task_id}','ProjectController@submit_task');
Route::get('/refuse-task/{task_id}','ProjectController@refuse_task');
Route::get('/end-task/{task_id}','ProjectController@end_task');
Route::get('/edit-task/{task_id}', 'ProjectController@edit_task');
Route::get('/delete-task/{task_id}', 'ProjectController@delete_task');
Route::get('/sm-task', 'ProjectController@sm_task');

Route::post('/save-project','ProjectController@save_project');
Route::post('/save-task', 'ProjectController@save_task');
Route::post('/update-project/{project_id}', 'ProjectController@update_project');
Route::post('/update-task/{task_id}', 'ProjectController@update_task');

//Admin-Department
Route::get('/add-department','DepartmentController@add');
Route::get('/all-department','DepartmentController@show');
Route::post('/save-department','DepartmentController@save');
Route::get('/edit-department/{department_id}', 'DepartmentController@edit');
Route::get('/delete-department/{department_id}', 'DepartmentController@delete');
Route::post('/update-department/{department_id}', 'DepartmentController@update');

//Admin-Position
Route::get('/add-position','Position_Controller@add');
Route::get('/all-position','Position_Controller@show');
Route::post('/save-position','Position_Controller@save');
Route::get('/edit-position/{position_id}', 'Position_Controller@edit');
Route::get('/delete-position/{position_id}', 'Position_Controller@delete');
Route::post('/update-position/{position_id}', 'Position_Controller@update');

//Admin-Customer
Route::get('/add-customer','CustomerController@add');
Route::get('/all-customer','CustomerController@show');
Route::post('/save-customer', 'CustomerController@save');
Route::get('/edit-customer/{customer_id}', 'CustomerController@edit');
Route::get('/delete-customer/{customer_id}', 'CustomerController@delete');
Route::post('/update-customer/{customer_id}', 'CustomerController@update');

//Admin-Customer-Group
Route::get('/add-customer-group','CustomerGroupController@add');
Route::get('/all-customer-group','CustomerGroupController@show');
Route::post('/save-customer-group','CustomerGroupController@save');
Route::get('/edit-customer-group/{customer_group_id}', 'CustomerGroupController@edit');
Route::get('/delete-customer-group/{customer_group_id}', 'CustomerGroupController@delete');
Route::post('/update-customer-group/{customer_group_id}', 'CustomerGroupController@update');

//Admin-Service
Route::get('/add-service','ServiceController@add');
Route::get('/all-service','ServiceController@show');
Route::post('/save-service', 'ServiceController@save');
Route::get('/edit-service/{service_id}', 'ServiceController@edit');
Route::get('/delete-service/{service_id}', 'ServiceController@delete');
Route::post('/update-service/{service_id}', 'ServiceController@update');


//Users

Route::get('/count-task','UserProject@count_task');
Route::get('/loading-task','UserProject@loading_task');
Route::get('/wait-user-task','UserProject@wait_user_task');
Route::get('/refuse-user-task','UserProject@refuse_user_task');
Route::get('/end-user-task','UserProject@end_user_task');
Route::get('/stack-user-task','UserProject@stack_user_task');
Route::get('/start-user-task/{task_id}','UserProject@start_user_task');
Route::get('/submit-user-task/{task_id}','UserProject@submit_user_task');


//Admin-Employee
Route::get('/users-show-employee','UsersController@show_employee');
Route::get('/users-show-employee','UsersController@show_employee');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@home')->name('home');

//auth role
// Route::get('/register-auth','AuthController@register_auth');
// Route::post('/register','AuthController@register');



