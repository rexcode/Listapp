<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Layout</title>
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> --}}
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	{{-- asset() is a half solution as it generates only a uri --}}
	{{-- 	<link rel="stylesheet" href="{{{ asset('css/main.css') }}}"> --}}

	{{-- HTML::script/style('') is a full blade solution as it generates a whole link tag--}}
	{{-- with triple quotes below fn will not work --}}
	{{ HTML::style('css/main.css') }}

 </head>
<body>
		
<div class="navbar navbar-inverse navbar-static-top">
	<div class="container">
		<a class="navbar-brand" href="/todos">ListApp</a>
		<ul class="nav navbar-nav navbar-right">
			<li class="">
				<a href="/">Home</a>
			</li>
			
			@if(Auth::check())
				<li><a href="/todos/create">Create a List</a></li>
				<li><a href="/logout">Logout</a></li>
			{{-- @else --}}
				{{-- <li><a href="/register">Login</a></li> --}}
			@endif

			@if(Auth::guest())
				<li><a href="/register">Register</a></li>
				<li><a href="/login">Login</a></li>
			@endif
			{{-- <li>
				<a href="/register">Register</a>
			</li>
			<li><a href="/login"></a></li> --}}
		</ul>
	</div>
</div>

	@if(Session::has('message'))
	<div class="alert alert-success alert-dismissable">
		{{ Session::get('message') }}
	</div>
	@endif

<div class="container border">
		<div class="row">
			<div class="col-md-12 content">
				{{-- <div class="logout">
					@if(Auth::check())
					
						{{ link_to_route('logout', 'Logout', null, ['class'=>'btn btn-info']) }}
					
					@endif
				</div> --}}

				@yield('content')
			</div>
		</div>
</div>

{{-- <div id="footer" class="text-center">
	<h4>Rexappz - &copy; {{{ date('Y') }}}</h4>
</div>--}}
<div class="footer">
	&copy; - <?php echo date('Y', time()); ?>
	<a href="https://github.com/rexcode">Rexcode</a> - Vicky Patel.
<br><br><br>
</div>

		{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') }}
		{{ HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js') }}
		{{ HTML::script('js/app.js') }}

</body>
</html>
