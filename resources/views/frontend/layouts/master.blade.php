<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title', 'Big-shop')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

	@include('frontend.partials.styles')
</head>

<body>
	<div class="wrapper">
	@include('frontend.partials.nav')	
	@include('frontend.partials.messages')	

	@yield('content')
	
	@include('frontend.partials.footer-bottom')

	</div>

	@include('frontend.partials.scripts')
	@yield('scripts')

</body>
</html>





















