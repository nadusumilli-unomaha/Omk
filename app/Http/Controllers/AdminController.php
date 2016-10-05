<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Admin;

use App\User;

use Auth; 

use Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $admins=Admin::all();
            return view('admins.index',compact('admins'));
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
            return view('admins.create');
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
                'email' => 'required|email|unique:admins,email',
                'phone' => 'required|numeric|digits:10|unique:admins,phone',
            ]);
        $user= new User;
        $user->lastName = $request->lastName;
        $user->firstName = $request->firstName;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zip = $request->zip;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $admin = new Admin;
        $admin->status = $request->status;
        $admin->admin_number = $request->admin_number;
        $admin->user()->save($user);
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
            $admin = Admin::findOrFail($id);
            return view('admins.show',compact('admin'));
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
            $admin=Admin::find($id);
            return view('admins.edit',compact('admin'));
        }
        else{
            session()->flash('cust_edit_msg', 'You do not have permissions to edit other admins!.');
            return redirect('admins');
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
        $admin= new Admin($request->all());
        $admin=Admin::find($id);
        $admin->update($request->all());
        return redirect('admins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::find($id)->delete();
        return redirect('admins');
    }
}
