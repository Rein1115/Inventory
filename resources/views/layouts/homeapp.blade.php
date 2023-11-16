<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>test</title>

    <!-- Favicon -->
    {{-- <link rel="shortcut icon" href="../assets/images/favicon.ico"> --}}

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="../assets/css/core/libs.min.css">

    <!-- Aos Animation Css -->
    <link rel="stylesheet" href="../assets/vendor/aos/dist/aos.css">

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="../assets/css/hope-ui.min.css?v=4.0.0">

    <!-- Custom Css -->
    <link rel="stylesheet" href="../assets/css/custom.min.css?v=4.0.0">

    <!-- Dark Css -->
    <link rel="stylesheet" href="../assets/css/dark.min.css">

    <!-- Customizer Css -->
    <link rel="stylesheet" href="../assets/css/customizer.min.css">

    <!-- RTL Css -->
    <link rel="stylesheet" href="../assets/css/rtl.min.css">

</head>

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body">
            </div>
        </div>
    </div>
    <!-- loader END -->

    <aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
        <div class="sidebar-header d-flex align-items-center justify-content-start">
            <a href="{{route('Home')}}" class="navbar-brand">

                <!--Logo start-->
                <div class="logo-main">
                    <div class="logo-normal">
                        {{-- <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
                                transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                            <rect x="7.72803" y="27.728" width="28" height="4" rx="2"
                                transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                            <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
                                transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                            <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
                                transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                        </svg> --}}
                        L
                    </div>
                    <div class="logo-mini">
                        {{-- <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
                                transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                            <rect x="7.72803" y="27.728" width="28" height="4" rx="2"
                                transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                            <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
                                transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                            <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
                                transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                        </svg> --}}
                        L
                    </div>
                </div>
                <!--logo End-->




                <h4 class="logo-title">Company name</h4>
            </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </i>
            </div>
        </div>
        <div class="sidebar-body pt-0 data-scrollbar">
            <div class="sidebar-list">
                <!-- Sidebar Menu Start -->
                <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="{{route('Home')}}" tabindex="-1">
                            <span class="default-icon">Home</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>

                    <!-- Dashboard Navigation Link -->
                    <li class="nav-item">
                        <a class="nav-link  {{ request()->routeIs('Home') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('Home') }}">
                            <i class="icon">
                                <svg width="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="icon-20">
                                    <path opacity="0.4"
                                        d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                        fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                        fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Dashboard</span>
                        </a>
                    </li>

                    <!-- Inventory Navigation Link -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('Inventory.index') || request()->routeIs('Inventory.create') || request()->routeIs('Inventory.show')    ? 'active' : '' }}"
                            aria-current="page" href="{{ route('Inventory.index') }}">

                            <i class="icon">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.81 2H16.191C19.28 2 21 3.78 21 6.83V17.16C21 20.26 19.28 22 16.191 22H7.81C4.77 22 3 20.26 3 17.16V6.83C3 3.78 4.77 2 7.81 2ZM8.08 6.66V6.65H11.069C11.5 6.65 11.85 7 11.85 7.429C11.85 7.87 11.5 8.22 11.069 8.22H8.08C7.649 8.22 7.3 7.87 7.3 7.44C7.3 7.01 7.649 6.66 8.08 6.66ZM8.08 12.74H15.92C16.35 12.74 16.7 12.39 16.7 11.96C16.7 11.53 16.35 11.179 15.92 11.179H8.08C7.649 11.179 7.3 11.53 7.3 11.96C7.3 12.39 7.649 12.74 8.08 12.74ZM8.08 17.31H15.92C16.319 17.27 16.62 16.929 16.62 16.53C16.62 16.12 16.319 15.78 15.92 15.74H8.08C7.78 15.71 7.49 15.85 7.33 16.11C7.17 16.36 7.17 16.69 7.33 16.95C7.49 17.2 7.78 17.35 8.08 17.31Z"
                                        fill="currentColor">
                                    </path>
                                </svg>
                            </i>
                            <span class="item-name ">Inventory</span>
                        </a>
                    </li>

                    <!-- Orders Navigation Link -->

                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('Orders.index')||request()->routeIs('viewSummary') || request()->routeIs('printOrder') ? 'active' : ''}} "
                            aria-current="page" href="{{ route('Orders.index') }}">

                            <i class="icon">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1213 11.2331H16.8891C17.3088 11.2331 17.6386 10.8861 17.6386 10.4677C17.6386 10.0391 17.3088 9.70236 16.8891 9.70236H14.1213C13.7016 9.70236 13.3719 10.0391 13.3719 10.4677C13.3719 10.8861 13.7016 11.2331 14.1213 11.2331ZM20.1766 5.92749C20.7861 5.92749 21.1858 6.1418 21.5855 6.61123C21.9852 7.08067 22.0551 7.7542 21.9652 8.36549L21.0159 15.06C20.8361 16.3469 19.7569 17.2949 18.4879 17.2949H7.58639C6.25742 17.2949 5.15828 16.255 5.04837 14.908L4.12908 3.7834L2.62026 3.51807C2.22057 3.44664 1.94079 3.04864 2.01073 2.64043C2.08068 2.22305 2.47038 1.94649 2.88006 2.00874L5.2632 2.3751C5.60293 2.43735 5.85274 2.72207 5.88272 3.06905L6.07257 5.35499C6.10254 5.68257 6.36234 5.92749 6.68209 5.92749H20.1766ZM7.42631 18.9079C6.58697 18.9079 5.9075 19.6018 5.9075 20.459C5.9075 21.3061 6.58697 22 7.42631 22C8.25567 22 8.93514 21.3061 8.93514 20.459C8.93514 19.6018 8.25567 18.9079 7.42631 18.9079ZM18.6676 18.9079C17.8282 18.9079 17.1487 19.6018 17.1487 20.459C17.1487 21.3061 17.8282 22 18.6676 22C19.4969 22 20.1764 21.3061 20.1764 20.459C20.1764 19.6018 19.4969 18.9079 18.6676 18.9079Z" fill="currentColor"></path>                            
                                </svg>                        
                            </i>
                            <span class="item-name ">Orders</span>
                        </a>
                    </li>

                </ul>
                <!-- Sidebar Menu End -->
            </div>
        </div>
        <div class="sidebar-footer"></div>
    </aside>
    <main class="main-content">
        <div class="position-relative iq-banner">
            <!--Nav Start-->
            <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
                <div class="container-fluid navbar-inner">
                    <a href="../dashboard/index.html" class="navbar-brand">

                        <!--Logo start-->
                        <div class="logo-main">
                            <div class="logo-normal">
                                <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
                                        transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                                    <rect x="7.72803" y="27.728" width="28" height="4" rx="2"
                                        transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                                    <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
                                        transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                                    <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
                                        transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                                </svg>
                            </div>
                            <div class="logo-mini">
                                <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
                                        transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                                    <rect x="7.72803" y="27.728" width="28" height="4" rx="2"
                                        transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                                    <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
                                        transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                                    <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
                                        transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                                </svg>
                            </div>
                        </div>
                        <!--logo End-->




                        <h4 class="logo-title">Hope UI</h4>
                    </a>
                    <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                        <i class="icon">
                            <svg width="20px" class="icon-20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                            </svg>
                        </i>
                    </div>
                    {{-- <div class="input-group search-input">
              <span class="input-group-text" id="search-input">
                <svg class="icon-18" width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                    <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </span>
              <input type="search" class="form-control" placeholder="Search...">
            </div> --}}
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <span class="mt-2 navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">

                            <li class="nav-item dropdown">


                                <a href="#" class="nav-link" id="notification-drop" data-bs-toggle="dropdown">
                                    <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.7695 11.6453C19.039 10.7923 18.7071 10.0531 18.7071 8.79716V8.37013C18.7071 6.73354 18.3304 5.67907 17.5115 4.62459C16.2493 2.98699 14.1244 2 12.0442 2H11.9558C9.91935 2 7.86106 2.94167 6.577 4.5128C5.71333 5.58842 5.29293 6.68822 5.29293 8.37013V8.79716C5.29293 10.0531 4.98284 10.7923 4.23049 11.6453C3.67691 12.2738 3.5 13.0815 3.5 13.9557C3.5 14.8309 3.78723 15.6598 4.36367 16.3336C5.11602 17.1413 6.17846 17.6569 7.26375 17.7466C8.83505 17.9258 10.4063 17.9933 12.0005 17.9933C13.5937 17.9933 15.165 17.8805 16.7372 17.7466C17.8215 17.6569 18.884 17.1413 19.6363 16.3336C20.2118 15.6598 20.5 14.8309 20.5 13.9557C20.5 13.0815 20.3231 12.2738 19.7695 11.6453Z"
                                            fill="currentColor"></path>
                                        <path opacity="0.4"
                                            d="M14.0088 19.2283C13.5088 19.1215 10.4627 19.1215 9.96275 19.2283C9.53539 19.327 9.07324 19.5566 9.07324 20.0602C9.09809 20.5406 9.37935 20.9646 9.76895 21.2335L9.76795 21.2345C10.2718 21.6273 10.8632 21.877 11.4824 21.9667C11.8123 22.012 12.1482 22.01 12.4901 21.9667C13.1083 21.877 13.6997 21.6273 14.2036 21.2345L14.2026 21.2335C14.5922 20.9646 14.8734 20.5406 14.8983 20.0602C14.8983 19.5566 14.4361 19.327 14.0088 19.2283Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span class="bg-danger dots"></span>
                                </a>
                                <div class="p-0 sub-drop dropdown-menu dropdown-menu-end"
                                    aria-labelledby="notification-drop" id="notification-drop" style="width: 60px;">
                                    <div class="m-0 shadow-none card">
                                        <div class="py-3 card-header d-flex justify-content-between bg-secondary">
                                            <div class="header-title">
                                                <h5 class="mb-0 text-white">Themes</h5>
                                            </div>
                                        </div>
                                        <div class="p-0 card-body">
                                            <div class="btn btn-border" data-setting="color-mode" data-name="color"
                                                data-value="dark">
                                                <svg class="icon-20" width="20" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill="currentColor"
                                                        d="M9,2C7.95,2 6.95,2.16 6,2.46C10.06,3.73 13,7.5 13,12C13,16.5 10.06,20.27 6,21.54C6.95,21.84 7.95,22 9,22A10,10 0 0,0 19,12A10,10 0 0,0 9,2Z" />
                                                </svg>
                                                <span class="ms-2">Dark</span>
                                            </div>

                                            <div class="btn btn-border active" data-setting="color-mode"
                                                data-name="color" data-value="light">
                                                <svg class="icon-20" width="20" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill="currentColor"
                                                        d="M12,8A4,4 0 0,0 8,12A4,4 0 0,0 12,16A4,4 0 0,0 16,12A4,4 0 0,0 12,8M12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6A6,6 0 0,1 18,12A6,6 0 0,1 12,18M20,8.69V4H15.31L12,0.69L8.69,4H4V8.69L0.69,12L4,15.31V20H8.69L12,23.31L15.31,20H20V15.31L23.31,12L20,8.69Z" />
                                                </svg>
                                                <span class="ms-2">Light</span>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../assets/images/avatars/01.png" alt="User-Profile"
                                        class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
                                    <img src="../assets/images/avatars/avtar_1.png" alt="User-Profile"
                                        class="theme-color-purple-img img-fluid avatar avatar-50 avatar-rounded">
                                    <img src="../assets/images/avatars/avtar_2.png" alt="User-Profile"
                                        class="theme-color-blue-img img-fluid avatar avatar-50 avatar-rounded">
                                    <img src="../assets/images/avatars/avtar_4.png" alt="User-Profile"
                                        class="theme-color-green-img img-fluid avatar avatar-50 avatar-rounded">
                                    <img src="../assets/images/avatars/avtar_5.png" alt="User-Profile"
                                        class="theme-color-yellow-img img-fluid avatar avatar-50 avatar-rounded">
                                    <img src="../assets/images/avatars/avtar_3.png" alt="User-Profile"
                                        class="theme-color-pink-img img-fluid avatar avatar-50 avatar-rounded">
                                    <div class="caption ms-3 d-none d-md-block ">
                                        <h6 class="mb-0 caption-title">Austin Robertson</h6>
                                        <p class="mb-0 caption-sub-title">Marketing Administrator</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="../dashboard/app/user-profile.html">Profile</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="../dashboard/app/user-privacy-setting.html">Privacy Setting</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}</a></li>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav> <!-- Nav Header Component Start -->
            <div class="iq-navbar-header" style="height: 215px;">
                <div class="container-fluid iq-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="flex-wrap d-flex justify-content-between align-items-center">
                                <div>
                                                                     
                                    <h1>{{ request()->routeIs('Home') ? 'Dashboard' : '' }}</h1>
                                    <p>{{ request()->routeIs('Home') ? 'Explore your sales performance effortlessly in your dashboard.' : '' }}</p>

                                    <h1>{{ request()->routeIs('Inventory.index') || request()->routeIs('Inventory.create') || request()->routeIs('Inventory.show')    ? 'Inventory' : '' }}</h1>
                                    <p>{{ request()->routeIs('Inventory.index') ? 'You can add inventory items and view real-time stock levels, including items that are in stock and those that are currently out of stock.' : '' }}</p>
                                    <p>{{ request()->routeIs('Inventory.create') ? 'You can add inventory items here, specifying the quantity in stock, the corresponding price, and the expiry date for each product.' : '' }}</p>
                                    <p>{{ request()->routeIs('Inventory.show') ? 'You can easily edit inventory details, including product name ,stock quantity, pricing, and expiry dates.' : '' }}</p>

                                    <h1>{{request()->routeIs('Orders.index') ? 'Order(s)' : ''}} </h1>
                                    <p>{{request()->routeIs('Orders.index') ? 'You can view a list of clinic that have placed orders with you.' : ''}} </p>

                                    <h1>{{request()->routeIs('viewSummary')? 'Summary' : ''}}</h1>
                                    <p>{{request()->routeIs('viewSummary')? 'You have the capability to conveniently access and review the comprehensive status details of all your orders, providing you with a clear and detailed overview of their current statuses, ensuring you stay informed and in control of your order management process.' : ''}}</p>

                                    <h1>{{request()->routeIs('printOrder')? 'Print Summary' : ''}}</h1>
                                    <p>{{request()->routeIs('printOrder')? 'You can print receipts and update the payment status for transactions.' : ''}}</p>
                                </div>
                                {{-- <div>
                                  <a href="" class="btn btn-link btn-soft-light">
                                      <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M11.8251 15.2171H12.1748C14.0987 15.2171 15.731 13.985 16.3054 12.2764C16.3887 12.0276 16.1979 11.7713 15.9334 11.7713H14.8562C14.5133 11.7713 14.2362 11.4977 14.2362 11.16C14.2362 10.8213 14.5133 10.5467 14.8562 10.5467H15.9005C16.2463 10.5467 16.5263 10.2703 16.5263 9.92875C16.5263 9.58722 16.2463 9.31075 15.9005 9.31075H14.8562C14.5133 9.31075 14.2362 9.03619 14.2362 8.69849C14.2362 8.35984 14.5133 8.08528 14.8562 8.08528H15.9005C16.2463 8.08528 16.5263 7.8088 16.5263 7.46728C16.5263 7.12575 16.2463 6.84928 15.9005 6.84928H14.8562C14.5133 6.84928 14.2362 6.57472 14.2362 6.23606C14.2362 5.89837 14.5133 5.62381 14.8562 5.62381H15.9886C16.2483 5.62381 16.4343 5.3789 16.3645 5.13113C15.8501 3.32401 14.1694 2 12.1748 2H11.8251C9.42172 2 7.47363 3.92287 7.47363 6.29729V10.9198C7.47363 13.2933 9.42172 15.2171 11.8251 15.2171Z" fill="currentColor"></path>
                                          <path opacity="0.4" d="M19.5313 9.82568C18.9966 9.82568 18.5626 10.2533 18.5626 10.7823C18.5626 14.3554 15.6186 17.2627 12.0005 17.2627C8.38136 17.2627 5.43743 14.3554 5.43743 10.7823C5.43743 10.2533 5.00345 9.82568 4.46872 9.82568C3.93398 9.82568 3.5 10.2533 3.5 10.7823C3.5 15.0873 6.79945 18.6413 11.0318 19.1186V21.0434C11.0318 21.5715 11.4648 22.0001 12.0005 22.0001C12.5352 22.0001 12.9692 21.5715 12.9692 21.0434V19.1186C17.2006 18.6413 20.5 15.0873 20.5 10.7823C20.5 10.2533 20.066 9.82568 19.5313 9.82568Z" fill="currentColor"></path>
                                      </svg>
                                      Announcements
                                  </a>
                              </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iq-header-img">
                    <img src="../assets/images/dashboard/top-header.png" alt="header"
                        class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="../assets/images/dashboard/top-header1.png" alt="header"
                        class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="../assets/images/dashboard/top-header2.png" alt="header"
                        class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="../assets/images/dashboard/top-header3.png" alt="header"
                        class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="../assets/images/dashboard/top-header4.png" alt="header"
                        class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="../assets/images/dashboard/top-header5.png" alt="header"
                        class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
                </div>
            </div> <!-- Nav Header Component End -->
            <!--Nav End-->
        </div>
        <div class="container-fluid content-inner mt-n5 py-0">
            <div class="row">
                @yield('content')
            </div>
        </div>
       
        <!-- Footer Section Start -->
        <footer class="footer">
            <div class="footer-body">
                <ul class="left-panel list-inline mb-0 p-0">
                    <li class="list-inline-item"><a href="../dashboard/extra/privacy-policy.html">Privacy Policy</a>
                    </li>
                    <li class="list-inline-item"><a href="../dashboard/extra/terms-of-service.html">Terms of Use</a>
                    </li>
                </ul>
                <div class="right-panel">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Made with
                    <span class="">
                        <svg class="icon-15" width="15" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15.85 2.50065C16.481 2.50065 17.111 2.58965 17.71 2.79065C21.401 3.99065 22.731 8.04065 21.62 11.5806C20.99 13.3896 19.96 15.0406 18.611 16.3896C16.68 18.2596 14.561 19.9196 12.28 21.3496L12.03 21.5006L11.77 21.3396C9.48102 19.9196 7.35002 18.2596 5.40102 16.3796C4.06102 15.0306 3.03002 13.3896 2.39002 11.5806C1.26002 8.04065 2.59002 3.99065 6.32102 2.76965C6.61102 2.66965 6.91002 2.59965 7.21002 2.56065H7.33002C7.61102 2.51965 7.89002 2.50065 8.17002 2.50065H8.28002C8.91002 2.51965 9.52002 2.62965 10.111 2.83065H10.17C10.21 2.84965 10.24 2.87065 10.26 2.88965C10.481 2.96065 10.69 3.04065 10.89 3.15065L11.27 3.32065C11.3618 3.36962 11.4649 3.44445 11.554 3.50912C11.6104 3.55009 11.6612 3.58699 11.7 3.61065C11.7163 3.62028 11.7329 3.62996 11.7496 3.63972C11.8354 3.68977 11.9247 3.74191 12 3.79965C13.111 2.95065 14.46 2.49065 15.85 2.50065ZM18.51 9.70065C18.92 9.68965 19.27 9.36065 19.3 8.93965V8.82065C19.33 7.41965 18.481 6.15065 17.19 5.66065C16.78 5.51965 16.33 5.74065 16.18 6.16065C16.04 6.58065 16.26 7.04065 16.68 7.18965C17.321 7.42965 17.75 8.06065 17.75 8.75965V8.79065C17.731 9.01965 17.8 9.24065 17.94 9.41065C18.08 9.58065 18.29 9.67965 18.51 9.70065Z"
                                fill="currentColor"></path>
                        </svg>
                    </span> by <a href="https://iqonic.design/">Programmer</a>.
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->
    </main>

    <!-- Library Bundle Script -->
    <script src="../assets/js/core/libs.min.js"></script>

    <!-- External Library Bundle Script -->
    <script src="../assets/js/core/external.min.js"></script>

    <!-- Widgetchart Script -->
    <script src="../assets/js/charts/widgetcharts.js"></script>

    <!-- mapchart Script -->
    <script src="../assets/js/charts/vectore-chart.js"></script>
    <script src="../assets/js/charts/dashboard.js"></script>

    <!-- fslightbox Script -->
    <script src="../assets/js/plugins/fslightbox.js"></script>

    <!-- Settings Script -->
    <script src="../assets/js/plugins/setting.js"></script>

    <!-- Slider-tab Script -->
    <script src="../assets/js/plugins/slider-tabs.js"></script>

    <!-- Form Wizard Script -->
    <script src="../assets/js/plugins/form-wizard.js"></script>

    <!-- AOS Animation Plugin-->
    <script src="../assets/vendor/aos/dist/aos.js"></script>

    <!-- App Script -->
    <script src="../assets/js/hope-ui.js" defer></script>

    

</body>

</html>
