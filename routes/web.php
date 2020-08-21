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

//Admin-Salary
Route::get('/add-salary','SalaryController@add_salary');
Route::get('/all-salary','SalaryController@all_salary');
Route::get('/edit-salary/{salary_id}', 'SalaryController@edit_salary');
Route::get('/delete-salary/{salary_id}', 'SalaryController@delete_salary');
Route::post('/save-salary', 'SalaryController@save_salary');
Route::post('/update-salary/{salary_id}', 'SalaryController@update_salary');
//Salary table
Route::get('/add-salary-table', 'SalaryTableController@add_salary_table');
Route::get('/edit-salary-table/{salary_table_id}', 'SalaryTableController@edit_salary_table');
Route::get('/delete-salary-table/{salary_table_id}', 'SalaryTableController@delete_salary_table');
Route::get('/all-salary-table', 'SalaryTableController@all_salary_table');

Route::post('/save-salary-table', 'SalaryTableController@save_salary_table');
Route::post('/update-salary-table/{salary_table_id}', 'SalaryTableController@update_salary_table');
//Admin-Department
Route::get('/add-department','DepartmentController@add_department');
Route::get('/all-department','DepartmentController@all_department');
Route::post('/save-department','DepartmentController@save_department');
Route::get('/detail-department/{department_id}', 'DepartmentController@detail_department');
Route::get('/edit-department/{department_id}', 'DepartmentController@edit_department');
Route::get('/delete-department/{department_id}', 'DepartmentController@delete_department');
Route::post('/update-department/{department_id}', 'DepartmentController@update_department');

//Admin-Position
Route::get('/add-position','PositionController1@add_position');
Route::get('/all-position','PositionController1@all_position');
Route::post('/save-position','PositionController1@save_position');
Route::get('/detail-position/{position_id}', 'PositionController1@detail_position');
Route::get('/edit-position/{position_id}', 'PositionController1@edit_position');
Route::get('/delete-position/{position_id}', 'PositionController1@delete_position');
Route::post('/update-position/{position_id}', 'PositionController1@update_position');



//Admin-Customer
Route::get('/add-customer','CustomerController@add_customer');
Route::get('/all-customer','CustomerController@all_customer');
Route::post('/save-customer', 'CustomerController@save_customer');
Route::get('/edit-customer/{customer_id}', 'CustomerController@edit_customer');
Route::get('/detail-customer/{customer_id}', 'CustomerController@detail_customer');
Route::get('/delete-customer/{customer_id}', 'CustomerController@delete_customer');
Route::post('/update-customer/{customer_id}', 'CustomerController@update_customer');


//Admin-Customer-Group
Route::get('/add-customer-group','CustomerGroupController@add_customer_group');
Route::get('/all-customer-group','CustomerGroupController@all_customer_group');
Route::post('/save-customer-group','CustomerGroupController@save_customer_group');
Route::get('/detail-customer-group/{customer_group_id}', 'CustomerGroupController@detail_customer_group');
Route::get('/edit-customer-group/{customer_group_id}', 'CustomerGroupController@edit_customer_group');
Route::get('/delete-customer-group/{customer_group_id}', 'CustomerGroupController@delete_customer_group');
Route::post('/update-customer-group/{customer_group_id}', 'CustomerGroupController@update_customer_group');


//Users

Route::get('/loading-task','UserProject@loading_task');
Route::get('/wait-user-task','UserProject@wait_user_task');
Route::get('/refuse-user-task','UserProject@refuse_user_task');
Route::get('/end-user-task','UserProject@end_user_task');
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



