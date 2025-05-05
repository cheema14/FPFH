<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>AZAG</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="keywords" />
	<meta content="" name="description" />
	<!-- Google Web Fonts -->

	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
		rel="stylesheet" />
	<!-- Icon Font Stylesheet -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
	
	<link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu&display=swap" rel="stylesheet">
	<!-- Libraries Stylesheet -->
	
	<!-- Customized Bootstrap Stylesheet -->
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

	<!-- Template Stylesheet The negative margin-left is on purpose. I did it on purpose -->
	<link href="{{ asset('css/web_style.css') }}" rel="stylesheet" />
	<style>
		.urduLbl {
			display: flex;
			justify-content: space-between;
		}
	</style>
</head>

<body>
	@include('partials.top_bar')
	<!-- Carousel Start -->
	<div class="container-fluid px-lg-5 mb-0 wow fadeIn Future_main Eligibility_hd" data-wow-delay="0.1s">
		<div id="header-carousel">
			<div>
				<div class="row justify-content-start align-items-center">
					<div class="col-lg-12 mb-3">
						<h3 class="py-3 animated slideInDown pt-0 urdu-lbl" >رائے/شکایت</h3>
						<h2 class="mb- animated slideInDown">Feedback/Complaint</h2>						
					</div>					
				</div>
			</div>
		</div>
	</div>
	<!-- Carousel End -->

	<div class="container-fluid Criteria px-lg-5 py-5">
        <div class="container-">    
            <div class="row g-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('failed'))
                <div class="alert alert-danger" role="alert">
                    {!! session('failed') !!}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {!! session('success') !!}
                </div>
            @endif
            <form class="login-inner" action="{{ route('storeComplaint') }}" method="POST">
                    @csrf 
                    
                    <div class="row">
                        
                        <div class="col-md-6 mb-3">
                        <label for="full_name" class="col-form-label mb-2 urduLbl required">Name<span class="text-danger" style="margin-left: -546px;">*</span><span class="urdu-lbl">نام</span></label>
                            <input type="text" class="form-control" id="name" name="name" maxlength="100" placeholder="Enter your name" value="{{ old('name', '') }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>

                        
                        <div class="col-md-6 mb-3">
                            <label for="father_name" class="col-form-label mb-2 urduLbl">Father's Name<span class="text-danger" style="margin-left: -450px;">*</span><span class="urdu-lbl">والد کا نام</span></label>
                            <input type="text" class="form-control" id="father_name" name="father_name" maxlength="100" required placeholder="Enter your father's name" value="{{ old('father_name', '') }}">
                            @error('father_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        
                        <div class="col-md-6 mb-3">
                            <label for="contact_number" class="col-form-label mb-2 urduLbl">Contact Number<span class="text-danger" style="margin-left: -440px;">*</span><span class="urdu-lbl">رابطہ نمبر</span></label>
                            <input type="tel" class="form-control" id="contact_number" name="contact_number"
    placeholder="Enter your contact number (e.g., 0312-4896151)"
    maxlength="12"
    pattern="03[0-9]{2}-[0-9]{7}"
    value="{{ old('contact_number', '') }}">
                            @error('contact_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="cnic" class="col-form-label mb-2 urduLbl">CNIC <span class="text-danger" style="margin-left: -462px;">*</span><span class="urdu-lbl"> قومی شناختی کارڈ نمبر </span></label>
                            <input type="text" id="cnic" name="cnic" required class="form-control" placeholder="12345-1234567-1" maxlength="15" value="{{ old('cnic', '') }}" aria-label="CNIC No">
                            @error('cnic')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror                        
                        </div>

                        
                        <div class="col-md-6 mb-3">
                            <label for="email" class="col-form-label mb-2 urduLbl">Email<span class="text-danger" style="margin-left: -519px;">*</span><span class="urdu-lbl">ای میل</span></label>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email" value="{{ old('email', '') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        
                        <div class="col-md-6 mb-3">
                            <label for="division" class="col-form-label mb-2 urduLbl">Division<span class="text-danger" style="margin-left: -510px;">*</span><span class="urdu-lbl">ڈویژن</span></label>
                            <select name="division" id="division" style="display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #555;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #DFE4FD;
    appearance: none;
    border-radius: 8px;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition-behavior: normal, normal;
    transition-duration: 0.15s, 0.15s;
    transition-timing-function: ease-in-out, ease-in-out;
    transition-delay: 0s, 0s;
" onchange="populateDistricts('current')">
                                <option value="">Select Division</option>
                                @foreach($divisions as $division)
                                    <option value="{{ $division->id }}" {{ old('division', $application->division ?? '') == $division->id ? 'selected' : '' }}>{{ $division->name }} </option>
                                @endforeach
                            </select>
                            @error('division')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        
                        <div class="col-md-6 mb-3">
                            <label for="district" class="col-form-label mb-2 urduLbl">District<span class="text-danger" style="margin-left: -534px;">*</span><span class="urdu-lbl">ضلع</span></label>
                            <select name="district" id="district" style="display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #555;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #DFE4FD;
    appearance: none;
    border-radius: 8px;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition-behavior: normal, normal;
    transition-duration: 0.15s, 0.15s;
    transition-timing-function: ease-in-out, ease-in-out;
    transition-delay: 0s, 0s;
">

                            </select>
                            @error('district')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="feedback" class="col-form-label mb-2 urduLbl">Feedback/Complaint<span class="text-danger" style="margin-left: -1013px;">*</span><span class="urdu-lbl">رائے/شکایت</span></label>
                            <textarea class="form-control" id="feedback" name="feedback" rows="4" placeholder="Enter your feedback"></textarea>
                            @error('feedback')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>          
            </div>
        </div>
    </div>
	

	<!-- footer Start -->
	@include('partials.footer')
	<!-- footer End -->

	<!-- Back to Top -->
	<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
			class="bi bi-arrow-up"></i></a>

	<!-- JavaScript Libraries -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
	
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

	<script>
        const selectedDivisionId = "{{ old('division', $application->division ?? '') }}";
        const oldDistrictId = "{{ old('district', $application->district ?? '') }}";

	
        document.addEventListener('DOMContentLoaded', function () {
            if (selectedDivisionId) {
                document.getElementById('division').value = selectedDivisionId;
                populateDistricts('current', oldDistrictId);
            }
        });
    document.addEventListener("DOMContentLoaded", function () {
        const divisionSelect = document.getElementById("division");

        if (divisionSelect) {
            // Remove readonly class if it exists
            divisionSelect.classList.remove("readonly");

            // Ensure it's not disabled
            divisionSelect.removeAttribute("disabled");
        }
    });
        function populateDistricts(type) {
            const divisionId = document.getElementById('division').value;
            const districtSelect = document.getElementById('district');
            
                
            // Clear previous options
            districtSelect.innerHTML = '<option value="">Select District</option>';
            

            // Fetch districts based on selected division
            if (divisionId) {
                fetch(`/get-districts/${divisionId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(district => {
                            const option = document.createElement('option');
                            console.log("district:",districtSelect);
                            option.value = district.id;
                            option.textContent = "" + district.name ;
                            if (String(district.id) === String(oldDistrictId)) {
                                option.selected = true;
                            }
                            districtSelect.appendChild(option);
                        });

                        
                    });
            }
        }

	</script>
	
</body>

</html>