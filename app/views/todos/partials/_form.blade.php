		{{ Form::label('name', 'List Title') }}
		</div>
		<div class="panel-body text-center">
		{{ Form::text('name') }}<br>
		{{ $errors->first('name', '<p class="alert alert-danger">:message</p>') }}
		</div>
		<div class="panel-footer text-center">
		{{ link_to_route('todos.index', 'Back', null, ['class' => 'btn btn-default btn-small']) }}
		{{ Form::submit('submit', ['class' => 'btn btn-info']) }}
		</div>
		</div>