@extends('layouts.master')
@section('content')


<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">

	{{ Form::model($todo_item, array( 'route' => ['todos.items.update', $todo_list_id, $todo_item->id], 'method' => 'put')) }}
		@include('items.partials._form')
	{{ Form::close() }}
	

</div>
</div>	
@stop