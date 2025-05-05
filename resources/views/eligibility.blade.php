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
						<h3 class="py-3 animated slideInDown pt-0 urdu-lbl" >اہلیت کا معیار</h3>
						<h2 class="mb- animated slideInDown">Eligibility Criteria</h2>						
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
			<div class="table-responsive mb-3">
                    <table class="table Eligibility_table">
                        <thead>
                            <tr>
                                <th style=" width: 50%;">Eligibility Criteria</th>
                                <th class="urdu-lbl" dir="rtl" style=" width: 50%;"> اہلیت کا معیار</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01.
								Applicant must be a permanent resident of Punjab as per valid CNIC.</td>
                                <td class="urdu-lbl" dir="rtl"> شناختی کارڈ کے مطابق ، درخواست گزار کا پنجاب کا مستقل رہائشی ہونا لازمی  ہے۔
                                    </td>
                            </tr>
                            <tr>
                                <td>02.
								Applications are only allowed for schemes within the applicant's district.</td>
                                <td class="urdu-lbl" dir="rtl"> درخواستیں صرف درخواست گزار کے ضلع میں موجود سکیموں کے لیے ہی قابل قبول ہیں۔
                                    </td>
                            </tr>
                            <tr>
                                <td>03.
								The applicant, their spouse, or dependent children must not own any plot or house anywhere in Pakistan.</td>
                                <td class="urdu-lbl" dir="rtl"> درخواست گزار، ان کے شریک حیات یا زیر کفالت بچوں کے نام پاکستان میں کہیں بھی کوئی پلاٹ یا مکان نہیں ہونا چاہیے۔
                                    </td>
                            </tr>
                            <tr>
                                <td>04.
								Applicant has clean criminal record.</td>
                                <td class="urdu-lbl" dir="rtl">درخواست گزار کا مجرمانہ ریکارڈ صاف ہو۔ </td>
                            </tr>
                            <tr>
                                <td>05.
								The applicant must not be a defaulter of any bank or financial institution.</td>
                                <td class="urdu-lbl" dir="rtl"> درخواست گزار کسی بھی بینک یا مالیاتی ادارے کا نادہندہ نا ہو۔
                                    </td>
                            </tr>
                            <tr>
                                <td>06.
								Applicants should ensure the accuracy of provided information, as false declarations may lead to disqualification.</td>
                                <td class="urdu-lbl" dir="rtl">درخواست گزار فراہم کردہ معلومات کی درستگی یقینی بنائے، غلط بیانات نااہلی کا سبب بن سکتے ہیں۔ </td>
                            </tr>                           
                        </tbody>
                       </table> 
                </div>    
                <div class="table-responsive ">
                    <table class="table Eligibility_table">
                        <thead>
                            <tr>
                                <th style=" width: 50%;">TORs for Allotment of plots</th>
                                <th class="urdu-lbl" dir="rtl" style=" width: 50%;">پلاٹوں کی الاٹمنٹ کے ٹی او آرز</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01.
								The successful applicant must commence house construction in accordance with prevailing building by-laws within six months from the date of possession of the plot. Construction must be completed within two years from the date of possession.</td>
                                <td class="urdu-lbl" dir="rtl"> کامیاب درخواست دہندہ کو پلاٹ کی ملکیت کی تاریخ سے چھ ماہ کے اندر مروجہ بلڈنگ بائی لاز کے مطابق گھر کی تعمیر شروع کرنی ہوگی۔ قبضے کی تاریخ سے دو سال کے اندر تعمیر مکمل ہونی چاہیے۔
                                    </td>
                            </tr>
                            <tr>
                                <td>02.
								The allotted plot cannot be sold, transferred, or leased for a minimum period of five years from the date of allotment. Any transfer of ownership within this period shall result in automatic cancellation of the allotment.</td>
                                <td class="urdu-lbl" dir="rtl"> الاٹ شدہ پلاٹ کو الاٹمنٹ کی تاریخ سے کم از کم پانچ سال کی مدت کے لیے فروخت، منتقل یا لیز پر نہیں دیا جا سکتا۔ اس مدت کے اندر ملکیت کی کسی بھی منتقلی کے نتیجے میں الاٹمنٹ خودکار طور پر منسوخ ہو جائے گی۔
                                    </td>
                            </tr>
                            <tr>
                                <td>03.
								Failure to comply with construction timelines or building regulations will result in cancellation of the allotment after issuance of a one-month written notice.</td>
                                <td class="urdu-lbl" dir="rtl"> تعمیراتی ٹائم لائنز یا عمارت کے ضوابط کی تعمیل میں ناکامی کے نتیجے میں ایک ماہ کے تحریری نوٹس کے اجراء کے بعد الاٹمنٹ منسوخ کر دی جائے گی۔</td>
                            </tr>
                            <tr>
                                <td>04.
								In cases of cancellation due to non-compliance or false information, possession of the plot shall be resumed by the Punjab Housing and Town Planning Agency (PHATA) without any compensation.</td>
                                <td class="urdu-lbl" dir="rtl">عدم تعمیل یا غلط معلومات کی وجہ سے منسوخی کی صورت میں، پنجاب ہاؤسنگ اینڈ ٹاؤن پلاننگ ایجنسی (PHATA) کے ذریعے پلاٹ کا قبضہ بغیر کسی معاوضے کے دوبارہ شروع کیا جائے گا۔</td>
                            </tr>
                            <tr>
                                <td>05.
								The allotted plot must only be used for residential purposes.</td>
                                <td class="urdu-lbl" dir="rtl"> الاٹ شدہ پلاٹ صرف رہائشی مقاصد کے لیے استعمال ہونا چاہیے۔                                    </td>
                            </tr>
                            <tr>
                                <td>06.
								Commercial activities or unauthorized constructions on the plot are strictly prohibited.</td>
                                <td class="urdu-lbl" dir="rtl">پلاٹ پر تجارتی سرگرمیاں یا غیر مجاز تعمیرات سختی سے ممنوع ہیں۔ </td>
                            </tr> 
							<tr>
                                <td>07.
								In case of any disputes, the matter will be referred to the Designated Grievance Redressal Committee (GRC) of PHATA for resolution.</td>
                                <td class="urdu-lbl" dir="rtl">کسی بھی تنازعہ کی صورت میں، معاملے کو حل کے لیے PHATA کی نامزد شکایتی ازالہ کمیٹی (GRC) کو بھیجا جائے گا۔</td>
                            </tr> 
							<tr>
                                <td>08.
								PHATA reserves the right to conduct inspections at any stage of construction to ensure compliance with the TORs. Any violation of these TORs will lead to legal action under relevant laws and regulations.</td>
                                <td class="urdu-lbl" dir="rtl">PHATA ٹی او آرز کی تعمیل کو یقینی بنانے کے لیے تعمیر کے کسی بھی مرحلے پر معائنہ کرنے کا حق محفوظ رکھتا ہے۔ ان ٹی او آرز کی کسی بھی خلاف ورزی پر متعلقہ قوانین اور ضوابط کے تحت قانونی کارروائی کی جائے گی۔ </td>
                            </tr>                           
                        </tbody>
                       </table> 
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