<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class SalaryController extends Controller
{
    public function show_add_salary()
    {
        return view('admin.admin_add_salary');     
    }

    public function show_salary()
    {
        return view('admin.admin_show_salary');     
    }
}
