@extends('layouts.app')

@section('content') 
    <div class="row">  
        <div class="col-lg-3 col-md-4 d-none d-md-block"> 
            <div class="card sm:rounded-md">
                <ul class="list-none">
                    @foreach($categories as $category)
                        <li><a href="/category/{{ $category->category }}">{{ $category->category }}</a></li>
                    @endforeach 
                </ul>
            </div>  
        </div>

        <div class="col-lg-9 col-md-8 col-sm-12">  
            <div class="row">
                @foreach($items as $i)
                    @php
                        $np = $i->price_new;
                        $op = $i->price_old;
                        $discount = ($op - $np) / $op*100;
                        $disc = number_format($discount,0,'','');
                    @endphp
                    <div class="col-md-3 col-sm-4 col-6 p-1">
                        <a href="/view/{{ $i->temp_code }}">
                            <div class="overflow-hidden card shadow-md">
                                <div class="item-img"><img src="/uploads/{{ $i->temp_code }}/{{ $i->imglink }}"></div>
                                <div class="p-2">
                                    <div class="r2">{{ $i->title }}</div> 
                                    <div class="newprice">P{{ number_format($i->price_new,'2','.',',') }}</div>
                                    <span class="oldprice">P{{ number_format($i->price_old,'2','.',',') }}</span><span class="discount mx-2">{{ $disc }}%</span>
                                </div> 
                            </div>
                        </a>
                    </div> 
                @endforeach
            </div> 
        </div> 
    </div>
   
    <div class="clearfix py-5"></div>
    
    <div class="row overflow-hidden sm:rounded-md">
        <img src="/img/hero/02.jpg" width="100%"> 
    </div>
@endsection
