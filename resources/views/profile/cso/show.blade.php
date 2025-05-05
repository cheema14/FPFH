@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Profile Details</h5>
                    <div>
                        <a href="{{ route('cso.profile.complete') }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit Profile
                        </a>
                        <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#addSlotModal">
                            Add Date Slot
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="info-box">
                        <div class="row g-3">
                            <!-- Left Column -->
                            <div class="col-lg col-md-4 slot-data">
                                <h5>Focal Person</h5>
                                <p>{{ $profile->user->name ?? 'N/A' }}</p>
                                <div>
                                    <h5>Geographic Coverage Divisions</h5>
                                    @foreach($divisions as $division)
                                        @if(in_array($division->id, $selectedDivisions))
                                            <span class="pill-badge">{{ $division->name }}</span>
                                        @endif
                                    @endforeach
                                </div>
                                <div>
                                    <h5>Districts</h5>
                                    @foreach($districts as $district)
                                        @if(in_array($district->id, $selectedDistricts))
                                            <span class="pill-badge">{{ $district->name }}</span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <!-- Middle Column -->
                            <div class="col-lg col-md-4 slot-data">
                                <h5>Organization Name</h5> 
                                <p>{{ $profile->organization_name ?? 'N/A' }}</p>
                                <h5>Area of Expertise</h5>
                                <div>
                                    @foreach($expertises as $expertise)
                                        @if(in_array($expertise->id, $selectedExpertises))
                                            <span class="pill-badge">{{ $expertise->name }}</span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-lg col-md-4 slot-data">
                                <h5>Contact Number</h5>
                                <p>{{ $profile->formatted_contact ?? 'N/A' }}</p>
                                <h5>Types of Activities You Can Offer</h5>
                                <div>
                                    @foreach($activities as $activity)
                                        @if(in_array($activity->id, $selectedActivities))
                                            <span class="pill-badge">{{ $activity->name }}</span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <!-- Bottom Row -->
                            <div class="col-lg col-md-4 slot-data">
                                <h5>Organization Website/Social Media Links</h5>
                                <p>  
                                    <a href="{{ $profile->website ?? '#' }}" class="text-primary">{{ $profile->website ?? 'N/A' }}</a>
                                </p>
                                <h5>Available Facilities</h5>
                                <div>
                                    @foreach($facilities as $facility)
                                        @if(in_array($facility->id, $selectedFacilities))
                                            <span class="pill-badge">{{ $facility->name }}</span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-lg col-md-4 slot-data">
                                <h5>Registration Document</h5>
                                <p>
                                    @if($profile && $profile->registration_document)
                                        <a href="{{ asset('storage/' . $profile->registration_document) }}" class="text-dark">View Document</a>
                                    @else
                                        <span>No document uploaded</span>
                                    @endif
                                </p>
                                <h5>No. of WDCs your organization</h5>
                                <p>{{ $profile->wdc_count ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <h6 class="text-muted">Date Slots</h6>
                            <table class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($slots as $slot)
                                        <tr>
                                            <td>{{ $slot->from_date }}</td>
                                            <td>{{ $slot->to_date }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm edit-slot" data-id="{{ $slot->id }}" data-from="{{ $slot->from_date }}" data-to="{{ $slot->to_date }}">Edit</button>
                                                <button class="btn btn-danger btn-sm delete-slot" data-id="{{ $slot->id }}">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                <div id="error-message" class="alert alert-danger" style="display: none;"></div>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .form-group label {
        font-weight: 600;
        margin-bottom: 0.2rem;
    }
    .form-group p {
        margin-bottom: 1rem;
    }
    .form-group a {
        color: #3490dc;
        text-decoration: none;
    }
    .form-group a:hover {
        text-decoration: underline;
    }
    .select2-container--default .select2-selection--multiple {
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }
    .select2-container .select2-selection--multiple {
        min-height: 38px;
    }
    .division-group {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 15px;
    }
    .division-title {
        color: #495057;
        margin-bottom: 10px;
        font-weight: 600;
        font-size: 1rem;
    }
    .districts-container {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }
    .district-pill {
        background-color: #3490dc;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.9rem;
        display: inline-block;
    }
    .expertise-list {
        list-style-type: disc;
        padding-left: 20px;
        margin-top: 10px;
    }
    .expertise-list li {
        margin-bottom: 5px;
        color: #495057;
    }
    .geography-list {
        list-style-type: none;
        padding-left: 0;
        margin-top: 10px;
    }
    .division-item {
        margin-bottom: 15px;
    }
    .division-name {
        font-weight: 600;
        color: #495057;
        font-size: 1rem;
    }
    .districts-list {
        list-style-type: disc;
        padding-left: 25px;
        margin-top: 5px;
    }
    .districts-list li {
        margin-bottom: 5px;
        color: #495057;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2-divisions').select2({
            placeholder: 'Select divisions',
            allowClear: true
        });

        $('.select2-districts').select2({
            placeholder: 'Select districts',
            allowClear: true
        });

        $('#addSlotForm').on('submit', function(e) {
            e.preventDefault();
            $('#error-message').hide(); // Hide previous error message
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
                    // Optionally, refresh the slots list here
                },
                error: function(xhr) {
                    // Handle error
                    $('#error-message').text(xhr.responseJSON.message).show(); // Show error message
                }
            });
        });

        // Ensure the modal is properly closed
        $('#addSlotModal').on('hidden.bs.modal', function () {
            $('#error-message').hide(); // Reset error message when modal is closed
            $('#addSlotForm')[0].reset(); // Reset the form fields
        });

        // Edit slot functionality
        $('.edit-slot').on('click', function() {
            const slotId = $(this).data('id');
            const fromDate = $(this).data('from');
            const toDate = $(this).data('to');

            // Populate the modal with the slot data
            $('#from_date').val(fromDate);
            $('#to_date').val(toDate);
            $('#addSlotModal').modal('show');

            // Update the form action to edit
            $('#addSlotForm').off('submit').on('submit', function(e) {
                e.preventDefault();
                // AJAX request to update the slot
                $.ajax({
                    url: '{{ route("cso.profile.slots.update", "") }}/' + slotId, // Define this route in your web.php
                    type: 'PUT',
                    data: {
                        from_date: $('#from_date').val(),
                        to_date: $('#to_date').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Handle success (e.g., refresh the slot list)
                        $('#addSlotModal').modal('hide');
                        location.reload(); // Reload the page to see updated slots
                    },
                    error: function(xhr) {
                        // Handle error
                    }
                });
            });
        });

        // Delete slot functionality
        $('.delete-slot').on('click', function() {
            const slotId = $(this).data('id');
            if (confirm('Are you sure you want to delete this slot?')) {
                $.ajax({
                    url: '{{ route("cso.profile.slots.destroy", "") }}/' + slotId, // Define this route in your web.php
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Handle success (e.g., refresh the slot list)
                        location.reload(); // Reload the page to see updated slots
                    },
                    error: function(xhr) {
                        // Handle error
                    }
                });
            }
        });
    });
</script>
@endsection