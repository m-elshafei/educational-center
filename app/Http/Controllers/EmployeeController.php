<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $job_titles =Employee::all();
        return view('employees.create',compact('job_titles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user=Auth::user()->id;
        Employee::create([
                'user_id'=>Auth::user()->id,
                'job_title'=>$request->job_title,
                'salary'=>$request->salary,
                'hire_date'=>$request->hire_date
            ]);
        return redirect()->route('employee.index')->with('message','Employee Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $job_titles = Employee::all();
        $employees = Employee::find($id);
        return view('employees.edit',compact('employees','job_titles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        Employee::find($id)->update($request->except('_token'));
        return redirect()->route('employee.index')->with('message','Employee Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect()->route('employee.index')->with('message', 'Employee Deleted');
    }
}
