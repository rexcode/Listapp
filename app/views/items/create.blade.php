@extends('layouts.master')
@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			{{ Form::open(array( 'route' => ['todos.items.store', $todo_list->id])) }}
				@include('items.partials._form')
		{{-- 		{{ Form::label('content', 'Task name') }}<br>
		</div>
		<div class="panel-body">
			{{ Form::text('content') }}<br>
			{{ $errors->first('content', '<p class="alert alert-danger">:message</p>') }}<br><br>
			{{ link_to_route('todos.show', 'Back', [$todo_list->id], ['class' => 'btn btn-default btn-small']) }}
			{{ Form::submit('submit', ['class' => 'btn btn-info']) }} 
		 --}}	{{ Form::close() }}<br>
		{{-- {{ link_to_route('todos.show', 'Back', [$todo_list->id], ['class' => 'btn btn-default btn-small']) }} --}}
		</div>
	</div>
@stop