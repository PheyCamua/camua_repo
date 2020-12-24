@extends('layouts.item')

@section('content') 

@php
    $np = $post->price_new;
    $op = $post->price_old;
    $discount = ($op - $np) / $op*100;
    $disc = number_format($discount,0,'','');
@endphp

<div class="row">
    <div class="col-lg-9 col-md-8 p-2">
        <div class="overflow-hidden card shadow-md">
            <div class="pt-4 px-4">
                <h4>{{ $post->title }}</h4> 
                <div class="newprice">P{{ $post->price_new }}  <span class="oldprice ml-2">P{{ $post->price_old }}</span><span class="discount mx-2">{{ $disc }}%</span></div>
            </div> 
            <hr>
            <div class="row"> 
                <div class="swiper-container">
                    <div class="swiper-wrapper">  
                        @foreach($uploads as $upload)   
                            <div class="swiper-slide"> 
                                <img src="/uploads/{{ $upload->temp_code }}/{{ $upload->imglink }}" class="img-item">
                            </div>     
                        @endforeach  
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div> 
                </div>  
            </div>
            <hr>
            <div class="p-4">
                <h4>Description</h4>
                <div class="item-desc">{{ $post->description }}</div>
            </div> 
        </div>

        @include('pages.posts.item-feedback')
    </div>
    <div class="col-lg-3 col-md-4 p-2">
        @include('pages.posts.item-actions')
    </div>

    
</div> 


<div class="clearfix py-4"></div>

@include('pages.posts.relatedItems') 

@endsection