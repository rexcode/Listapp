		{{ Form::label('name', 'List Title') }}
		</div>
		<div class="panel-body">
		{{ Form::text('name') }}<br>
		{{ $errors->first('name', '<p class="alert alert-danger">:message</p>') }}<br><br>
		{{ link_to_route('todos.index', 'Back', null, ['class' => 'btn btn-default btn-small']) }}
		{{ Form::submit('submit', ['class' => 'btn btn-info']) }}
		</div>