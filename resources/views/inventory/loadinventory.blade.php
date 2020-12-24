<div class="card py-4">
    <table class="table table-hover table-bordered dt-responsive" data-order="[[1,&quot;desc&quot;]]" id="tbl1">
        <col width="5%">
        <thead>
            <tr>
                <th></th> 
                <th>Item Code</th> 
                <th>Category</th>
                <th>Item</th>
                <th>On Stock</th>
                <th>Brand</th>
                <th>Color</th>
                <th>Size</th>
                <th>Model</th>
                <th>Price</th>
                <th>Old Price</th>                         
                <th></th> 
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
 
                <tr id="row_{{$post->id}}">
                    <td><a href="/view/{{ $post->temp_code }}"><img src="/uploads/{{ $post->temp_code }}/{{ $post->imglink }}" width="35px"></a></td>
                    <td>{{ $post->item_code }}</td> 
                    <td>{{ $post->category }}</td>
                    <td>{{ $post->item_name }}</td>
                    <td>{{ $post->item_qty }}</td>
                    <td>{{ $post->item_brand }}</td>
                    <td>{{ $post->item_color }}</td>
                    <td>{{ $post->item_size }}</td>
                    <td>{{ $post->item_model }}</td>
                    <td>{{ $post->price_new }}</td>
                    <td>{{ $post->price_old }}</td>
                    <td  class="text-center">
                        <button onclick="editPost({{ $post->id }})" class="btn btn-outline-primary btn-sm rounded-md"><i class="fa fa-pencil-alt"></i></button>
                        <button onclick="deletePost({{ $post->id }})" class="btn btn-outline-danger btn-sm rounded-md"><i class="fa fa-times"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>