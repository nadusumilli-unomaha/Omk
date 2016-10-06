@extends('layouts.app2')

@section('content')
	<!-- The Basic Scafolding of the automatic adjusting screen. -->
	<div class="row">
	        <div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-2">
				<!--###########################################################################-->
				<!--####    The Basic Scafolding for Finding a Mentor and adding code.   ####-->
				<!--###########################################################################-->
				@if($user->roles[0]->name === 'Mentor')
					This is a Mentor.
				@endif
				<!--###########################################################################-->
				<!--####                     The End of Mentor Code.                       ####-->
				<!--###########################################################################-->
				
				<!--###########################################################################-->
				<!--####    The Basic Scafolding for Finding a Employee and adding code.   ####-->
				<!--###########################################################################-->
				@if($user->roles[0]->name === 'Employee')
					This is an Employee
				@endif
				<!--###########################################################################-->
				<!--####                     The End of Mentor Code.                       ####-->
				<!--###########################################################################-->
		</div>
	</div>
	<!--  -->
@endsection