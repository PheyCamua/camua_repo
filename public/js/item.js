loadtotalcart();

function cin(num) {   
  var p = num.toFixed(2).split(".");
  return p[0].split("").reverse().reduce(function(acc, num, i, orig) {
      return  num + (i && !(i % 3) ? "," : "") + acc;
  }, "") + "." + p[1]; 
}
  
// ADD ITEMS TO CART [ITEM VIEW]
function addtocart(x){
    var total_qty = 0;
    var post_id = $('#post_id').val(); 
    var order_qty = $('#order_qty').val();
    var cart_qty = $('#cart_qty').val(); 
  
    var session_code = $('#session_code').val();
    
    var order_price = $('#order_price').val(); 
    

    total_qty = Number(order_qty) + Number(cart_qty);  

    var cartqty = $('#cartqty').html();
    total_cartqty = Number(order_qty) + Number(cartqty); 
    var order_status = 'Added to Cart';

    let _url     = '/cart';
    let _token   = $('meta[name="csrf-token"]').attr('content'); 

    $.ajax({
      url: _url,
      type: "POST",
      data: { 
        post_id: post_id,  
        order_qty: total_qty, 
        order_price: order_price, 
        session_code: session_code,
        order_status: order_status, 
        _token: _token,
      },
      success: function(response) {
          if(response.code == 200) {  
            $('#cartqty').html(total_cartqty); 
            $('#cart_qty').val(total_qty);
            if(x == '1'){
              window.location.replace('/cart');
            } 
          }
      },  
    });
}   

//LOAD ITEM TOTAL [CART]
function calc(i){ 
  var x=0; var y=0; var z=0; var chk='';
  x = $('#order_qty'+i).val();
  y = $('#order_price'+i).val();
  z = x * y;
  chk = $('#chk'+i).val(); 

  if(chk != ''){
    $('#item_total'+i).html(cin(z));
  }
  else{
    $('#item_total'+i).html('0.00');
  }  
  loadtotalcart();
} 


// LOAD CART TOTAL  [CART]
function loadtotalcart(){
  var input = document.getElementsByName('order_price[]');
  var inputx = document.getElementsByName('order_qty[]'); 
  var chk = document.getElementsByName('chk[]');  
  var shipping_fee = document.getElementsByName('shipping_fee[]');
  
  var a = 0;var b = 0;var c = 0; var k = 0;var totalamount = 0;
  var total_shipping_fee=0; var s=0; var total_qty=0;var item_shipping_fee=0;

  for (let x = 0; x < input.length; x++){ 
    a = input[x].value;
    b = inputx[x].value;
    k = chk[x].checked;
    s = shipping_fee[x].value;
   
    if(k === true){ 
      c = (parseFloat(a) * parseFloat(b)) + parseFloat(s);
      s = parseFloat(s);
      q = parseFloat(b)
    }
    else{
      c = 0; s = 0; q =0;
    } 
    totalamount = totalamount + c; 
    total_shipping_fee = total_shipping_fee + (s*b);
    total_qty = total_qty + q;
    item_shipping_fee = b * s;
  } 
  $('#item_shipping_fee').html(item_shipping_fee);
  $('#total_shipping_fee').html(cin(total_shipping_fee));
  $('#total_qty').html(total_qty);
  $('#total_amount').html(cin(totalamount));

  var grand_total = totalamount + total_shipping_fee;
  $('#grand_total').html(cin(grand_total));
}  
 

// CHECKOUT [CART TO CHECK OUT]
function checkOut(){ 
  var xid = document.getElementsByName('id[]');
  var xpost_id = document.getElementsByName('post_id[]'); 
  var xorder_price = document.getElementsByName('order_price[]');
  var xorder_qty = document.getElementsByName('order_qty[]');  
  var xshipping_fee = document.getElementsByName('shipping_fee[]');
  var xsession_code = $('#session_code').val();
  var xchk = document.getElementsByName('chk[]');
  var k = '';
  
  let _url     = '/cart';
  let _token   = $('meta[name="csrf-token"]').attr('content'); 
    
  for (let x = 0; x < xpost_id.length; x++){ 
    var id='';var post_id='';var order_price='';var order_qty='';var shipping_fee='';
    post_id = xpost_id[x].value; 
    id = xid[x].value; 
    order_price = xorder_price[x].value;
    order_qty = xorder_qty[x].value;
    shipping_fee = xshipping_fee[x].value; 
    k = xchk[x].checked;

    if(k === true){
        $.ajax({
          url: _url,
          type: "POST",
          data: { 
            id: id,
            post_id: post_id, 
            order_price: order_price, 
            order_qty: order_qty,
            shipping_fee: shipping_fee,
            session_code: xsession_code,
            order_status: 'Checkout', 
            _token: _token,
          },
          success: function(response) {
            if(response.code == 200) {  
              
            }
          },  
        });
    } 
  } 
  window.location.replace('/checkout');
}

function clearCart(){
  var iid = document.getElementsByName('id[]');
  var ipost_id = document.getElementsByName('post_id[]'); 
  var iorder_price = document.getElementsByName('order_price[]');
  var iorder_qty = document.getElementsByName('order_qty[]');  
  var ichk = document.getElementsByName('chk[]');
  var session_code = $('#session_code').val();
 
  let _url     = '/cart';
  let _token   = $('meta[name="csrf-token"]').attr('content'); 
   
  for (let x = 0; x < ipost_id.length; x++){ 
    var id='';var post_id='';var order_price='';var order_qty=''; var k = '';
    id = iid[x].value;  
    post_id = ipost_id[x].value;   
    order_price = iorder_price[x].value;
    order_qty = iorder_qty[x].value;  
    k = ichk[x].checked;
 
    if(k === true){
      $.ajax({
        url: _url,
        type: "POST",
        data: { 
          id: id,  
          post_id: post_id,  
          order_price: order_price, 
          order_qty: order_qty,
          session_code: session_code,
          order_status: 'Added to Cart', 
          _token: _token,
        },
        success: function(response) {
          if(response.code == 200) {  
            
          }
        },  
      }); 
    }
  }
  window.location.replace('/cart');
}

// CHECKOUT [CHECK OUT TO ORDERED]
function orderItems(){
  var user_firstname = $('#user_firstname').val();
  var user_lastname = $('#user_lastname').val();
  var user_email = $('#user_email').val();
  var user_phone = $('#user_phone').val();
  var user_address = $('#user_address').val();
  
  var msgtoSeller = $('#msgtoSeller').val();
  var paymentmethod = $('#paymentmethod').val(); 
  var tracking_id = $('#tracking_id').val();

  var order_shipping_fee = $('#total_shipping_fee').val();
  var total_amount = $('#total_amount').val();
  var total_qty = $('#total_qty').val();
  var grand_total = $('#grand_total').val(); 

  let _urli     = '/order';
  let _token   = $('meta[name="csrf-token"]').attr('content'); 
   
  if(user_address != ''){
    $.ajax({
      url: _urli,
      type: "POST",
      data: { 
        user_firstname: user_firstname,  
        user_lastname: user_lastname, 
        user_email: user_email,
        user_phone: user_phone,
        user_address: user_address,

        msgtoSeller: msgtoSeller, 
        paymentmethod: paymentmethod, 
        tracking_id: tracking_id, 
        order_shipping_fee: order_shipping_fee, 
        total_amount: total_amount, 
        total_qty: total_qty,
        grand_total: grand_total,

        _token: _token,
      },
      success: function(response) {
        if(response.code == 200) {  
            
          // // UPDATE CART ITEMS
          // let _url     = '/cart';
          // var ipost_id = document.getElementsByName('post_id[]'); 
          // var iorder_price = document.getElementsByName('order_price[]');
          // var iorder_qty = document.getElementsByName('order_qty[]');  
          // var ichk = document.getElementsByName('chk[]');
          // var session_code = $('#session_code').val();
          
          // for (let x = 0; x < ipost_id.length; x++){ 
          //   var post_id='';var order_price='';var order_qty=''; var k = '';
          //   post_id = ipost_id[x].value;   
          //   order_price = iorder_price[x].value;
          //   order_qty = iorder_qty[x].value;  
          //   k = ichk[x].checked;
        
          //   if(k === true){
          //     $.ajax({
          //       url: _url,
          //       type: "POST",
          //       data: { 
          //         post_id: post_id,  
          //         order_price: order_price, 
          //         order_qty: order_qty,
          //         session_code: session_code,
          //         order_status: 'Ordered', 
          //         _token: _token,
          //       },
          //       success: function(response) {
          //         if(response.code == 200) {  
                    
          //         }
          //       },  
          //     }); 
          //   }
          // }

        }
      },  
    });  
  }
} 
 
(function () {
  'use strict'

  window.addEventListener('load', function () { 
    var forms = document.getElementsByClassName('needs-validation') 
    Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault()
          event.stopPropagation()
        } 
        form.classList.add('was-validated')
      }, false)
    })
  }, false)
})()
