@extends('layouts.nonav')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-12">
            <div class="card my-5"> 

                <div class="card-body font-weight-bold"> 
                    <div class="text-center my-3"> 
                        <img src="/img/logo.png" width="100px"> 
                    </div> 
                    <hr>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf 

                        <div class="form-group row"> 
                            <label class="col-md-4 px-3 text-md-right"></label>
                            <div class="col-md-6 "> 
                                <input type="hidden" value="customer" id="user_type" name="user_type">
                                <div onclick="sel('Customer')" class="btn btn-primary" id="u1"><span id="c1" class=""><i class="fa fa-check"></i></span> CUSTOMER</div> 
                                <div onclick="sel('Seller')" class="btn btn-outline-primary" id="u2"><span id="c2" class="hidden"><i class="fa fa-check"></i></span> SELLER</div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 px-3 text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 px-3 text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobileno" class="col-md-4 px-3 text-md-right">{{ __('Mobile No.') }}</label>

                            <div class="col-md-6">
                                <input id="mobileno" type="text" class="form-control @error('mobileno') is-invalid @enderror" name="mobileno" value="{{ old('mobileno') }}" required autocomplete="mobileno" autofocus>

                                @error('mobileno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 px-3 text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 px-3 text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 px-3 text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div>
                            <label> <input type="checkbox" name="user_agreement" required> I agree to Terms & Conditions.</label>
                        </div><hr>  
                        <div class="d-flex justify-content-between"> 
                            <a href="login" class="my-2">Already registered? LOGIN</a>
                            <button type="submit" class="btn btn-outline-primary btn-md">
                                {{ __('Register') }}
                            </button>   
                        </div>
                         
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function sel(i){
        $('#user_type').val(i);
        if(i == 'Seller'){
            document.getElementById('u1').classList.remove('btn-primary');
            document.getElementById('u1').classList.add('btn-outline-primary');
            document.getElementById('u2').classList.remove('btn-outline-primary');
            document.getElementById('u2').classList.add('btn-primary');
            document.getElementById('c1').classList.add('hidden');

            document.getElementById('c1').classList.add('hidden');
            document.getElementById('c2').classList.remove('hidden');
        }
        else{
            document.getElementById('u2').classList.remove('btn-primary');
            document.getElementById('u2').classList.add('btn-outline-primary');
            document.getElementById('u1').classList.remove('btn-outline-primary');
            document.getElementById('u1').classList.add('btn-primary');
            
            document.getElementById('c2').classList.add('hidden');
            document.getElementById('c1').classList.remove('hidden');
        }
        
    }
</script>
@endsection
