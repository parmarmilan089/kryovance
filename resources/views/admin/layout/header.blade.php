<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <?php (!isset($title)) ? $title = '' : $title; ?>
        <title>{{$title}} </title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('admin/img/favicon/favicon.ico') }}" />

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendor/boxicons/css/boxicons.min.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendor/remixicon/remixicon.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendor/simple-datatables/style.css') }}">

        <!-- Template Main CSS File -->
        <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/style.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/admin_style.css') }}" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <body>
        <?php
        $role_id = null;
        if (Auth::check()) {
            $role_id = Auth::user()->role_id;
        }
        if (!isset($menu_active_tab)) {
            $menu_active_tab = '';
        }
        // Master
        $master_li_menu_active = '';
        $master_menu_list_arr = array(
            "event-list",
        );
        if (in_array($menu_active_tab, $master_menu_list_arr)) {
            $master_li_menu_active = "active open";
        } else {
            $master_li_menu_active = "";
        }
        ?>

        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
                <a href="{{ URL::route('dashboard') }}" class="logo d-flex align-items-center">
                    <img src="admin/assets/img/logo.png" alt="">
                    <span class="d-none d-lg-block">LOGO</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->


            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">

                    <li class="nav-item d-block d-lg-none">
                        <a class="nav-link nav-icon search-bar-toggle" href="#">
                            <i class="bi bi-search"></i>
                        </a>
                    </li><!-- End Search Icon-->

                    <li class="nav-item dropdown pe-3">

                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            @if(Session::has('profile_image_path'))
                            <img src="{{ getStoragePath() . Session::get('profile_image_path') }}" alt="Profile" class="rounded-circle" onerror="this.onerror=null; this.src='/user/assets/images/15980049.png';">
                            @endif
                            @if(Session::has('first_name'))
                            <span class="d-none d-md-block dropdown-toggle ps-2">{{Session::get('first_name')}} {{Session::get('last_name')}}</span>
                            @endif
                        </a><!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                @if(Session::has('profile_image_path'))
                                <img onerror="this.onerror=null; this.src='/user/assets/images/15980049.png';" src="{{ getStoragePath() . Session::get('profile_image_path') }}" alt="Profile" class="rounded-circle profile-img ">
                                @endif
                                @if(Session::has('first_name'))
                                <h6>{{Session::get('first_name')}} {{Session::get('last_name')}}</h6>
                                @endif
                                <span></span>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ URL::route('edit-user-profile') }}">
                                    <i class="bi bi-person"></i>
                                    <span>My Profile</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <!--                            <li>
                                                            <a class="dropdown-item d-flex align-items-center" href="">
                                                                <i class="bi bi-gear"></i>
                                                                <span>Account Settings</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>-->


                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                                </a>
                            </li>

                        </ul><!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->

                </ul>
            </nav><!-- End Icons Navigation -->

        </header><!-- End Header -->

        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar">

            <ul class="sidebar-nav" id="sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ URL::route('dashboard') }}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li><!-- End Dashboard Nav -->


                <li class="nav-item">
                    <a class="nav-link <?php echo $menu_active_tab == "product-list" || $menu_active_tab == "add-product" ? '' : 'collapsed'; ?>" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="forms-nav" class="nav-content collapse  <?php echo $menu_active_tab == "product-list" || $menu_active_tab == "add-product" ? 'show ' : ''; ?>" data-bs-parent="#sidebar-nav">
                        <li>
                            <a class="<?php echo $menu_active_tab == "product-list" ? 'active' : ''; ?>"  href="{{ URL::route('product-list') }}">
                                <i class="bi bi-circle"></i><span>List</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::route('add-product') }}">
                                <i class="bi bi-circle"></i><span>Add</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Forms Nav -->
                <li class="nav-item">
                    <a class="nav-link  <?php echo $menu_active_tab == "category-list" || $menu_active_tab == "add-category" ? '' : 'collapsed'; ?>" href="{{ URL::route('category-list') }}">
                        <i class="bi bi-journal-text"></i><span>Category</span>
                    </a>
                </li><!-- End Forms Nav -->

                <li class="nav-item">
                    <a class="nav-link  <?php echo $menu_active_tab == "inventories" ? '' : 'collapsed'; ?>" href="{{ route('inventories.index') }}">
                        <i class="bx bxs-contact"></i><span>Inventories</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  <?php echo $menu_active_tab == "contact-list" ? '' : 'collapsed'; ?>" href="{{ URL::route('contact-list') }}">
                        <i class="bx bxs-contact"></i><span>Contact Form List</span>
                    </a>
                </li><!-- End Forms Nav -->

                 {{--  <li class="nav-item">
                    <a class="nav-link <?php echo $menu_active_tab == "role-list" || $menu_active_tab == "add-role" ? '' : 'collapsed'; ?>" href="{{ URL::route('role-list') }}">
                        <i class="bi bi-journal-text"></i><span>Role</span>
                    </a>
                </li>  --}}
                <li class="nav-item">
                    <a class="nav-link <?php echo $menu_active_tab == "user-list" || $menu_active_tab == "add-user" ? '' : 'collapsed'; ?>" href="{{ URL::route('user-list') }}">
                        <i class="bi bi-journal-text"></i><span>User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?php echo $menu_active_tab == "orders" ? '' : 'collapsed'; ?>" href="{{ URL::route('orders') }}">
                        <i class="bx bxs-data"></i><span>Orders</span>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?php echo $menu_active_tab == "report" ? '' : 'collapsed'; ?>" href="{{ URL::route('report') }}">
                        <i class="bx bxs-data"></i><span>Report</span>
                    </a>
                </li>
            </ul>

        </aside><!-- End Sidebar-->

        <main id="main" class="main">

            <div class="pagetitle">
                <!--<h1>Form Layouts</h1>-->
                <h1><?php echo (isset($title)) ? $title : ''; ?></h1>
                <!--                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ URL::route('dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item">Forms</li>
                                        <li class="breadcrumb-item active">Layouts</li>
                                    </ol>
                                </nav>-->
            </div><!-- End Page Title -->
            <section class="section">
                <div class="row">
                    @yield('content')
                </div>
            </section>

        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <!--        <footer id="footer" class="footer">
                    <div class="copyright">
                        &copy; Copyright <strong><span> Admin</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits"></div>
                </footer>-->
        <!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        <script>
            var admin_path = "{{ url('/admin') }}";
        </script>
        <!-- Vendor JS Files -->
        <script src="{{ asset('admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('admin/assets/vendor/chart.js/chart.min.js')}}"></script>
        <script src="{{ asset('admin/assets/vendor/echarts/echarts.min.js')}}"></script>
        <script src="{{ asset('admin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
        <script src="{{ asset('admin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
        <script src="{{ asset('admin/assets/vendor/php-email-form/validate.js')}}"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('admin/assets/js/main.js')}}"></script>

        <script src="{{ asset('admin/assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
        <script src="{{ asset('admin/assets/vendor/libs/sweetalert2/sweetalert2.all.js')}}"></script>
        <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
        <script>
            // Disable version check warning (optional)
            CKEDITOR.editorConfig = function(config) {
                config.versionCheck = false;
            };
        </script>
        <script>
            CKEDITOR.replace('feature_description');
        </script>
         @yield('customjs')
         $(document).ready(function () {

    });
    </body>

</html>
