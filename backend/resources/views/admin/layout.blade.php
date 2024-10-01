<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin/dashboard.css">
    <!-- pages styles -->
    
    <link rel="stylesheet" href="{{asset('css/admin/user_index.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/user_show.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/categories.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/formation_show.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/form_user.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/form_formation.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/souscategory_show.css')}}">
    
    <link rel="stylesheet" href="{{asset('css/admin/dashboard.css')}}">
        <link rel="stylesheet" href="{{asset('css/admin/user_index.css')}}">
        <link rel="stylesheet" href="{{asset('css/admin/form_user.css')}}">
    <!-- bootstrap icons  -->
    <link rel="stylesheet" href="{{asset('css/admin/categories.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Bootsrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="../css/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <script src="../css/bootstrap-5.3.3-dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="../css/bootstrap-5.3.3-dist/css/bootstrap.min.css">
   <script src="{{asset('css/bootstrap-5.3.3-dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('css/bootstrap-5.3.3-dist/js/bootstrap.bundle.js')}}"></script>
        <link rel="stylesheet" href="{{asset('css/bootstrap-5.3.3-dist/css/bootstrap.min.css')}}">

    <!-- chartjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Apex charts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- Forms -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.semanticui.css"> 
    
     <!-- Data Table -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.semanticui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"></script>

    <title>Document</title>
</head>
<body>
    <div class="body-container ">
        
        @include('admin.partials.navbar')
        @include('admin.partials.sidebar')

        <section class="main container">
            @yield('content')
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>