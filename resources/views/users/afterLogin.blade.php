@extends('layouts.app2')

@section('content')
	<style type="text/css">
		/* The switch - the box around the slider */
		.switch {
		  position: relative;
		  display: inline-block;
		  width: 60px;
		  height: 34px;
		}

		/* Hide default HTML checkbox */
		.switch input {display:none;}

		/* The slider */
		.slider {
		  position: absolute;
		  cursor: pointer;
		  top: 0;
		  left: 0;
		  right: 0;
		  bottom: 0;
		  background-color: #ccc;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		.slider:before {
		  position: absolute;
		  content: "";
		  height: 26px;
		  width: 26px;
		  left: 4px;
		  bottom: 4px;
		  background-color: white;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		input:checked + .slider {
		  background-color: #2196F3;
		}

		input:focus + .slider {
		  box-shadow: 0 0 1px #2196F3;
		}

		input:checked + .slider:before {
		  -webkit-transform: translateX(26px);
		  -ms-transform: translateX(26px);
		  transform: translateX(26px);
		}

		/* Rounded sliders */
		.slider.round {
		  border-radius: 34px;
		}

		.slider.round:before {
		  border-radius: 50%;
		}
	</style>

	<!-- The Basic Scafolding of the automatic adjusting screen. -->
	<div class="row">
	        <div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-2">
				<!--###########################################################################-->
				<!--####    The Basic Scafolding for Finding a Mentor and adding code.   ####-->
				<!--###########################################################################-->
				@if($user->roles[0]->name === 'Mentor')
					<div class="btn-group" data-toggle="buttons">
					  <label class="btn btn-primary active">
					    <input type="radio" name="options" id="option1" autocomplete="off" checked> View My Profile
					  </label>
					  <label class="btn btn-primary">
					    <input type="radio" name="options" id="option2" autocomplete="off"> View My Student Profile
					  </label>
					</div>

					<input type="checkbox" name="my-checkbox" onText="Present" offText="Absent" checked>
					<label class="switch">
					  <input type="checkbox">
					  <div class="slider round"></div>
					</label>
				@endif
				<!--###########################################################################-->
				<!--####                     The End of Mentor Code.                       ####-->
				<!--###########################################################################-->
				
				<!--###########################################################################-->
				<!--####    The Basic Scafolding for Finding a Employee and adding code.   ####-->
				<!--###########################################################################-->
				@if($user->roles[0]->name === 'Employee')
					<div class="btn-group" data-toggle="buttons">
					  <label class="btn btn-primary active">
					    <input type="radio" name="options" id="option1" autocomplete="off" checked> View Student Profile
					  </label>
					  <label class="btn btn-primary">
					    <input type="radio" name="options" id="option2" autocomplete="off"> View Student Profile
					  </label>
					  <label class="btn btn-primary">
					    <input type="radio" name="options" id="option3" autocomplete="off"> Notify
					  </label>
					</div>
				@endif
				<!--###########################################################################-->
				<!--####                     The End of Mentor Code.                       ####-->
				<!--###########################################################################-->
		</div>
	</div>
	<!--  -->

@endsection