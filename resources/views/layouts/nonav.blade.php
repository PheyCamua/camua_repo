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
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">   
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> 
    <link href="{{asset('img/favicon.png')}}" rel="icon"> 
</head>
<body>
    <div id="app"> 

        <main class="py-4">
            <div class="container"> 
                <div class="row max-w-7xl mx-auto sm:px-6 lg:px-8">
         
                    @yield('content')
                    {{-- 3RD COLUMN --}} 
                    
                </div> 
            </div>
        </main>
        
    </div>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>  
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script> 
      
    <script src="{{ asset('js/app.js') }}" defer></script> 
    <script>
    $(".see-more").click(function() {
        $div = $($(this).data('div')); //div to append
        $link = $(this).data('link'); //current URL
      
        $page = $(this).data('page'); //get the next page #
        $href = $link + $page; //complete URL
        $.get($href, function(response) { //append data
          $html = $(response).find("#posts").html(); 
          $div.append($html);
        });
      
        $(this).data('page', (parseInt($page) + 1)); //update page #
      });
    </script> 
</body>
</html>
