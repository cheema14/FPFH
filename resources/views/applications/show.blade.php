@extends('layouts.admin')

@section('content')

<h4 class="mb-4">Application Details</h4>
<div id="accordion">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          General Information
          </button>
        </h5>
      </div>

      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
        <div class="row">
            <div class="col-md-3 view_lbl mb-2">
                <strong>Full Name:</strong> <span class="text-muted">{{ $application->full_name }}</span>
            </div>
            <div class="col-md-3 view_lbl mb-2">
                <strong>Father Name:</strong> <span class="text-muted">{{ $application->father_husband_name ?? '' }}</span>
            </div>
            <div class="col-md-3 view_lbl mb-2">
                <strong>CNIC:</strong> <span class="text-muted">{{ $application->cnic }}</span>
            </div>
            <div class="col-md-3 view_lbl mb-2">
                <strong>Date of Birth:</strong> <span class="text-muted">{{ $application->dob }}</span>
            </div>
            <div class="col-md-3 view_lbl mb-2">
                <strong>Gender:</strong> 
                <span class="text-muted">
                @if($application->gender == 0)
                    MALE
                @elseif($application->gender == 1)
                    FEMALE
                @elseif($application->gender == 2)
                    OTHER
                @else
                    N/A
                @endif
                </span>
            </div>
            <div class="col-md-3 view_lbl mb-2">
                <strong>Marital Status:</strong> 
                <span class="text-muted">
                @if($application->marital_status == 0)
                        MARRIED
                @elseif($application->marital_status == 1)
                        UNMARRIED
                @elseif($application->marital_status == 2)
                        WIDOW
                @elseif($application->marital_status == 3)
                        DIVORCED
                @elseif($application->marital_status == 4)
                        SEPARATED
                @else
                    N/A
                @endif
                </span>
            </div>
            <div class="col-md-3 view_lbl mb-2">
                <strong>Contact Number:</strong> <span class="text-muted">{{ $application->contact_number }}</span>
            </div>
            <div class="col-md-3 view_lbl mb-2">
                <strong>Email:</strong> <span class="text-muted">{{ $application->email }}</span>
            </div>
            <div class="col-md-3 view_lbl mb-2">
                <strong>Current Address:</strong> <span class="text-muted">{{ $application->current_address }}</span>
            </div>
            <div class="col-md-3 view_lbl mb-2">
                <strong>Current Division:</strong> <span class="text-muted">{{ $application->currentDivision->name ?? 'N/A' }}</span>
            </div>
            <div class="col-md-3 view_lbl mb-2">
                <strong>Current District:</strong> <span class="text-muted">{{ $application->currentDistrict->name ?? 'N/A' }}</span>
            </div>
            <div class="col-md-3 view_lbl mb-2">
                <strong>Current Tehsil:</strong> <span class="text-muted">{{ $application->currentTehsil->tehsil_name ?? 'N/A' }}</span>
            </div>
            <div class="col-md-3 view_lbl mb-2">
                <strong>Permanent Address:</strong> <span class="text-muted">{{ $application->permanent_address }}</span>
            </div>
            <div class="col-md-3 view_lbl mb-2">
                <strong>Permanent Division:</strong> <span class="text-muted">{{ $application->permanentDivision->name ?? 'N/A' }}</span>
            </div>
            <div class="col-md-3 view_lbl mb-2">
                <strong>Permanent District:</strong> <span class="text-muted">{{ $application->permanentDistrict->name ?? 'N/A' }}</span>
            </div>
            <div class="col-md-3 view_lbl mb-2">
                <strong>Permanent Tehsil:</strong> <span class="text-muted">{{ $application->permanentTehsil->tehsil_name ?? 'N/A' }}</span>
            </div>
              </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Employment & Income Detail
          </button>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
        <div class="row">
              <div class="col-md-3 view_lbl mb-2">
                  <strong>Occupation:</strong> <span class="text-muted">{{ $application->Occupation->name ?? 'N/A' }}</span>
              </div>
              <div class="col-md-3 view_lbl mb-2">
                  <strong>Source of Income:</strong> <span class="text-muted">{{ $application->sourceOfIncome->name ?? 'N/A' }}</span>
              </div>
              <div class="col-md-3 view_lbl mb-2">
                  <strong>Employer Name:</strong> <span class="text-muted">{{ $application->employer_name ?? 'N/A' }}</span>
              </div>
              <div class="col-md-3 view_lbl mb-2">
                  <strong>Monthly Income:</strong> <span class="text-muted">{{ $application->monthlyIncomeRange->range ?? 'N/A' }}</span>
              </div>
              <div class="col-md-3 view_lbl mb-2">
                  <strong>Property Ownership:</strong> <span class="text-muted">{{ $application->own_property == 0 ? 'No' : 'Yes' }}</span>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Family Information
          </button>
        </h5>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">
        <div class="row">
                <div class="col-md-3 view_lbl mb-2">
                    <strong>Total Family Members:</strong> <span class="text-muted">{{ $application->total_family_members ?? 'N/A' }}</span>
                </div>   
                <div class="col-md-3 view_lbl mb-2">
                    <strong>Number of Dependents:</strong> <span class="text-muted">{{ $application->number_of_dependents ?? 'N/A' }}</span>
                </div>   
                <div class="col-md-3 view_lbl mb-2">
                    <strong>Spouse Occupation:</strong> <span class="text-muted">{{ $application->spouseOccupation->name ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3 view_lbl mb-2">
                    <strong>Combined Family Income:</strong> <span class="text-muted">{{ $application->combinedFamilyIncome->range ?? 'N/A' }}</span>
                </div>
                      
            </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingFour">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          Housing Requirement
          </button>
        </h5>
      </div>
      <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
        <div class="card-body">
        <div class="row">
                <div class="col-md-3 view_lbl mb-2">
                    <strong>Residing in a rented house:</strong> <span class="text-muted">{{ $application->rented_house == 'yes' ? 'Yes' : 'No' }}</span>
                </div>
                <div class="col-md-3 view_lbl mb-2">
                    <strong>Prior allotment of government housing:</strong> <span class="text-muted">{{ $application->government_housing == 'yes' ? 'Yes' : 'No' }}</span>
                </div>
                <div class="col-md-3 view_lbl mb-2">
                    <strong>Name of Scheme:</strong> <span class="text-muted">{{ $application->scheme_name ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3 view_lbl mb-2">
                    <strong>Housing Location:</strong> <span class="text-muted">{{ $application->housingLocation->name ?? 'N/A' }} </span>
                </div>
                <div class="col-md-3 view_lbl mb-2">
                    <strong>Plot/House Size:</strong> <span class="text-muted">{{ $application->plot_size ? $application->plot_size.'Marla' : 'N/A' }} </span>
                </div>

            </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingFive">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          Documents Attached
          </button>
        </h5>
      </div>
      <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
        <div class="card-body">
          <div class="row">
              <!-- <div class="col-md-3 view_lbl mb-2">
                  <div class="row"> -->
                  @foreach($application->applicationMedia as $media)
                      @if($media->document_type != 'affidavit')
                          <div class="mb-2">
                              <div class="card">
                                  <div class="card-body text-center">
                                      <h5 class="card-title">{{ ucwords(str_replace('_', ' ', $media->document_type)) }}</h5>
                                      <a href="{{ $media->file_path }}" target="_blank" class="btn btn-primary">View Document</a>
                                  </div>
                              </div>
                          </div>
                      @endif
                  @endforeach
                  <!-- </div>
              </div> -->
          </div>
        </div>
      </div>
    </div>
</div>

        <div class="text-end mb-3" >
            <a href="{{ route('applications.index') }}" class="btn btn-secondary">Back to Application</a>
        </div>


@endsection
