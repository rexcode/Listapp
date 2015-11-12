@extends('layouts.master')
@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 class="text-center">Show all Todo Lists of {{{ Auth::user()->username }}}<small> - click on the list to add tasks</small></h2>
		</div>
		<div class="panel-body">
			@foreach($todo_lists as $list )
			<div class="row">
				{{-- show the list name --}}
				<div class="col-md-2  col-md-offset-3 text-center">
					<h4>{{ link_to_route('todos.show', $list->name, [$list->id], ['class' => 'hover']) }}</h4>
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
				<div class="col-md-5">
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<br>
	<p class="text-center">{{ link_to_route('todos.create', 'Create a new list', null, ['class'=>'btn btn-info']) }} </p><br><br>
	{{-- {{ link_to_route('register', 'Register to Create a list', null, ['class'=>'btn btn-default']) }} --}}
	@stop
</div>