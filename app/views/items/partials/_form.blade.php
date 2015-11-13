{{ Form::label('content', 'Task name') }}<br>
</div>
	<div class="panel-body">
	{{ Form::text('content') }}<br>
	{{ $errors->first('content', '<p class="text-center alert alert-danger">:message</p>') }}<br>
	</div>
	<div class="panel-footer">
	{{ link_to_route('todos.show', 'Back', [$todo_list_id], ['class' => 'btn btn-default btn-small']) }}
	{{ Form::submit('submit', ['class' => 'btn btn-info']) }} 
	</div>
</div>