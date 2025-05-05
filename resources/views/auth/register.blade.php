@extends('layouts.app')

@section('content')

<style>
    .login-inner .form-control, .form-select{
        background-color: #fff;
    border-radius: 10px;
    padding-block: inherit;
    border: 0px;
    }
    </style>

<!-- Bootstrap Modal -->
<div class="modal fade" id="resendVerificationModal" tabindex="-1" aria-labelledby="resendVerificationLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resendVerificationLabel">Resend Verification Email</h5>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i> <!-- Close icon -->
                </button>
            </div>
            <div class="modal-body">
                <form id="resendVerificationForm" action="{{ route('resend-verification-email') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="user_email" required placeholder="Enter your email" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Resend Email</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Button to Trigger Modal -->




 <div class=" signUp_wrapper">
        <div class="container-fluid h-100">
            <div class="row h-100">
            <div class="col-lg-6 d-lg-block d-none position-relative pt-5  align-items-end " >
                                    
                                    <img src="{{ asset('static/media/cm.png') }}" alt="login-img" class="img-fluid  img-section">
                                </div>
                <div class="col-lg-6 col-12 mx-md-0 mx-auto right_lbl mt-4">
                    <div class="form-wrapper px-md-0 px-3 w-100">
                        <div class="register-inner mb-3">
                            <img class="logo_main" src="{{ asset('static/media/logo.svg') }}" width="220">
                            <h3 class="pt-3">{{ __('Register') }}</h3>
                        </div>

                        @if(session('notExist'))
                            <div class="alert alert-danger" role="alert">
                                {!! session('notExist') !!}
                            </div>
                        @endif
                        
                        @if(session('alreadyVerified'))
                            <div class="alert alert-danger" role="alert">
                                {!! session('alreadyVerified') !!}
                            </div>
                        @endif
                        
                        @if(session('emailSent'))
                            <div class="alert alert-success" role="alert">
                                {!! session('emailSent') !!}
                            </div>
                        @endif

                        <form class="register-inner " method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                        <div class="col-md-12 form-group mb-2">
                        <label for="cnic" class="col-form-label mb-2">CNIC No * <span class="urdu-lbl"> قومی شناختی کارڈ نمبر </span></label>
                            <input type="text" name="cnic" id="cnic" class="form-control form-control-lg @error('cnic') is-invalid @enderror" value="{{ old('cnic') }}" required placeholder="Enter your CNIC (e.g., 12345-1234567-1)" maxlength="15">
                            @error('cnic')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Full Name Field -->
                        <div class="col-md-6 form-group mb-2">
                        <label for="focal_person_name" class="col-form-label mb-2">Full Name * <span class="urdu-lbl"> مکمل نام </span></label>
                            <input type="text" name="focal_person_name" id="focal_person_name" class="form-control form-control-lg @error('focal_person_name') is-invalid @enderror" value="{{ old('focal_person_name') }}" maxlength="75" required placeholder="Enter your full name">
                            @error('focal_person_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                         <!-- Focal Person Email -->
                         <div class="col-md-6 form-group mb-2">
                         <label for="focal_person_email" class="col-form-label mb-2">Email * <span class="urdu-lbl"> ای میل</span></label>
                            <input type="email" name="focal_person_email" id="focal_person_email" maxlength="100" class="form-control form-control-lg @error('focal_person_email') is-invalid @enderror" value="{{ old('focal_person_email') }}" required placeholder="Enter email">
                            @error('focal_person_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Telecom Company Selection -->
                        <div class="col-md-6 form-group mb-2">
                            <label for="telecom_company" class="col-form-label mb-2">
                                Telecom Company * <span class="urdu-lbl"> ٹیلی کام کمپنی</span>
                            </label>
                            <select name="telecom_company" id="telecom_company" class="form-control form-control-lg @error('telecom_company') is-invalid @enderror" required>
                                <option value="">Select a telecom company</option>
                                @foreach($telecomCompanies as $company)
                                    <option value="{{ $company->id }}" {{ old('telecom_company') == $company->id ? 'selected' : '' }}>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('telecom_company')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Contact Number Field -->
                        <div class="col-md-6 form-group mb-2">
                        <label for="contact_number" class="col-form-label mb-2">Contact Number * <span class="urdu-lbl"> رابطہ نمبر</span></label>                            
                            <input type="text" name="contact_number" id="contact_number" class="form-control form-control-lg @error('contact_number') is-invalid @enderror" value="{{ old('contact_number') }}" required placeholder="Enter your contact number (e.g., 0300-1234567)" maxlength="12">
                            @error('contact_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <!-- Registration Document Upload -->
                       

                      

                        <div class="col-md-6 form-group mb-2">
                        <label for="password" class="col-form-label mb-2">Password * <span class="urdu-lbl"> پاس ورڈ</span></label>                            
                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter your password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group mb-2">
                        <label for="password-confirm" class="col-form-label mb-2">Confirm Password * <span class="urdu-lbl"> پاس ورڈ کی تصدیق کریں</span></label>
                            <input id="password-confirm" type="password" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Enter password confirmation">
                        </div>
                        
                        </div>
                       
                      
                        <div class="form-group mb-2 mt-2">
                            
                                <button type="submit" class="btn btn-primary w-100" onclick="this.disabled=true; this.innerHTML='<span class=\'spinner-border spinner-border-sm\' role=\'status\' aria-hidden=\'true\'></span> Loading...'; this.form.submit();">
                                    {{ __('Register') }}
                                </button>
                           
                        </div>
                        <div class="form-group mt-3 text-center">
                            <p>Already a User? <a  class="sign-a" href="{{ route('login') }}">Sign In</a></p>
                        </div>
                        <div class="form-group mt-3 mb-2 text-center">
                        <p class="urdu-lbl pb-2 m-0"> پہلے سے رجسٹرڈ ہیں، لیکن تصدیق نہیں ہوئی؟</p>
                            <p>Already registered but didn't verified? <br> <button type="button" class="btn btn-primary mt-1 mb-2" data-bs-toggle="modal" data-bs-target="#resendVerificationModal">
                                                                            Resend Verification Email
                                                                        </button>
</p>
                        </div>
                    </form>
                        
                    </div>
                    
                </div>
              
            </div>
            
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    
<!-- Bootstrap JavaScript (Ensure you include this for modal functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Check if the CNIC input exists before adding the mask
            const cnicInput = document.getElementById("cnic");
            if (cnicInput) {
                // Masking for CNIC input
                $(cnicInput).mask('99999-9999999-9'); // Assuming jQuery Mask Plugin is used
            }
            // Check if the contact number input exists before adding the mask
            const contactInput = document.getElementById("contact_number");
            if (contactInput) {
                // Set the placeholder to show the format
                contactInput.placeholder = '03##-#######'; // Set placeholder with new format
                // Masking for contact number input according to new format
                $(contactInput).mask('03##-#######'); // Adjust the mask for the new format

            }
        });
    </script>
    
@endsection
