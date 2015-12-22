<!DOCTYPE html>
<html>
<head>
	<title>Custom Tshirt</title>
	{!! HTML::style('css/bootstrap.css') !!}
	{!! HTML::style('css/style.css') !!}
</head>
<body>
@include('layouts.partials.navbar')

@yield('content')

@include('layouts.partials.footer')
</body>
{!! HTML::script('js/jquery.min.js') !!}
{!! HTML::script('js/bootstrap.min.js') !!}
{!! HTML::script('js/scripts.js') !!}
</html>
