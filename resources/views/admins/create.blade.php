@extends('layouts.app2')

@section('content')
        <a class="btn btn-primary pull-right" style="margin: 10px 10px 10px 10px;" href="{{ URL::previous() }}">Go Back</a>
        <div class="col-lg-4" style="margin: 0px 0px 0px 383px;">
        <div class="panel panel-default ">
            <div class="panel-heading"><strong>New Admin</strong></div>
            <div class="panel-body">
		        {!! Form::open(['url' => 'admins', 'class'=>'form-horizontal', 'role'=>'form']) !!}
		        <div class="form-group floating-label-form-group controls {{ $errors->has('name') ? ' has-error has-feedback' : '' }}">
		            {!! Form::label('name', 'Name:',['class'=>'col-md-4 control-label']) !!}
		            <div class="col-md-14">
			            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) !!}
			            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
			            @if ($errors->has('name'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('name') }}</strong>
			                </span>
			            @endif
		            </div>
		        </div>
		        <div class="form-group floating-label-form-group controls {{ $errors->has('cust_number') ? ' has-error has-feedback' : '' }}">
		            {!! Form::label('cust_number', 'Customer ID',['class'=>'col-md-4 control-label']) !!}
		            <div class="col-md-14">
			            {!! Form::text('cust_number',null,['class'=>'form-control','placeholder'=>'Customer ID']) !!}
			            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
			            @if ($errors->has('cust_number'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('cust_number') }}</strong>
			                </span>
			            @endif
		            </div>
		        </div>
		        <div class="form-group floating-label-form-group controls {{ $errors->has('address') ? ' has-error has-feedback' : '' }}">
		            {!! Form::label('address', 'Street Address:',['class'=>'col-md-4 control-label']) !!}
		            <div class="col-md-14">
			            {!! Form::text('address',null,['class'=>'form-control','placeholder'=>'Street Address'] ) !!}
			            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
			            @if ($errors->has('address'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('address') }}</strong>
			                </span>
			            @endif
		            </div>
		        </div>
		        <div class="form-group floating-label-form-group controls {{ $errors->has('city') ? ' has-error has-feedback' : '' }}">
		            {!! Form::label('city', 'City:',['class'=>'col-md-4 control-label']) !!}
		            <div class="col-md-14">
		            {!! Form::text('city',null,['class'=>'form-control','placeholder'=>'City']) !!}
		            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
		            @if ($errors->has('city'))
		                <span class="help-block">
		                    <strong>{{ $errors->first('city') }}</strong>
		                </span>
		            @endif
		            </div>
		        </div>
		        <div class="form-group floating-label-form-group controls {{ $errors->has('state') ? ' has-error has-feedback' : '' }}">
		            {!! Form::label('state', 'State:',['class'=>'col-md-4 control-label']) !!}
		            <div class="col-md-14">
			            {!! Form::text('state',null,['class'=>'form-control','placeholder'=>'State']) !!}
			            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
			            @if ($errors->has('state'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('state') }}</strong>
			                </span>
			            @endif
		            </div>
		        </div>
		        <div class="form-group floating-label-form-group controls {{ $errors->has('zip') ? ' has-error has-feedback' : '' }}">
		            {!! Form::label('zip', 'Zip:',['class'=>'col-md-4 control-label']) !!}
		            <div class="col-md-14">
			            {!! Form::text('zip',null,['class'=>'form-control','placeholder'=>'Zip']) !!}
			            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
			            @if ($errors->has('zip'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('zip') }}</strong>
			                </span>
			            @endif
		            </div>
		        </div>
		        <div class="form-group floating-label-form-group controls {{ $errors->has('email') ? ' has-error has-feedback' : '' }}">
		            {!! Form::label('email', 'Primary Email:',['class'=>'col-md-4 control-label']) !!}
		            <div class="col-md-14">
			            {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Primary Email']) !!}
			            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
			            @if ($errors->has('email'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('email') }}</strong>
			                </span>
			            @endif
		            </div>
		        </div>
		        <div class="form-group floating-label-form-group controls {{ $errors->has('home_phone') ? ' has-error has-feedback' : '' }}">
		            {!! Form::label('home_phone', 'Home Phone:',['class'=>'col-md-4 control-label']) !!}
		            <div class="col-md-14">
			            {!! Form::text('home_phone',null,['class'=>'form-control','placeholder'=>'Home Phone']) !!}
			            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
			            @if ($errors->has('home_phone'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('home_phone') }}</strong>
			                </span>
			            @endif
		            </div>
		        </div>
		        <div class="form-group floating-label-form-group controls {{ $errors->has('cell_phone') ? ' has-error has-feedback' : '' }}">
		            {!! Form::label('cell_phone', 'Cell Phone:',['class'=>'col-md-4 control-label']) !!}
		            <div class="col-md-14">
			            {!! Form::text('cell_phone',null,['class'=>'form-control','placeholder'=>'Cell Phone']) !!}
			            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
			            @if ($errors->has('cell_phone'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('cell_phone') }}</strong>
			                </span>
			            @endif
		            </div>
		        </div>
		        <div class="form-group">
                        <div class="col-md-6 text-center">
                        <br/>
		            {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                        </div>
		        </div>
		        {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection