@extends('layouts.master')
@section('content')
	<h2>Show all Todo Lists</h2>
	@foreach($todo_lists as $list )
	<div class="row">	
			
		{{-- show the list name --}}
			<div class="col-md-2 text-center">
			<h4>{{ link_to_route('todos.show', $list->name, [$list->id]) }}</h4>
					{{-- <li>{{ $list->name }}</li> --}}
			</div>
			{{-- show list edit button --}}
			<div class = "col-md-1 text-center">
				{{ link_to_route('todos.edit', 'edit', [$list->id], ['class' => 'btn btn-primary btn-small']) }}
			</div>
			{{-- show list delete/destroy button --}}
			<div class="col-md-1 text-center">	
					{{ Form::model($list, ['method' => 'delete', 'route' => ['todos.destroy', $list->id] ]) }}
						{{ Form::button('Destroy', ['class' => 'btn btn-danger', 'type' => 'submit']) }}
					{{ Form::close() }}
			</div>
			<div class="col-md-8">
			</div>		
		
	</div>
		{{-- <div class="row">
			<div class="col-md-2">
				<h2>{{{ $list->name }}}</h2>
				{{ link_to_route('todos.index', 'Back', null, ['class' => 'btn btn-info btn-small']) }}
			</div>

			<div class="col-md-1">
				{{ link_to_route('todos.edit', 'Edit', [$list], ['class' => 'btn btn-info btn-small']) }}
			</div>
	</div> --}}
		{{-- <h4>{{ link_to_route('todos.show', $list->name, [$list->id]) }}</h4> --}}
		{{-- <li>{{{ $list->name }}}</li> --}}
	@endforeach
		{{ link_to_route('todos.create', 'Create a new list', null, ['class'=>'btn btn-info']) }} <br><br>
		{{ link_to_route('register', 'Register to Create a list', null, ['class'=>'btn btn-default']) }}
@stop