@extends('layouts.adminuser')

@section('content') 
     
    <div class="container" style="clear: both;">
      <div class="d-flex justify-content-between">
        <h4>INVENTORY</h4> <a href="javascript:void(0)" class="btn btn-success mb-3" id="create-new-post" onclick="SelCat()">Add Inventory</a>
      </div>
    </div>
    <div class="container" id="loadinventory">
        @include('inventory.loadinventory') 
    </div> 

    @include('inventory.modal')

      <script>
        
        function SelCat() { 
          $('#category-modal').modal('show');
        }

        function selthis(catID){   
          document.getElementById('category_id').value = catID; 
          addPost(); 
        }
 
        function addPost() {   
          document.getElementById('post_id').value = ""; 
          document.getElementById('title').value = "";
          document.getElementById('description').value = ""; 
          document.getElementById('item_code').value = "";
          document.getElementById('item_name').value = "";
          document.getElementById('item_brand').value = "";
          document.getElementById('item_model').value = ""; 

          document.getElementById('item_color').value = "";
          document.getElementById('item_qty').value = "";
          document.getElementById('item_size').value = "";
          document.getElementById('item_width').value = "";
          document.getElementById('item_height').value = "";
          document.getElementById('item_length').value = "";
          document.getElementById('item_weight').value = "";

          document.getElementById('item_tags').value = ""; 
          document.getElementById('price_new').value = "";
          document.getElementById('price_old').value = "";

          document.getElementById('shipping_fee').value = "";
          document.getElementById('shipping_disc').value = "";
 
          $('#category-modal').modal('hide');
          $('#post-modal').modal('show');
        }
      
        function editPost(id) { 
          let _url = '/seller/inventory/'+id; 
          
          $.ajax({
            url: _url,
            type: "GET",
            success: function(response) {
              if(response) { 
                  $("#post_id").val(response.id); 
                  $("#temp_code").val(response.temp_code);
                  $("#temp_code2").val(response.temp_code); 
                  $("#category_id").val(response.category_id);
                  $("#item_code").val(response.item_code);
                  $("#item_name").val(response.item_name);
                  $("#item_brand").val(response.item_brand);
                  $("#item_model").val(response.item_model);
                  $("#item_qty").val(response.item_qty);                  

                  $("#item_color").val(response.item_color);
                  $("#item_size").val(response.item_size);
                  $("#item_width").val(response.item_width);
                  $("#item_height").val(response.item_height);
                  $("#item_length").val(response.item_length);
                  $("#item_weight").val(response.item_weight);

                  $("#price_new").val(response.price_new);
                  $("#price_old").val(response.price_old); 
                  $("#title").val(response.title);
                  $("#title").html(response.title);
                  $("#description").val(response.description);
                  $("#item_tags").val(response.item_tags); 

                  $("#shipping_fee").val(response.shipping_fee); 
                  $("#shipping_disc").val(response.shipping_disc);   
                  sf();
                  $('#post-modal').modal('show'); 
              }
            }
          });
        }

        function loadinventory() {  
            let _url = '/seller/loadinventory'; 
            $.ajax({
                url: _url,
                success: 
                function(result){
                    $('#loadinventory').html(result);   
                }
            });  
        } 
      
        function createPost(x) {
          var title = $('#title').val();
          var description = $('#description').val();

          var category_id = $('#category_id').val();
          var item_code = $('#item_code').val();
          var item_name = $('#item_name').val();
          var item_brand = $('#item_brand').val();
          var item_model = $('#item_model').val(); 
          var item_qty = $('#item_qty').val(); 

          var item_color = $('#item_color').val(); 
          var item_size = $('#item_size').val(); 
          var item_width = $('#item_width').val(); 
          var item_height = $('#item_height').val(); 
          var item_length = $('#item_length').val(); 
          var item_weight = $('#item_weight').val(); 
          
          var item_tags = $('#item_tags').val(); 
          var price_new = $('#price_new').val();
          var price_old = $('#price_old').val();
          var temp_code = $('#temp_code').val();

          var shipping_fee = $('#shipping_fee').val();
          var shipping_disc = $('#shipping_disc').val();
  
          var id = $('#post_id').val();
      
          let _url     = `/seller/inventory`;
          let _token   = $('meta[name="csrf-token"]').attr('content');
      
            $.ajax({
              url: _url,
              type: "POST",
              data: {
                id: id, 
                category_id: category_id,
                item_code: item_code,
                item_name: item_name,
                item_brand: item_brand,
                item_model: item_model, 
                item_qty: item_qty,

                item_color: item_color, 
                item_size: item_size, 
                item_width: item_width, 
                item_height: item_height, 
                item_length: item_length, 
                item_weight: item_weight, 

                price_new: price_new,
                price_old: price_old, 
                title: title,
                description: description,
                item_tags: item_tags,
                temp_code: temp_code,

                shipping_fee: shipping_fee,
                shipping_disc: shipping_disc, 
                _token: _token
              },
              success: function(response) {
                  if(response.code == 200) { 
                    
                    if(x == '1'){ 
                      $('#uploads-modal').modal('show');
                    } 
                    $('#post-modal').modal('hide');
                    
                    loadinventory();
                  }
              },
              error: function(response) {
                $('#titleError').text(response.responseJSON.errors.title);
                $('#descriptionError').text(response.responseJSON.errors.description);
                $('#item_nameError').text(response.responseJSON.errors.item_name); 
                $('#item_brandError').text(response.responseJSON.errors.item_brand);
                $('#item_modelError').text(response.responseJSON.errors.item_model);
 
              }
            });
        }
        
        function sf(){
          var w = $('#item_width').val(); 
          var h = $('#item_height').val(); 
          var l = $('#item_length').val(); 
          var weight = $('#item_weight').val(); 

          var spx = (w * h * l) * .05;
          if(spx<50){spx = 50;}

          if(weight<=2){sp = spx;}
          else if(weight>2){sp = (weight * 10) + spx;}
          else if(weight>5){sp = (weight * 20) + spx;}
          else if(weight>10){sp = (weight * 30) + spx;}
          else if(weight>20){sp = (weight * 40) + spx;}
          else if(weight>30){sp = (weight * 50) + spx;}
          else{sp = (weight * 60) + spx;}
          
          $('#shipping_fee').val(sp.toFixed(2));  
        }
      
        function deletePost(event) {
          var id  = $(event).data("id");
          let _url = '/seller/inventory/'+id;
          let _token   = $('meta[name="csrf-token"]').attr('content');
      
            $.ajax({
              url: _url,
              type: 'DELETE',
              data: {
                _token: _token
              },
              success: function(response) {
                $("#row_"+id).remove();
                loadinventory();
              }
            });
        }
      
      </script>
           
@endsection