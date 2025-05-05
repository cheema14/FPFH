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
	<link href="lib/animate/animate.min.css" rel="stylesheet" />
	<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

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
						<h3 class="py-3 animated slideInDown pt-0 urdu-lbl">ضلعی کوٹہ</h3>
						<h2 class="mb- animated slideInDown">District Quota</h2>						
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
            <div class="quota">
                <h3 class="mb-4">District Quota Information</h3>
                <div class="table-responsive">
                    <table class="table table-striped Quota_table">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>District</th>
                                <th>3 Marla Plots Scheme Names</th>
                                <th>No. of Plots</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>01</td><td>Jhelum</td><td>ADS-IV & ADS-I</td><td>727 & 3</td></tr>
                            <tr><td>02</td><td>Kasur</td><td>ADS Pattoki</td><td>388</td></tr>
                            <tr><td>03</td><td>Faisalabad</td><td>ADS Mamukanjan</td><td>257</td></tr>
                            <tr><td>04</td><td>Lodhran</td><td>ADS Lodhran</td><td>218</td></tr>
                            <tr><td>05</td><td>Okara</td><td>ADS Renal Khurd II & ADS Okara</td><td>128 & 2</td></tr>
                            <tr><td>06</td><td>Layyah</td><td>03-Marla Housing Scheme (Extension)</td><td>55</td></tr>
                            <tr><td>07</td><td>Bhakkar</td><td>03-Marla Housing Scheme & ADS-II-Bhakkar</td><td>36 & 16</td></tr>
                            <tr><td>08</td><td>Sahiwal</td><td>03-Marla Housing Scheme</td><td>33</td></tr>
                            <tr><td>09</td><td>Sargodha</td><td>3-M Sillan Wali</td><td>25</td></tr>
                            <tr><td>10</td><td>Khushab</td><td>03-Marla Housing Scheme Jauharabad</td><td>24</td></tr>
                            <tr><td>11</td><td>Bahawalnagar</td><td>ADS Bahawalnagar</td><td>20</td></tr>
                            <tr><td>12</td><td>Mandi Baha-Ud-Din</td><td>ADS-Mandi Baha-Ud-Din</td><td>17</td></tr>
                            <tr><td>13</td><td>Rajanpur</td><td>ADS Rajanpur</td><td>15</td></tr>
                            <tr><td>14</td><td>Attock</td><td>ADS Hazro</td><td>11</td></tr>
                            <tr><td>15</td><td>Gujrat</td><td>03-Marla H.S.</td><td>8</td></tr>
                            <tr><td>16</td><td>Bahawalpur</td><td>ADS-I (Extension) & ADS-I (Existing)</td><td>6 & 1</td></tr>
                            <tr><td>17</td><td>Vehari</td><td>03-Marla Vehari</td><td>4</td></tr>
                            <tr><td>18</td><td>Jhang</td><td>ADS Jhang</td><td>4</td></tr>
                            <tr><td>19</td><td>Chiniot</td><td>ADS Chiniot</td><td>2</td></tr>
                            <tr><th colspan="3">Total</th><th>2000</th></tr>
                        </tbody>
                    </table>
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
	<script src="{{ asset('js/wow.min.js') }}"></script>
	<script src="{{ asset('js/easing.min.js') }}"></script>
	<!-- <script src="lib/owlcarousel/owl.carousel.min.js"></script> -->
	<!-- Template Javascript -->
	<!-- <script src="js/main.js"></script> -->
	
	<script>
		$(document).ready(function () {
			$("#accordion .card-header a").on("click", function () {
				var $icon = $(this).find("i");

				// Toggle the icon for the clicked header
				if ($icon.hasClass("fa-chevron-down")) {
					$icon.removeClass("fa-chevron-down").addClass("fa-chevron-up");
				} else {
					$icon.removeClass("fa-chevron-up").addClass("fa-chevron-down");
				}

				// Reset icons for other headers
				$("#accordion .card-header a")
					.not($(this))
					.each(function () {
						var $otherIcon = $(this).find("i");
						if ($otherIcon.hasClass("fa-chevron-up")) {
							$otherIcon
								.removeClass("fa-chevron-up")
								.addClass("fa-chevron-down");
						}
					});
			});
		});
		

	</script>
	
</body>

</html>