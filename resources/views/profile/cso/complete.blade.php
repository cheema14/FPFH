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
                    <form class="login-inner login-inner-prfile" method="POST" action="{{ route('cso.profile.complete.submit') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                        <div class="col-md-4">
                                <div class="form-group">
                                    <label class="required" for="organization_name">Organization Name</label>
                                    <input type="text" 
                                           name="organization_name" 
                                           id="organization_name" 
                                           class="form-control {{ $errors->has('organization_name') ? 'is-invalid' : '' }}" 
                                           value="{{ old('organization_name', $profile->organization_name ?? '') }}" 
                                           placeholder="Enter Organization Name"
                                           required>
                                    @if($errors->has('organization_name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('organization_name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
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
                                                            <i class="fas fa-eye"></i> View Current Document
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

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="required" for="wdc_collaboration_id">WDC Collaboration</label>
                                    <select name="wdc_collaboration_id" id="wdc_collaboration_id" 
                                        class="form-control {{ $errors->has('wdc_collaboration_id') ? 'is-invalid' : '' }}" 
                                        required>
                                        <option value="">Select Collaboration</option>
                                        @foreach($wdcCollaborations as $collaboration)
                                            <option value="{{ $collaboration->id }}" 
                                                {{ (old('wdc_collaboration_id', $profile->wdc_collaboration_id) == $collaboration->id) ? 'selected' : '' }}>
                                                {{ $collaboration->collaboration_range }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('wdc_collaboration_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('wdc_collaboration_id') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="required">Areas of Expertise</label>
                                    <select class="form-control select2-expertises" name="expertises[]" multiple="multiple" required>
                                        @foreach($expertises as $expertise)
                                            <option value="{{ $expertise->id }}" 
                                                {{ (in_array($expertise->id, old('expertises', $profile->expertiseAreas->pluck('expertise_area_id')->toArray() ?? []))) ? 'selected' : '' }}>
                                                {{ $expertise->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('expertises'))
                                        <div class="invalid-feedback d-block">
                                            {{ $errors->first('expertises') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="required">Type of Activities</label>
                                    <select class="form-control select2-activities" name="activities[]" multiple="multiple" required>
                                        @foreach($activities as $activity)
                                            <option value="{{ $activity->id }}" 
                                                {{ (in_array($activity->id, old('activities', $profile->activities->pluck('activity_id')->toArray() ?? []))) ? 'selected' : '' }}>
                                                {{ $activity->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('activities'))
                                        <div class="invalid-feedback d-block">
                                            {{ $errors->first('activities') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="required">Facilities</label>
                                    <select class="form-control select2-facilities" name="facilities[]" multiple="multiple" required>
                                        @foreach($facilities as $facility)
                                            <option value="{{ $facility->id }}" 
                                                {{ (in_array($facility->id, old('facilities', $profile->facilities->pluck('facility_id')->toArray() ?? []))) ? 'selected' : '' }}>
                                                {{ $facility->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('facilities')) 
                                        <div class="invalid-feedback d-block">
                                            {{ $errors->first('facilities') }}
                                        </div>
                                    @endif
                                </div>  
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="required text-muted">Working Divisions</label>
                                    <select class="form-control select2-divisions" name="divisions[]" multiple="multiple" required>
                                        @foreach($divisions as $division)
                                            <option value="{{ $division->id }}" 
                                                {{ in_array($division->id, $profile->divisions->pluck('division_id')->toArray()) ? 'selected' : '' }}>
                                                {{ $division->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('divisions'))
                                        <div class="invalid-feedback d-block">
                                            {{ $errors->first('divisions') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="required text-muted">Working Districts</label>
                                    <select class="form-control select2-districts" name="districts[]" multiple="multiple" required>
                                        <!-- Districts will be populated dynamically -->
                                    </select>
                                    @if($errors->has('districts'))
                                        <div class="invalid-feedback d-block">
                                            {{ $errors->first('districts') }}
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

<div class="modal fade" id="addSlotModal" tabindex="-1" role="dialog" aria-labelledby="addSlotModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSlotModalLabel">Add Date Slot</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addSlotForm">
                    <div class="form-group">
                        <label for="from_date">From Date</label>
                        <input type="date" class="form-control" id="from_date" name="from_date" required>
                    </div>
                    <div class="form-group">
                        <label for="to_date">To Date</label>
                        <input type="date" class="form-control" id="to_date" name="to_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Slot</button>
                </form>
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

        // Initialize Select2 for divisions
        $('.select2-divisions').select2({
            placeholder: 'Select Divisions',
            allowClear: true
        });

        // Initialize Select2 for districts
        $('.select2-districts').select2({
            placeholder: 'First select divisions',
            allowClear: true
        });

        // Store the selected districts for preservation
        let selectedDistricts = {!! json_encode($profile->districts->pluck('district_id')) !!};

        // Handle division selection change
        $('.select2-divisions').on('change', function() {
            let selectedDivisions = $(this).val();
            
            if (selectedDivisions && selectedDivisions.length > 0) {
                // Fetch districts based on selected divisions
                $.ajax({
                    url: '{{ route("api.districts.by.divisions") }}',
                    type: 'POST',
                    data: {
                        divisions: selectedDivisions,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        let districtsSelect = $('.select2-districts');
                        districtsSelect.empty();

                        response.forEach(function(district) {
                            let option = new Option(district.name, district.id, false, 
                                selectedDistricts.includes(district.id));
                            districtsSelect.append(option);
                        });

                        districtsSelect.trigger('change');
                    }
                });
            } else {
                // Clear districts if no divisions selected
                $('.select2-districts').empty().trigger('change');
            }
        });

        // Trigger initial load of districts if divisions are pre-selected
        if ($('.select2-divisions').val() && $('.select2-divisions').val().length > 0) {
            $('.select2-divisions').trigger('change');
        }
        $('.select2-expertises').select2({
            placeholder: 'Select Areas of Expertise',
            allowClear: true
        });     
        $('.select2-activities').select2({
            placeholder: 'Select Type of Activities',
            allowClear: true
        });
        $('.select2-facilities').select2({
            placeholder: 'Select Facilities',
            allowClear: true
        });

        $('#addSlotForm').on('submit', function(e) {
            e.preventDefault();
            let fromDate = $('#from_date').val();
            let toDate = $('#to_date').val();

            // AJAX request to store the date slot
            $.ajax({
                url: '{{ route("cso.profile.slots.store") }}', // Define this route in your web.php
                type: 'POST',
                data: {
                    cso_profiles_id: {{ $profile->id }},
                    from_date: fromDate,
                    to_date: toDate,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Handle success (e.g., refresh the slot list)
                    $('#addSlotModal').modal('hide');
                    $('.modal-backdrop').remove();
                    // Optionally, refresh the slots list here
                },
                error: function(xhr) {
                    // Handle error
                }
            });
        });
    });
</script>
@endsection 