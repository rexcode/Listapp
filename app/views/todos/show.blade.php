@extends('layouts.master')
@section('content')

{{-- <div class="container"> --}}
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 class="text-center">List - {{{ $list->name }}}</h2>
		</div>
		<div class="panel-body">

			@if(count($items) == 0) 
				<p class="text-center">You have no tasks.</p> 
			@endif

			@foreach($items as $item)
			<div class="row">
				{{-- Show item content--}}
				<div class="col-md-2 col-md-offset-3 text-center">
					@if($item->completed_on)
					<del><h4>{{{ $item->content }}}</h4></del>
					@else
					<h4>{{{ $item->content }}}</h4>
					@endif
				</div>

				@if ($item->completed_on == NULL)
				{{-- show item edit button --}}
				<div class = "col-md-1 text-center">
					{{ link_to_route('todos.items.edit', 'edit', [$list->id, $item->id], ['class' => 'btn btn-primary btn-small']) }}
				</div>
				{{-- show item completion button --}}
				
				<div class="col-md-2 text-center">	
					{{ Form::model($item, ['method' => 'patch', 'route' => ['todos.items.complete', $list->id, $item->id] ]) }}
						{{ Form::button('complete', ['class' => 'btn btn-warning', 'type' => 'submit']) }}
					{{ Form::close() }}
			</div>
				@else
				<div class="col-md-1 text-center">
					<p class="btn btn-primary btn-small"><del>edit</del></p>
				</div>
				<div class="col-md-2 text-center">	
					<p class="btn btn-info"><del>complete</del></p>			
				</div>
				@endif
				{{-- show item delete button --}}
				<div class="col-md-1 text-center">	
						{{ Form::model($item, ['method' => 'delete', 'route' => ['todos.items.destroy', $list->id, $item->id] ]) }}
							{{ Form::button('Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) }}
						{{ Form::close() }}
				</div>
				<div class="col-md-6">
				</div>
			</div>

			@endforeach
		</div>
		<div class="panel-footer">
	
	<p class="text-center">
	{{ link_to_route('todos.index', 'Back', null, ['class' => 'btn btn-info btn-small']) }}
	{{ link_to_route('todos.items.create', 'Create a new task', [$list->id], ['class'=>'btn btn-success']) }}
	{{-- triple curly braces will escape  the link <a> tag --}}
	
</p>
</div>

</div>	
@stop
