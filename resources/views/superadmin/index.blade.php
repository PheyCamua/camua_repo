@extends('layouts.superadmin')

@section('content')   
    <div class="row" id="loadorders">
        <h4>ORDERS</h4>
        <div class="col-12">
            @include('orders.loadorders') 
        </div>
    </div>   
@endsection