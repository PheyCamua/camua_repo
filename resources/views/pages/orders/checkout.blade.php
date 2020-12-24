@extends('layouts.item')

@section('content')  
@php $tracking_id =  time() .'_'.rand('1000','1000000') @endphp 
@if(count($carts)>0)  
    <form action="/checkout" method="POST">
        <div id="order-content">  
            <div class="bg-danger text-light p-2 my-3"><strong> <i class="fa fa-cart"></i>  CHECKOUT</strong></div> 
            <div class="row mb-5">  
                <div class="col-md-8">  
                    <h4>Shipping Details </h4> 
                    <div class="card  card-body">  
                        <input type="hidden" class="form-control" id="tracking_id" value="{{ $tracking_id }}" >
                        <div class="row ">
                            <div class="col-md-6 mb-3">
                                <label for="user_firstname">First name</label>
                                <input type="text" class="form-control" id="user_firstname" value="Phey" required>
                                <div class="invalid-feedback">
                                Valid first name is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="user_lastname">Last name</label>
                                <input type="text" class="form-control" id="user_lastname" value="Camua" required>
                                <div class="invalid-feedback">
                                Valid last name is required.
                                </div>
                            </div>
                        </div>
 
                        <div class="row ">
                            <div class="col-md-6 mb-3">
                                <label for="user_email">Email </label>
                                <input type="email" class="form-control" id="user_email" placeholder="you@example.com" value="aaaaaaa123@gmail.com" required>
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="user_phone">Phone No.</label>
                                <input type="text" class="form-control" id="user_phone" value="0000545500" required>
                                <div class="invalid-feedback">
                                Valid last name is required.
                                </div>
                            </div>
                        </div> 

                        <div class="mb-3">
                            <label for="user_address">Delivery Address</label>
                            <input type="text" class="form-control" id="user_address" value="1234 Main St" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="msgtoSeller">Message to Seller <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" id="msgtoSeller"  value="test only">
                        </div> 
                        <div class="my-3">
                            <label for="paymentmethod">Payment Method</label>
                            <select id="paymentmethod" class="form-control-sm"> 
                                <option value="COD" selected>Cash on Delivery</option>
                            </select>
                        </div>  
                    </div>  
                </div> 
                <div class="col-md-4">   
                    <div class="d-flex justify-content-between px-3">
                        <h4>Items</h4>   
                        <div class="btn btn-danger" onclick="clearCart()">Clear Cart</div>
                    </div>
                    <div class="card-body">   
                        @php  $x=0;$total=0;$total_shipping_fee = 0; $totalamount=0;$grandtotal=0;$total_qty=0; @endphp
                        @foreach($carts as $cart) 
                        <input type="hidden" id="id{{ $x }}" name="id[]" value="{{ $cart->id }}" readonly>
                        <input type="checkbox" id="chk{{ $x }}" name="chk[]" checked readonly hidden>
                            <input type="hidden" id="post_id{{ $x }}" name="post_id[]" value="{{ $cart->post_id }}" readonly>
                            @php $x++;
                                $total = $cart->order_qty * $cart->order_price;  
                                $total_shipping_fee += $cart->shipping_fee;
                                $total_qty += $cart->order_qty;
                                $totalamount += $total;
                                $grandtotal += $total_shipping_fee + $total;
                            @endphp  
                            <div class=""> 
                                <div class="row">  
                                    <div class="col-sm-2 col-3"><img src="/uploads/{{ $cart->temp_code }}/{{ $cart->imglink }}" width="40px"></div>
                                    <div class="col-sm-10 col-9">
                                        <strong>{{$cart->title}} </strong>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <span class="text-muted">{{ $cart->order_qty }}pc.</span> 
                                                <span class="text-muted">x {{ number_format($cart->order_price,2,'.',',') }}</span>
                                                <input type="hidden" id="order_qty{{ $x }}" name="order_qty[]" value="{{ $cart->order_qty }}" readonly>
                                                <input type="hidden" id="order_price{{ $x }}" name="order_price[]" value="{{ $cart->order_price }}" readonly>
                                            </div>
                                            <div class="col-sm-4 text-right">
                                                <strong id="item_total{{ $x }}">{{ number_format($total,2,'.',',') }}</strong> <br>  
                                                @if($cart->shipping_fee <= $cart->shipping_disc)
                                                    <i class="fa fa-shuttle-van"></i> FREE 
                                                    <input type="hidden" class="form-control" id="shipping_fee{{ $x }}" name="shipping_fee[]" value="0" readonly>
                                                @else
                                                    <i class="fa fa-shuttle-van"></i> {{ $cart->shipping_fee }}
                                                    <input type="hidden" class="form-control" id="shipping_fee{{ $x }}" name="shipping_fee[]" value="{{ $cart->shipping_fee }}" readonly>
                                                @endif
                                            </div>
                                        </div>
                                    </div> 
                                </div> 
                            </div> 
                        @endforeach 
                        <hr class="my-3">
                        <div class="p-2 card card-body"> 
                            <div class="d-flex justify-content-between"><label>Total Amount:</label> <strong id="total_amount">{{ number_format($totalamount,2,'.',',') }}</strong></div> 
                            <div class="d-flex justify-content-between"><label>No. of Items:</label> <strong id="total_qty">{{ $total_qty }}</strong></div> 
                            <div class="d-flex justify-content-between"><label>Total Shipping Fee:</label> <strong id="total_shipping_fee">{{ number_format($total_shipping_fee,2,'.',',') }}</strong></div>
                            <hr>
                            <div class="d-flex justify-content-between"><label>Grand Total:</label> <h4 id="grand_total" class="font-weight-bold primary">{{ number_format($grandtotal,2,'.',',') }}</h4></div>
                        </div> 
                    </div> 
                    
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-danger" onclick="orderItems()">PROCEED</button>
                    </div> 
                </div>   
            </div>
        </div> 
    </form>
@else
    <div class="text-center h100">
        <h2 class="text-muted">No Items to Checkout.</h2>
        <br>
        <a class="btn btn-danger btn-lg" href="/home">SEARCH ITEMS</a>
    </div> 
@endif
@endsection