<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\{Employee,Department};
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'desc')->get();
        $departments = Department::orderBy('created_at', 'asc')->get();
        return view('employee.index', [
            'employees' => $employees,
            'departments' => $departments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = \App\Department::orderBy('created_at', 'asc')->get();
        return view('employee.create',[
            'departments' => $departments
        ]);
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
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'wage' => 'integer',
            'department' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/employee/create')
                ->withInput()
                ->withErrors($validator);
        }

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->surname = $request->surname;
        $employee->patronymic = $request->patronymic;
        $employee->wage = ($request->wage == "" ? 0: $request->wage);
        $employee->gender = $request->gender;

        $employee->save();
        $employee->departments()->attach($request->department);

        return redirect('/employee');
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
        $employee = Employee::find($id);
        $departments = \App\Department::orderBy('created_at', 'asc')->get();
        return view('employee.update',[
            'departments' => $departments,
            'employee' => $employee
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
        /** @var Employee $employee */
        $employee = Employee::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'wage' => 'integer',
            'department' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/employee/'.$employee->id.'/edit')
                ->withInput()
                ->withErrors($validator);
        }

        $employee->name = $request->name;
        $employee->surname = $request->surname;
        $employee->patronymic = $request->patronymic;
        $employee->wage = $request->wage;
        $employee->gender = $request->gender;

        $employee->save();

        $employee->departments()->detach();

        if($request->input('department')){
            $employee->departments()->attach($request->input('department'));
        }
        return redirect('/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect('/employee');
    }
}
