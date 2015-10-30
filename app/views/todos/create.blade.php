@extends('layouts.master')
@section('content')
	{{ Form::open(array( 'route' => 'todos.store')) }}
		@include('todos.partials._form')
	{{ Form::close() }}<br>
	{{ link_to_route('todos.index', 'Back', null, ['class' => 'btn btn-default btn-small']) }}
@stop