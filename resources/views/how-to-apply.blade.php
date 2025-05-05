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

	<!-- Template Stylesheet -->
	<link href="{{ asset('css/web_style.css') }}" rel="stylesheet" />
</head>

<body>
	@include('partials.top_bar')
	<!-- Carousel Start -->
	<div class="container-fluid px-lg-5 mb-0 wow fadeIn Future_main Eligibility_hd" data-wow-delay="0.1s">
		<div id="header-carousel">
			<div>
				<div class="row justify-content-start align-items-center">
					<div class="col-lg-12 mb-3">
						<h3 class="py-3 animated slideInDown pt-0 urdu-lbl" >اپلائی کرنے کا طریقہ</h3>
						<h2 class="mb- animated slideInDown">How to Apply</h2>						
					</div>					
				</div>
			</div>
		</div>
	</div>
	<!-- Carousel End -->

	<div class="container-fluid Criteria px-lg-5 py-5">
    <div class="container-">    
        <div class="row g-4">
            <div class="col-md-12">
            <h3 class="mb-3">How to Apply - AZAG Program:</h3> 
                    
            <div class="card apply_main_lbl mb-4">                   
                    <div class="How_to_Apply">
                        <div class="row">                      
                    <div class="col-md-12 mb-3">
                    
                    <ol>
                        <li><strong>Visit the Portal -</strong> Go to the official AZAG application portal.</li>
                        <li><strong>Register/Login -</strong> Create a new account or log in if already registered.</li>
                        <li><strong>Fill Application Form -</strong> Provide personal details, income information, and required documents.</li>
                        <li><strong>Upload Documents -</strong> Attach scanned copies of necessary documents.</li>
                        <li><strong>Review & Submit -</strong> Check all details for accuracy and submit the application.</li>
                        <li><strong>Track Status -</strong> Use the portal to monitor application progress and updates.</li>
                    </ol>
                    <p>For assistance, refer to the help section or contact support.</p>


                    
                    </div>
                </div>
                    </div>                    
                </div>                
            </div>          
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
	
	
	
	
</body>

</html>