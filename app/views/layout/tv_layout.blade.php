<!-- tv_layout.blade.php -->
<!doctype html>
<html lang="en">
  <head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OglasnaTV</title>

	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

	{{ HTML::style('css/tv.css')}}
	{{ HTML::style('css/template.css') }}	
	{{ HTML::script('/scripts/jquery.vticker-min.js')}}
	{{ HTML::script('/scripts/main.js') }}

   
  	<link href='http://fonts.googleapis.com/css?family=Exo+2:400,300,500,600,700,800,900&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
  	
  </head>
  <body>    

		@yield('title')
		@yield('content')   

  </body>

</html>