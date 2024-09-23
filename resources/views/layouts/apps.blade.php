<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title')</title>


      <!-- Favicon icon -->
      <link rel="icon" type="image/png" sizes="16x16" href="...images/favicon.png">
      <!-- Custom Stylesheet -->
      <link href="../css/style.css" rel="stylesheet">

      {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}


      {{-- sweetalert2 --}}
      <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

       <!-- Select2 CSS CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />


    @yield('link')
{{-- <style>
    body {
        font-size: 80% !important;
    }
    .form-group{
        font-size: 50% !important;
    }
    /* span{
        font-size: 100% !important;
    } */

   
</style> --}}
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
                @if(Auth::user()->role === 'Admin'  )
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
                                <li><a href="./page-error-404.html"><i class="icon-notebook menu-icon" style="font-size:12px;"></i> Invoice
                                </a></li>
                            </ul>
                        </li>
                    </li>
            
                    @if(isset(Auth::user()->role) && Auth::user()->role === 'Admin')
                    <hr>
                    <li>
                        <a href="{{route('user.index')}}"><i class="fa fa-users"></i><span class="nav-text">User</span></a>
                    </li>
                    <li>
                        <a href="{{route('expenses.index')}}"><i class="fa fa-money"></i><span class="nav-text">Expenses</span></a>
                    </li>

                    @else
                    

                    @endif
                    
                    {{-- <hr> --}}
                    {{-- <li class="nav-label">Account</li> --}}

                    {{-- <li>
                        <a href="{{ route('profile.show', Auth::user()->id) }}">
                            <i class="fa fa-user"></i>
                            <span class="nav-text">Profile</span>
                        </a>
                    </li>

                    <li>
                        <a  onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fa fa-key"></i><span class="nav-text">Logout</span></a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li> --}}


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
          {{-- <div class="nav-header">
              <div class="brand-logo">
                  <a href="{{route('home')}}">
                      <b class="logo-abbr"><img src="../images/logo.png" alt=""> </b>
                      <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                      <span class="brand-title">
                          <img src="../images/logo-text.png" alt="test">
                         
                      </span>
                  </a>
              </div>
          </div> --}}

          <div class="nav-header">
            <div class="brand-logo">
                <a href="{{ route('home') }}">
                    <b class="logo-abbr">
                        {{-- <img src="../images/logo.png" alt="Main Logo"> --}}
                        <span class="inventory-logo-text" style="color:white"> I</span>
                    </b>
                    <span class="logo-compact">
                        {{-- <img src="./images/logo-compact.png" alt="Compact Logo"> --}}
                    </span>
                    <span class="brand-title">
                        
                        <span class="inventory-logo-text" style="color:white"> Inventory Logo</span>
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
                  {{-- <div class="header-left">
                      <div class="input-group icons">
                          <div class="input-group-prepend">
                              <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                          </div>
                          <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                          <div class="drop-down   d-md-none">
                              <form action="#">
                                  <input type="text" class="form-control" placeholder="Search">
                              </form>
                          </div>
                      </div>
                  </div> --}}
                  <div class="header-right">
                      <ul class="clearfix">
                          <li class="icons dropdown">
                            {{-- <a href="javascript:void(0)" data-toggle="dropdown">
                                  <i class="mdi mdi-email-outline"></i>
                                  <span class="badge gradient-1 badge-pill badge-primary">3</span>
                              </a>
                              <div class="drop-down animated fadeIn dropdown-menu">
                                  <div class="dropdown-content-heading d-flex justify-content-between">
                                      <span class="">3 New Messages</span>  
                                      
                                  </div>
                                  <div class="dropdown-content-body">
                                      <ul>
                                          <li class="notification-unread">
                                              <a href="javascript:void()">
                                                  <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt="">
                                                  <div class="notification-content">
                                                      <div class="notification-heading">Saiful Islam</div>
                                                      <div class="notification-timestamp">08 Hours ago</div>
                                                      <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                  </div>
                                              </a>
                                          </li>
                                          <li class="notification-unread">
                                              <a href="javascript:void()">
                                                  <img class="float-left mr-3 avatar-img" src="images/avatar/2.jpg" alt="">
                                                  <div class="notification-content">
                                                      <div class="notification-heading">Adam Smith</div>
                                                      <div class="notification-timestamp">08 Hours ago</div>
                                                      <div class="notification-text">Can you do me a favour?</div>
                                                  </div>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="javascript:void()">
                                                  <img class="float-left mr-3 avatar-img" src="images/avatar/3.jpg" alt="">
                                                  <div class="notification-content">
                                                      <div class="notification-heading">Barak Obama</div>
                                                      <div class="notification-timestamp">08 Hours ago</div>
                                                      <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                  </div>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="javascript:void()">
                                                  <img class="float-left mr-3 avatar-img" src="images/avatar/4.jpg" alt="">
                                                  <div class="notification-content">
                                                      <div class="notification-heading">Hilari Clinton</div>
                                                      <div class="notification-timestamp">08 Hours ago</div>
                                                      <div class="notification-text">Hello</div>
                                                  </div>
                                              </a>
                                          </li>
                                      </ul>
                                      
                                  </div>
                              </div> --}}
                              @if(!empty(Auth::user()->id))
                                <span> {{Auth::user()->fullname}} ( {{Auth::user()->role}} ) </span>


                              @else


                              @endif 
                          </li>
                          {{-- <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                  <i class="mdi mdi-bell-outline"></i>
                                  <span class="badge badge-pill gradient-2 badge-primary">3</span>
                              </a>
                              <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                  <div class="dropdown-content-heading d-flex justify-content-between">
                                      <span class="">2 New Notifications</span>  
                                      
                                  </div>
                                  <div class="dropdown-content-body">
                                      <ul>
                                          <li>
                                              <a href="javascript:void()">
                                                  <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                  <div class="notification-content">
                                                      <h6 class="notification-heading">Events near you</h6>
                                                      <span class="notification-text">Within next 5 days</span> 
                                                  </div>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="javascript:void()">
                                                  <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                  <div class="notification-content">
                                                      <h6 class="notification-heading">Event Started</h6>
                                                      <span class="notification-text">One hour ago</span> 
                                                  </div>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="javascript:void()">
                                                  <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                  <div class="notification-content">
                                                      <h6 class="notification-heading">Event Ended Successfully</h6>
                                                      <span class="notification-text">One hour ago</span>
                                                  </div>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="javascript:void()">
                                                  <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                  <div class="notification-content">
                                                      <h6 class="notification-heading">Events to Join</h6>
                                                      <span class="notification-text">After two days</span> 
                                                  </div>
                                              </a>
                                          </li>
                                      </ul>
                                      
                                  </div>
                              </div>
                          </li> --}}
                          {{-- <li class="icons dropdown d-none d-md-flex">
                              <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                                  <span>English</span>  <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                              </a>
                              <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                  <div class="dropdown-content-body">
                                      <ul>
                                          <li><a href="javascript:void()">English</a></li>
                                          <li><a href="javascript:void()">Dutch</a></li>
                                      </ul>
                                  </div>
                              </div>
                          </li> --}}
                          
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
                                    {{-- <li><a href="email-inbox.html"><i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill badge-primary">3</div></a></li> --}}
                                    {{-- <hr class="my-2">
                                    <li><a href="page-lock.html"><i class="icon-lock"></i> <span>Lock Screen</span></a></li>
                                    <li>
                                        <a href="#" id="logout-link">
                                            <i class="icon-key"></i> <span>Logout</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li> --}}
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
                    <p class="mb-0">Copyright © Designed & Developed by <a href=""> [Your Developer Name]</a>  2024 </p>
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
      <script src="../plugins/common/common.min.js"></script>
      <script src="../js/custom.min.js"></script>
      <script src="../js/settings.js"></script>
      <script src="../js/gleek.js"></script>
      <script src="../js/styleSwitcher.js"></script>
      <script src="../apps/tools/customizefunction.js"></script>



      {{-- practice cdn only for development --}}

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
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
                </script>
</body>
</html>
