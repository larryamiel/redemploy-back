<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEmployees()
    {
        $employees = Employee::all();

        $response = [
            'employees' => $employees
        ];

        return response()->json($response, 200);
    }
    
    /**
     * Add a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postEmployee(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'title' => 'required',
            'address' => 'required',
            'birthdate' => 'required',
            'gender' => 'required',
        ]);

        $employee = new Employee();

        $employee->fullname = $request->input('fullname');
        $employee->title = $request->input('title');
        $employee->address = $request->input('address');
        $employee->birthdate = $request->input('birthdate');
        $employee->gender = $request->input('gender');

        $employee->save();

        return response()->json(['employee' => $employee, 201]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEmployee($id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return response()->json(['message' => 'Employee Not Found', 404]);
        }

        $response = [
            'employee' => $employee
        ];

        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function putEmployee(Request $request, $id)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'title' => 'required',
            'address' => 'required',
            'birthdate' => 'required',
            'gender' => 'required',
        ]);
        
        $employee = Employee::find($id);
        if (!$employee) {
            return response()->json(['message' => 'Employee Not Found', 404]);
        }

        $employee->fullname = $request->input('fullname');
        $employee->title = $request->input('title');
        $employee->address = $request->input('address');
        $employee->birthdate = $request->input('birthdate');
        $employee->gender = $request->input('gender');

        $employee->save();

        return response()->json(['employee' => $employee], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteEmployee($id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return response()->json(['message' => 'Employee Not Found', 404]);
        }

        $employee->delete();

        return response()->json(['message' => 'Quote Deleted'], 200);
    }
}
