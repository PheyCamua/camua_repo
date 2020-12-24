@if(count($feedbacks) > 0)
   
    <div class="overflow-hidden card shadow-md my-3"> 
        <div class="d-flex justify-content-start px-4 pt-4">
            <h4>FEEDBACK 
                @for($i=1; $i<=4;$i++)
                    <i class="fa fa-star stars"></i>
                @endfor 
                (123)
            </h4>
        </div> 
        <hr>
        <div class="px-4"  id="feedback"> 
            @foreach($feedbacks as $feedback)
                <div class="row my-4">
                    <div class="col-md-1 col-3">
                        <img class="rounded-full shadow-md" src="{{ asset('img/user/c.jpg') }}" width="25px"/>   
                    </div>
                    <div class="col-md-11 col-9 rounded shadow-sm"> 
                        <div class="d-flex justify-content-between">
                            <strong>{{ $feedback->screenname }}</strong><br> 
                            <span>
                                @for($i=1; $i<=$feedback->feedback_stars;$i++)
                                    <i class="fa fa-star stars"></i>
                                @endfor
                            </span> 
                        </div> 
                        <div class="feedback">{{ $feedback->feedback_desc }}</div>
                    </div>
                </div><hr>
            @endforeach 
            <div class="d-flex justify-content-end mx-3"><hr>{{$feedbacks->links()}}</div>
        </div> 
        
        <div class="card overflow-hidden shadow-md sm:rounded-md p-4">   
            <textarea class="form-control mb-2" placeholder="Share your comments."></textarea>
            <div class="d-flex justify-content-between"> 
                <span> 
                    <div class="btn btn-outline-primary btn-xs mx-3"><span class="px-2"><i class="fa fa-image p-2"></i> Upload Photo</span></div>
                    <button class="btn sm:rounded-md btn-outline-warning btn-sm w-8 h-8 rounded shadow-md"><i class="fa fa-star"></i></button>
                    <button class="btn sm:rounded-md btn-outline-warning btn-sm w-8 h-8 rounded shadow-md"><i class="fa fa-star"></i></button>
                    <button class="btn sm:rounded-md btn-outline-warning btn-sm w-8 h-8 rounded shadow-md"><i class="fa fa-star"></i></button>
                    <button class="btn sm:rounded-md btn-outline-warning btn-sm w-8 h-8 rounded shadow-md"><i class="fa fa-star"></i></button>
                    <button class="btn sm:rounded-md btn-outline-warning btn-sm w-8 h-8 rounded shadow-md"><i class="fa fa-star"></i></button>
                </span>
                <button class="btn btn-outline-primary btn-sm">Post</button>
            </div>
        </div>
    </div> 
@endif