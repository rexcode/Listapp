@extends('layouts.master')
@section('content')
<br>
{{-- <form class="form-horizontal" action="" method="post"> --}}

{{ Form::open(array( 'action'=> 'RegisterController@doRegister', 'method' => 'post', 'class' => 'form-horizontal')) }}
  <div class="form-group">
    <label for="email" class="col-sm-4 control-label">Email</label>
    <div class="col-sm-5">
      <input type="email" class="form-control" id="email"  name="email" placeholder="Email">
    </div>
 	</div>
 		{{ $errors->first('email', '<p class="text-center alert alert-danger">:message</p>') }}
  <div class="form-group">
    <label for="username" class="col-sm-4 control-label">Username</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="username" name = "username" placeholder="Username">
    </div>
  </div>
  	{{ $errors->first('username', '<p class="text-center alert alert-danger">:message</p>') }}
  <div class="form-group">
    <label for="password" class="col-sm-4 control-label">Password</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
  </div>
  	{{ $errors->first('password', '<p class="text-center alert alert-danger">:message</p>') }}
  <div class="form-group">
    <div class="col-sm-offset-5 col-sm-6">
      <button type="submit"  name = "submit" class="btn btn-default">Sign Up</button>
    </div>
  </div>
 	{{ Form::close() }} 
 
	{{ link_to_route('todos.index', 'Back', null, ['class' => 'btn btn-default btn-small']) }}
@stop