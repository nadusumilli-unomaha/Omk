@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Acess Dashboard</div>
                <div class="panel-body">
                    <ul>
                    	<li><a style="margin: 10px 10px 10px 10px;" class="btn btn-primary" href="{{action('AdminController@create')}}">Admins</a></li>
                    	<li><a style="margin: 10px 10px 10px 10px;" class="btn btn-primary" href="{{action('EmployeeController@create')}}">Employee</a></li>
                    	<li><a style="margin: 10px 10px 10px 10px;" class="btn btn-primary" href="{{action('MentorController@create')}}">Mentor</a></li>
                    </ul>
                </div>
            </div>

            <!-- The code to list all the students and other people stuff that can admin can see and create.-->
        </div>
    </div>
</div>

@endsection