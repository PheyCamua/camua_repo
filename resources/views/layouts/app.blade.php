<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1,shrink-to-fit=no">
     
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <title>{{ config('app.name', 'Avant San Jose') }}</title> 
    <!-- Styles --> 
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}" />  
    <link rel="stylesheet" href="{{ asset('css/dataTables.min.css') }}" /> 
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">  
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> 
    <link href="{{asset('img/favicon.png')}}" rel="icon"> 
</head>
<body class="d-flex flex-column h-100">
  <!-- Begin page content --> 
    @include('inc.navbar')

    <main role="main" class="flex-shrink-0 py-4">
        <div class="container">   
              @yield('content')  
        </div>
    </main>

    @include('inc.footer')  
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>  
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}" ></script> 
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>  
  
  <!-- Swiper JS -->
  <script src="/js/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
      },
    });
  </script>

</body>
</html>
