<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ViewController extends Controller
{
    public function validateView(Request $request)
    {
    	if($request->register == 'employee'){
        	return redirect()->action('EmployeeController@create');
    	}
    	elseif($request->register == 'mentor'){
        	return redirect()->action('MentorController@create');
    	}
    	elseif($request->register == 'admin'){
        	return redirect()->action('AdminController@create');
    	}
    }
}
