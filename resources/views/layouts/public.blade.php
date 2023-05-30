<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<title>BUKUDIO</title>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="format-detection" content="telephone=no">
	    <meta name="apple-mobile-web-app-capable" content="yes">
	    <meta name="author" content="">
	    <meta name="keywords" content="">
	    <meta name="description" content="">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}">
	    <link rel="stylesheet" type="text/css" href="{{ asset('icomoon/icomoon.css') }}">
	    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.css') }}">
	    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

		<script src="{{ asset('js/modernizr.js') }}"></script>

        

	</head>

    <body> 
        <x-header/>
        <main>
            {{ $slot }}
        </main>
        <x-footer/>


    </body>


    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</html>	