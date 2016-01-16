<!DOCTYPE html>
<html>
<head>
	<title>Custom Tshirt - Administration</title>
	{!! HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
	{!! HTML::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css') !!}
	{!! HTML::style('css/style.css') !!}
</head>
<body>
	@include('layouts.partials.navbar')
	<div class="container">
		<section id="typography">
			<div class="row">
				@yield('content')
			</div>
		</section>
	</div><!-- /container -->
	@include('layouts.partials.footer')
</body>
{!! HTML::script('https://code.jquery.com/jquery-1.11.3.min.js') !!}
{!! HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js') !!}
{!! HTML::script('js/scripts.js') !!}
</html>
