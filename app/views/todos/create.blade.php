@extends('layouts.master')
@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			{{ Form::open(array( 'route' => 'todos.store')) }}
			@include('todos.partials._form')
	{{-- 		{{ Form::label('name', 'List Title') }}
		</div>
		<div class="panel-body">
			{{ Form::text('name') }}<br>
			{{ $errors->first('name', '<p class="alert alert-danger">:message</p>') }}<br>
			{{ link_to_route('todos.index', 'Back', null, ['class' => 'btn btn-default btn-small']) }}
			{{ Form::submit('create', ['class' => 'btn btn-info']) }}
		</div> --}}
			{{ Form::close() }}<br>
	{{-- {{ link_to_route('todos.index', 'Back', null, ['class' => 'btn btn-default btn-small']) }} --}}
	</div>
</div>	
@stop