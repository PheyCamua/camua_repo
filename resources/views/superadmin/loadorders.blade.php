<div class="card card-body">
    <table class="table table-hover table-bordered dt-responsive" data-order="[[1,&quot;desc&quot;]]" id="tbl1">
        <col width="5%">
        <thead>
            <tr>
                <th>Order ID</th> 
                <th>Tracking ID</th> 
                <th>Item</th> 
                <th>Qty</th> 
                <th>Variation</th> 
                <th>Order Status</th>                          
                <th></th> 
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr id="row_{{$order->id}}"> 
                    <td>{{$order->id}}</td>
                    <td></td>
                    <td></td>
                    <td></td> 
                    <td></td>
                    <td></td>
                    <td class="text-center">
                        <button onclick="editPost({{ $order->id }})" class="btn btn-outline-primary btn-sm rounded-md"><i class="fa fa-pencil-alt"></i></button>
                        <button onclick="deletePost({{ $order->id }})" class="btn btn-outline-danger btn-sm rounded-md"><i class="fa fa-times"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>