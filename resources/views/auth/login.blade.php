@extends('layouts.app')
@section('content')

<div class=" signUp_wrapper">
        <div class="container-fluid h-100">
            <div class="row h-100">
            <div class="col-lg-6 d-lg-block d-none position-relative h-100 pt-5  align-items-end ">
                     <img src="{{ asset('static/media/cm.png') }}" alt="login-img" class="img-fluid  img-section">
                </div>
            <div class="col-lg-6 col-12 right_lbl mx-md-0 mx-auto mt-4">
                    <div class="form-wrapper px-md-0 px-3 w-100">
                        <div class="login-inner">
                        <div class="text-center- mb-3">
                            <img class="logo_main" src="{{ asset('static/media/logo.svg') }}" width="220">
                            <div class="login_lbl">                     
                                <h3 class="pt-3">Login </h3>
                            </div>                                                       
                        </div>
                        @if (session('status_en'))
                            <div class="alert alert-success">
                                <p>{{ session('status_en') }}</p>
                            </div>
                        @endif

                        @if (session('status_ur'))
                            <div class="alert alert-success" dir="rtl">
                                <p><span class="urdu-lbl"> {{ session('status_ur') }} </span></p>
                            </div>
                        @endif
                        <!-- Display session messages -->
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {!! session('status') !!}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        </div>
                       
                    <form class="login-inner" method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="mb-2">
                        <label for="full_name" class="col-form-label mb-2">Email <span class="urdu-lbl"> ای میل </span></label>
                           <input id="email" name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                        </div>

                        <!-- Password with Eye Icon -->
                        <div class="mb-2">
                        <label for="full_name" class="col-form-label mb-2">Password <span class="urdu-lbl"> پاس ورڈ </span></label>
                            <div class="input-group">
                                <input id="passwordInput" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
                                <span class="input-group-text" id="togglePassword">
                                    <i class="fa-solid fa-eye"></i>
                                </span>
                            </div>
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check form-switch">
                               <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="remember">
                                <label class="form-check-label" for="flexSwitchCheckDefault">{{ trans('global.remember_me') }}</label>
                            </div>
                                <a href="{{ route('password.request') }}" class="text-decoration-none forgot">{{ trans('global.forgot_password') }}</a>
                            </div>
                        

                        <!-- CAPTCHA Section -->
                        <div class="mb-2">
                            <label class="form-label">CAPTCHA</label>
                            <div class="input-group">
                                <img src="{{ captcha_src() }}" alt="CAPTCHA" class="captcha-image">
                                <input id="captcha" name="captcha" type="text" class="form-control" required placeholder="Enter CAPTCHA">
                            </div>
                            @if($errors->has('captcha'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('captcha') }}
                                </div>
                            @endif
                            <button type="button" class="btn btn-link" onclick="refreshCaptcha()">Refresh CAPTCHA</button>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100" onclick="this.disabled=true; this.innerHTML='<span class=\'spinner-border spinner-border-sm\' role=\'status\' aria-hidden=\'true\'></span> Loading...'; this.form.submit();">
                            {{ trans('global.login') }}
                        </button>

                        <!-- Sign In Link -->
                        <div class="text-center mt-3 mb-3">
                           New User? <a href="{{ route('register') }}" class="sign-a">Register Now</a>
                        </div>
                    </form>
                        
                    </div>
                    
                </div>
               
                
            </div>
            
        </div>
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Password Visibility Toggle
        document.getElementById('togglePassword').addEventListener('click', function() {
            let passwordInput = document.getElementById('passwordInput');
            let icon = this.querySelector('i');
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                passwordInput.type = "password";
                icon.classList.replace("fa-eye-slash", "fa-eye");
            }
        });
        // Trigger file input click event when the icon is clicked
        document.querySelector('.input-group-text').addEventListener('click', function() {
            document.getElementById('fileInput').click();
        });
    });

    function refreshCaptcha() {
        // Update the CAPTCHA image source to a new one
        document.querySelector('.captcha-image').src = '{{ captcha_src() }}' + '?' + new Date().getTime();
    }
</script>
@endsection