<div class="card">
    <div class="card-body"> 
        <h4>Order Now!</h4> 
        <hr> 
        <input type="hidden" id="post_id" value="{{ $post->id }}" min="1" readonly>
        <input type="hidden" id="order_price" value="{{ $post->price_new }}" readonly> 
        
        <input type="hidden" id="cart_qty" value="{{ $cart->order_qty ?? 0 }}" readonly> 
        <div class="row">
            <label class="col-3"><h5 class="py-2">Qty</h5></label>
            <div class="col-6"><input type="number" id="order_qty" class="form-control" value="1" min="1"></div> 
        </div>
        <div class="row">
            <h6 class="col-12">{{ $post->item_qty }} Stocks Left</h6> 
            <hr> 
            <div  class="col-12"> 
                Shipping Fee: {{ $post->shipping_fee }}<hr>
                @if($post->shipping_fee <= $post->shipping_disc)
                    <i class="fa fa-shuttle-van"></i> FREE SHIPPING<br>
                    <p class="text-muted font11">Free shipping with minimum order P500</p>
                    <hr>
                @endif 
            </div>
        </div>
        <div class="mt-2 d-flex justify-content-between">
            <button class="btn btn-primary" title="Add to Cart" onclick="addtocart()"><i class="fa fa-cart-plus"></i> Add to Cart</button>
            <button class="btn btn-danger"  title="Buy Now" onclick="addtocart('1')">Buy Now</button>
        </div> 
    </div>
</div>