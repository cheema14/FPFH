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
						<h3 class="py-3 animated slideInDown pt-0 urdu-lbl" >پنجاب ہاؤسنگ اینڈ ٹاؤن پلاننگ ایجنسی کے بارے میں</h3>
						<h2 class="mb- animated slideInDown text-center">About PHATA</h2>						
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
            <h3 class="mb-3">Overview:</h3> 
            <p>Housing and Physical Planning (H & PP) was established under the administrative control of Housing & Physical Planning Department during 1973.
H&PP was devolved under PLGO,2001 with Directorate General and 34 nucleus offices (DO H&TP) at district level.
H&PP Punjab was revamped as “Punjab Housing and Town Planning Agency (PHATA)” under the PHATA Ordinance, 2002. The said agency has been effectuated w.e.f., 01.04.2004 with the objective of rejuvenating the housing sector in general and provision of shelter to shelter-less low-income groups in particular.
</p>           

            <div class="card apply_main_lbl mb-4">                   
                    <div class="How_to_Apply">
                        <div class="row">                      
                    <div class="col-md-12 mb-3">
                    <h3>INSTITUTIONAL MANDATE OF PHATA (Section 4 (2))</h3>
                    <ul>
                        <li>Identification of state and other lands for developing low-income and low-cost housing schemes.</li>
                        <li>Facilitation in provision of housing inputs including land, finance, building materials, etc. through indigenous and cost-effective approaches.</li>
                        <li>Facilitation in construction of multi-storey flats (Low-Cost Housing).</li>
                        <li>Provision of affordable and cost-efficient housing schemes especially for the low-income group and families.</li>
                        <li>Formulation of provincial land use policy, plan, and preparation of regional development plans (Inter-district spatial planning – Master plans) for an integrated, coordinated, and systematic planning to ensure orderly growth and development of physical infrastructure.</li>
                        <li>Suggesting measures to check growth of slums and katchi abadis and formulation of resettlement and relocation plans.</li>
                        <li>Preparation of guidelines, long-term, and short-term plans for implementing the low-cost housing schemes and programs in Punjab.</li>
                    </ul>

                    
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