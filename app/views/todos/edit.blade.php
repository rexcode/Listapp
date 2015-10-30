@extends('layouts.master')
@section('content')
	{{ Form::model($list, array( 'route' => ['todos.update', $list->id], 'method' => 'put')) }}
		@include('todos.partials._form')
	{{ Form::close() }}<br>
	{{ link_to_route('todos.index', 'Back', null, ['class' => 'btn btn-default btn-small']) }}
@stop