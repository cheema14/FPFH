<!-- resources/views/applicant_form.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container-">
<div class="card mb-4">
    <div class="card-header"> 
        <h5 class="m-0">Applicant Information Form</h5>
    </div>
    <div class="card-body">

    <ul class="nav nav-pills mb-2 Information_Form_list">
        <li class="nav-item step-indicator">
            <div class="step-wrapper">
                <a class="nav-link {{ (!empty($application) && $application->current_step === 1) ? 'active': '' }}" href="#" onclick="validateAndShowStep(1)">
                <svg width="33" height="34" viewBox="0 0 33 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.796875" y="0.913086" width="32.1196" height="32.1196" rx="8.9221" fill="#074826"/>
                <path d="M16.9247 16.5427C18.055 16.5427 19.0338 16.1373 19.8335 15.3374C20.6333 14.5377 21.0387 13.5592 21.0387 12.4287C21.0387 11.2986 20.6333 10.32 19.8334 9.51995C19.0335 8.72034 18.0548 8.31494 16.9247 8.31494C15.7942 8.31494 14.8156 8.72034 14.0159 9.52009C13.2162 10.3198 12.8106 11.2985 12.8106 12.4287C12.8106 13.5592 13.2161 14.5378 14.016 15.3376C14.8159 16.1372 15.7946 16.5427 16.9247 16.5427ZM24.1231 21.449C24.1 21.1162 24.0533 20.7531 23.9846 20.3698C23.9153 19.9835 23.8261 19.6184 23.7192 19.2846C23.6088 18.9397 23.4587 18.5991 23.2732 18.2726C23.0805 17.9338 22.8543 17.6388 22.6005 17.396C22.335 17.142 22.01 16.9378 21.6342 16.7888C21.2597 16.6407 20.8446 16.5657 20.4006 16.5657C20.2263 16.5657 20.0577 16.6372 19.732 16.8492C19.5005 17 19.2683 17.1496 19.0355 17.2983C18.8117 17.4408 18.5086 17.5744 18.1342 17.6954C17.7689 17.8135 17.3981 17.8735 17.032 17.8735C16.666 17.8735 16.2952 17.8135 15.9295 17.6954C15.5556 17.5745 15.2525 17.441 15.0289 17.2984C14.7697 17.1328 14.5352 16.9816 14.3318 16.8491C14.0065 16.6371 13.8378 16.5655 13.6634 16.5655C13.2193 16.5655 12.8044 16.6407 12.43 16.789C12.0544 16.9377 11.7293 17.1419 11.4636 17.3961C11.2099 17.639 10.9835 17.9339 10.7911 18.2726C10.6057 18.5991 10.4556 18.9396 10.3451 19.2848C10.2383 19.6185 10.1491 19.9835 10.0798 20.3698C10.0111 20.7526 9.96444 21.1158 9.94136 21.4494C9.91839 21.7851 9.90701 22.1215 9.90723 22.458C9.90723 23.3497 10.1907 24.0715 10.7496 24.6038C11.3016 25.1291 12.032 25.3956 12.9202 25.3956H21.1446C22.0328 25.3956 22.763 25.1292 23.3151 24.6038C23.8742 24.0719 24.1576 23.3499 24.1576 22.4579C24.1575 22.1138 24.1459 21.7743 24.1231 21.449Z" fill="white"/>
                </svg>
                General Information
                </a>
            </div>
        </li>
        <li class="nav-item step-indicator">
            <div class="step-wrapper">
                <a class="nav-link {{ (isset($application) && $application->current_step === 2) ? 'active' : '' }}" href="#" onclick="validateAndShowStep(2)">
                <svg width="33" height="34" viewBox="0 0 33 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.913086" width="32.1196" height="32.1196" rx="8.9221" fill="#074826"/>
                <path d="M20.25 20.75C20.25 20.9158 20.3158 21.0747 20.4331 21.1919C20.5503 21.3092 20.7092 21.375 20.875 21.375H24V20.125H20.875C20.7092 20.125 20.5503 20.1908 20.4331 20.3081C20.3158 20.4253 20.25 20.5842 20.25 20.75Z" fill="white"/>
                <path d="M22.75 15.8687V15.125C22.75 14.6277 22.5525 14.1508 22.2008 13.7992C21.8492 13.4475 21.3723 13.25 20.875 13.25H19.15L17.9 14.5H20.875C21.0408 14.5 21.1997 14.5658 21.3169 14.6831C21.4342 14.8003 21.5 14.9592 21.5 15.125V15.75H10.875C10.7092 15.75 10.5503 15.6842 10.4331 15.5669C10.3158 15.4497 10.25 15.2908 10.25 15.125C10.25 14.9592 10.3158 14.8003 10.4331 14.6831C10.5503 14.5658 10.7092 14.5 10.875 14.5H13.85L12.6 13.25H10.875C10.3777 13.25 9.90081 13.4475 9.54917 13.7992C9.19754 14.1508 9 14.6277 9 15.125V23.875C9 24.3723 9.19754 24.8492 9.54917 25.2008C9.90081 25.5525 10.3777 25.75 10.875 25.75H22.125C22.6223 25.75 23.0992 25.5525 23.4508 25.2008C23.8025 24.8492 24 24.3723 24 23.875V22.625H20.875C20.3777 22.625 19.9008 22.4275 19.5492 22.0758C19.1975 21.7242 19 21.2473 19 20.75C19 20.2527 19.1975 19.7758 19.5492 19.4242C19.9008 19.0725 20.3777 18.875 20.875 18.875H24V17.625C23.9976 17.2392 23.8763 16.8636 23.6526 16.5493C23.4289 16.235 23.1137 15.9973 22.75 15.8687Z" fill="white"/>
                <path d="M15.4311 14.3187C15.4892 14.3773 15.5583 14.4238 15.6345 14.4556C15.7106 14.4873 15.7923 14.5036 15.8748 14.5036C15.9574 14.5036 16.039 14.4873 16.1152 14.4556C16.1914 14.4238 16.2605 14.3773 16.3186 14.3187L18.1936 12.4437C18.2803 12.3559 18.3391 12.2443 18.3624 12.123C18.3858 12.0018 18.3727 11.8763 18.3248 11.7625C18.278 11.6484 18.1983 11.5507 18.096 11.4817C17.9937 11.4127 17.8732 11.3756 17.7498 11.375H16.4998V8.875C16.4998 8.70924 16.434 8.55027 16.3168 8.43306C16.1996 8.31585 16.0406 8.25 15.8748 8.25C15.7091 8.25 15.5501 8.31585 15.4329 8.43306C15.3157 8.55027 15.2498 8.70924 15.2498 8.875V11.375H13.9998C13.8765 11.3756 13.756 11.4127 13.6537 11.4817C13.5514 11.5507 13.4717 11.6484 13.4248 11.7625C13.377 11.8763 13.3639 12.0018 13.3873 12.123C13.4106 12.2443 13.4694 12.3559 13.5561 12.4437L15.4311 14.3187Z" fill="white"/>
                </svg>
                 Income Details
                </a>
            </div>
        </li>
        <li class="nav-item step-indicator">
            <div class="step-wrapper">
                <a class="nav-link {{ (isset($application) && $application->current_step === 3) ? 'active' : '' }}" href="#" onclick="validateAndShowStep(3)">
                <svg width="33" height="34" viewBox="0 0 33 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.913086" width="32.1196" height="32.1196" rx="8.9221" fill="#074826"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.7438 9.3048C17.946 9.36037 18.1461 9.42578 18.3424 9.49761C17.9947 10.0938 17.7945 10.7643 17.7584 11.4535C17.0735 11.1859 16.3283 11.0392 15.5481 11.0392C12.1925 11.0392 9.47051 13.76 9.47051 17.1168C9.47051 20.4737 12.1925 23.1944 15.5481 23.1944C19.3556 23.1944 22.2122 19.7405 21.5248 16.0104C22.5778 16.1523 23.6175 15.9087 24.4768 15.3537L25.7431 15.8432V18.3904L23.3606 19.3126C23.1866 19.9315 22.9396 20.5275 22.6248 21.088L23.6572 23.4257L21.8565 25.2264L19.5189 24.1927C18.964 24.5039 18.3689 24.7536 17.7434 24.9293L16.8212 27.3118H14.2741L13.3532 24.9293C12.734 24.7559 12.1379 24.5085 11.5777 24.1927L9.24008 25.2264L7.43937 23.4257L8.47183 21.0868C8.15674 20.5268 7.90974 19.9312 7.73607 19.3126L5.35352 18.3904V15.8432L7.73607 14.9211C7.91178 14.2956 8.16017 13.701 8.47183 13.1456L7.43937 10.8092L9.24008 9.00724L11.5777 10.041C12.1327 9.72975 12.7265 9.48008 13.3532 9.30522L14.2741 6.92139H16.8212L17.7434 9.30522L17.7438 9.3048ZM22.1126 7.92691C24.1899 7.92691 25.8744 9.61133 25.8744 11.6886C25.8744 13.7659 24.1899 15.4504 22.1126 15.4504C20.0353 15.4504 18.3509 13.7672 18.3509 11.6886C18.3509 9.61004 20.0353 7.92691 22.1126 7.92691ZM20.3932 11.8836C20.2769 11.766 20.2769 11.5771 20.3932 11.4608C20.4208 11.4328 20.4537 11.4107 20.49 11.3955C20.5263 11.3804 20.5652 11.3726 20.6046 11.3726C20.6439 11.3726 20.6828 11.3804 20.7191 11.3955C20.7554 11.4107 20.7883 11.4328 20.816 11.4608L21.6206 12.2654L23.4093 10.4779C23.437 10.45 23.4699 10.4278 23.5062 10.4127C23.5425 10.3975 23.5814 10.3897 23.6207 10.3897C23.66 10.3897 23.6989 10.3975 23.7352 10.4127C23.7715 10.4278 23.8044 10.45 23.8321 10.4779C23.9484 10.5942 23.9484 10.7832 23.8321 10.9007L21.8326 12.9002C21.7163 13.0165 21.5261 13.0165 21.4098 12.9002L20.3932 11.8836ZM17.1598 17.4871C18.4749 17.7778 19.465 18.956 19.465 20.3544V20.9482C18.4702 21.9649 17.0837 22.595 15.5481 22.595C14.0125 22.595 12.6277 21.9649 11.6325 20.9482V20.3544C11.6325 18.956 12.6226 17.7782 13.9364 17.4871C14.8949 18.1925 16.2026 18.1925 17.1598 17.4871ZM15.5481 13.1751C16.7199 13.1751 17.6699 14.1251 17.6699 15.296C17.6699 16.467 16.7199 17.4178 15.5481 17.4178C14.3763 17.4178 13.4272 16.4679 13.4272 15.296C13.4272 14.1242 14.3771 13.1751 15.5481 13.1751Z" fill="white"/>
                </svg>
                Family Information
                </a>
            </div>
        </li>
        <li class="nav-item step-indicator">
            <div class="step-wrapper">
                <a class="nav-link {{ (isset($application) && $application->current_step === 4) ? 'active' : '' }}" href="#" onclick="validateAndShowStep(4)">
                <svg width="33" height="34" viewBox="0 0 33 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.913086" width="32.1196" height="32.1196" rx="8.9221" fill="#074826"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.7579 13.3874L18.3594 9.75085C17.6515 9.15733 16.7573 8.83203 15.8335 8.83203C14.9097 8.83203 14.0155 9.15733 13.3076 9.75085L8.90912 13.3874C8.11697 14.0432 7.66699 15.0362 7.66699 16.0725V21.7442C7.66699 23.5857 9.08306 25.1651 10.9336 25.1651H12.5669C13.0001 25.1651 13.4155 24.993 13.7218 24.6867C14.0281 24.3804 14.2002 23.965 14.2002 23.5318V20.8761C14.2002 19.8406 14.9776 19.0876 15.8335 19.0876C16.6893 19.0876 17.4668 19.8406 17.4668 20.8761V23.5318C17.4668 23.965 17.6389 24.3804 17.9452 24.6867C18.2515 24.993 18.6669 25.1651 19.1001 25.1651H20.7334C22.5839 25.1651 24 23.5857 24 21.7434V16.0725C24 15.0362 23.5508 14.0432 22.7579 13.3874Z" fill="white"/>
                </svg>
                Housing Requirement
                </a>
            </div>
        </li>
        <li class="nav-item step-indicator">
            <div class="step-wrapper">
                <a class="nav-link {{ (isset($application) && $application->current_step === 5) ? 'active' : '' }}" href="#" onclick="validateAndShowStep(5)">
                <svg width="33" height="34" viewBox="0 0 33 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.913086" width="32.1196" height="32.1196" rx="8.9221" fill="#074826"/>
                <path d="M17.2053 23.4275C17.2053 21.9816 17.7682 20.6219 18.7908 19.5994C19.8133 18.5768 21.1726 18.0139 22.6189 18.0139C23.8061 18.0139 24.9349 18.3939 25.867 19.0956C25.9187 18.3405 25.9508 17.4959 25.952 16.5504C25.9495 14.1724 25.7499 12.431 25.537 11.1514C25.1645 9.04292 23.2494 7.12781 21.1409 6.75528C19.8613 6.54194 18.1199 6.34234 15.7414 6.33984C13.3634 6.34234 11.6216 6.54194 10.3419 6.75487C8.23391 7.12739 6.3188 9.0425 5.94627 11.151C5.73335 12.4306 5.53417 14.172 5.53125 16.55C5.53417 18.9281 5.73335 20.6698 5.94627 21.9495C6.3188 24.058 8.23391 25.9731 10.3424 26.3456C11.622 26.5585 13.3634 26.7577 15.7418 26.7606C16.6873 26.7594 17.5319 26.7273 18.287 26.6756C17.5853 25.7435 17.2053 24.6151 17.2053 23.4275ZM10.6966 11.2743H20.7867C21.4393 11.2743 21.9685 11.8035 21.9685 12.456C21.9685 13.1086 21.4393 13.6378 20.7867 13.6378H10.6966C10.044 13.6378 9.51482 13.1086 9.51482 12.456C9.51482 11.8035 10.044 11.2743 10.6966 11.2743ZM10.6966 18.5726C10.044 18.5726 9.51482 18.0434 9.51482 17.3909C9.51482 16.7384 10.044 16.2092 10.6966 16.2092H16.6198C17.2723 16.2092 17.8015 16.7384 17.8015 17.3909C17.8015 18.0434 17.2723 18.5726 16.6198 18.5726H10.6966Z" fill="white"/>
                <path d="M22.618 19.1807C20.2725 19.1807 18.3711 21.082 18.3711 23.4276C18.3711 25.7731 20.2725 27.6745 22.618 27.6745C24.9636 27.6745 26.8649 25.7731 26.8649 23.4276C26.8649 21.082 24.9636 19.1807 22.618 19.1807ZM23.4097 25.5348C23.4097 25.9719 23.0551 26.3265 22.618 26.3265C22.1809 26.3265 21.8263 25.9719 21.8263 25.5348V23.4459C21.8263 23.0088 22.1809 22.6542 22.618 22.6542C23.0551 22.6542 23.4097 23.0088 23.4097 23.4459V25.5348ZM23.3772 21.7512C23.348 21.9162 23.198 22.0662 23.033 22.0954C22.933 22.1121 22.7964 22.1275 22.6101 22.1279C22.4238 22.1279 22.2876 22.1121 22.1871 22.0954C22.0221 22.0662 21.8721 21.9162 21.843 21.7512C21.8263 21.6512 21.8109 21.5146 21.8105 21.3283C21.8105 21.142 21.8263 21.0058 21.843 20.9053C21.8721 20.7403 22.0221 20.5903 22.1871 20.5612C22.2872 20.5445 22.4238 20.5291 22.6101 20.5287C22.7964 20.5287 22.9326 20.5445 23.033 20.5612C23.198 20.5903 23.348 20.7403 23.3772 20.9053C23.3939 21.0054 23.4093 21.142 23.4097 21.3283C23.4097 21.5146 23.3939 21.6508 23.3772 21.7512Z" fill="white"/>
                </svg>
                Documents Attached
                </a>
            </div>
        </li>
        <li class="nav-item step-indicator">
            <div class="step-wrapper">
                <a class="nav-link {{ (isset($application) && $application->current_step === 6) ? 'active' : '' }}" href="#" onclick="validateAndShowStep(6)">
                <svg width="33" height="34" viewBox="0 0 33 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.796875" y="0.913086" width="32.1196" height="32.1196" rx="8.9221" fill="#074826"/>
                <path d="M16.9247 16.5427C18.055 16.5427 19.0338 16.1373 19.8335 15.3374C20.6333 14.5377 21.0387 13.5592 21.0387 12.4287C21.0387 11.2986 20.6333 10.32 19.8334 9.51995C19.0335 8.72034 18.0548 8.31494 16.9247 8.31494C15.7942 8.31494 14.8156 8.72034 14.0159 9.52009C13.2162 10.3198 12.8106 11.2985 12.8106 12.4287C12.8106 13.5592 13.2161 14.5378 14.016 15.3376C14.8159 16.1372 15.7946 16.5427 16.9247 16.5427ZM24.1231 21.449C24.1 21.1162 24.0533 20.7531 23.9846 20.3698C23.9153 19.9835 23.8261 19.6184 23.7192 19.2846C23.6088 18.9397 23.4587 18.5991 23.2732 18.2726C23.0805 17.9338 22.8543 17.6388 22.6005 17.396C22.335 17.142 22.01 16.9378 21.6342 16.7888C21.2597 16.6407 20.8446 16.5657 20.4006 16.5657C20.2263 16.5657 20.0577 16.6372 19.732 16.8492C19.5005 17 19.2683 17.1496 19.0355 17.2983C18.8117 17.4408 18.5086 17.5744 18.1342 17.6954C17.7689 17.8135 17.3981 17.8735 17.032 17.8735C16.666 17.8735 16.2952 17.8135 15.9295 17.6954C15.5556 17.5745 15.2525 17.441 15.0289 17.2984C14.7697 17.1328 14.5352 16.9816 14.3318 16.8491C14.0065 16.6371 13.8378 16.5655 13.6634 16.5655C13.2193 16.5655 12.8044 16.6407 12.43 16.789C12.0544 16.9377 11.7293 17.1419 11.4636 17.3961C11.2099 17.639 10.9835 17.9339 10.7911 18.2726C10.6057 18.5991 10.4556 18.9396 10.3451 19.2848C10.2383 19.6185 10.1491 19.9835 10.0798 20.3698C10.0111 20.7526 9.96444 21.1158 9.94136 21.4494C9.91839 21.7851 9.90701 22.1215 9.90723 22.458C9.90723 23.3497 10.1907 24.0715 10.7496 24.6038C11.3016 25.1291 12.032 25.3956 12.9202 25.3956H21.1446C22.0328 25.3956 22.763 25.1292 23.3151 24.6038C23.8742 24.0719 24.1576 23.3499 24.1576 22.4579C24.1575 22.1138 24.1459 21.7743 24.1231 21.449Z" fill="white"/>
                </svg>
                Declaration
                </a>
            </div>
        </li>
    </ul>
    <div class="progress">
        <div class="progress-bar" style="width: {{ (isset($application) ? $application->current_step : 1) * 16.66666 }}%;"></div>
    </div>
  
   
    <form action="{{ route('applicant.store') }}" method="POST" id="applicantForm">
        @csrf
        <div id="loadingOverlay" style="display: none; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 9999; text-align: center;">
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <p style="color: white;">Please wait...</p>
            </div>
        </div>
        <!-- Step 1: Applicant Information -->
        <div class="step" id="step1" style="{{ (isset($application) && $application->current_step === 1) ? 'display:block;' : 'display:none;' }}"> 
            <fieldset>
            <div class="card-body" style="text-align: right;line-height: normal;font-size: 12px;    color: #000;border-radius: 10px;background: #ead3d3;">
                        <div class="row">
                            <div class="col-md-7">
                                <p class="p-0 m-0" style=" color: #000;text-align: left;font-size: 14px;">Note: Fields marked with asterisk (*) are mandatory, data will not be
                                saved without them. </p>
                             </div>
                            <div class="col-md-5">
                                <p class="urdu-lbl p-0 m-0" dir="rtl" style=" text-align: right;  line-height: normal;  font-size: 12px;">
                                نوٹ: ستارے (*) سے نشان زد فیلڈز لازمی ہیں، ان کے بغیر ڈیٹا محفوظ نہیں کیا جائے گا  </p>
                            </div>
                        </div>
                </div>
            <h4>A. APPLICANT INFORMATION</h4>
            <div class="row">                
                    <div class="form-group col-md-6">                       
                    <label for="full_name" class="col-form-label"><span>Full Name<span class="text-danger-asterisk">*</span></span>  <span class="urdu-lbl"> مکمل نام </span></label>
                            <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $application->full_name ?? $user->name ?? '') }}" maxlength="75" required class="form-control" aria-label="Full Name">
                            @error('full_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror                       
                    </div>
                    <div class="form-group col-md-6">
                    <label for="father_husband_name" class="col-form-label"><span>Father's/Husband's Name<span class="text-danger-asterisk">*</span></span> <span class="urdu-lbl"> ولدیت/ زوجیت </span></label>
                            <input type="text" id="father_husband_name" name="father_husband_name" value="{{ old('father_husband_name', $application->father_husband_name ?? $user->fathers_husbands_name ?? '') }}" required class="form-control" aria-label="Father's/Husband's Name">
                            @error('father_husband_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                       
                    </div>
                    <div class="form-group col-md-6">
                    <label for="cnic" class="col-form-label"><span>CNIC No.<span class="text-danger-asterisk">*</span></span> <span class="urdu-lbl"> قومی شناختی کارڈ نمبر </span></label>
                            <input type="text" id="cnic" name="cnic" value="{{ old('cnic', $application->cnic ?? $user->cnic ?? '') }}" required class="form-control" placeholder="12345-1234567-1" maxlength="15" aria-label="CNIC No">
                            @error('cnic')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror                        
                    </div>
                    <div class="form-group col-md-6">
                    <label for="dob" class=" col-form-label"><span>Date of Birth<span class="text-danger-asterisk">*</span></span> <span class="urdu-lbl"> تاریخ پیدائش </span></label>
                            <input type="date" id="dob" name="dob" value="{{ old('dob', $application->dob ?? $user->date_of_birth ?? '') }}" required class="form-control" aria-label="Date of Birth">
                            @error('dob')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        
                    </div>
                    <div class="form-group col-md-6">
                    <label class="col-form-label"><span>Gender<span class="text-danger-asterisk">*</span></span> <span class="urdu-lbl"> صنف </span></label>
                            <select name="gender" required class="form-control" aria-label="Gender">
                                <option value="" disabled {{ empty($application) && empty($user->gender) ? 'selected' : '' }}>Please select</option>
                                <option value="0" {{ (!empty($application) && $application->gender === 0) ? 'selected' : (!empty($user->gender) && $user->gender == 0 ? 'selected' : '') }}>MALE</option>
                                <option value="1" {{ (!empty($application) && $application->gender === 1) ? 'selected' : (!empty($user->gender) && $user->gender == 1 ? 'selected' : '') }}>FEMALE</option>
                                <option value="2" {{ (!empty($application) && $application->gender === 2) ? 'selected' : (!empty($user->gender) && $user->gender == 2 ? 'selected' : '') }}>OTHER</option>
                            </select>
                            @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        
                    </div>
                    <div class="form-group col-md-6">
                    <label class=" col-form-label"><span>Marital Status<span class="text-danger-asterisk">*</span></span>:</label>
                            <select name="marital_status" id="marital_status" required class="form-control" aria-label="Marital Status" onchange="toggleSpouseInfo()">
                                <option value="" disabled {{ (empty($application->marital_status) && empty($user->marital_status)) ? 'selected' : '' }}>Please select</option>
                                <option value="0" {{ (!empty($application) && $application->marital_status == 0) ? 'selected' : (!empty($user->marital_status) && $user->marital_status == 0 ? 'selected' : '') }}>MARRIED</option>
                                <option value="1" {{ (!empty($application) && $application->marital_status == 1) ? 'selected' : (!empty($user->marital_status) && $user->marital_status == 1 ? 'selected' : '') }}>UNMARRIED</option>
                                <option value="2" {{ (!empty($application) && $application->marital_status == 2) ? 'selected' : (!empty($user->marital_status) && $user->marital_status == 2 ? 'selected' : '') }}>WIDOW</option>
                                <option value="3" {{ (!empty($application) && $application->marital_status == 3) ? 'selected' : (!empty($user->marital_status) && $user->marital_status == 3 ? 'selected' : '') }}>DIVORCED</option>
                                <option value="4" {{ (!empty($application) && $application->marital_status == 4) ? 'selected' : (!empty($user->marital_status) && $user->marital_status == 4 ? 'selected' : '') }}>SEPARATED</option>
                                <!-- <option value="5" {{ (!empty($application) && $application->marital_status == 5) ? 'selected' : (!empty($user->marital_status) && $user->marital_status == 5 ? 'selected' : '') }}>SINGLE</option> -->
                            </select>
                            @error('marital_status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                       
                    </div>

                    <div id="nominee_section" class="form-group col-md-6 nominee_section" style="display:none;">
                    <label class="col-form-label"><span>Nominee<span class="text-danger-asterisk">*</span></span> <span class="urdu-lbl"> نامزد رشتہ</span></label>
                            <select name="nominee" id="nominee_dropdown" required class="form-control" aria-label="Gender">
                                <option value="" disabled selected>Please select Nominee</option>
                                <option value="FATHER" {{ (!empty($application) && $application->nominee === 'FATHER') ? 'selected' : '' }}>FATHER</option>
                                <option value="MOTHER" {{ (!empty($application) && $application->nominee === 'MOTHER') ? 'selected' : '' }}>MOTHER</option>
                                <option value="BROTHER" {{ (!empty($application) && $application->nominee === 'BROTHER') ? 'selected' : '' }}>BROTHER</option>
                                <option value="SISTER" {{ (!empty($application) && $application->nominee === 'SISTER') ? 'selected' : '' }}>SISTER</option>
                            </select>
                            @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group col-md-6">
                    <label for="contact_number" class=" col-form-label"><span>Applicant Mobile No.<span class="text-danger-asterisk">*</span></span> <span class="urdu-lbl"> درخواست گزار کا موبائل نمبر </span></label>
                            <input type="text" id="contact_number" name="contact_number" value="{{ old('contact_number', $user->contact_number ? '0' . $user->contact_number : '') }}" required class="form-control" aria-label="Mobile Number" maxlength="12" {{ !empty($user->cnic) ? 'readonly' : '' }}>
                            @error('contact_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                       
                    </div>
                    <div class="form-group col-md-6">
                    <label class="col-form-label"><span>Email<span class="text-danger-asterisk">*</span></span><span class="urdu-lbl">ای میل </span></label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="form-control" aria-label="Email" {{ !empty($user->cnic) ? 'disabled' : '' }}>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        
                    </div>
                    <div class="form-group col-md-6">
                      <label class=" col-form-label">Current Address <span class="urdu-lbl">درخواست گزار کا موجودہ پتہ </span></label>
                      <textarea id="current_address" 
                        name="current_address" 
                        class="form-control mb-3" 
                        placeholder="Enter Current Address" 
                        rows="6" 
                        aria-label="Current Address" 
                        style="min-height: 230px; resize: none;" 
                        draggable="false"
                        ondragstart="return false;" 
                        ondrop="return false;"
                        >{{ old('current_address', $application->current_address ?? '') }}</textarea>
                            @error('current_address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        
                    </div>
<div class="form-group col-md-6">
                <label class=" col-form-label">Current Division <span class="urdu-lbl"> موجودہ ڈویژن </span></label>
                            <select name="current_division" id="current_division" class="form-control mb-3" onchange="populateDistricts('current')" aria-label="Current Division">
                                <option value="">Select Division</option>
                                @foreach($divisions as $division)
                                    <option value="{{ $division->id }}" {{ old('current_division', $application->current_division ?? '') == $division->id ? 'selected' : '' }}>{{ $division->name }} </option>
                                @endforeach
                            </select>
                            @error('current_division')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label class=" col-form-label">Current District <span class="urdu-lbl"> موجودہ ضلع </span></label>
                            <select name="current_district" id="current_district" class="form-control mb-3" onchange="populateTehsils('current')" aria-label="Current District">
                                <option value="">Select District</option>
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}" {{ old('current_district', $application->current_district ?? '') == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                                @endforeach
                            </select>
                            @error('current_district')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label class=" col-form-label">Current Tehsil <span class="urdu-lbl"> موجودہ تحصیل </span></label>
                            <select name="current_tehsil" id="current_tehsil" class="form-control mb-3" aria-label="Current Tehsil">
                                <option value="">Select Tehsil</option>
                                @foreach($tehsils as $tehsil)
                                    <option value="{{ $tehsil->id }}" {{ old('current_tehsil', $application->current_tehsil ?? '') == $tehsil->id ? 'selected' : '' }}>{{ $tehsil->tehsil_name }} </option>
                                @endforeach
                            </select>
                            @error('current_tehsil')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        
                    </div>
                    <div class="form-group col-md-6">
                            <div class="form-check mb-3">
                                <input type="checkbox" id="same_as_current_address" name="same_as_current_address" class="form-check-input" onclick="togglePermanentAddress()" {{ old('same_as_current_address', $application->same_as_current_address ?? false) ? 'checked' : '' }}>
                                <label for="same_as_current_address" class="form-check-label">Same as Current Address</label>
                            </div>
                    <label class="col-form-label">Permanent Address <span class="urdu-lbl"> درخواست گزار کا مستقل پتہ </span></label>
                         

                    <textarea id="permanent_address" 
          name="permanent_address" 
          class="form-control mb-3" 
          placeholder="Enter Permanent Address" 
          rows="6" 
          aria-label="Current Address" 
          style="min-height: 230px; resize: none;" 
          draggable="false"
          ondragstart="return false;" 
          ondrop="return false;"
          >{{ old('permanent_address', $application->permanent_address ?? '') }}</textarea>

                            @error('permanent_address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
<div class="form-group col-md-6 mt-5">
<label class=" col-form-label">Permanent Division <span class="urdu-lbl"> مستقل ڈویژن </span></label>
                            <select name="permanent_division" id="permanent_division" class="form-control mb-3" onchange="populateDistricts('permanent')" aria-label="Permanent Division">
                                <option value="">Select Division</option>
                                @foreach($divisions as $division)
                                    <option value="{{ $division->id }}" {{ old('permanent_division', $application->permanent_division ?? '') == $division->id ? 'selected' : '' }}>{{ $division->name }} </option>
                                @endforeach
                            </select>
                            @error('permanent_division')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label class=" col-form-label">Permanent District <span class="urdu-lbl"> مستقل ضلع </span></label>
                            <select name="permanent_district" id="permanent_district" class="form-control mb-3" onchange="populateTehsils('permanent')" aria-label="Permanent District">
                                <option value="">Select District</option>
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}" {{ old('permanent_district', $application->permanent_district ?? '') == $district->id ? 'selected' : '' }}>{{ $district->name }} </option>
                                @endforeach
                            </select>
                            @error('permanent_district')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label class=" col-form-label">Permanent Tehsil <span class="urdu-lbl"> مستقل تحصیل </span></label>
                            <select name="permanent_tehsil" id="permanent_tehsil" class="form-control mb-3" aria-label="Permanent Tehsil">
                                <option value="">Select Tehsil</option>
                                @foreach($tehsils as $tehsil)
                                    <option value="{{ $tehsil->id }}" {{ old('permanent_tehsil', $application->permanent_tehsil ?? '') == $tehsil->id ? 'selected' : '' }}>{{ $tehsil->tehsil_name }}  </option>
                                @endforeach
                            </select>
                            @error('permanent_tehsil')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        
                    </div>
            </div>
            </fieldset>
            <button type="button" class="btn btn-primary" onclick="nextStep(1)">Next</button>
        </div>

        <!-- Step 2: Employment & Income Details -->
        <div class="step" id="step2" style="{{ (isset($application) && $application->current_step === 2) ? 'display:block;' : 'display:none;' }}">
            <fieldset>
            <div class="card-body" style="text-align: right;line-height: normal;font-size: 12px;    color: #000;border-radius: 10px;background: #ead3d3;">
                        <div class="row">
                            <div class="col-md-7">
                                <p class="p-0 m-0" style=" color: #000;text-align: left;font-size: 14px;">Note: Fields marked with asterisk (*) are mandatory, data will not be
                                saved without them. </p>
                             </div>
                            <div class="col-md-5">
                                <p class="urdu-lbl p-0 m-0" dir="rtl" style=" text-align: right;  line-height: normal;  font-size: 12px;">
                                نوٹ: ستارے (*) سے نشان زد فیلڈز لازمی ہیں، ان کے بغیر ڈیٹا محفوظ نہیں کیا جائے گا  </p>
                            </div>
                        </div>
                </div>
                <h4>B. EMPLOYMENT & INCOME DETAILS</h4>
                <div class="row"> 
                <div class="form-group col-md-6 ">
                <label for="occupation" class="col-form-label"><span>Occupation of Applicant<span class="text-danger-asterisk">*</span></span> <span class="urdu-lbl"> درخواست گزار کا پیشہ </span></label>
                        <select id="occupation" name="occupation" required class="form-control" aria-label="Occupation" onChange="toggleApplicantOccupation()">
                            <option value="">Select Occupation</option>
                            @foreach($occupations as $occupation)
                                <option value="{{ $occupation->id }}" {{ old('occupation', $application->occupation ?? '') == $occupation->id ? 'selected' : '' }}>{{ $occupation->name }}</option>
                            @endforeach
                        </select>
                        @error('occupation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    
                </div>
                <div class="form-group col-md-6 " id="applicant-employer-name-container" style="{{ !empty($application) && $application->occupation != 13 ? 'display: block;' : 'display: none;'  }}">
                <label for="employer_name" class="col-form-label">Employer Name (Not Mandatory) <span class="urdu-lbl"> آجر کا نام </span></label>
                        <input type="text" id="employer_name" name="employer_name" value="{{ old('employer_name', $application->employer_name ?? '') }}" class="form-control" aria-label="Employer Name">
                        @error('employer_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    
                </div>
                <div class="form-group col-md-6 " id="applicant-monthly-income-range-container" style="{{ !empty($application) && $application->occupation != 13 ? 'display: block;' : 'display: none;'  }}">
                <label for="monthly_income_range" class=" col-form-label">Monthly Income Range <span class="urdu-lbl"> ماہانہ آمدنی کی حد </span></label>
                        <select id="monthly_income_range" name="monthly_income_range" class="form-control" aria-label="Monthly Income Range">
                            <option value="">Select Monthly Income Range</option>
                            @foreach($incomeRanges as $range)
                                <option value="{{ $range->id }}" {{ old('monthly_income_range', $application->monthly_income_range ?? '') == $range->id ? 'selected' : '' }}>{{ $range->range }}</option>
                            @endforeach
                        </select>
                        @error('monthly_income_range')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                   
                </div>
                
                <div class="form-group col-md-6 " id="applicant-source-income-container" style="{{ !empty($application) && $application->occupation != 13 ? 'display: block;' : 'display: none;'  }}">
                <label class="col-form-label">Applicant Source of Income <span class="urdu-lbl"> درخواست دہندگان کی آمدنی کا ذریعہ </span></label>
                        <select name="source_of_income" required class="form-control" aria-label="Source of Income">
                            <option value="">Select Source of Income</option>
                            @foreach($incomeSources as $source)
                                <option value="{{ $source->id }}" {{ old('source_of_income', $application->source_of_income ?? '') == $source->id ? 'selected' : '' }}>{{ $source->name }}</option>
                            @endforeach
                        </select>
                        @error('source_of_income')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    
                </div>
                <div class="form-group col-md-6 ">
                <label class="col-form-label">Does the applicant own any property? <span class="text-danger-asterisk">*</span> <span class="urdu-lbl"> کیا درخواست گزار کے پاس کوئی جائیداد ہے؟ </span></label>
                        <select name="own_property" required class="form-control" aria-label="Own Property">
                            <option value="">Select</option>
                            <option value="1" {{ old('own_property', $application->own_property ?? '') == '1' ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('own_property', $application->own_property ?? '') == '0' ? 'selected' : '' }}>No</option>
                        </select>
                        @error('own_property')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror                   
                </div>
            </div>
            </fieldset>
            <button type="button" class="btn btn-secondary" onclick="prevStep(2)">Previous</button>
            <button type="button" class="btn btn-primary" onclick="nextStep(2)">Next</button>
        </div>

        <!-- Step 3: Family Information -->
        <div class="step" id="step3" style="{{ (isset($application) && $application->current_step === 3) ? 'display:block;' : 'display:none;' }}">
            <fieldset>
            <div class="card-body" style="text-align: right;line-height: normal;font-size: 12px;    color: #000;border-radius: 10px;background: #ead3d3;">
                        <div class="row">
                            <div class="col-md-7">
                                <p class="p-0 m-0" style=" color: #000;text-align: left;font-size: 14px;">Note: Fields marked with asterisk (*) are mandatory, data will not be
                                saved without them. </p>
                             </div>
                            <div class="col-md-5">
                                <p class="urdu-lbl p-0 m-0" dir="rtl" style=" text-align: right;  line-height: normal;  font-size: 12px;">
                                نوٹ: ستارے (*) سے نشان زد فیلڈز لازمی ہیں، ان کے بغیر ڈیٹا محفوظ نہیں کیا جائے گا  </p>
                            </div>
                        </div>
                </div>
                <h4>C. FAMILY INFORMATION</h4>
                <div class="row"> 
                <div class="form-group col-md-6 ">
                <label for="total_family_members" class="col-form-label">Total Family Members <span class="urdu-lbl"> فیملی ممبرز کی تعداد </span></label>
                        <input type="number" id="total_family_members" name="total_family_members" value="{{ old('total_family_members', $application->total_family_members ?? '') }}" required class="form-control" aria-label="Total Family Members">
                        @error('total_family_members')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                   
                </div>
                <div class="form-group col-md-6 ">
                    <label for="number_of_dependents" class="col-form-label"><span>Number of Dependents<span class="text-danger-asterisk">*</span></span> <span class="urdu-lbl"> زیرکفالت افراد کی تعداد </span></label>
                   
                        <input type="number" id="number_of_dependents" name="number_of_dependents" value="{{ old('number_of_dependents', $application->number_of_dependents ?? '') }}" required class="form-control" aria-label="Number of Dependents">
                        @error('number_of_dependents')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group col-md-6" id="spouse_info" style="{{ !empty($application) && $application->marital_status == 0 ? 'display: block;' : 'display: none;' }}">
                    <label for="spouse_occupation" class="col-form-label">Spouse's Occupation (if applicable) <span class="urdu-lbl"> شریک حیات کا پیشہ </span></label>
                   
                        <select id="spouse_occupation" name="spouse_occupation" class="form-control" aria-label="Spouse's Occupation">
                            <option value="">Select Occupation</option>
                            @foreach($occupations as $occupation)
                                <option value="{{ $occupation->id }}" {{ old('spouse_occupation', $application->spouse_occupation ?? '') == $occupation->id ? 'selected' : '' }}>{{ $occupation->name }}</option>
                            @endforeach
                        </select>
                        @error('spouse_occupation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group col-md-6 ">
                    <label for="combined_family_income" class="col-form-label"><span>Combined Family Income (PKR)<span class="text-danger-asterisk">*</span> <span class="urdu-lbl"> فیملی کی مشترکہ آمدنی </span></span></label>
                   
                    <select id="combined_family_income" name="combined_family_income" required class="form-control" aria-label="Combined Family Income">
                        <option value="">Select Income Range</option>
                        @foreach($combinedIncomeRanges as $range)
                            <option value="{{ $range->id }}" {{ old('combined_family_income', $application->combined_family_income ?? '') == $range->id ? 'selected' : '' }}>
                                {{ $range->range }}
                            </option>
                        @endforeach
                    </select>
                    @error('combined_family_income')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            </fieldset>
            <button type="button" class="btn btn-secondary" onclick="prevStep(3)">Previous</button>
            <button type="button" class="btn btn-primary" onclick="nextStep(3)">Next</button>
        </div>

        <!-- Step 4: Housing Requirement -->
        <div class="step" id="step4" style="{{ (isset($application) && $application->current_step === 4) ? 'display:block;' : 'display:none;' }}">
            <fieldset>
            <div class="card-body" style="text-align: right;line-height: normal;font-size: 12px;    color: #000;border-radius: 10px;background: #ead3d3;">
                        <div class="row">
                            <div class="col-md-7">
                                <p class="p-0 m-0" style=" color: #000;text-align: left;font-size: 14px;">Note: Fields marked with asterisk (*) are mandatory, data will not be
                                saved without them. </p>
                             </div>
                            <div class="col-md-5">
                                <p class="urdu-lbl p-0 m-0" dir="rtl" style=" text-align: right;  line-height: normal;  font-size: 12px;">
                                نوٹ: ستارے (*) سے نشان زد فیلڈز لازمی ہیں، ان کے بغیر ڈیٹا محفوظ نہیں کیا جائے گا  </p>
                            </div>
                        </div>
                </div>
                <h4>D. HOUSING REQUIREMENT</h4>
                <div class="row"> 
                    <div class="form-group col-md-6 ">
                        <label class="col-form-label"><span>Are you currently residing in a rented house?<span class="text-danger-asterisk">*</span></span> <span class="urdu-lbl"> کیا آپ فی الحال کرائے کے مکان میں مقیم ہیں؟ </span></label>
                        
                            <select name="rented_house" id="rented_house" required class="form-control" aria-label="Rented House" onchange="toggleMonthlyRent()">
                                <option value="">Select</option>
                                <option value="yes" {{ old('rented_house', $application->rented_house ?? '') == 'yes' ? 'selected' : '' }}>Yes</option>
                                <option value="no" {{ old('rented_house', $application->rented_house ?? '') == 'no' ? 'selected' : '' }}>No</option>
                            </select>
                            @error('rented_house')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
               
                    <div class="form-group col-md-6 ">
                        <label class="col-form-label"><span>Do you have any prior allotment of government housing?<span class="text-danger-asterisk">*</span></span> <span class="urdu-lbl"> کیا آپ پہلے سے کسی ایسی حکومتی اسکیم سے استفادہ حاصل
                        کر چکے ہیں؟</span></label>
                        
                            <select name="government_housing" id="government_housing" required class="form-control" aria-label="Government Housing" onchange="toggleHousingDetails()">
                                <option value="">Select</option>
                                <option value="yes" {{ old('government_housing', $application->government_housing ?? '') == 'yes' ? 'selected' : '' }}>Yes</option>
                                <option value="no" {{ old('government_housing', $application->government_housing ?? '') == 'no' ? 'selected' : '' }}>No</option>
                            </select>
                            @error('government_housing')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group col-md-6 " id="monthly_rent_container" style="{{ old('rented_house', $application->rented_house ?? '') == 'yes' ? '' : 'visibility: hidden; height: 0;' }}">
                        <label for="monthly_rent" class="col-form-label">If yes, Monthly Rent (PKR) <span class="urdu-lbl"> اگر ہاں، تو ماہانہ کرایہ </span></label>
                        
                            <input type="text" id="monthly_rent" name="monthly_rent" value="{{ old('monthly_rent', $application->monthly_rent ?? '') }}" class="form-control" pattern="[\d,]+" aria-label="Monthly Rent">
                            @error('monthly_rent')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group col-md-6 " id="housing_details_container" style="{{ old('government_housing', $application->government_housing ?? '') == 'yes' ? '' : 'visibility: hidden; height: 0;' }}">
                        <label for="scheme_name" class="col-form-label">If yes, provide detail <span class="urdu-lbl"> اگر ہاں تو تفصیل فراہم کریں </span></label>
                            <div class="form-group col-md-12">
                            <label for="scheme_name" class="col-form-label">Name of Scheme <span class="urdu-lbl"> سکیم کا نام </span></label>
                            <input type="text" id="scheme_name" name="scheme_name" value="{{ old('scheme_name', $application->scheme_name ?? '') }}" class="form-control mb-3" placeholder="Name of Scheme (سکیم کا نام)" aria-label="Scheme Name">
                            @error('scheme_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group col-md-12">
                            <label for="housing_location" class="col-form-label">Housing Location <span class="urdu-lbl"> سکیم کا مقام </span></label>
                            <select name="housing_location" class="form-control mb-3" aria-label="Housing Location">
                                <option value="">Select Location <span class="urdu-lbl"> مقام </span></option>
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}" {{ old('housing_location', $application->housing_location ?? '') == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                                @endforeach
                            </select>
                            @error('housing_location')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group col-md-12">
                            <label for="plot_size" class="col-form-label">Plot/House Size <span class="urdu-lbl"> پلاٹ/گھر کا رقبہ </span></label>
                            <select name="plot_size" class="form-control" aria-label="Plot Size">
                                <option value="">Select Plot/House Size <span class="urdu-lbl"> پلاٹ/گھر کا رقبہ </span></option>
                                @for ($i = 1; $i <= 99; $i++)
                                    <option value="{{ $i }}" {{ old('plot_size', $application->plot_size ?? '') == $i ? 'selected' : '' }}>{{ $i }} Marla</option>
                                @endfor        
                                <option value="100" {{ old('plot_size', $application->plot_size ?? '') == 100 ? 'selected' : '' }}>Above 99 Marla</option>            
                            </select>
                            @error('plot_size')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                    </div>
                    <div class="form-group col-md-6 " id="loan_options_container" >
                        <label class="col-form-label"><span>Would you like to take a loan under the 'Apni Chhat Apna Ghar' program?<span class="text-danger-asterisk">*</span></span> <span class="urdu-lbl">کیا آپ 'اپنا گھر اپنی چھت' پروگرام کے تحت قرض لینا چاہتے ہیں؟</span></label>
                        
                            <select name="loan_option" id="loan_option" required class="form-control" aria-label="Rented House" onchange="toggleLoanOptions()">
                                <option value="">Select</option>
                                <option value="yes" {{ old('loan_option', $application->loan_option ?? '') == 'yes' ? 'selected' : '' }}>Yes</option>
                                <option value="no" {{ old('loan_option', $application->loan_option ?? '') == 'no' ? 'selected' : '' }}>No</option>
                            </select>
                            @error('loan_option')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group" id="loan_details_container" style="{{ old('loan_option', $application->loan_option ?? '') == 'yes' ? '' : 'visibility: hidden; height: 0;' }}">
                        <label for="loan_amount"><span>If yes, how much loan would you like to take?<span class="text-danger-asterisk">*</span></span><span class="urdu-lbl">اگر ہاں، تو آپ کتنا قرض لینا چاہتے ہیں؟</span></label>
                        <select name="loan_amount" id="loan_amount" class="form-control" required>
                            <option value="">-- Select Amount --</option>
                            @foreach(\App\Models\Application::LOAN_RANGE as $key => $value)
                                <option value="{{ $key }}" {{ old('loan_amount',$application->loan_amount ?? '') == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>


            </div>
            </fieldset>
            <button type="button" class="btn btn-secondary" onclick="prevStep(4)">Previous</button>
            <button type="button" class="btn btn-primary" onclick="nextStep(4)">Next</button>
        </div>

        <!-- Step 5: Documents Attached -->
        <div class="step" id="step5" style="{{ (isset($application) && $application->current_step === 5) ? 'display:block;' : 'display:none;' }}">
        <div class="row">
     
            <div class="col-md-12">
            <div class="card-body" style="text-align: right;line-height: normal;font-size: 12px;    color: #000;border-radius: 10px;background: #ead3d3;">
                        <div class="row">
                            <div class="col-md-7">
                                <p class="p-0 m-0" style=" color: #000;text-align: left;font-size: 14px;">Note: Documents marked with asterisk (*) are mandatory, data will not be
                                saved without them. </p>
                             </div>
                            <div class="col-md-5">
                                <p class="urdu-lbl p-0 m-0" dir="rtl" style=" text-align: right;  line-height: normal;  font-size: 12px;">
                                نوٹ: ستارے (*) سے نشان زد فیلڈز لازمی ہیں، ان کے بغیر ڈیٹا محفوظ نہیں کیا جائے گا  </p>
                            </div>
                        </div>
                </div>
                <h4>E. DOCUMENTS ATTACHED</h4>
                
            </div>
          
            <div class="col-md-4">
                <fieldset>
                    
                    <div class="form-group">
                        <div class="applicant-picture-container">
                            <h4><span>Applicant Picture<span class="text-danger-asterisk">*</span> </span><span class="urdu-lbl">(درخواست گزار کی تصویر)</span></h4>
                            <div class="upload-section" id="applicant-picture-upload-section">
                                <p>Select a file or drag and drop here</p>
                                <p>JPG, PNG or PDF, file size no more than 1MB</p>
                                <input type="file" id="applicant-picture-upload" class="file-input" accept=".jpg, .jpeg, .png, .pdf" style="display: none;">
                                <button class="upload-button" onclick="document.getElementById('applicant-picture-upload').click();">Upload Document</button>
                                <div class="progress" style="display: none;">
                                    <div class="progress-bar" style="width: 0%;"></div>
                                </div>
                                <div class="status-container"></div>
                                <div class="upload-status mt-3">
                                @if(isset($application->applicationMedia) && $application->applicationMedia->count() > 0)
                                    @foreach($application->applicationMedia as $media)
                                        @if($media->document_type === 'applicant_picture')
                                            <button id="btn-applicant-picture-upload" onclick="viewFile('{{ $media->secure_file_path }}')" class="btn btn-primary">View File</button> 
                                        @endif
                                    @endforeach
                                @endif


                                <!-- Error message area -->
                                <input type="hidden" id="applicant-picture-input" name="applicant_picture">
                                <div class="text-danger" id="applicant-picture-error" style="display: {{ $errors->has('applicant_picture') ? 'block' : 'none' }};">
                                    {{ $errors->first('applicant_picture', 'Please upload an applicant picture to proceed.') }}
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-4">
                <fieldset>
                    <div class="form-group">
                        <div class="applicant-picture-container">
                            <h4><span>CNIC (Front)<span class="text-danger-asterisk">*</span></span> <span class="urdu-lbl"> درخواست گزار کا قومی شناختی کارڈ (فرنٹ) </span></h4>
                            <div class="upload-section" id="cnic-front-upload-section">
                                <p>Select a file or drag and drop here</p>
                                <p>JPG, PNG or PDF, file size no more than 1MB</p>
                                <input type="file" id="cnic-front-upload" class="file-input" accept=".jpg, .jpeg, .png, .pdf" style="display: none;">
                                <button class="upload-button" onclick="document.getElementById('cnic-front-upload').click();">Upload Document</button>
                                <div class="progress" style="display: none;">
                                    <div class="progress-bar" style="width: 0%;"></div>
                                </div>
                                <div class="status-container"></div>
                                <div class="upload-status mt-3">
                                @if(isset($application->applicationMedia) && $application->applicationMedia->count() > 0)
                                    @foreach($application->applicationMedia as $media)
                                        @if($media->document_type === 'cnic_front') <!-- Check if the document type is applicant_picture -->
                                            <button id="btn-cnic-front-upload" onclick="viewFile('{{ asset($media->secure_file_path) }}')" class="btn btn-primary">View File</button>
                                        @endif
                                        @endforeach
                                @endif
                                </div>
                                <input type="hidden" id="cnic-front-input" name="cnic_front">
                                <div class="text-danger" id="applicant-picture-error" style="display: {{ $errors->has('applicant_picture') ? 'block' : 'none' }};">
                                    {{ $errors->first('cnic_front', 'Please upload a CNIC front to proceed.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="col-md-4">
                <fieldset>
                    <div class="form-group">
                        <div class="applicant-picture-container">
                            <h4> <span>CNIC (Back)<span class="text-danger-asterisk">*</span></span> <span class="urdu-lbl"> درخواست گزار کا قومی شناختی کارڈ (بیک) </span></h4>
                            <div class="upload-section" id="cnic-back-upload-section">
                                <p>Select a file or drag and drop here</p>
                                <p>JPG, PNG or PDF, file size no more than 1MB</p>
                                <input type="file" id="cnic-back-upload" class="file-input" accept=".jpg, .jpeg, .png, .pdf" style="display: none;">
                                <button class="upload-button" onclick="document.getElementById('cnic-back-upload').click();">Upload Document</button>
                                <div class="progress" style="display: none;">
                                    <div class="progress-bar" style="width: 0%;"></div>
                                </div>
                                <div class="status-container"></div>
                                <div class="upload-status mt-3">
                                @if(isset($application->applicationMedia) && $application->applicationMedia->count() > 0)
                                    @foreach($application->applicationMedia as $media)
                                        @if($media->document_type === 'cnic_back') <!-- Check if the document type is applicant_picture -->
                                            <button id="btn-cnic-back-upload" onclick="viewFile('{{ asset($media->secure_file_path) }}')" class="btn btn-primary">View File</button>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <input type="hidden" id="cnic-back-input" name="cnic_back">
                            <div class="text-danger" id="applicant-picture-error" style="display: {{ $errors->has('cnic_back') ? 'block' : 'none' }};">
                                {{ $errors->first('cnic_back', 'Please upload a CNIC back to proceed.') }}
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="col-md-4" id="spouse-cnic-front-upload-container" style="{{ !empty($application) && $application->marital_status == 0 ? 'display: block;' : 'display: none;' }}">
                <fieldset>
                    <div class="form-group">
                        <div class="applicant-picture-container">
                            <h4>Spouse's CNIC (Front) (if applicable) <span class="urdu-lbl"> شریک حیات کا قومی شناختی کارڈ (ٖفرنٹ) </span></h4>
                            <div class="upload-section" id="spouse-cnic-front-upload-section">
                                <p>Select a file or drag and drop here</p>
                                <p>JPG, PNG or PDF, file size no more than 1MB</p>
                                <input type="file" id="spouse-cnic-front-upload" class="file-input" accept=".jpg, .jpeg, .png, .pdf" style="display: none;">
                                <button class="upload-button" onclick="document.getElementById('spouse-cnic-front-upload').click();">Upload Document</button>
                                <div class="progress" style="display: none;">
                                    <div class="progress-bar" style="width: 0%;"></div>
                                </div>
                                <div class="status-container"></div>
                                <div class="upload-status mt-3">
                                @if(isset($application->applicationMedia) && $application->applicationMedia->count() > 0)
                                    @foreach($application->applicationMedia as $media)
                                        @if($media->document_type === 'spouse_cnic_front') <!-- Check if the document type is applicant_picture -->
                                            <button id="btn-spouse-cnic-front-upload" onclick="viewFile('{{ asset($media->secure_file_path) }}')" class="btn btn-primary">View File</button>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <input type="hidden" id="spouse-cnic-front-input" name="spouse_cnic_front">
                            <div class="text-danger" id="applicant-picture-error" style="display: {{ $errors->has('spouse_cnic_front') ? 'block' : 'none' }};">
                                {{ $errors->first('spouse_cnic_front', 'Please upload a spouse CNIC front to proceed.') }}
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="col-md-4" id="spouse-cnic-back-upload-container" style="{{ !empty($application) && $application->marital_status == 0 ? 'display: block;' : 'display: none;' }}">
                <fieldset>
                    <div class="form-group">
                        <div class="applicant-picture-container">
                            <h4>Spouse's CNIC (Back) (if applicable) <span class="urdu-lbl"> شریک حیات کا قومی شناختی کارڈ (بیک) </span></h4>
                            <div class="upload-section" id="spouse-cnic-back-upload-section">
                                <p>Select a file or drag and drop here</p>
                                <p>JPG, PNG or PDF, file size no more than 1MB</p>
                                <input type="file" id="spouse-cnic-back-upload" class="file-input" accept=".jpg, .jpeg, .png, .pdf" style="display: none;">
                                <button class="upload-button" onclick="document.getElementById('spouse-cnic-back-upload').click();">Upload Document</button>
                                <div class="progress" style="display: none;">
                                    <div class="progress-bar" style="width: 0%;"></div>
                                </div>
                                <div class="status-container"></div>
                                <div class="upload-status mt-3">
                                @if(isset($application->applicationMedia) && $application->applicationMedia->count() > 0)
                                    @foreach($application->applicationMedia as $media)
                                        @if($media->document_type === 'spouse_cnic_back') <!-- Check if the document type is applicant_picture -->
                                            <button id="btn-spouse-cnic-back-upload" onclick="viewFile('{{ asset($media->secure_file_path) }}')" class="btn btn-primary">View File</button>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <input type="hidden" id="spouse-cnic-back-input" name="spouse_cnic_back">
                            <div class="text-danger" id="applicant-picture-error" style="display: {{ $errors->has('spouse_cnic_back') ? 'block' : 'none' }};">
                                {{ $errors->first('spouse_cnic_back', 'Please upload a spouse CNIC back to proceed.') }}
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="col-md-4" id="proof-of-income-upload-container" style="{{ !empty($application) && $application->occupation != 13 ? 'display: block;' : 'display: none;'  }}">
                <fieldset>
                    <div class="form-group">
                        <div class="applicant-picture-container">
                            <h4>Proof of Income  <span class="urdu-lbl"> آمدنی کا ثبوت </span></h4>
                            <div class="upload-section" id="proof-of-income-upload-section">
                                <p>Select a file or drag and drop here</p>
                                <p>JPG, PNG or PDF, file size no more than 1MB</p>
                                <input type="file" id="proof-of-income-upload" class="file-input" accept=".jpg, .jpeg, .png, .pdf" style="display: none;">
                                <button class="upload-button" onclick="document.getElementById('proof-of-income-upload').click();">Upload Document</button>
                                <div class="progress" style="display: none;">
                                    <div class="progress-bar" style="width: 0%;"></div>
                                </div>
                                <div class="status-container"></div>
                                <div class="upload-status mt-3">
                                @if(isset($application->applicationMedia) && $application->applicationMedia->count() > 0)
                                    @foreach($application->applicationMedia as $media)
                                        @if($media->document_type === 'proof_of_income') <!-- Check if the document type is applicant_picture -->
                                            <button id="btn-proof-of-income-upload" onclick="viewFile('{{ asset($media->secure_file_path) }}')" class="btn btn-primary">View File</button>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <input type="hidden" id="proof-of-income-input" name="proof_of_income">
                            <div class="text-danger" id="applicant-picture-error" style="display: {{ $errors->has('proof_of_income') ? 'block' : 'none' }};">
                                {{ $errors->first('proof_of_income', 'Please upload a proof of income to proceed.') }}
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="col-md-4">
                <fieldset>
                    <div class="form-group">
                        <div class="applicant-picture-container">
                            <h4>Any Other Supporting Documents <span class="urdu-lbl"> کوئی دیگر معاون دستاویزات </span></h4>
                            <div class="upload-section" id="other-supporting-documents-upload-section">
                                <p>Select a file or drag and drop here</p>
                                <p>JPG, PNG or PDF, file size no more than 1MB</p>
                                <input type="file" id="other-supporting-documents-upload" class="file-input" accept=".jpg, .jpeg, .png, .pdf" style="display: none;">
                                <button class="upload-button" onclick="document.getElementById('other-supporting-documents-upload').click();">Upload Document</button>
                                <div class="progress" style="display: none;">
                                    <div class="progress-bar" style="width: 0%;"></div>
                                </div>
                                <div class="status-container"></div>
                                <div class="upload-status mt-3">
                                @if(isset($application->applicationMedia) && $application->applicationMedia->count() > 0)
                                    @foreach($application->applicationMedia as $media)
                                        @if($media->document_type === 'other_documents') <!-- Check if the document type is applicant_picture -->
                                            <button id="btn-other-supporting-documents-upload" onclick="viewFile('{{ asset($media->secure_file_path) }}')" class="btn btn-primary">View File</button>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <input type="hidden" id="other-supporting-documents-input" name="other_documents">
                            <div class="text-danger" id="applicant-picture-error" style="display: {{ $errors->has('other_documents') ? 'block' : 'none' }};">
                                {{ $errors->first('other_documents', 'Please upload other supporting documents to proceed.') }}
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="col-md-4">
                <fieldset>
                    <div class="form-group">
                        <div class="applicant-picture-container">
                            <h4>Domicile Certificate <span class="urdu-lbl"> ڈومیسائل سرٹیفکیٹ </span></h4>
                            <div class="upload-section" id="domicile-certificate-upload-section">
                                <p>Select a file or drag and drop here</p>
                                <p>JPG, PNG or PDF, file size no more than 1MB</p>
                                <input type="file" id="domicile-certificate-upload" class="file-input" accept=".jpg, .jpeg, .png, .pdf" style="display: none;">
                                <button class="upload-button" onclick="document.getElementById('domicile-certificate-upload').click();">Upload Document</button>
                                <div class="progress" style="display: none;">
                                    <div class="progress-bar" style="width: 0%;"></div>
                                </div>
                                <div class="status-container"></div>
                                <div class="upload-status mt-3">
                                @if(isset($application->applicationMedia) && $application->applicationMedia->count() > 0)
                                    @foreach($application->applicationMedia as $media)
                                        @if($media->document_type === 'domicile') <!-- Check if the document type is applicant_picture -->
                                            <button id="btn-domicile-certificate-upload" onclick="viewFile('{{ asset($media->secure_file_path) }}')" class="btn btn-primary">View File</button>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <input type="hidden" id="domicile-certificate-input" name="domicile">
                            <div class="text-danger" id="applicant-picture-error" style="display: {{ $errors->has('domicile') ? 'block' : 'none' }};">
                                {{ $errors->first('domicile', 'Please upload a domicile certificate to proceed.') }}
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="col-md-4" style="display:none;">
                <fieldset>
                    <div class="form-group">
                        <div class="applicant-picture-container">
                            <h4>Affidavit Certificate<span class="text-danger">*</span> <span class="urdu-lbl"> آفیڈیو سرٹیفکیٹ </span></h4>
                            <div class="upload-section" id="affidavit-certificate-upload-section">
                                <p>Select a file or drag and drop here</p>
                                <p>JPG, PNG or PDF, file size no more than 1MB</p>
                                <input type="file" id="affidavit-certificate-upload" class="file-input" accept=".jpg, .jpeg, .png, .pdf" style="display: none;">
                                <button class="upload-button" onclick="document.getElementById('affidavit-certificate-upload').click();">Upload Document</button>
                                <div class="progress" style="display: none;">
                                    <div class="progress-bar" style="width: 0%;"></div>
                                </div>
                                <div class="status-container"></div>
                                <div class="upload-status mt-3">
                                @if(isset($application->applicationMedia) && $application->applicationMedia->count() > 0)
                                    @foreach($application->applicationMedia as $media)
                                        @if($media->document_type === 'affidavit') <!-- Check if the document type is applicant_picture -->
                                            <button id="btn-affidavit-certificate-upload" onclick="viewFile('{{ asset($media->secure_file_path) }}')" class="btn btn-primary">View File</button>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <input type="hidden" id="affidavit-certificate-input" name="affidavit">
                            <div class="text-danger" id="applicant-picture-error" style="display: {{ $errors->has('affidavit') ? 'block' : 'none' }};">
                                {{ $errors->first('affidavit', 'Please upload an affidavit certificate to proceed.') }}
                            </div>
                        </div>  
                    </div>
                </fieldset>
            </div>
        </div>
            <button type="button" class="btn btn-secondary" onclick="prevStep(5)">Previous</button>
            <button type="button" class="btn btn-primary document_next" onclick="nextStep(5)">Next</button>
        </div>

        <!-- Step 6: Declaration and Signature -->
        <div class="step" id="step6" style="{{ (isset($application) && $application->current_step === 6) ? 'display:block;' : 'display:none;' }}">
            <fieldset>
            <div class="card-body" style="text-align: right;line-height: normal;font-size: 12px;    color: #000;border-radius: 10px;background: #ead3d3;">
                        <div class="row" >
                            <div class="col-md-7">
                                <p class="p-0 m-0" style=" color: #000;text-align: left;font-size: 14px;">Note: Fields marked with asterisk (*) are mandatory, data will not be
                                saved without them. </p>
                             </div>
                            <div class="col-md-5">
                                <p class="urdu-lbl p-0 m-0" dir="rtl" style=" text-align: right;  line-height: normal;  font-size: 12px;">
                                نوٹ: ستارے (*) سے نشان زد فیلڈز لازمی ہیں، ان کے بغیر ڈیٹا محفوظ نہیں کیا جائے گا  </p>
                            </div>
                        </div>
                </div>
                <h4>F. DECLARATION AND SIGNATURE</h4>
                <div class="row" style="margin-left: -24px !important;">
                <div class="form-group col-md-12 px-5">
                <input type="checkbox" id="declaration" name="declaration" class="form-check-input" required>
                    <label for="declaration" class="form-check-label">
                        I hereby declare that the information provided above is true and correct to the best of my knowledge. I understand that providing false information may lead to disqualification from the scheme.<br>
                        <span class="urdu-lbl">  میں اقرار کرتا/کرتی ہوں کہ اوپر فراہم کردہ معلومات میری بہترین معلومات کے مطابق مکمل اور درست ہیں۔ میں سمجھتا/سمجھتی ہوں کہ غلط معلومات فراہم کرنا اسکیم سے نااہلی کا باعث بن سکتا ہے۔
                    </label>                    
                    @error('declaration')
                        <div class="text-danger">{{ $message }}</div> <!-- Display error message -->
                    @enderror
                </div>
                <div class="form-group col-md-6 px-4">
                    <label for="applicant_name" class="col-form-label">Signature of Applicant:</label>
                      <input type="text" id="applicant_name" name="applicant_name" value="{{ old('full_name', $application->full_name ?? $user->name ?? '') }}" readonly class="form-control" aria-label="Applicant Name">
                 </div>
                <div class="form-group col-md-6 px-4">
                    <label for="date" class="col-form-label">Date:</label>                    
                        <input type="date" id="date" name="date" value="{{ date('Y-m-d') }}" readonly class="form-control" aria-label="Date">
                        @error('date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror                                 
                </div>
                </div>
            </fieldset>
            <button type="button" class="btn btn-secondary" onclick="prevStep(6)">Previous</button>
            <button type="button" class="btn btn-primary" onclick="nextStep(6)">Submit</button>
        </div>
    </form>
</div>
</div>

</div>
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        
        var EmployerName = document.getElementById('applicant-employer-name-container');
        var MonthlyIncomeRange = document.getElementById('applicant-monthly-income-range-container');
        var SourceOfIncome = document.getElementById('applicant-source-income-container');
        var IncomeProof = document.getElementById('proof-of-income-upload-container');
        
        var marital_status_edit = {{ $application->marital_status ?? '' }}
        var occupationText = {{ $application->occupation ?? '' }}
        
        if(marital_status_edit){
            $(".nominee_section").show();
        }

        if(occupationText == 14){
            EmployerName.style.display = 'none'; 
            MonthlyIncomeRange.style.display = 'none'; 
            SourceOfIncome.style.display = 'none'; 
            IncomeProof.style.display = 'none'; 
        }

    });
</script>
@endsection
<script>

    
    
    let currentStep = 1;

    function showStep(step) {

        // Update current step
        currentStep = step; 
        // nextStep(currentStep);
        const steps = document.querySelectorAll('.step');
        steps.forEach((s, index) => {
            s.style.display = (index + 1 === currentStep) ? 'block' : 'none';
        });

        
        const progressBar = document.querySelector('.progress-bar');
        progressBar.style.width = (currentStep * 16.666) + '%'; 

        // Update active class for step indicators and line colors
        const navLinks = document.querySelectorAll('.step-indicator');
        
        
        navLinks.forEach((link, index) => {
            
            //     const anchor = link.querySelector('a'); // Select the first anchor child
        //     anchor.classList.toggle('active', index + 1 === currentStep);
            
        //     // Update line color based on the current step
        //     const line = link.querySelector('.line'); // Select the line element
        //     if (line) {
        //         line.style.backgroundColor = (index + 1 < currentStep) ? '#007bff' : '#e0e0e0'; // Blue for completed, gray for remaining
        //     }
        });
    }

    function nextStep(step) {
            // Get the form data for the current step
            document.getElementById('loadingOverlay').style.display = 'block';
            var formData = new FormData(document.getElementById('applicantForm'));
            formData.append('current_step', step);
            
            // Submit the form using AJAX
            $.ajax({
                url: "{{ route('applicant.store') }}", // Adjust the URL to your form submission route
                type: 'POST',
                data: formData,
                processData: false, // Prevent jQuery from automatically transforming the data into a query string
                contentType: false, // Set content type to false to let jQuery set it
                success: function(response) {
                    document.getElementById('loadingOverlay').style.display = 'none';
                    
                    // If the response indicates success, move to the next step
                    if (response.success) {
                        if(response.current_step == 7){
                            window.location.href = "{{ route('applications.index') }}";
                        }
                        else{
                            refreshErrorMessages();
                            currentStep++;
                            showStep(currentStep);
                        }
                    } else {
                        // Handle any validation messages returned from the server
                        displayValidationErrors(response.errors);
                        currentStep = response.current_step;
                        showStep(currentStep);
                    }
                },
                error: function(xhr) {
                    document.getElementById('loadingOverlay').style.display = 'none';
                    // Handle any errors that occur during the AJAX request
                    var errors = xhr.responseJSON.errors;
                    displayValidationErrors(errors);
                    currentStep = xhr.responseJSON.current_step;
                        showStep(currentStep);
                    }
            });
    }

    function refreshErrorMessages(){
        document.querySelectorAll('.text-danger').forEach(el => el.remove());
        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    }
    // Function to display validation errors
    function displayValidationErrors(errors) {
        // Clear previous error messages
        $('.text-danger').remove();

        // Loop through the errors and display them
        for (var field in errors) {
            if (errors.hasOwnProperty(field)) {
                var errorMessages = errors[field];
                // Find the corresponding input field and append the error messages
                var inputField = $('[name="' + field + '"]');
                inputField.after('<div class="text-danger">' + errorMessages.join(', ') + '</div>');
            }
        }
    }

    function validateAndShowStep(step) {
        // Prevent skipping steps forward without validation
        if (step > currentStep) {
            document.getElementById('loadingOverlay').style.display = 'block';
            var formData = new FormData(document.getElementById('applicantForm'));
            formData.append('current_step', currentStep); // validate current step before moving

            $.ajax({
                url: "{{ route('applicant.store') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    document.getElementById('loadingOverlay').style.display = 'none';
                    if (response.success) {
                        currentStep = step;
                        showStep(currentStep);
                    } else {
                        displayValidationErrors(response.errors);
                        showStep(currentStep); // Stay on the current step
                    }
                },
                error: function(xhr) {
                    document.getElementById('loadingOverlay').style.display = 'none';
                    var errors = xhr.responseJSON.errors;
                    displayValidationErrors(errors);
                    showStep(currentStep); // Stay on the current step
                }
            });
        } else {
            // Allow moving back without validation
            refreshErrorMessages();
            currentStep = step;
            showStep(currentStep);
        }
}



    function prevStep(step) {
        currentStep--;
        showStep(currentStep);
    }

    // Initialize the first step
    showStep(currentStep);

    function populateDistricts(type) {
        const divisionId = document.getElementById(type + '_division').value;
        const districtSelect = document.getElementById(type + '_district');
        const tehsilSelect = document.getElementById(type + '_tehsil');

        // Clear previous options
        districtSelect.innerHTML = '<option value="">Select District</option>';
        tehsilSelect.innerHTML = '<option value="">Select Tehsil</option>';

        // Fetch districts based on selected division
        if (divisionId) {
            fetch(`/get-districts/${divisionId}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(district => {
                        const option = document.createElement('option');
                        option.value = district.id;
                        option.textContent = "" + district.name ;
                        districtSelect.appendChild(option);
                    });

                    // If the user has a district set, select it
                    if (type === 'current' && {{ isset($user->current_district) ? 'true' : 'false' }}) {
                        districtSelect.value = '{{ $user->current_district }}';
                        populateTehsils(type); // Populate tehsils based on the selected district
                    } else if (type === 'permanent' && {{ isset($user->permanent_district) ? 'true' : 'false' }}) {
                        districtSelect.value = '{{ $user->permanent_district }}';
                        populateTehsils(type); // Populate tehsils based on the selected district
                    }
                });
        }
    }

    function populateTehsils(type) {
        const districtId = document.getElementById(type + '_district').value;
        const tehsilSelect = document.getElementById(type + '_tehsil');

        // Clear previous options
        tehsilSelect.innerHTML = '<option value="">Select Tehsil</option>';

        // Fetch tehsils based on selected district
        if (districtId) {
            fetch(`/get-tehsils/${districtId}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(tehsil => {
                        const option = document.createElement('option');
                        option.value = tehsil.id;
                        option.textContent = "" + tehsil.tehsil_name ;
                        tehsilSelect.appendChild(option);
                    });

                    // If the user has a tehsil set, select it
                    if (type === 'current' && {{ isset($user->current_tehsil) ? 'true' : 'false' }}) {
                        tehsilSelect.value = '{{ $user->current_tehsil }}';
                    } else if (type === 'permanent' && {{ isset($user->permanent_tehsil) ? 'true' : 'false' }}) {
                        tehsilSelect.value = '{{ $user->permanent_tehsil }}';
                    }
                });
        }
    }

    function togglePermanentAddress() {
        const sameAddressCheckbox = document.getElementById('same_as_current_address');
        // console.log("sameAddressCheckbox",sameAddressCheckbox.checked);
        // Get the current address values
        const currentAddress = document.getElementById('current_address').value;
        
        // Get the current division, district, and tehsil values
        const currentDivision = document.getElementById('current_division').value;
        const currentDistrict = document.getElementById('current_district').value;
        const currentTehsil = document.getElementById('current_tehsil').value;

        // Get the permanent address fields
        const permanentAddress = document.getElementById('permanent_address');
        const permanentDivision = document.getElementById('permanent_division');
        const permanentDistrict = document.getElementById('permanent_district');
        const permanentTehsil = document.getElementById('permanent_tehsil');

        if (sameAddressCheckbox.checked) {
            // If the checkbox is checked, copy the current address to permanent address
            if(currentAddress){
                permanentAddress.value = currentAddress;
            }
            else{
                permanentAddress.value = '';
            }
            permanentDivision.value = currentDivision;
            document.getElementById('permanent_address').disabled = true;
            document.getElementById('permanent_division').disabled = true;
            document.getElementById('permanent_district').disabled = true;
            document.getElementById('permanent_tehsil').disabled = true;
            // Fetch districts based on the selected division
            fetch(`/get-districts/${currentDivision}`)
                .then(response => response.json())
                .then(data => {
                    // Clear previous options
                    permanentDistrict.innerHTML = '<option value="">Select District</option>';
                    permanentTehsil.innerHTML = '<option value="">Select Tehsil</option>';

                    // Populate districts
                    data.forEach(district => {
                        const option = document.createElement('option');
                        option.value = district.id;
                        option.textContent = district.name;
                        permanentDistrict.appendChild(option);
                    });

                    // Set the selected district
                    permanentDistrict.value = currentDistrict;

                    // Fetch tehsils based on the selected district
                    fetch(`/get-tehsils/${currentDistrict}`)
                        .then(response => response.json())
                        .then(tehsilData => {
                            // Clear previous tehsil options
                            permanentTehsil.innerHTML = '<option value="">Select Tehsil</option>';

                            // Populate tehsils
                            tehsilData.forEach(tehsil => {
                                const option = document.createElement('option');
                                option.value = tehsil.id;
                                option.textContent = tehsil.tehsil_name;
                                permanentTehsil.appendChild(option);
                            });

                            // Set the selected tehsil
                            permanentTehsil.value = currentTehsil;
                        });
                });
        } else {
            // If unchecked, clear the permanent address fields
            // console.log('inside else',sameAddressCheckbox.checked);
            permanentAddress.value = '';
            permanentDivision.value = '';
            permanentDistrict.value = '';
            permanentTehsil.value = '';
            document.getElementById('permanent_address').disabled = false;
            document.getElementById('permanent_division').disabled = false;
            document.getElementById('permanent_district').disabled = false;
            document.getElementById('permanent_tehsil').disabled = false;
        }
    }

    function toggleMonthlyRent() {
        const rentedHouseSelect = document.getElementById('rented_house');
        const monthlyRentContainer = document.getElementById('monthly_rent_container');

        // Show or hide the monthly rent field based on the selected value
        if (rentedHouseSelect.value === 'yes') {
            monthlyRentContainer.style.visibility = 'visible'; // Show the rent field
            monthlyRentContainer.style.height = 'auto'; // Allow height to adjust
        } else {
            monthlyRentContainer.style.visibility = 'hidden'; // Hide the rent field
            monthlyRentContainer.style.height = '0'; // Collapse height
        }
    }

        function toggleLoanOptions() {
            const loanOptionSelect = document.getElementById('loan_option');
            const monthlyRentContainer = document.getElementById('loan_details_container');

            // Show or hide the monthly rent field based on the selected value
            if (loanOptionSelect.value === 'yes') {
                monthlyRentContainer.style.visibility = 'visible'; // Show the rent field
                monthlyRentContainer.style.height = 'auto'; // Allow height to adjust
            } else {
                monthlyRentContainer.style.visibility = 'hidden'; // Hide the rent field
                monthlyRentContainer.style.height = '0'; // Collapse height
            }
        }

        function toggleHousingDetails() {
            const governmentHousingSelect = document.getElementById('government_housing');
            const housingDetailsContainer = document.getElementById('housing_details_container');

        // Show or hide the housing details based on the selected value
        if (governmentHousingSelect.value === 'yes') {
            housingDetailsContainer.style.visibility = 'visible'; // Show the details
            housingDetailsContainer.style.height = 'auto'; // Allow height to adjust
        } else {
            housingDetailsContainer.style.visibility = 'hidden'; // Hide the details
            housingDetailsContainer.style.height = '0'; // Collapse height
        }
    }

    // Function to disable the CNIC field and prevent input
    function disableCnicField() {
        const cnicField = document.getElementById('cnic');
        cnicField.readOnly = true; // Disable the field

        // Prevent text selection
        cnicField.addEventListener('selectstart', function(event) {
            event.preventDefault(); // Prevent text selection
        });

        // Prevent any key actions
        cnicField.addEventListener('keydown', function(event) {
            event.preventDefault(); // Prevent any key actions
        });
    }

    // Call the function when the page loads
    document.addEventListener('DOMContentLoaded', (event) => {
        disableCnicField(); // Disable the CNIC field
    });

    document.addEventListener('DOMContentLoaded', function() {
        const cnicField = document.getElementById('cnic');
        const emailField = document.getElementById('email');

        // Function to toggle email field based on CNIC value
        function toggleEmailField() {
            if (cnicField.value.trim() !== '') {
                emailField.disabled = true; // Disable email if CNIC is present
            } else {
                emailField.disabled = false; // Enable email if CNIC is empty
            }
        }

        // Initial check on page load
        toggleEmailField();

        // Add event listener to CNIC field to check on input
        cnicField.addEventListener('input', toggleEmailField);
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Function to upload Applicant Picture
        document.getElementById('applicant-picture-upload').addEventListener('change', function() {
            uploadFile('applicant-picture-upload', 'file_upload_applicant_picture','applicant-picture-upload-section', '{{ route("applicant.file.upload.applicant.picture") }}');
        });

        // Function to upload CNIC Front
        document.getElementById('cnic-front-upload').addEventListener('change', function() {
            uploadFile('cnic-front-upload', 'file_upload_cnic_front','cnic-front-upload-section', '{{ route("applicant.file.upload.cnic.front") }}');
        });

        // Function to upload CNIC Back
        document.getElementById('cnic-back-upload').addEventListener('change', function() {
            uploadFile('cnic-back-upload', 'file_upload_cnic_back','cnic-back-upload-section', '{{ route("applicant.file.upload.cnic.back") }}');
        });

        // Function to upload Spouse's CNIC Front
        document.getElementById('spouse-cnic-front-upload').addEventListener('change', function() {
            uploadFile('spouse-cnic-front-upload', 'file_upload_spouse_cnic_front','spouse-cnic-front-upload-section', '{{ route("applicant.file.upload.spouse.cnic.front") }}');
        });

        // Function to upload Spouse's CNIC Back
        document.getElementById('spouse-cnic-back-upload').addEventListener('change', function() {
            uploadFile('spouse-cnic-back-upload', 'file_upload_spouse_cnic_back','spouse-cnic-back-upload-section', '{{ route("applicant.file.upload.spouse.cnic.back") }}');
        });

        // Function to upload Proof of Income
        document.getElementById('proof-of-income-upload').addEventListener('change', function() {
            uploadFile('proof-of-income-upload', 'file_upload_proof_of_income','proof-of-income-upload-section', '{{ route("applicant.file.upload.proof.of.income") }}');
        });

        // Function to upload Rental Agreement
        // document.getElementById('rental-agreement-upload').addEventListener('change', function() {
        //     uploadFile('rental-agreement-upload', 'file_upload_rent_agreement','rental-agreement-upload-section', '{{ route("applicant.file.upload.rent.agreement") }}');
        // });

        // Function to upload Other Supporting Documents
        document.getElementById('other-supporting-documents-upload').addEventListener('change', function() {
            uploadFile('other-supporting-documents-upload', 'file_upload_other_documents','other-supporting-documents-upload-section', '{{ route("applicant.file.upload.other.documents") }}');
        });

        // Function to upload Domicile Certificate
        document.getElementById('domicile-certificate-upload').addEventListener('change', function() {
            uploadFile('domicile-certificate-upload', 'file_upload_domicile','domicile-certificate-upload-section', '{{ route("applicant.file.upload.domicile") }}');
        });

        // Function to upload Affidavit Certificate
        document.getElementById('affidavit-certificate-upload').addEventListener('change', function() {
            uploadFile('affidavit-certificate-upload', 'file_upload_affidavit','affidavit-certificate-upload-section', '{{ route("applicant.file.upload.affidavit") }}');
        });
    });

    // Generic function to handle file uploads
    function uploadFile(inputId, inputName, documentTypeId, route) {
        const fileInput = document.getElementById(inputId);
        const progressBarContainer = fileInput.closest('.upload-section').querySelector('.progress');
        const progressBar = progressBarContainer.querySelector('.progress-bar');
        const statusContainer = fileInput.closest('.upload-section').querySelector('.status-container'); // New status container

        const inputIdValue = "btn-"+fileInput.id;
        const buttonToHide = document.getElementById(inputIdValue);

        if (buttonToHide) {
            buttonToHide.style.display = 'none';
        }

        // Disable the Next button here
        $('.document_next').prop('disabled', true);

        // Show the progress bar
        progressBarContainer.style.display = 'block';
        statusContainer.innerHTML = ''; // Clear previous status

        const formData = new FormData();
        formData.append(inputName, fileInput.files[0]);

        // AJAX request
        const xhr = new XMLHttpRequest();
        xhr.open('POST', route, true);

        // Set CSRF token header
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

        // Update progress bar
        xhr.upload.addEventListener('progress', function(e) {
            if (e.lengthComputable) {
                const percentComplete = (e.loaded / e.total) * 100;
                progressBar.style.width = percentComplete + '%';
            }
        });

        xhr.onload = function() {
            if (xhr.status === 200) {
                // Handle success response
                const response = JSON.parse(xhr.responseText);
                
                statusContainer.innerHTML = `
                    <div class="upload-status">
                        <p>File uploaded successfully!</p>
                        <button class="btn btn-primary" onclick="viewFile('${response.file_path}')">View File</button>
                    </div>
                `;
                progressBar.style.width = '100%'; // Complete the progress bar
                $('.document_next').prop('disabled', false);
            } else {
                // Handle error response
                // console.error('Error response:', xhr.responseText);
                // alert('Error uploading file: ' + xhr.status + ' - ' + xhr.statusText);
                const response = JSON.parse(xhr.responseText);
                console.error('Error response:', response);
                
                for (const field in response.errors) {
                    if (response.errors.hasOwnProperty(field)) {
                        const errorMessages = response.errors[field];
                        const modifiedField = field.replace('file_upload_', ''); // Remove 'file_upload_' prefix
                        // Find the corresponding input field and append the error messages
                        var inputField = $('[name="' + modifiedField + '"]');
                        inputField.after('<div class="text-danger">' + errorMessages.join(', ') + '</div>');
                    }
                }
                $('.document_next').prop('disabled', false);
            }
        };

        xhr.onerror = function() {
            // Handle network errors
            console.error('Network error:', xhr);
            alert('Network error occurred while uploading the file.');
            $('.document_next').prop('disabled', false);
        };

        xhr.send(formData);
    }

    // Function to view the uploaded file
    function viewFile(filePath) {
        // alert(filePath);
        window.open(filePath, '_blank');
    }

    // Function to delete the uploaded file
    function deleteFile(filePath, inputName, documentTypeId) {
        // console.log('{{ route("applicant.delete.file") }}');
        if (confirm('Are you sure you want to delete this file?')) {
            const xhr = new XMLHttpRequest();
            const route = '{{ route("applicant.delete.file") }}'; // Define the route with a placeholder
            const url = route.replace(':filePath', encodeURIComponent(filePath)); // Replace the placeholder with the actual file path

            xhr.open('DELETE', url + '?inputName=' + encodeURIComponent(inputName), true); // Use the generated URL

            // Set CSRF token header
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    alert('File deleted successfully!');
                    // Optionally, you can clear the status container or reset the form
                    // console.log(documentTypeId,`.${documentTypeId} .status-container`);
                    const statusContainer = document.querySelector(`#${documentTypeId} .status-container`);
                    const progressBar = document.querySelector(`#${documentTypeId} .progress-bar`);
                    const progressBarContainer = document.querySelector(`#${documentTypeId} .progress`);
                    // console.log(statusContainer);
                    statusContainer.innerHTML = `
                    <div class="upload-status">
                        <p>File deleted successfully!</p>
                    </div>
                `;
                    progressBar.style.width = '0%';
                    progressBarContainer.style.display = 'none';
                } else {
                    alert('Error deleting file: ' + xhr.status + ' - ' + xhr.statusText);
                }
            };

            xhr.onerror = function() {
                alert('Network error occurred while deleting the file.');
            };

            xhr.send();
        }
    }
 
    function onSingleMaritalStatus(status){
        let marital_status = status.target.value;
        
        if(marital_status == 1){
            $('.nominee_section').show();
        }
        else{
            $('.nominee_section').hide();
            
        }
    }
</script>

<style>
    .progress {
        height: 5px;
        background-color: #e0e0e0; /* Background color of the progress bar */
        border-radius: 5px;
        margin-bottom: 10px;
    }
    .progress-bar {
        height: 100%;
        background-color: #007bff; /* Default color for the progress */
        border-radius: 5px;
        transition: width 0.4s ease; /* Smooth transition for width change */
    }
    .nav-pills {
        position: relative;
        display: flex;
        justify-content: space-between; /* Distribute space evenly */
    }
    .nav-item {
        position: relative; /* Position relative for pseudo-elements */
        flex: 1; /* Allow items to grow equally */
        text-align: center; /* Center the text */
    }
    .step-wrapper {
        position: relative; /* Position relative for the line */
    }
    .step-wrapper:not(:last-child)::after {
        content: '';
        position: absolute;
        top: 50%; /* Center the line vertically */
        right: -50%; /* Position the line to the right of the item */
        width: 50px; /* Length of the line */
        height: 2px; /* Thickness of the line */
        background-color: #007bff; /* Color of the line */
        transform: translateY(-50%); /* Center the line */
        z-index: 0; /* Ensure the line is behind the nav items */
    }
    .nav-link.active {
        color: #fff; /* Active link color */
        background-color: #007bff; /* Active link background color */
    }
    #applicantForm {
        position: relative; /* Ensure the loading overlay is positioned relative to the form */
    }
    .applicant-picture-container {
        padding: 0px;
        text-align: center;
        border: 0.70px solid #b1becc;
        border-radius: 6px;
        background-color: #fff;
    }
    .applicant-picture-container h4{
        border-radius: 6px 6px 0 0;
    background: #f1f6f0;
    font-weight: 500;
    font-size: 13px;
    line-height: normal;
    color: #253847;
    min-height: 66px;
    padding: 7px;
    margin: 0;
    display: flex;
    justify-content: space-between;
    text-align: left;
    align-items: center;
    }
    .applicant-picture-container h4 span{
        font-weight: 400;
        font-size: 14px;
        line-height: 189%;
        color: #253847;
        padding: 0;
        margin: 0;
        text-align: right;
    }
    .col-form-label .urdu-lbl{
        text-align: right;
    }
    .upload-section {
        margin: 10px;
        padding: 20px;
        border-radius: 8px;
        border: 0.64px dashed #6b8097;
        background: #f1f6f0;
    }

    .upload-button {
        background-color: #074826;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
    }
    .upload-section p {
    font-size: 12px;
}
    .upload-button:hover {
        background-color:rgb(4, 49, 26);
    }
    .upload-section .progress {
            margin: 5%;
    }
</style>
@endsection