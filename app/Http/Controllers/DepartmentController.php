<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Employee,Department};
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::orderBy('created_at', 'asc')->get();
        //
        $dataWage = DB::select('SELECT max(`wage`) as `max_wage`, `department_id` from `employees` left join `department_employee` on `id`=`employee_id` group by `department_id`');
        $data = DB::select('SELECT  `department_id` , count(`employee_id`) as `count_employee` from `department_employee` group by `department_id` order by `department_id`');
        foreach ($data as $val)
            $departmentsCountEmployee[$val->department_id] = $val->count_employee;
        foreach ($dataWage as $val)
            $departmentsMaxWage[$val->department_id] = $val->max_wage;
        return view('department.index', [
            'departments' => $departments,
            'dataWage' => $departmentsMaxWage,
            'departmentsCountEmployee' => $departmentsCountEmployee
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('/department/create')
                ->withInput()
                ->withErrors($validator);
        }

        $department = new Department();
        $department->name = $request->name;


        $department->save();


        return redirect('/department');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        return view('department/update',[
            'department' => $department
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /** @var Department $department */
        $department = Department::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/department/'.$department->id.'/edit')
                ->withInput()
                ->withErrors($validator);
        }

        $department->name = $request->name;
        $department->save();

        return redirect('/department');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        if($department->employees()->count() == 0)
            $department->delete();
        else
        {
            $validator = Validator::make([], []);
            $validator->getMessageBag()->add( 'name', 'Нельзя удалить отдел в котором есть сотрудники');
            return redirect('/department')
                ->withInput()
                ->withErrors($validator);
        }

        return redirect('/department');
    }
}
