{{ Form::label('content', 'Task name') }}<br>
</div>
<div class="panel-body">
{{ Form::text('content') }}<br>
{{ $errors->first('content', '<p class="alert alert-danger">:message</p>') }}<br><br>
{{ link_to_route('todos.show', 'Back', [$todo_list->id], ['class' => 'btn btn-default btn-small']) }}
{{ Form::submit('submit', ['class' => 'btn btn-info']) }} 