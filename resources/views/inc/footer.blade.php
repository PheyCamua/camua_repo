@php  
    if(empty($_COOKIE['session_code'])){
        setcookie('session_code', time() .'_'.rand(1000,10000000), time()+(86400), "/"); 
    } 
    $session_code = $_COOKIE['session_code'];
@endphp 
<input type="hidden" value="{{ $session_code ?? '' }}" id="session_code" readonly>
<footer class="footer mt-auto py-3 shadow-sm bg-dark2">
    <div class="container py-4 ">
       <div class="row">
           <div class="col-md-4">
                <h4>Customer Support</h4>
                <ul class="list-footer">
                    <li>Help Center</li>
                    <li>How it Works</li>
                    <li>How to Buy</li>
                    <li>How to Return</li>
                    <li>Contact Us</li>
                </ul>
           </div>

           <div class="col-md-4">
                <h4>Avant</h4>
                <ul class="list-footer">
                    <li>About Avant</li>
                    <li>Affiliate Program</li>
                    <li>Privacy Policy</li>
                    <li>Terms &amp; Conditions</li>
                    <li>Intellectual Property Protection</li>
                </ul>
            </div>

            <div class="col-md-4">
                <h4>Get in Touch with Us</h4>
                <ul class="list-footer">
                    <li>inquire@avant.sj</li>
                    <li>0916-0000-000</li>
                    <li>Facebook</li>
                    <li>Instagram</li>
                    <li>Youtube</li>
                </ul>
            </div>
       </div>

       <hr>
        <div class="d-flex justify-content-center pt-3 "> <img src="{{ asset('img/logo.png') }}"> </div> 
        <div class="d-flex justify-content-center pt-3 "> <h3>AVANT</h3> </div>  
        <div class="d-flex justify-content-center pb-3 "> Copyright &copy; 2020. Phey Camua. All rights reserved.</div>  

    </div>
      
</footer>