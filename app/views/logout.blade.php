@extends('layouts.master')
@section('content')
<br>
{{-- <form class="form-horizontal" action="" method="post"> --}}
<p class="text-center">You have been successfully logged out.</p>
<p class="text-center"><a class="btn btn-default" href="{{ URL::to('/login') }}">Log in</a></p>
<br>
 
{{-- {{ link_to_route('todos.index', 'Back', null, ['class' => 'btn btn-default btn-small']) }} --}}
@stop