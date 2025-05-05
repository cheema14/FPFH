@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Complete Your Profile
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(app()->environment('local'))
                        <div class="alert alert-info">
                            Current Contact: {{ $profile->focal_person_contact }}<br>
                            Formatted Contact: {{ $profile->formatted_contact }}
                        </div>
                    @endif

                    <form class="login-inner login-inner-prfile" method="POST" action="{{ route('profile.complete.submit') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="required">Registration Document</label>
                                    <div class="input-group">
                                        @if($profile && $profile->registration_document)
                                            <div class="d-flex w-100">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <a href="{{ asset('storage/' . $profile->registration_document) }}" 
                                                           target="_blank" 
                                                           class="btn btn-primary">
                                                             View Current Document
                                                        </a>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" 
                                                               class="custom-file-input {{ $errors->has('registration_document') ? 'is-invalid' : '' }}" 
                                                               id="registration_document" 
                                                               name="registration_document" 
                                                               accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                                                        <label class="custom-file-label" for="registration_document">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="custom-file">
                                                <input type="file" 
                                                       class="custom-file-input {{ $errors->has('registration_document') ? 'is-invalid' : '' }}" 
                                                       id="registration_document" 
                                                       name="registration_document" 
                                                       accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" 
                                                       required>
                                                <label class="custom-file-label" for="registration_document">Choose file</label>
                                            </div>
                                        @endif
                                    </div>
                                    @if($errors->has('registration_document'))
                                        <div class="invalid-feedback d-block">
                                            {{ $errors->first('registration_document') }}
                                        </div>
                                    @endif
                                    <small class="form-text text-muted">
                                        Accepted formats: PDF, DOC, DOCX, JPG, JPEG, PNG (max size: 10MB)
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="required" for="focal_person_contact">Focal Person Contact</label>
                                    <input type="text" 
                                           name="focal_person_contact" 
                                           id="focal_person_contact" 
                                           class="form-control {{ $errors->has('focal_person_contact') ? 'is-invalid' : '' }}" 
                                           value="{{ old('focal_person_contact', $profile->focal_person_contact ?? '') }}" 
                                           placeholder="+92-XXX-XXXXXXX"
                                           required>
                                    @if($errors->has('focal_person_contact'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('focal_person_contact') }}
                                        </div>
                                    @endif
                                    <small class="form-text text-muted">Format: +92-XXX-XXXXXXX</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="required" for="website">Website</label>
                                    <input type="url" name="website" id="website" 
                                        class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" 
                                        value="{{ old('website', $profile->website ?? '') }}" required>
                                    @if($errors->has('website'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('website') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="required" for="youtube">YouTube</label>
                                    <input type="url" name="youtube" id="youtube" 
                                        class="form-control {{ $errors->has('youtube') ? 'is-invalid' : '' }}" 
                                        value="{{ old('youtube', $profile->youtube ?? '') }}" required>
                                    @if($errors->has('youtube'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('youtube') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="required" for="instagram">Instagram</label>
                                    <input type="url" name="instagram" id="instagram" 
                                        class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" 
                                        value="{{ old('instagram', $profile->instagram ?? '') }}" required>
                                    @if($errors->has('instagram'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('instagram') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="required" for="facebook">Facebook</label>
                                    <input type="url" name="facebook" id="facebook" 
                                        class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" 
                                        value="{{ old('facebook', $profile->facebook ?? '') }}" required>
                                    @if($errors->has('facebook'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('facebook') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="required" for="linkedin">LinkedIn</label>
                                    <input type="url" name="linkedin" id="linkedin" 
                                        class="form-control {{ $errors->has('linkedin') ? 'is-invalid' : '' }}" 
                                        value="{{ old('linkedin', $profile->linkedin ?? '') }}" required>
                                    @if($errors->has('linkedin'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('linkedin') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="required" for="activity_preference">Activity Preference</label>
                                    <select name="activity_preference" id="activity_preference" class="form-control" required>
                                        <option value="" disabled {{ old('activity_preference', $profile->activity_preference ?? '') == '' ? 'selected' : '' }}>Select Activity Preference</option>
                                        <option value="1" {{ old('activity_preference', $profile->activity_preference ?? '') == 1 ? 'selected' : '' }}>Physical Venue</option>
                                        <option value="2" {{ old('activity_preference', $profile->activity_preference ?? '') == 2 ? 'selected' : '' }}>Online Platforms</option>
                                    </select>
                                    @if($errors->has('activity_preference'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('activity_preference') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">
                                Save Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .required:after {
        content: " *";
        color: red;
    }
</style>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Update file input label with selected filename
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').html(fileName);
        });

        $('#focal_person_contact').inputmask({
            mask: '+92-999-9999999',
            placeholder: 'X',
            showMaskOnHover: false
        });
    });
</script>
@endsection 