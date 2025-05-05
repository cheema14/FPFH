@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mx-4">
            <div class="card-body p-4">
                <h1>{{ trans('panel.site_title') }}</h1>

                <p class="text-muted">{{ trans('global.reset_password') }}</p>

                <form method="POST" action="{{ route('password.request') }}">
                    @csrf

                    <input name="token" value="{{ $token }}" type="hidden">

                    <div class="form-group">
                        <input id="email" type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ $email ?? old('email') }}">

                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" name="password" class="form-control" required placeholder="{{ trans('global.login_password') }}">

                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="password-confirm" type="password" name="password_confirmation" class="form-control" required placeholder="{{ trans('global.login_password_confirmation') }}">
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">
                                {{ trans('global.reset_password') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    
<!-- Bootstrap JavaScript (Ensure you include this for modal functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password must be at least 8 characters, contain 1 number, 1 uppercase, and 1 special character
const passwordRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*]{8,}$/;

document.querySelector('form').addEventListener('submit', function(e) {
    const password = document.getElementById('password').value;
    const confirm = document.getElementById('password-confirm').value;

    let errors = [];

    if (!passwordRegex.test(password)) {
        errors.push("Password must be at least 8 characters and include at least one uppercase letter, one number, and one special character (!@#$%^&*).");
    }

    if (password !== confirm) {
        errors.push("Password and confirmation do not match.");
    }

    if (errors.length > 0) {
        e.preventDefault(); // stop form submission

        // Clear previous messages
        const existing = document.querySelector(".custom-error");
        if (existing) existing.remove();

        const errorDiv = document.createElement("div");
        errorDiv.className = "alert alert-danger custom-error mt-3";
        errorDiv.innerHTML = errors.join("<br>");
        document.querySelector(".card-body").appendChild(errorDiv);
    }
});

    </script>
@endsection