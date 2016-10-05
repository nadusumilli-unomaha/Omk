@extends('layouts.app2')

@section('content')
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-4" style="color:black;">
			<form method="GET" action="{{url('/validateView')}}">
				<select name="register">
					<option value="employee">Employee</option>
					<option value="mentor">Mentor</option>
					<option value="admin">Admin</option>
				</select>
				<input type="submit">
			</form>
		</div>
	</div>
@endsection