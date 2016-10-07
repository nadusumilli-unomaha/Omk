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

		#mentorToggle2 {
            visibility: hidden;
        }

        #employeeToggle2 {
            visibility: hidden;
        }
        
        #employeeToggle3 {
            visibility: hidden;
        }

        td, th{
        	color:black;
        }
	</style>

	<!-- The Basic Scafolding of the automatic adjusting screen. -->
	<div class="row">
	        <div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-2">
				<!--###########################################################################-->
				<!--####    The Basic Scafolding for Finding a Mentor and adding code.   ####-->
				<!--###########################################################################-->
				@if($user->roles[0]->name === 'Mentor')
					<h1>Welcome {{$user->firstName}}</h1>
					<div id="myRadioGroup">
						<div class="btn-group" data-toggle="buttons">
						  <label class="btn btn-primary active">
						    <input type="radio" name="mentorToggle" id="option1" autocomplete="off" value="1" checked> View My Profile
						  </label>
						  <label class="btn btn-primary">
						    <input type="radio" name="mentorToggle" id="option2" autocomplete="off" value="2"> View My Student Profile
						  </label>
						</div>

						<input type="checkbox" name="my-checkbox" onText="Present" offText="Absent" checked>
						<label class="switch">
						  <input type="checkbox">
						  <div class="slider round"></div>
						</label>

						<div id="mentorToggle1" class="mentorProfile" >
							<h1>Mentor Profile</h1>
							<table class="table table-striped table-bordered table-hover">
					            <tbody>
						                <tr class="bg-info"/>
						                <tr>
						                    <td>Last Name</td>
						                    <td><?php echo ($user['lastName']); ?></td>
						                </tr>
						                <tr>
						                    <td>First Name</td>
						                    <td><?php echo ($user['firstName']); ?></td>
						                </tr>
						                <tr>
						                    <td>Address</td>
						                    <td><?php echo ($user['address']); ?></td>
						                </tr>
						                <tr>
						                    <td>City </td>
						                    <td><?php echo ($user['city']); ?></td>
						                </tr>
						                <tr>
						                    <td>State</td>
						                    <td><?php echo ($user['state']); ?></td>
						                </tr>
						                <tr>
						                    <td>Zip </td>
						                    <td><?php echo ($user['zip']); ?></td>
						                </tr>
						                <tr>
						                    <td>Phone</td>
						                    <td><?php echo ($user['phone']); ?></td>
						                </tr>
						                <tr>
						                    <td>Type</td>
						                    <td><?php echo ($user->roles[0]['name']); ?></td>
						                </tr>
						            </tbody>
						        </table>

						        <!-- The Update user function. -->
						        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit Mentor</a>
								<!-- This is the Visit Schedule link. -->
								<a class="btn btn-primary" href="#">My Visits</a>

						</div>
						<div id="mentorToggle2" class="mentorProfile">
							<h1>Student Profile</h1>
							<div style="color:black;">
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
					                    <th>Date of Birth</th>
					                    <th>Gender</th>
					                    <th>School</th>
					                    <th>Actions</th>
					                </tr>
					                </thead>
					                <tbody>
					                @foreach ($students as $student)
					                    <tr>
			                                <td>{{ $student->lastName }}</td>
			                                <td>{{ $student->firstName }}</td>
			                                <td>{{ $student->address }}</td>
			                                <td>{{ $student->city }}</td>
			                                <td>{{ $student->state }}</td>
			                                <td>{{ $student->zip }}</td>
			                                <td>{{ $student->email }}</td> 
			                                <td>{{ $student->phone }}</td>
			                                <td>{{ $student->dob }}</td>
			                                <td>{{ $student->gender }}</td>
			                                <td>{{ $student->school }}</td>
											<td><a class="btn btn-primary" href="{{ route('students.show',$student->id) }}">Show</a></td>
					                    </tr>
					                @endforeach
					                <hr/>
					                </tbody>
					            </table>
							</div>
						</div>
					</div>
				@endif
				<!--###########################################################################-->
				<!--####                     The End of Mentor Code.                       ####-->
				<!--###########################################################################-->
				
				<!--###########################################################################-->
				<!--####    The Basic Scafolding for Finding a Employee and adding code.   ####-->
				<!--###########################################################################-->
				@if($user->roles[0]->name === 'Employee')
					<h1>Welcome {{$user->firstName}}</h1>
					<div id="myRadioGroup">
						<div class="btn-group" data-toggle="buttons">
						  <label class="btn btn-primary active">
						    <input type="radio" name="employeeToggle" id="option1" autocomplete="off" value="1" checked> View Student Profile
						  </label>
						  <label class="btn btn-primary">
						    <input type="radio" name="employeeToggle" id="option2" autocomplete="off" value="2" > View Mentor Profile
						  </label>
						  <label class="btn btn-primary">
						    <input type="radio" name="employeeToggle" id="option3" autocomplete="off" value="3" > Notify
						  </label>
						</div>
						<div id="employeeToggle1" class="employeeProfile">
							<h1>Student Profile</h1>
							<a class="btn btn-primary" href="{{ action('StudentController@create') }}">Create a Student</a><br/>
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
					                    <th>Date of Birth</th>
					                    <th>Gender</th>
					                    <th>School</th>
					                    <th>Actions</th>
					                </tr>
					                </thead>
					                <tbody>
					                @foreach ($students as $student)
					                    <tr>
			                                <td>{{ $student->lastName }}</td>
			                                <td>{{ $student->firstName }}</td>
			                                <td>{{ $student->address }}</td>
			                                <td>{{ $student->city }}</td>
			                                <td>{{ $student->state }}</td>
			                                <td>{{ $student->zip }}</td>
			                                <td>{{ $student->email }}</td> 
			                                <td>{{ $student->phone }}</td>
			                                <td>{{ $student->dob }}</td>
			                                <td>{{ $student->gender }}</td>
			                                <td>{{ $student->school }}</td>
											<td><a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Update</a></td>
					                    </tr>
					                @endforeach
					                <hr/>
					                </tbody>
					            </table>
						</div>

						<div id="employeeToggle2" class="employeeProfile">
							<h1>Mentor Profile</h1>
							<a class="btn btn-primary" href="{{ action('UserController@create') }}">Create a User</a><br/>
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
					                    <th>Actions</th>
					                </tr>
					                </thead>
					                <tbody>
					                @foreach ($mentors as $mentor)
					                    <tr>
			                                <td>{{ $mentor->lastName }}</td>
			                                <td>{{ $mentor->firstName }}</td>
			                                <td>{{ $mentor->address }}</td>
			                                <td>{{ $mentor->city }}</td>
			                                <td>{{ $mentor->state }}</td>
			                                <td>{{ $mentor->zip }}</td>
			                                <td>{{ $mentor->email }}</td> 
			                                <td>{{ $mentor->phone }}</td>
											<td><a class="btn btn-primary" href="{{ route('users.edit',$mentor->id) }}">Update</a></td>
					                    </tr>
					                @endforeach
					                <hr/>
					                </tbody>
					            </table>
						</div>

						<div id="employeeToggle3" class="employeeProfile">
							<h1>Notify Users</h1>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</div>
					</div>
				@endif
				<!--###########################################################################-->
				<!--####                     The End of Mentor Code.                       ####-->
				<!--###########################################################################-->
		</div>
	</div>
	<!--  -->

@endsection