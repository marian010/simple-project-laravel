<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use App\Company;

class EmployeeController extends Controller
{
    public function index()
    {
        $employes = Employee::paginate(10);

        return view('employee.index', compact('employes'));
    }

    public function destroy($id)
    {
        $employe = Employee::findOrFail($id);
        $employe->delete();

        return back();
    }

    public function create()
    {
        $company = Company::all();

        return view('employee.create', compact('company'));
    }

    public function store(Request $request)
    {
        Employee::create([
            'first_name'        => $request->input('first_name'),
            'last_name'         => $request->input('last_name'),
            'email'             => $request->input('email'),
            'company_id'        => $request->input('company')
        ]);

        return redirect('/employe')->with('status', 'Employee added');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $companies = Company::all();

        return view('employee.edit', compact('employee', 'companies'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone_number = $request->phone_number;
        $employee->company_id = implode(',', $request->input('company'));
        $employee->save();

        return redirect()->route('employee.index');
    }
}
