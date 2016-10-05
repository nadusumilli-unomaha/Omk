<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Employee;

use Auth; 

use Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $employees=Employee::all();
            return view('employees.index',compact('employees'));
        }
        else{
            return redirect('/');
        }
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
        /*$this->validate($request,[
                'name' => 'required|unique:employees,name',
                'address' => 'required',
                'cust_number' => 'required|numeric',
                'city' => 'required',
                'state' => 'required',
                'zip' => 'required|numeric|digits:5',
                'email' => 'required|email|unique:employees,email',
                'home_phone' => 'numeric|digits:10|unique:employees,home_phone',
                'cell_phone' => 'required|numeric|digits:10|unique:employees,cell_phone',
            ]);*/
        $employee= new Employee($request->all());
        $employee->type = 'Employee';
        $employee->save();
        return redirect('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check()){
            $employee = Employee::findOrFail($id);
            return view('employees.show',compact('employee'));
        }
        else{
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if((Auth::check() && Session::get("login_id") == $id) || Auth::user()->email == 'admin@admin.com'){
            $employee=Employee::find($id);
            return view('employees.edit',compact('employee'));
        }
        else{
            session()->flash('cust_edit_msg', 'You do not have permissions to edit other employees!.');
            return redirect('employees');
        }
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
        $employee= new Employee($request->all());
        $employee=Employee::find($id);
        $employee->update($request->all());
        return redirect('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
        return redirect('employees');
    }
}
