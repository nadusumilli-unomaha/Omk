<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Attendance;

use Auth; 

use Session;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $attendances=Attendance::all();
            return view('attendances.index',compact('attendances'));
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
            return view('attendances.create');
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
                'name' => 'required|unique:attendances,name',
                'address' => 'required',
                'cust_number' => 'required|numeric',
                'city' => 'required',
                'state' => 'required',
                'zip' => 'required|numeric|digits:5',
                'email' => 'required|email|unique:attendances,email',
                'home_phone' => 'numeric|digits:10|unique:attendances,home_phone',
                'cell_phone' => 'required|numeric|digits:10|unique:attendances,cell_phone',
            ]);*/
        $attendance= new Attendance($request->all());
        $attendance->type = 'Attendance';
        $attendance->save();
        return redirect('attendances');
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
            $attendance = Attendance::findOrFail($id);
            return view('attendances.show',compact('attendance'));
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
            $attendance=Attendance::find($id);
            return view('attendances.edit',compact('attendance'));
        }
        else{
            session()->flash('cust_edit_msg', 'You do not have permissions to edit other attendances!.');
            return redirect('attendances');
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
        $attendance= new Attendance($request->all());
        $attendance=Attendance::find($id);
        $attendance->update($request->all());
        return redirect('attendances');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Attendance::find($id)->delete();
        return redirect('attendances');
    }
}
