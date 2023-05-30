<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex,nofollow">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('css/tabler.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-flags.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-vendors.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
  
  </head>
  <body  class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
      <div class="container-tight py-4">
        {{ $slot }}
      </div>
    </div>
    <script src="{{ asset('js/tabler.js') }}" defer></script>
    <script src="{{ asset('js/admin.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
  </body>
</html>