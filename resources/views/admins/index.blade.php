@extends('layouts.app2')

@section('content')
    <!-- This is the styling for the table because the text is white by default. -->
    <style type="text/css">
        th, td{
            color:black;
        }
    </style>
    <!-- This is the admin dashboard stuff with the colum sizing. -->
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Acess Dashboard</div>
                <div class="panel-body">                   
                    <a style="margin: 0px 10px 0px 10px;" class="btn btn-primary" href="{{action('AdminController@create')}}">Admins</a>
                    <a style="margin: 0px 10px 0px 10px;" class="btn btn-primary" href="{{action('EmployeeController@index')}}">Employee</a>
                    <a style="margin: 0px 10px 0px 10px;" class="btn btn-primary" href="{{action('MentorController@index')}}">Mentor</a>
                    <a style="margin: 0px 10px 0px 10px;" class="btn btn-primary" href="{{action('AttendanceController@index')}}">Attendance</a>
                    <a style="margin: 0px 10px 0px 10px;" class="btn btn-primary" href="{{action('GradeController@index')}}">Grade</a>
                </div>
            </div>
        </div>
    </div>

    <!-- The code to list all the students and other people stuff that can admin can see and create.-->
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-9 col-sm-offset-1">    
            <table class="table table-bordered table-striped table-hover table-inverse">
                <thead>
                <tr class="bg-info">
                    <th>lastName</th>
                    <th>firstName</th>
                    <th>Current Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Primary Email</th>
                    <th>phone</th>
                    <th>school</th>
                    <th colspan="3">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($admins as $admin)
                    <tr>
                            <td>{{ $admin->lastName }}</td>
                            <td>{{ $admin->firstName }}</td>
                            <td>{{ $admin->address }}</td>
                            <td>{{ $admin->city }}</td>
                            <td>{{ $admin->state }}</td>
                            <td>{{ $admin->zip }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->phone }}</td>
                            <td>{{ $admin->school }}</td>
                            <td><a href="{{url('admins',$admin->id)}}" class="btn btn-primary">Read</a></td>
                            <td><a href="{{route('admins.edit',$admin->id)}}" class="btn btn-warning">Update</a></td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'route'=>['admins.destroy', $admin->id], 'onSubmit'=> 'if(!confirm("\n\nAre you Sure you want to delete the admin?")){return false;}'])!!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                            <?php $bool = 1;?>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection