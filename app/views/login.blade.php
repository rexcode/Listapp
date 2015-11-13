@extends('layouts.master')
@section('content')
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
    <div class="col-sm-offset-6 col-sm-5">
      <button type="submit"  name = "submit" class="btn btn-default">Login</button> or
      <a class="" href="{{ URL::to('/register') }}">Register</a>
    </div>
  </div>
 	{{ Form::close() }}
  
  <hr class= "alert-danger">

  <div class="about text-center">
    <p>ListApp is a simple list making app.</p>
    <p>It allows the user to make a simple list and add tasks in it.</p>
    <p>The user can create, edit and delete the lists and tasks as required.</p>
    <p>The user can also mark the task on completion.</p>
    <p>Want to use this app. Just <a href="{{ URL::to('/register') }}">register</a> and get started.</p>
  </div>
  <hr class= "alert-danger">

@stop