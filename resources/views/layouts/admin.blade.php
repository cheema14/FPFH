<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <!-- <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" /> -->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@3.2/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">   
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu&display=swap" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    
    @stack('styles')
</head>

<body>
<div id="main_wrapper ">
  @include('partials.menu')
</div>

<div class="main_content px-md-4 px-3">
           
                <div class="main_header px-md-0 px-4 mb-4 border-bottom">
                    <div class="toggle_menu">
                        <i class="fa-solid fa-angle-left"></i>
                    </div>
                    <div class="mb-2 mt-2">
                        <h1 class="main_title mb-0">Dashboard</h1>                        
                    </div>  
                </div>
           
                <div class="c-body">
                    <main>
                         <div>
                            @if(session('message'))
                                <div class="row mb-2">
                                    <div class="col-lg-12">
                                        <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                                    </div>
                                </div>
                            @endif
                            @if($errors->count() > 0)
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @yield('content')

                        </div>


                    </main>
                    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            
        </div>

    
    <!-- <div class="c-wrapper">
        <header class="c-header c-header-fixed px-3">
            <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
                <i class="fas fa-fw fa-bars"></i>
            </button>

            <a class="c-header-brand d-lg-none" href="#">{{ trans('panel.site_title') }}</a>

            <button class="c-header-toggler mfs-3 d-md-down-none" type="button" responsive="true">
                <i class="fas fa-fw fa-bars"></i>
            </button>

            <ul class="c-header-nav ml-auto">
                @if(count(config('panel.available_languages', [])) > 1)
                    <li class="c-header-nav-item dropdown d-md-down-none">
                        <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            {{ strtoupper(app()->getLocale()) }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @foreach(config('panel.available_languages') as $langLocale => $langName)
                                <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                            @endforeach
                        </div>
                    </li>
                @endif


            </ul>
        </header>

        
    </div> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
    <script src="https://unpkg.com/@coreui/coreui@3.2/dist/js/coreui.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script> -->
    <script>
        $(function() {
  let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
  let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
  let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
  let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
  let printButtonTrans = '{{ trans('global.datatables.print') }}'
  let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
  let selectAllButtonTrans = '{{ trans('global.select_all') }}'
  let selectNoneButtonTrans = '{{ trans('global.deselect_all') }}'

  let languages = {
    'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
  };

  $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
  $.extend(true, $.fn.dataTable.defaults, {
    language: {
      url: languages['{{ app()->getLocale() }}']
    },
    columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
    }, {
        orderable: false,
        searchable: false,
        targets: -1
    }],
    select: {
      style:    'multi+shift',
      selector: 'td:first-child'
    },
    order: [],
    scrollX: true,
    pageLength: 100,
    dom: 'lBfrtip<"actions">',
    buttons: [
      {
        extend: 'selectAll',
        className: 'btn-primary',
        text: selectAllButtonTrans,
        exportOptions: {
          columns: ':visible'
        },
        action: function(e, dt) {
          e.preventDefault()
          dt.rows().deselect();
          dt.rows({ search: 'applied' }).select();
        }
      },
      {
        extend: 'selectNone',
        className: 'btn-primary',
        text: selectNoneButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'copy',
        className: 'btn-default',
        text: copyButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'csv',
        className: 'btn-default',
        text: csvButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'excel',
        className: 'btn-default',
        text: excelButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'pdf',
        className: 'btn-default',
        text: pdfButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'print',
        className: 'btn-default',
        text: printButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'colvis',
        className: 'btn-default',
        text: colvisButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      }
    ]
  });

  $.fn.dataTable.ext.classes.sPageButton = '';
});

    </script>
    <script>
     
    $(document).ready(function () {
        const toggleSidebar = () => {
            $('.sidebar').toggleClass('collapsed');
            $('.main_content').toggleClass('collapsed');
            $('.toggle_menu i').toggleClass('fa-solid fa-angle-left fa-solid fa-angle-right');
        };
        // Toggle sidebar on button click
        $('.toggle_menu').click(function () {
            toggleSidebar();
        });
        // Add 'collapsed' class below 992.5 screen width
        $(window).on('resize', function () {
            if ($(window).width() < 992.5) {
                $('.sidebar').addClass('collapsed');
                $('.main_content').addClass('collapsed');
            } else {
                $('.sidebar').removeClass('collapsed');
                $('.main_content').removeClass('collapsed');
            }
        }).resize(); // Trigger the resize event on page load
        // Change classes for 'las la-angle-double-left' and 'las la-angle-double-right'
        $(window).on('resize', function () {
            if ($(window).width() < 992.5) {
                $('.toggle_menu i').removeClass('las la-angle-double-left').addClass('las la-angle-double-right');
            } else {
                $('.toggle_menu i').removeClass('las la-angle-double-right').addClass('las la-angle-double-left');
            }
        }).resize(); // Trigger the resize event on page load
    });
</script>
    @yield('scripts')
    @stack('scripts')
    <script type="text/javascript">
    function toggleMenu(element) {
    let parent = element.closest(".nav-item");
    let submenu = parent.querySelector(".submenu");

    if (parent.classList.contains("open")) {
        parent.classList.remove("open");
    } else {
        document.querySelectorAll(".nav-item.open").forEach(item => {
            item.classList.remove("open");
        });
        parent.classList.add("open");
    }

    adjustContentPosition();
}

function adjustContentPosition() {
    let sidebar = document.querySelector(".sidebar");
    let expandedHeight = 0;

    document.querySelectorAll(".nav-item.open .submenu").forEach(submenu => {
        expandedHeight += submenu.scrollHeight;
    });

    document.querySelector(".content").style.marginTop = expandedHeight + "px";
}

function toggleSpouseInfo() {
        var maritalStatus = document.getElementById('marital_status').value;
        var spouseInfo = document.getElementById('spouse_info');
        var spouseOccupation = document.getElementById('spouse-cnic-front-upload-container');
        var spouseCnicBack = document.getElementById('spouse-cnic-back-upload-container');
        var nominee_section = document.getElementById('nominee_section');

        if (maritalStatus == "0") { // Check if married
            spouseInfo.style.display = 'block'; // Show spouse info
            spouseOccupation.style.display = 'block'; // Show spouse info
            spouseCnicBack.style.display = 'block'; // Show spouse info
            nominee_section.style.display = 'none';
            document.getElementById('nominee_dropdown').selectedIndex = 0;
            
        } else {
            spouseInfo.style.display = 'none'; // Hide spouse info
            spouseOccupation.style.display = 'none'; // Hide spouse info
            spouseCnicBack.style.display = 'none'; // Hide spouse info
            nominee_section.style.display = 'none';
            document.getElementById('nominee_dropdown').selectedIndex = 0;
        }

        // If unmarried then display the nominee section
        if(maritalStatus == "1"){
            nominee_section.style.display = 'block';
        }
    }
    function toggleApplicantOccupation() {
        var occupation = document.getElementById('occupation').value;
        const select = document.getElementById("occupation");
        const occupationText = select.options[select.selectedIndex].text;
        
        var applicantEmployerName = document.getElementById('applicant-employer-name-container');
        var applicantMonthlyIncomeRange = document.getElementById('applicant-monthly-income-range-container');
        var applicantSourceOfIncome = document.getElementById('applicant-source-income-container');
        var proofOfIncome = document.getElementById('proof-of-income-upload-container');
        if (occupation != "13") { // Check if married
            applicantEmployerName.style.display = 'block'; // Show spouse info
            applicantMonthlyIncomeRange.style.display = 'block'; // Show spouse info
            applicantSourceOfIncome.style.display = 'block'; // Show spouse info
            proofOfIncome.style.display = 'block'; // Show spouse info
        } else {
            applicantEmployerName.style.display = 'none'; // Hide spouse info
            applicantMonthlyIncomeRange.style.display = 'none'; // Hide spouse info
            applicantSourceOfIncome.style.display = 'none'; // Hide spouse info
            proofOfIncome.style.display = 'none'; // Hide spouse info
        }

        if( occupationText == 'Unemployed'){
            applicantEmployerName.style.display = 'none'; 
            applicantMonthlyIncomeRange.style.display = 'none'; 
            applicantSourceOfIncome.style.display = 'none'; 
            proofOfIncome.style.display = 'none'; 
        }
        
    }

</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.querySelector(".sidebar");
    const toggleBtn = document.querySelector(".sidebar-toggle");

    // Sidebar toggle button
    toggleBtn.addEventListener("click", function () {
        sidebar.classList.toggle("collapsed");
    });

    // Show submenu on hover when sidebar is collapsed
    document.querySelectorAll(".sidebar .nav-item").forEach(item => {
        item.addEventListener("mouseenter", function () {
            if (sidebar.classList.contains("collapsed")) {
                let submenu = this.querySelector(".submenu");
                if (submenu) {
                    submenu.style.display = "block";
                }
            }
        });

        item.addEventListener("mouseleave", function () {
            if (sidebar.classList.contains("collapsed")) {
                let submenu = this.querySelector(".submenu");
                if (submenu) {
                    submenu.style.display = "none";
                }
            }
        });
    });
});
$(document).ready(function () {
        // Check if the CNIC input exists before adding the mask
        const cnicInput = $('#cnic');
        if (cnicInput.length) {
            // Masking for CNIC input
            cnicInput.mask('99999-9999999-9'); // Assuming jQuery Mask Plugin is used
        } else {
            console.error("CNIC input not found.");
        }

        const contactInput = document.getElementById("contact_number");
            if (contactInput) {
                // Set the placeholder to show the format
                contactInput.placeholder = '03##-#######'; // Set placeholder with new format
                // Masking for contact number input according to new format
                $(contactInput).mask('03##-#######'); // Adjust the mask for the new format
            }
    });
</script>
</body>

</html>