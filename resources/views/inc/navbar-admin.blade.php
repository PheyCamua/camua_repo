@php $cats = DB::table('item_categories')->get(); @endphp
<nav class="navbar navbar-expand-lg sticky-top bg-dark2 ">
    <a class="navbar-brand" href="{{asset('/')}}"><img src="{{ asset('img/logo.png') }}" height="40px">  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Categories
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
                  @foreach($cats as $cat)
                      <a class="dropdown-item" href="/category/{{ $cat->category }}">{{ $cat->category }}</a>
                  @endforeach 
              </div>
          </li>

        <li class="nav-item"> 
            <div class="d-flex  mt-1">
              <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="keyword"  name="keyword" aria-label="Search">
              <button class="btn btn-outline-info btn-sm my-2 my-sm-0">Find</button>
            </div>
        </li>
      </ul>

      <ul class="navbar-nav align-right">  

        @guest
        
          <li class="nav-item mt-1 mx-2"> 
            <a href="/cart" class="btn btn-danger"><i class="fa fa-shopping-cart"></i></a>
          </li>
          
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else 
              

            @if ((Auth::user()->user_type == 'Admin'))
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Admin's Centre
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
                <a class="dropdown-item" href="{{asset('/seller/inventory')}}"><i class="fa fa-box"></i> Inventory</a>
                <a class="dropdown-item" href="{{asset('/seller/orders')}}"><i class="fa fa-shopping-cart"></i> Orders</a>
                <a class="dropdown-item" href="{{asset('/seller/payments')}}"><i class="fa fa-money-bill"></i> Payments</a>
                <a class="dropdown-item" href="{{asset('/seller/reports')}}"><i class="fa fa-file"></i> Reports</a> 
              </div>
            </li> 
            @else  
              <li class="nav-item mt-1 mx-2"> 
                <a href="/cart" class="btn btn-danger"><i class="fa fa-shopping-cart"></i></a>
              </li>
            @endif
            

            <li class="nav-item dropdown">
              <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                  <img class="rounded-full object-cover shadow-md" src="{{ asset('img/user/c.jpg') }}" alt="{{ Auth::user()->name }}" width="25px"/>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{asset('profile')}}">Profile Settings</a> 
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </li>   
        @endguest
        
        
      </ul> 
      
    </div> 
</nav>
  
 
@include('inc.messages') 