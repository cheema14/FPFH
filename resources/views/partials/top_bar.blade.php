<!-- Navbar Start -->
<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
		<nav class="navbar navbar-expand-lg navbar-light py-lg-2 px-lg-5 wow fadeIn bg-white" data-wow-delay="0.1s">
			<a href="/" class="navbar-brand ms-4 ms-lg-0">
				<img class="logo" src="{{ asset('static/media/azag-logo.png') }}" alt="" />
			</a>
			<button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
				data-bs-target="#navbarCollapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse" style="justify-content: flex-end;">
				<!-- About Us Dropdown -->
		

				<div class="nav-item dropdown about_toggle">
					<a
						href="#"
						class="nav-link dropdown-toggle program_class"
						id="aboutDropdown"
						role="button"
						data-bs-toggle="dropdown"
						aria-expanded="false"
					>
						About Us
					</a>
					<div class="dropdown-menu" aria-labelledby="aboutDropdown">
						<a href="{{ route('about-phata') }}" class="dropdown-item">About PHATA</a>
						<a href="{{ route('about') }}" class="dropdown-item">About Program</a>
					</div>
					</div>

				<!-- Other Menu Items -->
				<a href="{{ route('eligibility') }}" class="nav-item nav-link program_class">Eligibility Criteria</a>
				<a href="{{ route('how-to-apply') }}" class="nav-item nav-link program_class">How to Apply</a>
				<a href="{{ route('showComplaintForm') }}" class="nav-item nav-link program_class">Feedback / Complaint</a>

				<!-- District Quota -->
				<a href="{{ route('district.quota') }}" class="nav-item nav-link program_class">District Quota</a>
				<a href="tel:080009100" style="text-decoration: none;">
					<button style="padding: 10px 20px; background-color:rgb(33, 140, 253); color: white; border: none; border-radius: 5px; cursor: pointer;">
						Call 0800-09100
					</button>
				</a>
				@if(auth()->user())
					<a href="{{ route('admin.home') }}" class="btn btn-success px-4 animated slideInDown">Dashboard</a>
				@else
					<!-- Sign In Button -->
					<a href="{{ route('login') }}" class="btn btn-primary px-4 animated slideInDown Login">Sign In</a>
				@endif
			</div>

		</nav>
	</div>
	<!-- Navbar End -->