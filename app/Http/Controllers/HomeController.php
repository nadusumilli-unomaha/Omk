<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('email', Auth::user()->email)->first();//First is required because without first you get a collection and you cannot roles() on a collection.
        foreach ($user->roles as $role) {
            if($role->name === 'Mentor')
            {
                return view('users.RegistrationSuccess', compact('user'));
            }
            else if($role->name === 'Employee')
            {
                return view('users.RegistrationSuccess', compact('user'));
            }
            else
            {            
                $users = User::all();
                return view('home',compact('users'));
            }
        }
    }

    public function afterLogin()
    {
        $user = User::where('email', Auth::user()->email)->first();//First is required because without first you get a collection and you cannot roles() on a collection.
        foreach ($user->roles as $role) {
            if($role->name === 'Mentor')
            {
                return view('users.afterLogin', compact('user'));
            }
            else if($role->name === 'Employee')
            {
                return view('users.afterLogin', compact('user'));
            }
            else
            {            
                $users = User::all();
                return view('home',compact('users'));
            }
        }
    }
}
