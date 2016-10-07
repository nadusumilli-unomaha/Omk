<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;
use App\Mentor;
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
        $students = Student::all();
        foreach ($user->roles as $role) {
            if($role->name === 'Mentor')
            {
                return view('users.RegistrationSuccess', compact('user','students'));
            }
            else if($role->name === 'Employee')
            {
                return view('users.RegistrationSuccess', compact('user','students'));
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
        $students = Student::all();
        foreach ($user->roles as $role) {
            if($role->name === 'Mentor')
            {
                return view('users.afterLogin', compact('user','students'));
            }
            else if($role->name === 'Employee')
            {
                $mentors = User::whereHas('roles', function ($query) {
                                $query->where('name', 'like', 'Mentor');
                            })->get();
                return view('users.afterLogin', compact('user','students','mentors'));
            }
            else
            {            
                $users = User::all();
                return view('home',compact('users'));
            }
        }
    }
}
