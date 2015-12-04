<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ListApp</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
	{{-- asset() is a half solution as it generates only a uri --}}
	{{-- HTML::script/style('') is a full blade solution as it generates a whole link tag--}}
	{{-- with triple quotes below fn will not work --}}
	{{ HTML::style('css/main.css') }}
 </head>
<body>
<div class="bg">		
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<a class="navbar-brand" href="/todos">ListApp</a>
			<ul class="nav navbar-nav navbar-right">
				
				@if(Auth::check())
					<li><a href="/todos">My Lists</a></li>
					<li><a href="/todos/create">Create a new List</a></li>
					<li><a href="/logout">Logout ({{{ Auth::user()->username }}})</a></li>
				@endif

				@if(Auth::guest())
					{{-- <li><a href="/">Home</a></li> --}}
					<li><a href="/register">Register</a></li>
					<li><a href="/login">Login</a></li>
				@endif

			</ul>
		</div>
	</div>

		@if(Session::has('message'))
		<div class=" text-center alert alert-success alert-dismissable">
			{{ Session::get('message') }}
		</div>
		@endif

	<div class="container border">
			<div class="row">
				<div class="col-md-12 content">
					@yield('content')
				</div>
			</div>
	</div>
</div>
	<div class="footer text-center">
		<span>&copy; - {{{ date('Y', time()) }}}</span>
		<a href="https://rexcode.github.io" target="_blank" title="Github Page">Rexcode</a>
		<a href="https://github.com/rexcode/listapp/" target="_blank"><img src="{{ asset('images/github10.png') }}" alt="Github icon" title="Github repository of this project " width="12px" height="12px"></a>
	</div>


	{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') }}
	{{ HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js') }}
	{{ HTML::script('js/app.js') }}

<script>
	
</script>	

</body>
</html>