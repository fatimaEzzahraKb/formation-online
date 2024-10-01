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
  <link rel="stylesheet" href="{{asset('css/user/index/formation.css')}}">
  <link rel="stylesheet" href="{{asset('css/user/header.css')}}">
  <link rel="stylesheet" href="{{asset('css/admin/categories.css')}}">
  <link rel="stylesheet" href="{{asset('css/user/index/categories.css')}}">

 <!-- font links -->
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link rel="stylesheet" href="{{asset('css/bootstrap-5.3.3-dist/css/bootstrap.min.css')}}">

 <!-- bootstrap links -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <script src="{{asset('css/bootstrap-5.3.3-dist/js/bootstrap.min.js')}}"></script>
 <script src="{{asset('css/bootstrap-5.3.3-dist/js/bootstrap.bundle.js')}}"></script>
 

    <!-- bootstrap icons  -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

 <title>Document</title>
</head>
<body >
    @include('user.partials.header')

    <section class="main container">
        @yield('content')
    </section>  
    @include('user.partials.footer')
    @yield('scripts')
</body>
</html>