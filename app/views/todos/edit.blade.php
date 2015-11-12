@extends('layouts.master')
@section('content')

<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
	{{ Form::model($list, array( 'route' => ['todos.update', $list->id], 'method' => 'put')) }}
		@include('todos.partials._form')
	{{ Form::close() }}
	</div>
</div>	

@stop