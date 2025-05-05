@extends('layouts.admin')   

@section('content')
<div class="container-">
<div class="card mb-4">
    <div class="card-header"> 
        @if(auth()->user()->is_admin)
        <h5 class="m-0">All Applications</h5>
        @else
        <h5 class="m-0">My Application</h5>
        @endif
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    @if($applications->isEmpty() && !auth()->user()->is_admin)
        <div class="alert alert-info">You have not submitted any applications yet.</div>
    @elseif($applications->isEmpty() && auth()->user()->is_admin)
        <div class="alert alert-info">There are no applications submitted yet.</div>
    @else
    <div class="table-responsive">
        <table id="yourTableId" class="table">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>CNIC</th>
                    <th>Date of Birth</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $application)
                    <tr>
                        <td>{{ $application->full_name }}</td>
                        <td>{{ $application->cnic }}</td>
                        <td>{{ $application->dob }}</td>
                        <td>
                            @if($application->status == 0)
                                Pending
                            @elseif($application->status == 1)
                                Submitted
                            @elseif($application->status == 2)
                                Approved
                            @else
                                Unknown Status
                            @endif
                        </td>
                        <td>
                            @if($application->status == 0 && !auth()->user()->is_admin)
                                <a href="{{ route('applicant.form') }}" class="btn btn-warning">Edit</a>
                            @elseif($application->status == 1 || $application->status == 2)
                                <a href="{{ route('applications.show', ['encryptedId' => Crypt::encrypt($application->id)]) }}" class="btn btn-primary">View</a>
                            @else
                                <a href="{{ route('applications.show', ['encryptedId' => Crypt::encrypt($application->id)]) }}" class="btn btn-primary">View</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        {{ $applications->links() }}
    @endif
</div>
</div>
</div>
<script>
$(document).ready(function() {
    $('#yourTableId').DataTable({
        paging: false, // Disable DataTables pagination
        // ... other options ...
    });
});
</script>
@endsection 