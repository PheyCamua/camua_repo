@extends('layouts.app')

@section('content') 
    <div class="row">   

        <div class="col-lg-12 card sm:rounded-md ">  
            <!-- Swiper -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="img/hero/01.jpg" width="100%"></div>
                    <div class="swiper-slide"><img src="img/hero/02.jpg" width="100%"></div>
                    <div class="swiper-slide"><img src="img/hero/03.jpg" width="100%"></div> 
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div> 
    </div> 
    <div class="clearfix py-4"></div>

    @include('pages.posts.flashsale')

    <div class="clearfix py-4"></div>

    @include('pages.posts.most-popular') 

    <div class="clearfix py-4"></div>

    <h4>Categories</h4> 

    <div class="row">   
        @foreach($categories as $category) 
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 p-1">
                <div class="card shadow-md ">   
                    <a href="/category/{{ $category->category }}">
                        <div class="cat-img"><img src="/img/category/{{ $category->category_image }}"></div>
                        <div class="p-1 text-center">{{ $category->category }}</div>
                    </a>
                </div>   
            </div>  
        @endforeach 
    </div>  

    <div class="clearfix py-5"></div>
    
    <div class="row overflow-hidden sm:rounded-md">
        <img src="/img/hero/02.jpg" width="100%"> 
    </div>
@endsection
