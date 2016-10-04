@extends('layouts.app2')

@section('content')
	<style type="text/css">
		td, th{
			color:black;
		}
	</style>
    <div class="col-md-7 col-sm-offset-1">
    <a class="btn btn-primary pull-right" style="margin:0px 0px 0px 10px;" href="{{ URL::previous() }}">Go Back</a>
    <a class="btn btn-primary pull-right" style="margin:0px 0px 0px 10px;" href="{{action('MentorController@create')}}" class="btn btn-success">Create Mentor</a>
	<h1 style="margin:0px 0px 0px 210px;">Mentor</h1>
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
        <tbody>        @foreach ($mentors as $mentor)
            <tr>
                <td>{{ $mentor->customer->cust_number }}</td>
                <td>{{ $mentor->customer->name }}</td>
                <td>{{ $mentor->symbol }}</td>
                <td>{{ $mentor->name }}</td>
                <td>{{ $mentor->shares }}</td>
                <td>{{ $mentor->purchase_price }}$</td>
                <td>{{ $mentor->purchased }}</td>
                <td>{{ $var }}$</td>
                <td>{{ $GainorLoss }}$</td>
                <td><a href="{{url('mentors',$mentor->id)}}" class="btn btn-primary">Read</a></td>
                <td><a href="{{route('mentors.edit',$mentor->id)}}" class="btn btn-warning">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['mentors.destroy', $mentor->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
    </div>
@endsection