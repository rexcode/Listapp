@extends('layouts.master')
@section('content')
	{{ Form::open(array( 'route' => ['todos.items.store', $todo_list->id])) }}
		@include('items.partials._form')
	{{ Form::close() }}<br>
	{{ link_to_route('todos.show', 'Back', [$todo_list->id], ['class' => 'btn btn-default btn-small']) }}
@stop