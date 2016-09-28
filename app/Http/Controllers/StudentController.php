<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Student;

use Auth; 

use Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $students=Student::all();
            return view('students.index',compact('students'));
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
        if(Auth::check()){
            return view('students.create');
        }
        else{
            return redirect('/');
        }
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
                'name' => 'required|unique:students,name',
                'address' => 'required',
                'cust_number' => 'required|numeric',
                'city' => 'required',
                'state' => 'required',
                'zip' => 'required|numeric|digits:5',
                'email' => 'required|email|unique:students,email',
                'home_phone' => 'numeric|digits:10|unique:students,home_phone',
                'cell_phone' => 'required|numeric|digits:10|unique:students,cell_phone',
            ]);*/
        $student= new Student($request->all());
        $student->save();
        return redirect('students');
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
            $student = Student::findOrFail($id);
            return view('students.show',compact('student'));
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
            $student=Student::find($id);
            return view('students.edit',compact('student'));
        }
        else{
            session()->flash('cust_edit_msg', 'You do not have permissions to edit other students!.');
            return redirect('students');
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
        $student= new Student($request->all());
        $student=Student::find($id);
        $student->update($request->all());
        return redirect('students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::find($id)->delete();
        return redirect('students');
    }
}
