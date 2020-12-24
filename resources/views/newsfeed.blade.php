@extends('layouts.app')

@section('content')
 {{-- 2ND COLUMN --}}
<div class="col-md-6">
    <div class="card overflow-hidden shadow-md sm:rounded-md my-4 p-2 py-4 ">  
        
        <textarea class="form-control mb-2" placeholder="Share your thoughts with us."></textarea>
        <div class="d-flex justify-content-between">
            <i class="fa fa-image p-2"></i> 
            <button class="btn btn-outline-primary btn-sm">Post</button>
        </div>
    </div>
    <div class=" profile-section">
        @for ($i = 0; $i < 5; $i++)
            <div class="card overflow-hidden shadow-md sm:rounded-md my-3 p-2">
                <div class="d-flex justify-content-between">
                    <div class="row"><img src="{{ asset('img/user/d.jpg') }}" class="rounded-full object-cover shadow-md" width="30px"> <span class="px-2"> Username</span></div>
                    <button class="btn  btn-sm  w-8 h-8  "><i class="fa fa-ellipsis-h"></i></button>
                </div>   <hr>
                <span class="pb-2">
                    test testtest test test test  testtesttesttest testtesttest
                </span>
                <div class="banner shadow-md sm:rounded-md"></div> 

                <hr> 
                    <div class="d-flex justify-content-left">
                        <button class="btn sm:rounded-md btn-outline-danger btn-sm w-8 h-8 object-cover shadow-md mx-1"><i class="fa fa-heart"></i></button>
                        <button class="btn sm:rounded-md btn-outline-warning btn-sm w-8 h-8 object-cover shadow-md mx-1"><i class="fa fa-laugh"></i></button>                        
                        <button class="btn sm:rounded-md btn-outline-info btn-sm w-8 h-8 object-cover shadow-md mx-1"><i class="fa fa-thumbs-up"></i></button>
                        <button class="btn sm:rounded-md btn-outline-secondary btn-sm w-8 h-8 object-cover shadow-md mx-1"><i class="fa fa-thumbs-down"></i></button>                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-10 col-8"><textarea class="form-control fwidth object-cover shadow-md" rows="1"></textarea></div>
                        <button class="btn btn-outline-primary h-8 btn-xs shadow-md col-md-2 col-4 btn-xs">Comment</button>  
                    </div>  
            </div>
        @endfor
        <button class="btn btn-block btn-outline-primary see-more" data-page="2" data-link="?page=" data-div="#posts">See more</button> 
    </div> 
</div> 
           
@endsection
