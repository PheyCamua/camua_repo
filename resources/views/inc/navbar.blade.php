@php $cats = DB::table('item_categories')->get(); @endphp
  
<nav class="navbar navbar-expand-lg sticky-top bg-dark2 navbar-dark">
    <div class="container"> 
        <a class="navbar-brand" href="{{asset('/')}}"><img src="{{ asset('img/logo.png') }}" height="40px">  </a>
   
        <div class="d-flex mt-1">
          <input class="form-control form-control-sm" type="search" placeholder="keyword"  name="keyword" aria-label="Search">
          <button class="btn btn-outline-info btn-sm">Find</button>
        </div>
        
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
          </ul> 
            @php
                if(!empty(Auth::user()->id)){ 
                    $cart = DB::table('order_cart') 
                    ->selectRaw('sum(order_qty) as totalqty')  
                    ->where('order_by_id','=',Auth::user()->id) 
                    ->where('order_status','=','Added to Cart') 
                    ->groupBy('post_id')  
                    ->first(); 
                }
                if(!empty($_COOKIE['session_code'])){
                    $cart = DB::table('order_cart') 
                    ->selectRaw('sum(order_qty) as totalqty')    
                    ->where('order_status','=','Added to Cart')  
                    ->where('session_code','=',$_COOKIE['session_code']) 
                    ->groupBy('post_id')   
                    ->first();
                }  
            @endphp 
          <ul class="navbar-nav align-right">  
              <li class="nav-item mt-1 mx-2 d-none d-md-inline"> 
                <a href="/cart" class="btn btn-danger"><i class="fa fa-shopping-cart"></i> <span class="badge badge-light" id="cartqty">{{ $cart->totalqty ?? ''}}</span></a>
              </li>
              <li class="nav-item mt-1 mx-2 d-none d-md-inline"> 
                <a href="/checkout" class="btn btn-warning">Checkout</a>
              </li>
            
              @guest 
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else   
    
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
    </div>
</nav> 
@include('inc.messages') 