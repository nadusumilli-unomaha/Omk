@extends('layouts.app2')

@section('content')
	<style type="text/css">
		td, th{
			color:black;
		}
	</style>
    <a class="btn btn-primary pull-right" style="margin:0px 0px 0px 10px;" href="{{ URL::previous() }}">Go Back</a>
    <a class="btn btn-primary pull-right" style="margin:0px 0px 0px 10px;" href="{{action('EmployeeController@create')}}" class="btn btn-success">Create Employee</a>
    <div class="col-md-7 col-sm-offset-2">
    <h1 style="margin:0px 0px 0px 210px;">Employee</h1>
    <hr>
<!-- Table to display the detailed stock information of all the stocks. -->
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Cust No</th>
            <th>Cust Name</th>
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Purchase price</th>
            <th>Purchase Date</th>
            <th>Latest Mentor Price</th>
            <th>Total Mentor Value</th>
            <th>Gain or Loss</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->customer->cust_number }}</td>
                <td>{{ $employee->customer->name }}</td>
                <td>{{ $employee->symbol }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->shares }}</td>
                <td>{{ $employee->purchase_price }}$</td>
                <td>{{ $employee->purchased }}</td>
                <td>{{ $var }}$</td>
                <td>{{ $GainorLoss }}$</td>
                <td><a href="{{url('employees',$employee->id)}}" class="btn btn-primary">Read</a></td>
                <td><a href="{{route('employees.edit',$employee->id)}}" class="btn btn-warning">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['employees.destroy', $employee->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
    </div>
@endsection