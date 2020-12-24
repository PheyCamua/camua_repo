<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <title>{{ config('app.name', 'Avant San Jose') }}</title> 
    <!-- Styles --> 
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}" />  
    <link rel="stylesheet" href="{{ asset('css/dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> 
    <link href="{{asset('img/favicon.png')}}" rel="icon"> 
</head>
<body > 
    @include('inc.navbar-seller')

    <main class="p-4">
        <div class="row">  
            <div class="col-lg-2 col-md-3 d-none d-md-block">   
                @include('inventory.sidebar') 
            </div> 
            <div class="col-lg-10 col-md-9 mh-100"> 
                <div id="load_dashboard">
                    @include('dashboard.index') 
                </div> 
                <hr>
                @yield('content')  
            </div> 
        </div>
    </main>

    @include('inc.footer')
        
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}" ></script>  
    <script src="{{asset('js/datatables.min.js')}}" type="text/javascript"></script> 
     
    <script>
        $(document).ready( function () {
            $('#tbl1').DataTable();
        } ); 
    </script> 
</body>
</html>
