@extends('layouts.app2')

@section('content')
    <!-- This is the styling for the table because the text is white by default. -->
    <style type="text/css">
        th, td{
            color:black;
        }
    </style>


    <!--###########################################################################-->
    <!--####   The Basic Scafolding for a dashboard for buttons and access.    ####-->
    <!--###########################################################################-->
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-2">
            <!-- This is the admin dashboard stuff with the colum sizing. -->
            <div class="panel panel-default">
                <div class="panel-heading">Admin Acess Dashboard</div>
                <div class="panel-body">
                    <a style="margin: 10px 10px 10px 10px;" class="btn btn-primary" href="{{action('UserController@index')}}">User</a>
                    <a style="margin: 10px 10px 10px 10px;" class="btn btn-primary" href="{{action('AttendanceController@index')}}">Attendance</a>
                    <a style="margin: 10px 10px 10px 10px;" class="btn btn-primary" href="{{action('GradeController@index')}}">Grade</a>
                </div>
            </div>
        </div>
    </div>
    <!--#############################################################################-->
    <!--####                        The End of the Table.                        ####-->
    <!--#############################################################################-->



    <!--#############################################################################-->
    <!--####     The Basic Scafolding for a table to change user Permissions.    ####-->
    <!--#############################################################################-->
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-2">
        <div class="table-responsive">
            <!-- The code to list all the students and other people stuff that can admin can see and create.-->
            <table class="table table-bordered table-striped table-hover table-inverse">
                <thead>
                <tr class="bg-info">
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Current Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Primary Email</th>
                    <th>Phone</th>
                    <th>Admin</th>
                    <th>Employee</th>
                    <th>Mentor</th>
                    <th></th>
                    <th colspan="3">Permissions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                            <form action="{{ route('users.assign') }}" method="post">
                                <td>{{ $user->lastName }}</td>
                                <td>{{ $user->firstName }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->city }}</td>
                                <td>{{ $user->state }}</td>
                                <td>{{ $user->zip }}</td>
                                <td>{{ $user->email }} <input type="hidden" name="email" value="{{$user->email}}"></td> 
                                <td>{{ $user->phone }}</td>
                                <td><input type="checkbox" {{ $user->hasRole('Admin')  ? 'checked' : ''}} name="role_admin"></td>
                                <td><input type="checkbox" {{ $user->hasRole('Employee')  ? 'checked' : ''}} name="role_employee"></td>
                                <td><input type="checkbox" {{ $user->hasRole('Mentor')  ? 'checked' : ''}} name="role_mentor"></td>
                                {{csrf_field()}}
                                <td><button class="btn btn-primary" type="submit">Assign Roles</button></td>
                                @foreach ($user->roles[0]->permissions as $permission)
                                    <td>{{ $permission->name }}</td>
                                @endforeach
                            </form>
                    </tr>
                @endforeach
                <hr/>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <!--#############################################################################-->
    <!--####                        The End of the Table.                        ####-->
    <!--#############################################################################-->


    
@endsection