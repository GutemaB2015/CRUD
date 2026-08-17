<?php

namespace App\Http\Controllers;

use App\Models\EmployeesModel;
use Illuminate\Http\Request;
use DB;
class employeeController extends Controller
{
    public function delete_employee($id){
        $employee = EmployeesModel::find($id);
        if ($employee) {
            $employee -> delete();
            return redirect()->back()->with('success_message','Employee deleted successfully');
        }
        return redirect()->back()->with('error_message','Employee not found');
    }
    public function update_employee(Request $request){
        $data = $request->all();
        $validated_data = $request ->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email',
            'gender'     => 'required',
            'department' => 'required',
            'phone'      => 'required|numeric',
        ]);
        $id = $data['id'];
        $employee = EmployeesModel::where('id', $id) -> update([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email'      => $data['email'],
            'gender'     => $data['gender'],
            'department' => $data['department'],
            'phone'      => $data['phone']
        ]);
        return redirect('employee')->with('success_message', 'Employee updated successfully!');
    }
    public function edit_employee($id){
        $employee = EmployeesModel::find($id);
        if ($employee) {
            return view('employees.edit_employee', compact('employee'));
        }
    }
    public function index(Request $request){
        $employees = DB::table('employees as e')
                        -> select('e.id','e.first_name', 'e.last_name', 'e.email','e.gender', 'e.department', 'e.phone', 'e.status' )
                        ->get();
        return view('employees.index', compact('employees'));
    }

    public function add(){
        return view('employees.add');
    }
    public function create(Request $request){
        $data = $request -> all();
        $validated_data = $request-> validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'department' => 'required',
            'phone' => 'required|numeric',
        ]);

            $employee = new EmployeesModel;
            $employee -> first_name    = ucfirst(strtolower($data['first_name']));
            $employee -> last_name     = ucfirst(strtolower($data['last_name']));
            $employee -> email         = $data['email'];
            $employee -> gender        = $data['gender'];
            $employee -> department    = $data['department'];
            $employee -> phone         = $data['phone'];

            $employee -> save();
            return redirect('/employee')->with('success_message', 'Employee registered successfully!');
        }
}
