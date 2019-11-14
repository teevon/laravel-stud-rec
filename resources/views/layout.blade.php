<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, intial-scale=1">

  <title>@yield('title', 'Learning')</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap-4.3.1/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
</head>
<body>
  <div class="container">
    @if(session()->has('message'))
     <div class="alert alert-success" role="alert">
       <strong>Success</strong>
       {{ session()->get('message') }}
     </div>
    @endif
     
    @yield('content')
  </div>
  <script src="{{ asset('js/jquery-1.12.4.js') }}"></script>
  <script src="{{ asset('css/bootstrap-4.3.1/js/bootstrap.min.js') }}"></script>
</body>
</html>