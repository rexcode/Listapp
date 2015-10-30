{{ Form::label('content', 'Task') }}<br>
{{ Form::text('content') }}<br>
{{ $errors->first('content', '<p class="alert alert-danger">:message</p>') }}<br><br>
{{ Form::submit('submit', ['class' => 'btn btn-info']) }} 