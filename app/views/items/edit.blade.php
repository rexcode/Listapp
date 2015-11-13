@extends('layouts.master')
@section('content')

{{-- <div class="container"> --}}
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			{{ Form::model($todo_item, array( 'route' => ['todos.items.update', $todo_list_id, $todo_item->id], 'method' => 'put')) }}
				{{-- @include('items.partials._form') --}}
				{{ Form::label('content', 'Task name') }}<br>
				</div>
				<div class="panel-body text-center">
				{{ Form::text('content') }}<br>
				{{ $errors->first('content', '<p class="text-center alert alert-danger">:message</p>') }}
				</div>
				<div class="panel-footer text-center">
				{{ link_to_route('todos.show', 'Back', [$todo_list_id], ['class' => 'btn btn-default btn-small']) }}
				{{ Form::submit('submit', ['class' => 'btn btn-info']) }} 
			{{ Form::close() }}
			</div>
		</div>
	</div>	
<br>

@stop