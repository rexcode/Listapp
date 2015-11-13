@extends('layouts.master')
@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			{{ Form::open(array( 'route' => 'todos.store')) }}
			{{-- @include('todos.partials._form') --}}
			{{ Form::label('name', 'List Title') }}
		</div>
		<div class="panel-body text-center">
			{{ Form::text('name') }} 
			{{ $errors->first('name', '<p class="alert alert-danger">:message</p>') }}
		</div>
		<div class="panel-footer text-center">	
			{{ link_to_route('todos.index', 'Back', null, ['class' => 'btn btn-default btn-small']) }}
			{{ Form::submit('create', ['class' => 'btn btn-info']) }}
			{{ Form::close() }}<br>
		</div>
	</div>
</div>	
@stop