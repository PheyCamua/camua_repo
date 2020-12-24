@extends('layouts.item')

@section('content')  
    
        @if(count($carts)>0)  
            <div id="cart-content">
                <div class="bg-info text-light p-2 my-3"><strong> <i class="fa fa-cart-plus"></i>  SHOPPING CART</strong></div>  
                <div class="row mb-5">
                    <div class="col-md-8 px-2"> 
                        @php $x=0; @endphp
                        
                        @foreach($carts as $cart) 
                            <input type="hidden" id="id{{ $x }}" name="id[]" value="{{ $cart->id }}" readonly>
                            <input type="hidden" id="post_id{{ $x }}" name="post_id[]" value="{{ $cart->post_id }}" readonly>
                            @php
                                $x++;$total=0;$total_shipping_fee = 0;
                                $total=$cart->order_qty * $cart->order_price; 
                                
                                $item_shipping_fee = $cart->order_qty * $cart->shipping_fee;
                                $total_shipping_fee = $total_shipping_fee + $item_shipping_fee;
                            @endphp  
                            <div class="card my-2">  
                                <div class="card-body row">  
                                    <div class="col-1 py-2"><input type="checkbox" id="chk{{ $x }}" name="chk[]" onchange="loadtotalcart()"></div>
                                    <div class="col-3 col-sm-2"><img src="/uploads/{{ $cart->temp_code }}/{{ $cart->imglink }}" width="50px"></div>
                                    <div class="col-7 col-sm-5"><h5>{{$cart->title}}</h5></div>
                                    <div class="col-4 offset-4 offset-sm-0 col-sm-2 text-center">
                                        <input type="number" id="order_qty{{ $x }}" name="order_qty[]" class="form-control text-right" value="{{ $cart->order_qty }}" min="0" onchange="calc({{ $x }})">
                                        <span class="text-muted">{{ number_format($cart->order_price,2,'.',',') }}/pc</span>
                                        <input type="hidden" id="order_price{{ $x }}" name="order_price[]" value="{{ $cart->order_price }}" readonly>
                                    </div>
                                    <div class="col-4 col-sm-2 text-right">
                                        <h5 id="item_total{{ $x }}">{{ number_format($total,2,'.',',') }}</h5>   
                                        @if($cart->shipping_fee <= $cart->shipping_disc)
                                            <i class="fa fa-shuttle-van"></i> FREE 
                                            <input type="hidden" class="form-control" id="shipping_fee{{ $x }}" name="shipping_fee[]" value="0" readonly>
                                        @else
                                            <input type="hidden" class="form-control" id="shipping_fee{{ $x }}" name="shipping_fee[]" value="{{ $cart->shipping_fee }}" readonly>
                                            <i class="fa fa-shuttle-van"></i> <span id="item_shipping_fee">{{ $item_shipping_fee}}</span>
                                            <input type="hidden" class="form-control" id="shipping_fee{{ $x }}" value="{{ $item_shipping_fee }}" readonly>
                                        @endif
                                    </div>
                                </div> 
                            </div>
                        @endforeach
                    
                    </div> 
                    <div class="col-md-4 p-2">   
                        <div class="card"> 
                            <div class="card-body"> 
                                <div class="d-flex justify-content-between"><label>Total Amount:</label> <strong id="total_amount"></strong></div> 
                                <div class="d-flex justify-content-between"><label>No. of Items:</label> <strong id="total_qty"></strong></div> 
                                <div class="d-flex justify-content-between"><label>Total Shipping Fee:</label> <strong id="total_shipping_fee"> </strong></div>
                                <hr>
                                <div class="d-flex justify-content-between"><label>Grant Total:</label> <h4 id="grand_total" class="font-weight-bold primary"></h4></div>
                            </div>
                        </div> 
                        <hr class="mb-4">
                        <button class="btn btn-danger btn-lg btn-block" onclick="checkOut()">Continue to Checkout</button>
                    </div>  
                </div>
            </div>
        @else
            <div class="bg-white" id="cart-content">
                <div class="text-center h100">
                    <h2 class="text-muted">No Items in Shopping Cart.</h2>
                    <br>
                    <a class="btn btn-danger btn-lg" href="/home">SEARCH ITEMS</a> 
                </div>
            </div> 
        @endif
    
@endsection