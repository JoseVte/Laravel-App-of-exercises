<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>App Name - @yield('title')</title>
	{!! Html::style('assets/css/bootstrap.css') !!}

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

</head>
<body style="padding-top: 70px">
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header page-scroll">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ route('home') }}">Home</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					@if(Auth::guest())
					<li><a href="{{ route('login') }}">Login</a></li>
					<li><a href="{{ route('register') }}">Register</a></li>
					@else
					<li><a href="{{ route('profile', Auth::user()->getKey()) }}">Profile of {{Auth::user()->name}}</a></li>
					<li><a href="{{ route('logout') }}">Logout</a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	
	@if (Session::has('message'))
	<div class="flash alert-info">
		<p>{{ Session::get('message') }}</p>
	</div>
	@endif
	@if ($errors->any())
	<div class='flash alert-danger'>
		@foreach ( $errors->all() as $error )
		<p>{{ $error }}</p>
		@endforeach
	</div>
	@endif

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						@section('sidebar')
						This is the master sidebar.
						@show
					</div>

					<div class="panel-body">
						@yield('content')
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Scripts -->
	{!! Html::script('assets/js/jquery-1.11.3.min.js') !!}
	{!! Html::script('assets/js/bootstrap.min.js') !!}
</body>
</html>