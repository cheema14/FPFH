@extends('layouts.admin')
@section('content')
<div class="content">
                <div class="row" style="display:block;">
                    <div class="col-lg-12">
                        
                        @if(!auth()->user()->is_admin)
                            @if(auth()->user()->applicationAvailable())
                            <div class="card">
                                <!-- <div class="card-header">
                                    Application Status
                                </div> -->
                                <div class="card-body" style="border: 1px dashed #174340;border-radius: 10px;background: #d6ead3;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Thank you for submitting your application for the Apni Zameen Apna Ghar Program. 
                                            We have received your details and will review your application.</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="urdu-lbl" style=" text-align: right;  line-height: normal;  font-size: 12px;">
                                             اپنی زمین اپنا گھر منصوبے میں درخواست جمع کروانے کا شکریہ۔ ہم نے آپ کی تفصیلات موصول کر لی ہیں
                                            اور جلد ہی آپ کی درخواست کا جائزہ لیں گے۔ 
                                            </p>
                                        </div>
                                    </div>                 
                                    @if(auth()->user()->applications()->first()->status == 0 )
                                        <p>Status: <span style="color: #30544f;font-weight: 700;">Pending</span></p>    
                                    @elseif(auth()->user()->applications()->first()->status == 1)
                                        <p>Status: <span style="color: #30544f;font-weight: 700;">Submitted</span></p>    
                                    @elseif(auth()->user()->applications()->first()->status == 2)
                                        <p>Status: <span style="color: #30544f;font-weight: 700;">Approved</span></p>    
                                    @endif      
                                    <a href="{{ route('applications.index') }}" class="btn btn-primary">View My Applications</a>
                                </div>
                            </div>
                        @else
                    <div class="card apply_main_lbl">
                                <div class="card-header">
                                    <h3>How to Apply for CM Maryam Nawaz 3 Marla Plot Scheme?</h3> 
                                </div>
                                <div class="card-body How_to_Apply">
                                    <div class="row">
                                    <div class="col-md-6  mb-3">
                                    <h3>Step-by-Step Registration Process</h3>
                                <ul>
                                        <!-- <li>
                                        Visit the Official Portal (when announced by the Punjab Government).</li>
                                        <li> Sign Up using your CNIC and personal details.</li> -->
                                        <li> Fill in the Application Form with accurate information.</li>
                                        <li> Upload Required Documents: CNIC, proof of residence, income details, etc.</li>
                                        <li> Submit the Form and wait for verification.</li>
                                        <li> Receive SMS/Email Notification for final selection.</li>                        
                                </ul>
                                <h3>Benefits of CM initiative Apni Zameen Apna Ghar Program (AZAG)</h3>
                                <ul>
                                        <li>
                                        Helps low-income families become property owners</li>
                                        <li> Reduces homelessness across Punjab.</li>
                                        <li> Supports government’s social welfare agenda.</li>
                                        <li> Ensures fair and transparent selection.</li>
                                        <li> Provides better living opportunities for the needy.</li>                                                  
                                </ul>                       
                                </div>
                                <div class="col-md-6 mb-3">
                                <h3>Verification & Selection Process</h3>
                                <ul>
                                        <li> The government will verify eligibility based on submitted documents.</li>
                                        <li> Only deserving applicants will be shortlisted.</li>
                                        <li> If selected, you will receive a notification via SMS or email.</li>
                                    </ul>  
                                                    
                                </div>
                                    </div>
                                </div>                    
                            </div>  
                                    
                            <div class="card How_to_Apply_urdu">
                            <div class="card-header">
                                    <h3 class="urdu-lbl" dir="rtl">سی ایم مریم نواز 3 مرلہ پلاٹ اسکیم کے لیے کیسے اپلائی کریں</h3> 
                                </div>
                                <div class="row">
                                    <div class="col-md-6  mb-3">                       
                                <div class="card-body How_to_Apply">
                                    <h3 class="urdu-lbl" dir="rtl">مرحلہ وار رجسٹریشن کا عمل</h3>
                                <ul>
                                        <!-- <li class="urdu-lbl" dir="rtl">
                                        سرکاری پورٹل پر جائیں (جب پنجاب حکومت اعلان کرے گی)</li>
                                        <li class="urdu-lbl" dir="rtl">  سائن اپ کریں: اپنا شناختی کارڈ نمبر (CNIC) اور ذاتی تفصیلات درج کریں۔</li> -->
                                        <li class="urdu-lbl" dir="rtl"> درخواست فارم پُر کریں: تمام معلومات درست طریقے سے درج کریں</li>
                                        <li class="urdu-lbl" dir="rtl"> ضروری دستاویزات اپ لوڈ کریں:
                                شناختی کارڈ (CNIC)
                                رہائش کا ثبوت
                                آمدنی کی تفصیلات وغیرہ</li>
                                        <li class="urdu-lbl" dir="rtl"> درخواست جمع کروائیں اور تصدیقی عمل کا انتظار کریں۔</li>
                                        <li class="urdu-lbl" dir="rtl">  منتخب ہونے کی صورت میں SMS یا ای میل کے ذریعے اطلاع موصول ہوگی۔</li>                        
                                </ul>
                                <h3 class="urdu-lbl" dir="rtl">تصدیق اور انتخاب کا عمل</h3>
                                <ul>
                                        <li class="urdu-lbl" dir="rtl"> حکومت فراہم کردہ دستاویزات کی بنیاد پر اہلیت کی تصدیق کرے گی</li>
                                        <li class="urdu-lbl" dir="rtl"> صرف مستحق افراد کو شارٹ لسٹ کیا جائے گا</li>
                                        <li class="urdu-lbl" dir="rtl">  منتخب ہونے کی صورت میں SMS یا ای میل کے ذریعے اطلاع دی جائے گی۔</li>
                                    </ul>
                                
                                </div>
                                    </div>
                                    <div class="col-md-6  mb-3">
                                    <div class="card-body How_to_Apply">
                                    <h3 class="urdu-lbl" dir="rtl"> وزیر اعلیٰ کے اقدام "اپنی زمین اپنا گھر پروگرام" (AZAG) کے فوائد</h3>
                                <ul>
                                        <li class="urdu-lbl" dir="rtl">کم آمدنی والے خاندانوں کو جائیداد کا مالک بننے میں مدد فراہم کرتا ہے </li>
                                        <li class="urdu-lbl" dir="rtl">   پنجاب میں بے گھری کی شرح کو کم کرتا ہے  </li>  
                                        <li class="urdu-lbl" dir="rtl">  حکومتی سماجی بہبود کے ایجنڈے کی حمایت کرتا ہے  </li>
                                        <li class="urdu-lbl" dir="rtl">  منصفانہ اور شفاف انتخاب کے عمل کو یقینی بناتا ہے  </li>
                                        <li class="urdu-lbl" dir="rtl">   ضرورت مند افراد کو بہتر رہائشی مواقع فراہم کرتا ہے  </li>
                                </ul>
                                
                                </div>
                                    </div>
                                </div>
                            
                            </div>     
                                
                            
                        
                            <div class="card" style="border-radius: 10px;    text-align: center;">                    
                                <div class="card-body">                       
                                    <a href="{{ route('applicant.form') }}" class="btn btn-primary">Acknowledge & Proceed <span class="urdu-lbl" dir="rtl">تسلیم کریں اور آگے بڑھیں۔</span></a>    
                                </div>
                            </div>
                        @endif
                        @endif
                    </div>
                </div>
                @if (auth()->user()->is_admin)
                <div class="row">
                        <div class="col-lg-12">
                            <!-- /// asif  here .///  -->
                            <style>
                                .form-select{
                                    background-color: #ffffff !important;
                                }
                                input.form-control {
                                    font-size: 16px;
                                    padding: 4px 10px;
                                    border-radius: 6px;
                                    height: 49px;
                                }
                            </style>
                                <div class="row mb-3">                       
                                    <div class="col mb-3">
                                    <div class="box_main" style="background: #c4deda;">
                                    <svg width="44" height="44" viewBox="0 0 36 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="17.9121" cy="18.1873" r="17.9209" fill="#30544F"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.7427 12.8109C10.7427 10.8314 12.3474 9.22675 14.3269 9.22675H19.7031V12.8109C19.7031 14.7904 21.3078 16.3951 23.2873 16.3951H25.0794V23.5635C25.0794 25.5429 23.4747 27.1476 21.4952 27.1476H14.3269C12.3474 27.1476 10.7427 25.5429 10.7427 23.5635V12.8109ZM14.3269 17.2911C13.832 17.2911 13.4308 17.6923 13.4308 18.1872C13.4308 18.6821 13.832 19.0832 14.3269 19.0832H16.1189C16.6138 19.0832 17.015 18.6821 17.015 18.1872C17.015 17.6923 16.6138 17.2911 16.1189 17.2911H14.3269ZM14.3269 20.8753C13.832 20.8753 13.4308 21.2765 13.4308 21.7714C13.4308 22.2662 13.832 22.6674 14.3269 22.6674H17.911C18.4059 22.6674 18.8071 22.2662 18.8071 21.7714C18.8071 21.2765 18.4059 20.8753 17.911 20.8753H14.3269ZM22.1061 11.197L21.9888 12.9569C21.9527 13.4978 22.4015 13.9466 22.9425 13.9105L24.7024 13.7932C25.4705 13.742 25.8207 12.8099 25.2764 12.2655L23.6338 10.623C23.0894 10.0786 22.1573 10.4288 22.1061 11.197Z" fill="white"/>
                                                </svg>
                                        <div>                                
                                            <h2 style="color: #30544f;">{{ $total_registered_user }}</h2>
                                            <p style="color: #30544f;">TOTAL REGISTERED USERS</p>
                                        </div>
                                    </div>   
                                </div>  
                                <div class="col mb-3">
                                    <div class="box_main" style="background: #cae9f6;">
                                        <svg width="44" height="44" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="17.9131" cy="17.9759" r="17.9209" fill="#7AA7FF"/>
                                            <path d="M11.2485 15.7081C10.4265 15.7081 9.62294 15.9403 8.93945 16.3752C8.25596 16.8102 7.72324 17.4284 7.40866 18.1517C7.09409 18.875 7.01178 19.6709 7.17215 20.4387C7.33252 21.2065 7.72836 21.9118 8.30962 22.4654C8.89089 23.019 9.63146 23.396 10.4377 23.5487C11.2439 23.7015 12.0796 23.6231 12.8391 23.3235C13.5985 23.0239 14.2476 22.5165 14.7043 21.8656C15.161 21.2147 15.4048 20.4493 15.4048 19.6665C15.4048 18.6166 14.9669 17.6098 14.1874 16.8675C13.408 16.1252 12.3508 15.7081 11.2485 15.7081ZM13.0423 19.5415L11.3973 21.2081C11.3358 21.2712 11.2614 21.3216 11.1786 21.356C11.0958 21.3904 11.0064 21.4081 10.916 21.4081C10.7557 21.4034 10.6017 21.3477 10.4785 21.2498L9.49854 20.4081C9.36858 20.2976 9.29004 20.1425 9.2802 19.9768C9.27035 19.8112 9.33 19.6486 9.44604 19.5248C9.56207 19.401 9.72497 19.3262 9.89891 19.3169C10.0729 19.3075 10.2436 19.3643 10.3735 19.4748L10.8898 19.9081L12.1235 18.6831C12.2466 18.5661 12.4134 18.5003 12.5873 18.5003C12.7612 18.5003 12.928 18.5661 13.051 18.6831C13.1649 18.8002 13.2275 18.9544 13.2258 19.114C13.2242 19.2736 13.1585 19.4265 13.0423 19.5415Z" fill="white"/>
                                            <path d="M23.5 9.04144H13.875C13.2368 9.04144 12.6248 9.28289 12.1735 9.71266C11.7223 10.1424 11.4688 10.7253 11.4688 11.3331V14.8831C12.7495 14.9551 13.9531 15.4905 14.8331 16.3796C15.7132 17.2687 16.2034 18.4445 16.2034 19.6664C16.2034 20.8884 15.7132 22.0641 14.8331 22.9533C13.9531 23.8424 12.7495 24.3777 11.4688 24.4498V24.6664C11.4688 25.2742 11.7223 25.8571 12.1735 26.2869C12.6248 26.7167 13.2368 26.9581 13.875 26.9581H23.5C24.1382 26.9581 24.7502 26.7167 25.2015 26.2869C25.6527 25.8571 25.9062 25.2742 25.9062 24.6664V11.3331C25.9062 10.7253 25.6527 10.1424 25.2015 9.71266C24.7502 9.28289 24.1382 9.04144 23.5 9.04144ZM22.625 23.6248H17.375C17.201 23.6248 17.034 23.5589 16.911 23.4417C16.7879 23.3245 16.7187 23.1655 16.7187 22.9998C16.7187 22.834 16.7879 22.675 16.911 22.5578C17.034 22.4406 17.201 22.3748 17.375 22.3748H22.625C22.799 22.3748 22.966 22.4406 23.089 22.5578C23.2121 22.675 23.2812 22.834 23.2812 22.9998C23.2812 23.1655 23.2121 23.3245 23.089 23.4417C22.966 23.5589 22.799 23.6248 22.625 23.6248ZM22.625 20.2914H18.25C18.076 20.2914 17.909 20.2256 17.786 20.1084C17.6629 19.9912 17.5937 19.8322 17.5937 19.6664C17.5937 19.5007 17.6629 19.3417 17.786 19.2245C17.909 19.1073 18.076 19.0414 18.25 19.0414H22.625C22.799 19.0414 22.966 19.1073 23.089 19.2245C23.2121 19.3417 23.2812 19.5007 23.2812 19.6664C23.2812 19.8322 23.2121 19.9912 23.089 20.1084C22.966 20.2256 22.799 20.2914 22.625 20.2914ZM22.625 16.9581H17.375C17.201 16.9581 17.034 16.8923 16.911 16.7751C16.7879 16.6578 16.7187 16.4989 16.7187 16.3331C16.7187 16.1673 16.7879 16.0084 16.911 15.8912C17.034 15.774 17.201 15.7081 17.375 15.7081H22.625C22.799 15.7081 22.966 15.774 23.089 15.8912C23.2121 16.0084 23.2812 16.1673 23.2812 16.3331C23.2812 16.4989 23.2121 16.6578 23.089 16.7751C22.966 16.8923 22.799 16.9581 22.625 16.9581ZM22.625 13.6248H15.625C15.451 13.6248 15.284 13.5589 15.161 13.4417C15.0379 13.3245 14.9687 13.1655 14.9687 12.9998C14.9687 12.834 15.0379 12.675 15.161 12.5578C15.284 12.4406 15.451 12.3748 15.625 12.3748H22.625C22.799 12.3748 22.966 12.4406 23.089 12.5578C23.2121 12.675 23.2812 12.834 23.2812 12.9998C23.2812 13.1655 23.2121 13.3245 23.089 13.4417C22.966 13.5589 22.799 13.6248 22.625 13.6248Z" fill="white"/>
                                        </svg>
                                        <div>                                
                                            <h2 style="color: #4270CA;">{{ $total_submitted_applications }}</h2>
                                            <p style="color: #4270CA;">APPLICATIONS SUBMITTED</p>
                                        </div>
                                    </div>   
                                </div> 
                                <div class="col mb-3">
                                    <div class="box_main" style="background: #FFF3B3;">
                                        <svg width="44" height="44" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="17.9409" cy="17.921" r="17.9209" fill="#E9A209" />
                                            <path d="M17.52 8.00012C15.6411 8.00012 13.8044 8.55729 12.2421 9.60116C10.6798 10.645 9.4622 12.1287 8.74317 13.8646C8.02414 15.6005 7.836 17.5107 8.20256 19.3535C8.56912 21.1963 9.47391 22.889 10.8025 24.2176C12.1311 25.5462 13.8238 26.451 15.6667 26.8176C17.5095 27.1841 19.4196 26.996 21.1555 26.277C22.8914 25.5579 24.3751 24.3403 25.419 22.778C26.4629 21.2158 27.02 19.379 27.02 17.5001C27.0174 14.9814 26.0157 12.5665 24.2347 10.7855C22.4536 9.00442 20.0388 8.0027 17.52 8.00012ZM20.9595 20.9396C20.8225 21.0765 20.6368 21.1533 20.4431 21.1533C20.2494 21.1533 20.0637 21.0765 19.9267 20.9396L17.0036 18.0165C16.8665 17.8796 16.7894 17.6939 16.7893 17.5001V11.654C16.7893 11.4602 16.8662 11.2743 17.0033 11.1372C17.1403 11.0002 17.3262 10.9232 17.52 10.9232C17.7138 10.9232 17.8997 11.0002 18.0368 11.1372C18.1738 11.2743 18.2508 11.4602 18.2508 11.654V17.1981L20.9595 19.9068C21.0964 20.0438 21.1732 20.2295 21.1732 20.4232C21.1732 20.6169 21.0964 20.8026 20.9595 20.9396Z" fill="white" />
                                        </svg>
                                    <div>                                
                                        <h2 style="color: #db9601;">0</h2>
                                        <p style="color: #db9601;">REJECTION AFTER
                                            INITIAL VERIFICATION
                                            </p>
                                    </div>
                                    </div>   
                                </div>   
                                <div class="col mb-3">
                                    <div class="box_main" style="background: #cef4c7;">
                                        <svg width="44" height="44" viewBox="0 0 37 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="18.8916" cy="17.9759" r="17.9209" fill="#7FC58B"/>
                                            <g clip-path="url(#clip0_2035_1099)">
                                            <path d="M30.5963 18.567C30.8136 18.3179 30.8136 17.9421 30.5963 17.693L28.5902 15.3746C28.468 15.2342 28.4091 15.044 28.4318 14.8584L28.785 11.8154C28.8257 11.4712 28.5948 11.1543 28.2552 11.0818L25.1216 10.4343C24.936 10.3935 24.7775 10.2803 24.6778 10.1173L23.0703 7.38225C22.8937 7.08339 22.5269 6.97018 22.21 7.11509L19.4477 8.39205C19.2711 8.47356 19.0628 8.47356 18.8862 8.39205L16.124 7.11509C15.8116 6.97018 15.4357 7.08792 15.2636 7.38678L13.6788 10.1128C13.5837 10.2758 13.4207 10.3935 13.235 10.4343L10.0833 11.0818C9.74373 11.1497 9.51279 11.4712 9.55355 11.8154L9.90675 14.8584C9.92939 15.044 9.87052 15.2297 9.74826 15.3746L7.73772 17.693C7.52037 17.9421 7.52037 18.3179 7.73772 18.567L9.74826 20.9126C9.87052 21.053 9.92486 21.2386 9.90675 21.4243L9.55355 24.4673C9.51279 24.8114 9.74373 25.1284 10.0833 25.2009L13.2441 25.8484C13.4297 25.8846 13.5927 26.0023 13.6878 26.1654L15.2682 28.8687C15.4403 29.1676 15.8161 29.2853 16.1285 29.1404L18.8908 27.8635C19.0674 27.7819 19.2757 27.7819 19.4523 27.8635L22.219 29.1404C22.5315 29.2808 22.8983 29.1676 23.0703 28.8732L24.6778 26.1608C24.7729 25.9978 24.9314 25.8846 25.1171 25.8439L28.2506 25.1963C28.5902 25.1284 28.8212 24.8069 28.7804 24.4627L28.4272 21.4198C28.4046 21.2341 28.4635 21.0485 28.5857 20.9081L30.5963 18.567ZM23.7631 16.1806L18.0983 21.8454C17.804 22.1398 17.324 22.1398 17.0297 21.8454L14.5708 19.3866C14.2765 19.0923 14.2765 18.6123 14.5708 18.3179L15.2636 17.6251C15.558 17.3308 16.038 17.3308 16.3368 17.6251L17.5685 18.8568L22.0017 14.4237C22.296 14.1293 22.776 14.1293 23.0749 14.4237L23.7722 15.1165C24.062 15.4018 24.062 15.8817 23.7631 16.1806Z" fill="white"/>
                                            </g>
                                            <defs>
                                            <clipPath id="clip0_2035_1099">
                                            <rect width="23.1846" height="23.1846" fill="white" transform="translate(7.57373 6.53571)"/>
                                            </clipPath>
                                            </defs>
                                        </svg>
                                        <div>                                
                                            <h2 style="color: #66a070;">0</h2>
                                            <p style="color: #66a070;">APPROVED APPLICATIONS</p>
                                        </div>
                                    </div>   
                                </div>                  
                                <div class="col mb-3">
                                        <div class="box_main" style="background: #f4d2d2;">
                                        <svg width="44" height="44" viewBox="0 0 37 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="18.8501" cy="17.9759" r="17.9209" fill="#D55353"/>
                                        <path d="M27.2579 13.564C26.4644 11.8822 25.2078 10.47 23.6246 9.47908C21.4226 8.10478 18.8182 7.66819 16.286 8.25284C13.7575 8.83369 11.6049 10.3674 10.2306 12.5694C8.85243 14.7713 8.41583 17.3756 9.0005 19.9079C9.58516 22.4363 11.1189 24.5888 13.3171 25.9631C14.8661 26.9312 16.6428 27.4438 18.4614 27.4438H18.5791C20.39 27.421 22.1516 26.8971 23.6778 25.9328C24.122 25.6518 24.251 25.0672 23.9701 24.623C23.6892 24.1788 23.1045 24.0498 22.6603 24.3307C21.434 25.109 20.0141 25.5304 18.5563 25.5493C17.0605 25.5683 15.5988 25.1545 14.3232 24.3611C12.5502 23.2525 11.3164 21.5213 10.8494 19.4865C10.3824 17.444 10.7317 15.3484 11.8403 13.5754C14.1258 9.91947 18.9625 8.80332 22.6185 11.0888C23.8942 11.886 24.904 13.0211 25.5418 14.3727C26.1645 15.69 26.4074 17.1517 26.2442 18.5943C26.1872 19.1144 26.5593 19.5852 27.0832 19.6421C27.6033 19.6991 28.0741 19.327 28.1311 18.8031C28.3323 17.015 28.0285 15.2003 27.2579 13.564Z" fill="white"/>
                                        <path d="M21.7731 14.4193C21.4003 14.0466 20.7992 14.0466 20.4264 14.4193L18.4709 16.378L16.5155 14.4231C16.1427 14.0504 15.5416 14.0504 15.1688 14.4231C14.796 14.7958 14.796 15.3968 15.1688 15.7695L17.1242 17.7244L15.1688 19.6793C14.796 20.052 14.796 20.653 15.1688 21.0257C15.3552 21.212 15.5987 21.3033 15.8421 21.3033C16.0856 21.3033 16.3291 21.212 16.5155 21.0257L18.4709 19.0708L20.4264 21.0257C20.6128 21.212 20.8563 21.3033 21.0997 21.3033C21.3432 21.3033 21.5867 21.212 21.7731 21.0257C22.1459 20.653 22.1459 20.052 21.7731 19.6793L19.8177 17.7206L21.7731 15.7657C22.1459 15.393 22.1459 14.792 21.7731 14.4193Z" fill="white"/>
                                        </svg>
                                        <div>                                
                                            <h2 style="color: #d55353;">0</h2>
                                            <p style="color: #d55353;">REJECTED APPLICATIONS</p>
                                        </div>
                                        </div>   
                                </div>
                                    
                        </div>  
                            <!-- <div class="row mb-3">
                                <div class="col-md-3 mb-2">
                                <select id="inputState" class="form-select">
                                    <option selected="">Select Division</option>
                                    <option>...</option>
                                </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                <select id="inputState" class="form-select">
                                    <option selected="">Select District</option>
                                    <option>...</option>
                                </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <select id="inputState" class="form-select">
                                        <option selected="">Select Tehsil</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <input type="text" class="form-control" placeholder="CNIC">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <input type="date" class="form-control" placeholder="DATE FROM ">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <input type="date" class="form-control" placeholder="DATE TO ">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <a href="http://127.0.0.1:3131/about-us" class="btn btn-primary  w-100" style=" height: 49px;  padding: 10px 24px;                        font-size: 16px; ">Filter</a>
                                    
                                </div>
                                <div class="col-md-3 mb-2">
                                    <a href="http://127.0.0.1:3131/login" class="btn btn-default w-100" style=" height: 49px;  padding: 10px 24px;   border: 1px solid; font-size: 16px; ">Reset</a>
                                </div>

                            </div> -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="m-0">Gender-wise Submitted Applications</h5>
                                        </div>
                                        <div class="card-body">
                                        <canvas id="Gender-wise" style="height: 352px; width: 1056px; display: block; box-sizing: border-box;" width="1320" height="440"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="m-0">Married and Unmarried</h5>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="married_unmarried" style="height: 250px; width: 100%;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="m-0">Division Wise Submissions</h5>
                                                </div>
                                                <div class="card-body">
                                                <canvas id="divisionsBarChart" style="height: 352px; width: 1056px; display: block; box-sizing: border-box;" width="1320" height="440"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="m-0">District Wise Submissions</h5>
                                                </div>
                                                <div class="card-body">
                                                <canvas id="districtBarChart" style="height: 352px; width: 1056px; display: block; box-sizing: border-box;" width="1320" height="440"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div> 
                                            </div>
                    </div>
                @endif
                    

</div>
@endsection
@section('scripts')
@parent
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    
    const maleApplications = {{ $maleApplications }};
    const femaleApplications = {{ $femaleApplications }};
    const otherApplications = {{ $otherApplications }};
    const marriedApplications = {{ $marriedApplications }};
    const unmarriedApplications = {{ $unmarriedApplications }};


    // const districtData = @json($districts);

    // const districts = districtData.map(item => item.district);
    // const totalApplicationsGraph = districtData.map(item => item.total_applications);
    
    const districtLabels = @json($districts->pluck('district'));
    const districtData = @json($districts->pluck('total_applications'));
    
    const divisionLabels = @json($divisions->pluck('division'));
    const divisionData = @json($divisions->pluck('total_applications'));
    
    // function initMaritalChart() {

    //     const marriedApplications = {{ $marriedApplications }};
    //     const unmarriedApplications = {{ $unmarriedApplications }};
        
    //     const canvas = document.getElementById('married_unmarried');
    //     const ctx = canvas.getContext('2d');
    //     const container = canvas.parentNode;

    //     if (!marriedApplications && !unmarriedApplications) {
    //         canvas.style.display = 'none';
    //         container.insertAdjacentHTML('beforeend', `<div style="text-align:center; margin-top:50px; color:#888;">No data found for marital status</div>`);
    //         return; // prevent chart rendering
    //     }

    //     new Chart(ctx, {
    //         type: 'pie',
    //         data: {
    //             labels: ['Married', 'Unmarried'],
    //             datasets: [{
    //                 data: [marriedApplications, unmarriedApplications],
    //                 backgroundColor: ['#00effc', '#264a4c'],
    //             }]
    //         },
    //         options: {
    //             responsive: true,
    //             plugins: {
    //                 legend: {
    //                     position: 'top',
    //                 },
    //             },
    //             aspectRatio: 2,
    //             height: 350
    //         }
    //     });
    // }

// initMaritalChart();



    const maritalChart = document.getElementById('married_unmarried').getContext('2d');
    const pieChart1 = new Chart(maritalChart, {
        type: 'pie',
        data: {
            labels: ['Married', 'Unmarried'],
            datasets: [{
                data: [marriedApplications, unmarriedApplications],
                backgroundColor: ['#00effc', '#264a4c'],
                
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
            },
            aspectRatio: 2, 
            height: 350 
        }
    });

    const genderChart = document.getElementById('Gender-wise').getContext('2d');
    const pieChart2 = new Chart(genderChart, {
        type: 'pie',
        data: {
            labels: ['Male', 'Female','Other'],
            datasets: [{
                data: [maleApplications,femaleApplications, otherApplications],
                backgroundColor: ['#7AA7FF', '#F4D2D2','#FFF3B3'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
            },
            aspectRatio: 2, 
            height: 350 
        }
    });

    const divisionsBar = document.getElementById('divisionsBarChart').getContext('2d');
    const divisionsBarChart = new Chart(divisionsBar, {
        type: 'bar',
        data: {
            labels: divisionLabels,
            datasets: [{
                label: '',
                data: divisionData,
                backgroundColor: ['#4e73df', '#f6c23e', '#1cc88a'],
                borderColor: ['#4e73df', '#f6c23e', '#1cc88a'],
                borderWidth: 1
            }]
        },
        responsive: true,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
            legend: {
                display: false // Hides the legend
            }
        },
            aspectRatio: 3, 
            height: 250 
        }
    });
    const districtsBar = document.getElementById('districtBarChart').getContext('2d');
    const districtBarChart = new Chart(districtsBar, {
        type: 'bar',
        data: {
            labels: districtLabels,
            datasets: [{
                // label: ['Total', 'Pending', 'Completed'],
                 label: '',
                data: districtData,
                backgroundColor: ['#4e73df', '#f6c23e', '#1cc88a'],
                borderColor: ['#4e73df', '#f6c23e', '#1cc88a'],
                borderWidth: 1
            }]
        },
        responsive: true,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
            legend: {
                display: false // Hides the legend
            }
        },
            aspectRatio: 3, 
            height: 250 
        }
    });

    // const ctxPie = document.getElementById('pieChart').getContext('2d');
    // const pieChart = new Chart(ctxPie, {
    //     type: 'line',
    //     data: {
    //         labels: ['Pending', 'Approved'],
    //         datasets: [{
    //             data: [pendingApplications, approvedApplications],
    //             backgroundColor: ['#f6c23e', '#1cc88a'],
    //         }]
    //     },
    //     options: {
    //         responsive: true,
    //         plugins: {
    //             legend: {
    //                 position: 'top',
    //             },
    //         },
    //         aspectRatio: 3, 
    //         height: 250 
    //     }
    // });
</script>
@endsection

<style>
.chart-container {
    position: relative;
    width: 100%;
    height: 0;
    padding-bottom: 100%; /* This maintains a 1:1 aspect ratio */
}

.chart-container canvas {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>