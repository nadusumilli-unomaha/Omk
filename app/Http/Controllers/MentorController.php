<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Mentor;

use Auth; 

use Session;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $mentors=Mentor::all();
            return view('mentors.index',compact('mentors'));
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
            return view('mentors.create');
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
                'name' => 'required|unique:mentors,name',
                'address' => 'required',
                'cust_number' => 'required|numeric',
                'city' => 'required',
                'state' => 'required',
                'zip' => 'required|numeric|digits:5',
                'email' => 'required|email|unique:mentors,email',
                'home_phone' => 'numeric|digits:10|unique:mentors,home_phone',
                'cell_phone' => 'required|numeric|digits:10|unique:mentors,cell_phone',
            ]);*/
        $mentor= new Mentor($request->all());
        $mentor->save();
        return redirect('mentors');
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
            $mentor = Mentor::findOrFail($id);
            return view('mentors.show',compact('mentor'));
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
            $mentor=Mentor::find($id);
            return view('mentors.edit',compact('mentor'));
        }
        else{
            session()->flash('cust_edit_msg', 'You do not have permissions to edit other mentors!.');
            return redirect('mentors');
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
        $mentor= new Mentor($request->all());
        $mentor=Mentor::find($id);
        $mentor->update($request->all());
        return redirect('mentors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mentor::find($id)->delete();
        return redirect('mentors');
    }
}
