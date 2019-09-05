<?php
/**
 * Created by PhpStorm.
 * User: cpentyc
 * Date: 05.09.2019
 * Time: 18:14
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\{Employee,Department};
use Illuminate\Support\Facades\DB;


class SiteController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'asc')->get();
        $departments = Department::orderBy('created_at', 'asc')->get();
        $employees_departments = DB::select('select `department_id`, `employee_id` from `department_employee`');

        foreach ($employees_departments as $val)
            $result[$val->department_id][$val->employee_id] = 1;

        return view('welcome', [
            'employees' => $employees,
            'departments' => $departments,
            'result' => $result
        ]);
    }
}