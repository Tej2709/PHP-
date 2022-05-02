<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
use App\Models\employee_address;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = employees::latest()->paginate(5);
        $datanew['newdata']="";
        
        return view('employees.index',compact('data','datanew'))
        ->with('i', (request()->input('page',1)-1) *5);

        $employee=employees::with('employee_address')->get();
        $employees_address=employee_address::with('employees')->get();
        return view('employees.show',compact('employees','employee_address'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:8|max:12',
            'email' => 'required|email|unique:employees',
            'salary' => 'Numeric',
            'status'=>'required'
        ],);
    
        // employees::create($request->all());

        $details = new employees();
        $details->name = $request->input('name');
        $details->email = $request->input('email');
        $details->salary = $request->input('salary');
        $details->status = $request->input('status');
        $details->save();

        $location = new employee_address();
        $location->employee_id =$details->id;
        $location->city = $request->input('city');
        $location->state = $request->input('state');
        $location->country = $request->input('country');
        $location->pincode = $request->input('pincode');
        $location->save();
        
     
        return redirect()->route('employees.index')
        ->with('success','Employee Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(employees $employee)
    {
        return view('employees.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(employees $employee)
    {
        return view('employees.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employees $employee )
    {
        $request->validate([
            'name' => 'required|min:8|max:12',
            'email' => 'required|email|unique:employees,'.$employee->id.',id',
            'salary' => 'Numeric',
            'status'=>'required'
            
        ]);
        $request_data = $request->all();
        $employee->update($request_data);
        return redirect()->route('employees.index')
        ->with('success','Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(employees $employee)
    {
        $employee->delete();
    
        return redirect()->route('employees.index')
         ->with('success','Employee deleted successfully');    
    }

}