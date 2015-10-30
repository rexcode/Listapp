@extends('layouts.master')
@section('content')
{{-- <p class="text-left">
    {{ link_to_route('todos.index', 'Back', null, ['class' => 'btn btn-primary btn-small']) }}
  </p> --}}
<br>
{{-- <form class="form-horizontal" action="" method="post"> --}}
{{-- <h2 class="login">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login</h2> --}}
{{ Form::open(array( 'url'=>'login', 'method' => 'post', 'class' => 'form-horizontal')) }}
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
    <div class="col-sm-offset-6 col-sm-6">
      <button type="submit"  name = "submit" class="btn btn-default">Login</button>
    </div>
  </div>
 	{{ Form::close() }} 
  
@stop