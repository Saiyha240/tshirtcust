<!DOCTYPE html>
<html>
<head>
	<title>Custom Tshirt</title>
	{!! HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
	{!! HTML::style('css/style.css') !!}
	{!! HTML::style('css/jquery.miniColors.css') !!}
	{!! HTML::script('https://code.jquery.com/jquery-1.11.3.min.js') !!}
	{!! HTML::script('js/fabric.js') !!}
	{!! HTML::script('js/tshirtEditor.js') !!}
	{!! HTML::script('js/jquery.miniColors.min.js') !!}
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
{!! HTML::script('js/loginDialog.js') !!}
{!! HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js') !!}
{!! HTML::script('js/scripts.js') !!}
</html>
