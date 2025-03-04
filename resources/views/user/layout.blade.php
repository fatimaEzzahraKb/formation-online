<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- css links  -->
<link rel="stylesheet" href="{{asset('css/user/navbar.css')}}">
<link rel="stylesheet" href="{{asset('css/user/index/hero.css')}}">
<link rel="stylesheet" href="{{asset('css/user/footer.css')}}">
  <link rel="stylesheet" href="{{asset('css/user/index/formation.css')}}">
  <link rel="stylesheet" href="{{asset('css/user/header.css')}}">
  <link rel="stylesheet" href="{{asset('css/admin/categories.css')}}">
  <link rel="stylesheet" href="{{asset('css/user/index/categories.css')}}">
  <link rel="stylesheet" href="{{asset('css/user/formation_show.css')}}">
  <link rel="stylesheet" href="{{asset('css/user/favoris.css')}}">
  <link rel="stylesheet" href="{{asset('css/user/about.css')}}">

    <!-- font links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{asset('css/bootstrap-5.3.3-dist/css/bootstrap.min.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">

    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="{{asset('css/bootstrap-5.3.3-dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('css/bootstrap-5.3.3-dist/js/bootstrap.bundle.js')}}"></script>
    

    <!-- bootstrap icons  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Sweet Alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="{{ asset('images/logo_V.jpeg') }}" type="image/x-icon">
    
    <title>@yield('title','V Formations en ligne Fiduciaire Brighten')</title>
</head>
<body >
@include('sweetalert::alert')
         @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

    @include('user.partials.header')

    <section class="main ">
        @yield('content')
    </section>  
    @include('user.partials.footer')
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @yield('scripts')
</body>
</html>