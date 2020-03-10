<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function submit(EmployeeRequest $req)
    {
        $employee = new Employee();
        $employee->first_name = $req->input('first_name');
        $employee->last_name = $req->input('last_name');
        $employee->company = $req->input('company');
        $employee->email = $req->input('email');
        $employee->phone = $req->input('phone');
        $employee->save();
        return redirect()->route('employees');
    }

    public function getData()
    {
        $employee = DB::table('employees')->paginate(2);
        $companies = DB::table('companies')->get();
        return view('employees', ['employers' => $employee, 'companies' => $companies]);
    }

    public function rename($id)
    {
        $employee = new Employee();
        return view('renameEmployee', ['data' => $employee->find($id)]);
    }

    public function update($id, EmployeeRequest $req)
    {
        $employee = Employee::find($id);
        $employee->first_name = $req->input('first_name');
        $employee->last_name = $req->input('last_name');
        $employee->company = $req->input('company');
        $employee->email = $req->input('email');
        $employee->phone = $req->input('phone');
        $employee->save();
        return redirect()->route('employees');
    }

    public function delete($id)
    {
        Employee::find($id)->delete();
        return redirect()->route('employees');
    }

}
