<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Auth SYSTEM</title>
	<!-- commnet for git -->
	<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"> -->
	{{ HTML::style('css/bootstrap.min.css') }}
	{{ HTML::style('css/style.css')}}	

	{{ HTML::script('/scripts/jquery-2.0.2.min.js')}}	
	{{ HTML::script('/scripts/bootstrap.min.js')}}
	{{ HTML::script('/scripts/main.js')}}
	{{ HTML::script('/scripts/jquery.cyrillic.js') }}
	
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

	<style>
		/*@import url(//fonts.googleapis.com/css?family=Lato:700);*/
		body {
			margin-top: 60px;
			/*font-family:'Lato', sans-serif;			*/
			/*color: #999;*/
		}
	</style>

</head>
<body>
	<div class="container">
		@if(Session::has('global'))
		 <div class="globalni_poraki">
			<h3>{{ Session::get('global') }}</h3>			
		 </div>
		@endif

		@include('layout.navigation')
		@yield('content')
		@yield('listing')
	</div>

		
</body>
	
</html>