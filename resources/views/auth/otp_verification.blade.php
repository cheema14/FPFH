@extends('layouts.app')

@section('content')
  
    <div class=" signUp_wrapper">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-lg-7 d-lg-block d-none position-relative h-100 pt-5  align-items-end ">
                    <img src="{{ asset('static/media/login.png') }}" alt="login-img" class="img-fluid  img-section">
                </div>
                <div class="col-lg-4 col-12 d-flex justify-content-center align-items-center mx-md-0 mx-auto">
                    <div class="form-wrapper px-md-0 px-3 w-100" >
                        <div class="text-center mb-3 opt-para">
                            <img src="{{ asset('static/media/lgin-logo.png') }}" width="220">
                            <h3 class="pt-3">{{ __('OTP Verification') }}</h3>
                            <p class="mb-0">OTP code has been sent to your mentioned Email </p>
                            
                        </div>
                        @if(session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form class="login-inner" method="POST" action="{{ route('verify-otp.post') }}"> 
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Crypt::encrypt($userId) }}">
                          <div class="mx-auto">
                                    <div class="d-flex fw-bolder mt-4 justify-content-center">  
                                     </div>
                                     <div id="otp" class="otp-input d-flex flex-row justify-content-center"> 
                                     <input type="text" name="otp" id="otp" class="form-control @error('otp') is-invalid @enderror" value="{{ old('otp') }}" required>
                                        @error('otp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                         <!-- <input class="m-0 text-center form-control " type="text" id="first" maxlength="1" /> 
                                         <input class="m-0 text-center form-control " type="text" id="second" maxlength="1" /> 
                                         <input class="m-0 text-center form-control " type="text" id="third" maxlength="1" /> 
                                         <input class="m-0 text-center form-control " type="text" id="fourth" maxlength="1" />                                    -->
                                     </div>
                                  
                                  <div class="d-flex flex-column justify-content-center py-3">
                                     <p class="lbl_otp text-center">Haven’t received OTP yet?  
                                     <form method="POST" action="{{ route('otp.resend') }}">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ Crypt::encrypt($userId) }}">
                                        <button type="submit" class="btn btn-link text-mehron fw-bold text-decoration-none">Resend OTP</button>
                                      </form>
                                      </p>
                                   </div>
                                
                                  <div class="mt-1 mb-4 px-md-5 mx-md-5">
                                  <button type="submit" class="btn btn-primary w-100">
                                        {{ __('Verify OTP') }}
                                    </button>
                                     
                                  </div>
                                    
                                </div>
                               


                            <!-- Sign In Link -->
                            <div class="login-inner text-center mt-3">
                               New User? <a href="{{ route('register') }}" class="sign-a text-decoration-none">Register Now</a>
                            </div>
                        </form>
                        
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
@endsection
