{{-- CATEGORY --}}
<div class="modal fade" id="category-modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Category</h4><button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body"> 
                <ul class="list-none">
                    @foreach($categories as $category)
                        <li onclick="selthis(this.id)" id="{{ $category->id }}">
                            <img src="/img/category/{{ $category->category_image }}" width="30px">
                            <span class="my-1 px-2">{{ $category->category }}</span>
                        </li> 
                    @endforeach
                </ul> 
            </div> 
      </div>
    </div>
</div>

{{-- ITEM --}} 
@php 
    $temp_code = rand(1,1000000) .'-'. time(); 
@endphp
 
    <div class="modal fade" id="post-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="title">Add Item</h4><button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body h-80-scroll">
                    <div class="">
                        <form name="ItemForm" class="form-horizontal">  
                            {{Form::hidden('temp_code', $temp_code,['id'=>'temp_code'])}}
                            <input type="hidden" id="post_id" name="post_id">
                            <input type="hidden" id="category_id" name="category_id">  

                            <div class="form-group row">
                                <label for="item_code" class="col-sm-2">Code</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="item_code" name="item_code">
                                    <span id="item_codeError" class="alert-message"></span>
                                </div>

                                <label for="item_code" class="col-sm-2 req">Quantity</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" id="item_qty" name="item_qty" required> 
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="item_name" class="col-sm-2 req">Item Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="item_name" name="item_name" required>
                                    <span id="item_nameError" class="alert-message"></span>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="item_brand" class="col-sm-2">Brand</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="item_brand" name="item_brand" >
                                    <span id="item_brandError" class="alert-message"></span>
                                </div> 
                                <label for="item_model" class="col-sm-2">Model</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="item_model" name="item_model">
                                    <span id="item_modelError" class="alert-message"></span>
                                </div>
                            </div>  


                            
                            <div class="form-group row">
                                <label for="item_tags" class="col-sm-2 req">Color</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="item_color" name="item_color" required> 
                                </div> 
                                <label for="item_tags" class="col-sm-2">Item Size</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="item_size" name="item_size" placeholder="S,M,L,XL"> 
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="item_tags" class="col-sm-2 req">Price</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" id="price_new" name="price_new" required> 
                                </div> 
                                <label for="item_tags" class="col-sm-2 req">Old Price</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" id="price_old" name="price_old" required> 
                                </div>
                            </div> 
                            <hr>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 req">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
                                    <span id="titleError" class="alert-message"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 req">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="description" name="description" placeholder="Enter description" rows="3" cols="50" required> </textarea>
                                    <span id="descriptionError" class="alert-message"></span>
                                </div>
                            </div>

                            
                            <hr>
                            <h4><strong>Packaging / Shipping</strong></h4>

                            <div class="form-group row">
                                <label for="item_tags" class="col-sm-2 ">Package Measurements</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control req" id="item_width" name="item_width" placeholder="Width (in)" onchange="sf()" required> 
                                    <span class="text-muted font11">Width (inches)</span>
                                </div>  
                                <div class="col-sm-2">
                                    <input type="number" class="form-control req" id="item_length" name="item_length" placeholder="Length (in)" onchange="sf()" required> 
                                    <span class="text-muted font11">Length (inches)</span>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control req" id="item_height" name="item_height" placeholder="Height (in)" onchange="sf()" required> 
                                    <span class="text-muted font11">Height (inches)</span>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control req" id="item_weight" name="item_weight" placeholder="Weight (kg)" onchange="sf()" required> 
                                    <span class="text-muted font11">Weight (kg)</span>
                                </div>
                            </div> 
                            <div class="form-group row"> 
                                <label for="shipping_fee" class="col-sm-2 req">Fee</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" id="shipping_fee" name="shipping_fee" readonly required> 
                                </div> 
                                <label for="shipping_disc" class="col-sm-2 req">Discount</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" id="shipping_disc" name="shipping_disc" value="0" required> 
                                </div>
                            </div> 
                            <hr>
                            <div class="form-group row">
                                <label for="item_tags"  class="col-sm-2">Tags</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="item_tags" name="item_tags"> <span class="text-muted">(Separate tags with comma)</span>
                                    <span id="item_tagsError" class="alert-message"></span>
                                </div>
                            </div>
                        </form> 
                    </div> 
                </div>   
                
                <div class="modal-footer">  
                    <button type="button" class="btn btn-primary" onclick="createPost('1')">Next, Upload Photos</button>
                    <button type="button" class="btn btn-danger" onclick="createPost()">Save &amp; Exit</button>
                </div>
            </div>
        </div>
    </div>
 
    <div class="modal fade" id="uploads-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload Photos</h4><button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                {!! Form::open(['action' => 'PostController@upload', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                 @csrf
                    <div class="modal-body"> 
                        {{Form::hidden('temp_code', $temp_code,['id'=>'temp_code2'])}}

                        <div class="container">   
                            <span class="text-muted">Select at least 3 actual photos of your product.</span>        
                            <div class="form-group row">           
                                <input type="file" name="files[]" multiple="multiple"  class="btn btn-gray" required="required"/>    
                                <span class="text-muted">Up to 1MB each [PNG, JPG, JPEG]</span> 
                            </div>  
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Upload</button> 
                    </div>
                {!! Form::close() !!}  
            </div>
        </div>
    </div>
