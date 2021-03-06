<h4>Flash Sale</h4>   
<div class="row">  
    @foreach($flashsale as $fs)
        @php
            $np = $fs->price_new;
            $op = $fs->price_old;
            $discount = ($op - $np) / $op*100;
            $disc = number_format($discount,0,'','');
        @endphp 
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 p-1">
            <a href="/view/{{ $fs->temp_code }}">
                <div class="overflow-hidden card shadow-md">
                    <div class="item-img"><img src="/uploads/{{ $fs->temp_code }}/{{ $fs->imglink }}"></div>
                    <div class="p-2">
                        <div class="r2">{{ $fs->title }}</div> 
                        <div class="newprice">P{{ number_format($fs->price_new,'2','.',',') }}</div>
                        <span class="oldprice">P{{ number_format($fs->price_old,'2','.',',') }}</span><span class="discount mx-2">{{ $disc }}%</span>
                    </div> 
                </div>
            </a>
        </div>  
    @endforeach  
</div>