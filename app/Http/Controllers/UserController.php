<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $users=User::all();
            return view('users.index',compact('users'));
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
            return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'lastName' => 'required',
                'firstName' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zip' => 'required|numeric|digits:5',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|numeric|digits:10|unique:users,phone',
            ]);
        $user= new User($request->all());
        return redirect('home');
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
            $user = User::findOrFail($id);
            return view('users.show',compact('user'));
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
        if(Auth::check() ){
            $user=User::find($id);
            return view('users.edit',compact('user'));
        }
        else{
            session()->flash('cust_edit_msg', 'You do not have permissions to edit other users!.');
            return redirect('users');
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
        $user= new User($request->all());
        $user=User::find($id);
        $user->update($request->all());
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('users');
    }

    public function postAdminAssignRoles(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();
        if($request['role_admin']){
            $user->roles()->attach(Role::where('name','Admin')->first());
        }
        if($request['role_employee']){
            $user->roles()->attach(Role::where('name','Employee')->first());
        }
        if($request['role_mentor']){
            $user->roles()->attach(Role::where('name','Mentor')->first());
        }
        return redirect()->back();
    }

    public function mentorDisplay()
    {
        $user = User::where('email', Auth::user()->email)->firstOrFail();
        return view('users.mentorDisplay', compact('user'));
    }


    public function employeeDisplay()
    {
        $user = User::where('email', Auth::user()->email)->firstOrFail();
        return view('users.employeeDisplay', compact('user'));
    }
}
