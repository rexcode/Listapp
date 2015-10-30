@extends('layouts.master')
@section('content')
	<h2>{{{ $list->name }}}</h2>
	@foreach($items as $item)
	<div class="row">
		{{-- Show item content--}}
		<div class="col-md-2 text-center">
			@if($item->completed_on)
			<del><h4>{{{ $item->content }}}</h4></del>
			@else
			<h4>{{{ $item->content }}}</h4>
			@endif
		</div>
		{{-- show item edit button --}}
		<div class = "col-md-1 text-center">
			{{ link_to_route('todos.items.edit', 'edit', [$list->id, $item->id], ['class' => 'btn btn-primary btn-small']) }}
		</div>
		{{-- show item completion button --}}
		@if ($item->completed_on == NULL)
		<div class="col-md-2 text-center">	
			{{ Form::model($item, ['method' => 'patch', 'route' => ['todos.items.complete', $list->id, $item->id] ]) }}
				{{ Form::button('complete', ['class' => 'btn btn-warning', 'type' => 'submit']) }}
			{{ Form::close() }}
	</div>
		@else
		<div class="col-md-2 text-center">
			<p class="btn btn-info"><del>complete</del></p>			
		</div>
		@endif
		{{-- show item delete button --}}
		<div class="col-md-1 text-center">	
				{{ Form::model($item, ['method' => 'delete', 'route' => ['todos.items.destroy', $list->id, $item->id] ]) }}
					{{ Form::button('Destroy', ['class' => 'btn btn-danger', 'type' => 'submit']) }}
				{{ Form::close() }}
		</div>
		<div class="col-md-6">
		</div>
	</div>

	@endforeach

	<p>{{ link_to_route('todos.items.create', 'Create a new item', [$list->id], ['class'=>'btn btn-success']) }}</p>
	{{-- triple curly braces will escape  the link <a> tag --}}
	{{ link_to_route('todos.index', 'Back', null, ['class' => 'btn btn-info btn-small']) }}

@stop


		{{-- <div class="col-md-2 text-center"> --}}
		{{-- <h4>{{ link_to_route('todos.show', $list->name, [$list->id]) }}</h4> --}}
				{{-- <li>{{ $list->name }}</li> --}}
		{{-- </div> --}}
		{{-- show list edit button --}}
