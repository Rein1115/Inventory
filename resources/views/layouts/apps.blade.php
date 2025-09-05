<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title')</title>


      <!-- Favicon icon -->
      <link rel="icon" type="image/png" sizes="16x16" href="../logonibayicon.png">
      {{-- <link rel="icon" type="image/png" sizes="16x16" href="@vite(['public/logonibayicon.png'])"> --}}
      
      <!-- Custom Stylesheet -->
      <link href="../css/style.css" rel="stylesheet">
      {{-- <link href="@vite(['public/css/style.css'])" rel="stylesheet"> --}}



      {{-- sweetalert2 --}}
      <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

       <!-- Select2 CSS CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />


    <script>
    var base_url = function(urlText) {
        var url = 'http://127.0.0.1:8000/' + urlText + '';
            return url;
    }
    </script>


    @yield('link')
    <style>
        body {
        background: linear-gradient(to right, #ff7f7f, #8b0000);
         font-size: x-small !important;
         font-family: Arial, Helvetica, sans-serif;
         overflow-x: hidden;
         overflow-y: auto;
        }
       

    
    </style>
  </head>
  
  <body>
  
      <div id="main-wrapper" >
       <!--**********************************
              Sidebar start
       ***********************************-->
       <div class="nk-sidebar ">           
          <div class="nk-nav-scroll">
              <ul class="metismenu" id="menu">


                @if(isset(Auth::user()->role) > 0 )
                    {{-- Dashboard --}}
                    <li>
                        <a href="{{ route('home') }}"><i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span></a>
                    </li>
                        {{-- End Dashboard --}}
    
                    @if(Auth::user()->role === 'Admin'  || Auth::user()->role === 'Superadmin' )


                  

                    <li>
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa fa-truck menu-icon"></i><span class="nav-text">Supplier</span></a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('supplier.index')}}"><i class="icon-notebook menu-icon" style="font-size:12px;"></i> Request Supplier
                                </a></li>
                               
                            </ul>
                        </li>
                    </li>

                    <li>
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa fa-tag menu-icon"></i><span class="nav-text">Brand</span></a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('brand.index')}}"><i class="icon-notebook menu-icon" style="font-size:12px;"></i> Request Brand
                                </a></li>
                               
                            </ul>
                        </li>
                    </li>
                  
                    <li>
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa fa-cube menu-icon"></i><span class="nav-text">Product</span></a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('product.index')}}"><i class="icon-notebook menu-icon" style="font-size:12px;"></i> Request Product
                                </a></li>
                                <li><a href="{{route('producthistory.index')}}"><i class="icon-notebook menu-icon" style="font-size:12px;"></i>Product History</a></li>
                            </ul>
                        </li>
                    </li>
                @endif
                
                
                    <li>
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa fa-shopping-cart"></i><span class="nav-text">Order</span></a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('order.index')}}"><i class="icon-notebook menu-icon" style="font-size:12px;"></i> Request Order
                                </a></li>
                            </ul>
                        </li>
                    </li>

                    <li>
                        <li><a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-money"></i><span class="nav-text">Payment</span></a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('payment.index')}}"><i class="icon-notebook menu-icon" style="font-size:12px;"></i> Payment
                                </a></li>
                                <li><a href="{{route('paymenthistory.index')}}"><i class="icon-notebook menu-icon" style="font-size:12px;"></i> Payment History
                                </a></li>
                            </ul>
                        </li>
                    </li>

                    @if(isset(Auth::user()->role) && Auth::user()->role === 'Admin' || Auth::user()->role === 'Superadmin')
                    <li>
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa fa-book menu-icon"></i><span class="nav-text">Report</span></a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('anualsales.index')}}"><i class="icon-notebook menu-icon" style="font-size:12px;"></i> Yearly Sales Report
                                </a></li>
                                
                            </ul>
                        </li>
                    </li>
                    @endif
            
                    @if(isset(Auth::user()->role) && Auth::user()->role === 'Admin'|| Auth::user()->role === 'Superadmin')
                    <hr>

                    <li>
                        <a href="{{route('user.index')}}"><i class="fa fa-users"></i><span class="nav-text">User</span></a>
                    </li>
                    <li>
                        <a href="{{route('expenses.index')}}"><i class="fa fa-money"></i><span class="nav-text">Expenses</span></a>
                    </li>

               

                    @else
                    

                    @endif


              </ul>
              @else


              @endif
          </div>
      </div>
      <!--**********************************
          Sidebar end
      ***********************************-->
  
  
      <!--*******************
          Preloader start
      ********************-->
      <div id="preloader">
          <div class="loader">
              <svg class="circular" viewBox="25 25 50 50">
                  <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
              </svg>
          </div>
      </div>
      <!--*******************
          Preloader end
      ********************-->
  
      <!--**********************************
              Nav header start
          ***********************************-->
          <div style="background: linear-gradient(to right, #ffcccc, #ff9999);" class="nav-header">
                <div class="brand-logo" style="display: flex; justify-content: center; align-items: center; height: 100%;">
                    <a href="{{ route('home') }}">
                        <b class="logo-abbr">
                            <img style="width: 80px; height: auto;" src="../logonibayicon.png" alt="Logo">
                        </b>
                        <span class="logo-compact">
                            <img style="width: 80px; height: auto;" src="../logonibayicon.png" alt="Logo">
                        </span>
                        <span class="brand-title" style="text-align: center;">
                            <img style="width: 80px; height: auto;" src="../logonibay.png" alt="Logo">
                        </span>
                    </a>
                </div>
           </div>
          <!--**********************************
              Nav header end
          ***********************************-->
  
          <!--**********************************
              Header start
          ***********************************-->
          <div class="header">    
              <div class="header-content clearfix">
                  
                  <div class="nav-control">
                      <div class="hamburger">
                          <span class="toggle-icon"><i class="icon-menu"></i></span>
                      </div>
                  </div>
                  <div class="header-right">
                      <ul class="clearfix">
                            <li class="icons dropdown">
                                <button id="fullscreenBtn" class="btn btn">
                                    <i class="fa fa-expand" style="font-size:18px;"></i>
                                </button>
                            </li>
                            <li class="icons dropdown">
                              @if(!empty(Auth::user()->id))
                                <span> {{Auth::user()->fullname}} ( {{Auth::user()->role}} ) </span>

                              @else
                              @endif 
                            </li>
                          <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" id="userDropdownToggle">
                                <span class="activity active"></span>
                                <img src="../images/user/1.png" height="40" width="40" alt="User Image">
                            </div>
                            <div class="drop-down dropdown-profile dropdown-menu" id="userDropdownMenu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="{{ route('profile.show', 0) }}"><i class="icon-user"></i> <span>Profile</span></a></li>
                                        <li>
                                            <a href="#" id="logout-link">
                                                <i class="icon-key"></i> <span>Logout</span>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                 
                                    </ul>
                                </div>
                            </div>
                        </li>                        
                      </ul>
                  </div>
              </div>
          </div>
          <!--**********************************
              Header end ti-comment-alt
          ***********************************-->
        
          <!--**********************************
              Content body start
          ***********************************-->
          <div class="content-body">
              <div class="container-fluid">
                    @yield('content')
              </div>
              <!-- #/ container -->
          </div>

          <!--**********************************
              Content body end
          ***********************************-->

          <!--**********************************
              Footer start
          ***********************************-->
          <footer class="footer bg-light py-3">
            <div class="container">
                <div class="text-center">
                    {{-- <p class="mb-0">Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p> --}}
                    {{-- <p class="mb-0">Copyright © Designed & Developed by <a href=""> [Your Developer Name]</a>  2024 </p> --}}

                    <p class="mb-0">© 2024 Developed by<a href=""> [Your Developer Name]</a>  2024 </p>
                   
                </div>
            </div>
         </footer>
    
          <!--**********************************
              Footer end
          ***********************************-->
      </div>
      <!--**********************************
          Main wrapper end
      ***********************************-->

     







      {{-- print --}}

        @yield('print')

      {{-- end print --}}
    
  
      <!--**********************************
          Scripts
      ***********************************-->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      <script src="../plugins/common/common.min.js"></script>
      <script src="../js/custom.min.js"></script>
      <script src="../js/settings.js"></script>
      <script src="../js/gleek.js"></script>
      <script src="../js/styleSwitcher.js"></script>
      <script src="../apps/tools/customizefunction.js"></script>


      {{-- @vite(['public/plugins/common/common.min.js'])
      @vite(['public/js/custom.min.js'])
      @vite(['public/js/settings.js'])
      @vite(['public/js/gleek.js'])
      @vite(['public/js/styleSwitcher.js'])
      @vite(['public/apps/tools/customizefunction.js']) --}}

    
      <!-- DataTables CSS -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
      
      <!-- DataTables JS -->
      <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
      
      <!-- Buttons CSS -->
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
      
      <!-- Buttons JS -->
      <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
      
      <!-- JSZip for exporting to Excel -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
      
      <!-- pdfmake for exporting to PDF -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

      <!-- SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Select2 JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>


    {{-- not allow to inspect --}}
    {{-- <script>
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
        });
    </script> --}}


      @yield('script')


      <script>
        $(document).ready(function() {
                // Toggle dropdown menu visibility
                $('#userDropdownToggle').on('click', function() {
                    $('#userDropdownMenu').toggleClass('show');
                });

                // Close dropdown when clicking outside
                $(document).on('click', function(event) {
                    if (!$(event.target).closest('#userDropdownToggle').length && !$(event.target).closest('#userDropdownMenu').length) {
                        $('#userDropdownMenu').removeClass('show');
                    }
                });

                $('#logout-link').on('click', function(event) {
                    event.preventDefault(); // Prevent the default anchor click behavior
                    $('#logout-form').submit(); // Submit the form
                });
            });

            $("#fullscreenBtn").on("click", function () {
                let elem = document.documentElement; // whole page
                let icon = $(this).find("i");

                if (!document.fullscreenElement && 
                    !document.mozFullScreenElement && 
                    !document.webkitFullscreenElement && 
                    !document.msFullscreenElement) {

                    // Enter fullscreen
                    if (elem.requestFullscreen) {
                        elem.requestFullscreen();
                    } else if (elem.mozRequestFullScreen) { // Firefox
                        elem.mozRequestFullScreen();
                    } else if (elem.webkitRequestFullscreen) { // Chrome, Safari, Opera
                        elem.webkitRequestFullscreen();
                    } else if (elem.msRequestFullscreen) { // IE/Edge
                        elem.msRequestFullscreen();
                    }

                    // Change icon
                    icon.removeClass("fa-expand").addClass("fa-compress");

                } else {
                    // Exit fullscreen
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    } else if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    } else if (document.webkitExitFullscreen) {
                        document.webkitExitFullscreen();
                    } else if (document.msExitFullscreen) {
                        document.msExitFullscreen();
                    }

                    // Change icon back
                    icon.removeClass("fa-compress").addClass("fa-expand");
                }
            });

            // Handle ESC key or user exits fullscreen manually
            $(document).on("fullscreenchange webkitfullscreenchange mozfullscreenchange MSFullscreenChange", function () {
                let icon = $("#fullscreenBtn").find("i");
                if (!document.fullscreenElement && 
                    !document.mozFullScreenElement && 
                    !document.webkitFullscreenElement && 
                    !document.msFullscreenElement) {
                    icon.removeClass("fa-compress").addClass("fa-expand");
                }
            });
            
        </script>
</body>
</html>
