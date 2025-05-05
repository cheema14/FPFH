@extends('layouts.admin')

@section('content')
<style>
    .text-primary{
        color: #74124d !important;
    }
    
</style>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Profile Details</h5>
                    <a href="{{ route('profile.complete') }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit Profile
                    </a>
                </div>

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <h6 class="text-muted">Registration Document</h6>
                            @if($profile && $profile->registration_document)
                                <a href="{{ asset('storage/' . $profile->registration_document) }}" 
                                   target="_blank" 
                                   class="btn btn-primary btn-sm">
                                    <i class="fas fa-file"></i> View Document
                                </a>
                            @else
                                <p class="text-muted">No document uploaded</p>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-muted">Focal Person Contact</label>
                                <p>
                                    <i class="fas fa-phone"></i> {{ $profile->formatted_contact ?? '' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-muted">Website</label>
                                <p>
                                    <a href="{{ $profile->website ?? '' }}" target="_blank" class="text-primary">
                                        <i class="fas fa-globe"></i> {{ $profile->website ?? '' }}
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-muted">YouTube</label>
                                <p>
                                    <a href="{{ $profile->youtube ?? '' }}" target="_blank" class="text-primary">
                                        <i class="fab fa-youtube"></i> {{ $profile->youtube ?? '' }}
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-muted">Instagram</label>
                                <p>
                                    <a href="{{ $profile->instagram ?? '' }}" target="_blank" class="text-primary">
                                        <i class="fab fa-instagram"></i> {{ $profile->instagram ?? '' }}
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-muted">Facebook</label>
                                <p>
                                    <a href="{{ $profile->facebook ?? '' }}" target="_blank" class="text-primary">
                                        <i class="fab fa-facebook"></i> {{ $profile->facebook ?? '' }}
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-muted">LinkedIn</label>
                                <p>
                                    <a href="{{ $profile->linkedin ?? '' }}" target="_blank" class="text-primary">
                                        <i class="fab fa-linkedin"></i> {{ $profile->linkedin ?? '' }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="mb-0">Activity Preferences</h5>
                </div>
                <div class="card-body">
                    @if($profile && $profile->activity_preference)
                        <p>
                            @if($profile->activity_preference == 1)
                                Physical Venue
                            @elseif($profile->activity_preference == 2)
                                Online Platforms
                            @else
                                No valid activity preference set
                            @endif
                        </p>
                    @else
                        <p class="text-muted">No activity preferences set</p>
                    @endif
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">University Campuses</h5>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCampusModal">
                        Add Campus
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Campus Name</th>
                                    <th>Address</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            @if($profile && $profile->campuses)
                            <tbody id="campusList">
                                @foreach($profile->campuses as $campus)
                                    <tr id="campus-{{ $campus->id }}">
                                        <td>{{ $campus->campus_name }}</td>
                                        <td>{{ $campus->campus_address }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary edit-campus" 
                                                    data-campus="{{ $campus->id }}"
                                                    data-name="{{ $campus->campus_name }}"
                                                    data-address="{{ $campus->campus_address }}">
                                                Edit
                                            </button>
                                            <button class="btn btn-sm btn-danger delete-campus" 
                                                    data-campus="{{ $campus->id }}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            @else
                                <tbody>
                                    <tr>
                                        <td colspan="3" class="text-center">No campuses added</td>
                                    </tr>
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Campus Modal -->
<div class="modal fade" id="addCampusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Campus</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form id="addCampusForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="required">Campus Name</label>
                        <input type="text" name="campus_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="required">Campus Address</label>
                        <textarea name="campus_address" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Campus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Campus Modal -->
<div class="modal fade" id="editCampusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Campus</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form id="editCampusForm">
                <input type="hidden" name="campus_id" id="edit_campus_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="required">Campus Name</label>
                        <input type="text" name="campus_name" id="edit_campus_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="required">Campus Address</label>
                        <textarea name="campus_address" id="edit_campus_address" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Campus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .form-group label {
        font-weight: 600;
        margin-bottom: 0.2rem;
    }
    .form-group p {
        margin-bottom: 1rem;
    }
    a {
        color: #74124d !important;
        text-decoration: none;
    }
    .form-group a:hover {
        text-decoration: underline;
    }
</style>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Add Campus
    $('#addCampusForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route("campus.store") }}',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#addCampusModal').modal('hide');
                $('#addCampusForm')[0].reset();
                location.reload();
            },
            error: function(xhr) {
                alert('Error adding campus');
            }
        });
    });

    // Edit Campus
    $('.edit-campus').on('click', function() {
        var campusId = $(this).data('campus');
        var campusName = $(this).data('name');
        var campusAddress = $(this).data('address');

        $('#edit_campus_id').val(campusId);
        $('#edit_campus_name').val(campusName);
        $('#edit_campus_address').val(campusAddress);
        $('#editCampusModal').modal('show');
    });

    // Update Campus
    $('#editCampusForm').on('submit', function(e) {
        e.preventDefault();
        var campusId = $('#edit_campus_id').val();
        $.ajax({
            url: '/campus/' + campusId,
            type: 'PUT',
            data: $(this).serialize(),
            success: function(response) {
                $('#editCampusModal').modal('hide');
                location.reload();
            },
            error: function(xhr) {
                alert('Error updating campus');
            }
        });
    });

    // Delete Campus
    $('.delete-campus').on('click', function() {
        if (confirm('Are you sure you want to delete this campus?')) {
            var campusId = $(this).data('campus');
            $.ajax({
                url: '/campus/' + campusId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#campus-' + campusId).remove();
                },
                error: function(xhr) {
                    alert('Error deleting campus');
                }
            });
        }
    });
});
</script>
@endpush 