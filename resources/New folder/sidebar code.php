<div class="sidebar">
            <div class="toggle_menu toggle_menu_mobile">
                <i class="fa-solid fa-angle-left"></i>
            </div>
            <div class="text-center sidebar_logo_wrapper">
                <img class="sidebar_logo img-fluid" src="{{ asset('static/media/logo.svg') }}" />
                <img class="sidebar_logo_collaped img-fluid" src="{{ asset('static/media/small-logo.svg') }}" />
            </div>
            <div class="menu_items_wrapper" >
                <ul>
                    <li class="nav-items">
                        <a href="{{ route('admin.home') }}" class="nav-link active">
                            <span class="icons">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none">
                                    <mask id="mask0_1_2" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                                        width="20" height="20">
                                        <rect width="20" height="20" fill="#D9D9D9" />
                                    </mask>
                                    <g mask="url(#mask0_1_2)">
                                        <path
                                            d="M11.8537 7.5C11.5911 7.5 11.3709 7.42014 11.1933 7.26041C11.0157 7.10069 10.9268 6.90277 10.9268 6.66666V3.33333C10.9268 3.09722 11.0157 2.8993 11.1933 2.73958C11.3709 2.57986 11.5911 2.5 11.8537 2.5H17.4145C17.6771 2.5 17.8973 2.57986 18.0749 2.73958C18.2525 2.8993 18.3414 3.09722 18.3414 3.33333V6.66666C18.3414 6.90277 18.2525 7.10069 18.0749 7.26041C17.8973 7.42014 17.6771 7.5 17.4145 7.5H11.8537ZM2.58552 10.8333C2.32292 10.8333 2.10281 10.7535 1.92517 10.5937C1.74753 10.434 1.65871 10.2361 1.65871 10V3.33333C1.65871 3.09722 1.74753 2.8993 1.92517 2.73958C2.10281 2.57986 2.32292 2.5 2.58552 2.5H8.1464C8.409 2.5 8.62912 2.57986 8.80676 2.73958C8.9844 2.8993 9.07322 3.09722 9.07322 3.33333V10C9.07322 10.2361 8.9844 10.434 8.80676 10.5937C8.62912 10.7535 8.409 10.8333 8.1464 10.8333H2.58552ZM11.8537 17.5C11.5911 17.5 11.3709 17.4201 11.1933 17.2604C11.0157 17.1007 10.9268 16.9028 10.9268 16.6667V10C10.9268 9.76388 11.0157 9.56597 11.1933 9.40625C11.3709 9.24652 11.5911 9.16666 11.8537 9.16666H17.4145C17.6771 9.16666 17.8973 9.24652 18.0749 9.40625C18.2525 9.56597 18.3414 9.76388 18.3414 10V16.6667C18.3414 16.9028 18.2525 17.1007 18.0749 17.2604C17.8973 17.4201 17.6771 17.5 17.4145 17.5H11.8537ZM2.58552 17.5C2.32292 17.5 2.10281 17.4201 1.92517 17.2604C1.74753 17.1007 1.65871 16.9028 1.65871 16.6667V13.3333C1.65871 13.0972 1.74753 12.8993 1.92517 12.7396C2.10281 12.5799 2.32292 12.5 2.58552 12.5H8.1464C8.409 12.5 8.62912 12.5799 8.80676 12.7396C8.9844 12.8993 9.07322 13.0972 9.07322 13.3333V16.6667C9.07322 16.9028 8.9844 17.1007 8.80676 17.2604C8.62912 17.4201 8.409 17.5 8.1464 17.5H2.58552Z"
                                            fill="" />
                                    </g>
                                </svg>
                            </span>
                            <span class="menu_text">
                            {{ trans('global.dashboard') }}
                            </span>
                        </a>
                    </li>
                    
                    <li class="nav-items dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icons">
                                <i class="fa-solid fa-cog"></i>
                            </span>
                            <span class="menu_text">
                                User Access
                            </span>
                        </a>
                        <div class="accordion" id="userAccessAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        User Group 1
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#userAccessAccordion">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a class="dropdown-item" href="#">User 1</a></li>
                                            <li><a class="dropdown-item" href="#">User 2</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        User Group 2
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#userAccessAccordion">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a class="dropdown-item" href="#">User 3</a></li>
                                            <li><a class="dropdown-item" href="#">User 4</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-items">
                        
                            <a href="#" class="nav-link"><span class="icons">
                                <span class="icons">
                                   <svg width="20" height="20" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_16_4900)">
                                    <path d="M17.1748 6.22763H21.6847L16.4717 1.01462V5.52451C16.4717 5.91245 16.7869 6.22763 17.1748 6.22763Z" fill=""/>
                                    <path d="M5.9248 24.6026H19.9873C21.1505 24.6026 22.0967 23.6564 22.0967 22.4933V7.63388H17.1748C16.0116 7.63388 15.0654 6.68766 15.0654 5.52451V0.602631H5.9248C4.76165 0.602631 3.81543 1.54885 3.81543 2.71201V22.4933C3.81543 23.6564 4.76165 24.6026 5.9248 24.6026ZM10.1436 11.8995H17.1748C17.5634 11.8995 17.8779 12.214 17.8779 12.6026C17.8779 12.9913 17.5634 13.3058 17.1748 13.3058H10.1436C9.75491 13.3058 9.44043 12.9913 9.44043 12.6026C9.44043 12.214 9.75491 11.8995 10.1436 11.8995ZM10.1436 14.712H17.1748C17.5634 14.712 17.8779 15.0265 17.8779 15.4151C17.8779 15.8038 17.5634 16.1183 17.1748 16.1183H10.1436C9.75491 16.1183 9.44043 15.8038 9.44043 15.4151C9.44043 15.0265 9.75491 14.712 10.1436 14.712ZM10.1436 17.5245H17.1748C17.5634 17.5245 17.8779 17.839 17.8779 18.2276C17.8779 18.6163 17.5634 18.9308 17.1748 18.9308H10.1436C9.75491 18.9308 9.44043 18.6163 9.44043 18.2276C9.44043 17.839 9.75491 17.5245 10.1436 17.5245ZM7.33105 11.8995C7.71937 11.8995 8.03418 12.2143 8.03418 12.6026C8.03418 12.9909 7.71937 13.3058 7.33105 13.3058C6.94274 13.3058 6.62793 12.9909 6.62793 12.6026C6.62793 12.2143 6.94274 11.8995 7.33105 11.8995ZM7.33105 14.712C7.71937 14.712 8.03418 15.0268 8.03418 15.4151C8.03418 15.8034 7.71937 16.1183 7.33105 16.1183C6.94274 16.1183 6.62793 15.8034 6.62793 15.4151C6.62793 15.0268 6.94274 14.712 7.33105 14.712ZM7.33105 17.5245C7.71937 17.5245 8.03418 17.8393 8.03418 18.2276C8.03418 18.6159 7.71937 18.9308 7.33105 18.9308C6.94274 18.9308 6.62793 18.6159 6.62793 18.2276C6.62793 17.8393 6.94274 17.5245 7.33105 17.5245Z" fill=""/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_16_4900">
                                    <rect width="20" height="20" fill="" transform="translate(0.956055 0.602631)"/>
                                    </clipPath>
                                    </defs>
                                    </svg>

                                </span>
                                <span class="menu_text">
                                    CSO
                                </span>
                            </a>

                    </li>
                </ul>
                 
            </div>
            <div class="logout-outer position-absolute bottom-0">
                <a href="#" class="btn btn-logout d-block text-start">
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" >
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.95605 2.08698C6.16041 2.08698 5.39734 2.40305 4.83473 2.96565C4.27213 3.52826 3.95605 4.29133 3.95605 5.08698V19.087C3.95605 19.8826 4.27213 20.6457 4.83473 21.2083C5.39734 21.7709 6.16041 22.087 6.95605 22.087H12.9561C13.7517 22.087 14.5148 21.7709 15.0774 21.2083C15.64 20.6457 15.9561 19.8826 15.9561 19.087V5.08698C15.9561 4.29133 15.64 3.52826 15.0774 2.96565C14.5148 2.40305 13.7517 2.08698 12.9561 2.08698H6.95605ZM17.2491 7.37998C17.4366 7.1925 17.6909 7.08719 17.9561 7.08719C18.2212 7.08719 18.4755 7.1925 18.6631 7.37998L22.6631 11.38C22.8505 11.5675 22.9558 11.8218 22.9558 12.087C22.9558 12.3521 22.8505 12.6064 22.6631 12.794L18.6631 16.794C18.4745 16.9761 18.2219 17.0769 17.9597 17.0746C17.6975 17.0724 17.4466 16.9672 17.2612 16.7818C17.0758 16.5964 16.9707 16.3456 16.9684 16.0834C16.9661 15.8212 17.0669 15.5686 17.2491 15.38L19.5421 13.087H10.9561C10.6908 13.087 10.4365 12.9816 10.2489 12.7941C10.0614 12.6065 9.95605 12.3522 9.95605 12.087C9.95605 11.8218 10.0614 11.5674 10.2489 11.3799C10.4365 11.1923 10.6908 11.087 10.9561 11.087H19.5421L17.2491 8.79397C17.0616 8.60645 16.9563 8.35214 16.9563 8.08698C16.9563 7.82181 17.0616 7.5675 17.2491 7.37998Z" fill="white"/>
                    </svg>
                    <span>Logout</span>
                </a>
            </div>


        </div>
