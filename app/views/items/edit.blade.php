@extends('layouts.master')
@section('content')
	{{ Form::model($todo_item, array( 'route' => ['todos.items.update', $todo_list_id, $todo_item->id], 'method' => 'put')) }}
		@include('items.partials._form')
	{{ Form::close() }}
	{{ link_to_route('todos.show', 'Back', [$todo_list_id], ['class' => 'btn btn-default btn-small']) }}
@stop