
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Admin</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/icons.css')}}"  rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/style.css')}}"  rel="stylesheet" type="text/css">
        <link href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css')}}"  rel="stylesheet" type="text/css">
        <link href="{{asset('//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css')}}" rel="stylesheet" />
        <script src="{{asset('//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js')}}"></script>
    </head>

    <body class="fixed-left">
        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
            </div>
        </div>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="mdi mdi-close"></i>
                </button>
                <div class="sidebar-inner slimscrollleft">
                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title">Main</li>
                            <li>
                                <a href="{{URL::to('/admin-dashboard')}}" class="waves-effect"><i class="dripicons-home"></i> Trang chủ </a>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-user"></i> <span> Quản lý nhân viên </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{URL::to('/add-employee')}}">Thêm nhân viên</a></li>
                                    <li><a href="{{URL::to('/all-employee')}}">Danh sách nhân viên</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-briefcase"></i> <span> Quản lý dự án </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{URL::to('/add-project')}}">Thêm dự án</a></li>
                                    <li><a href="{{URL::to('/all-project')}}">Danh sách dự án</a></li>
                                </ul>
                            </li>                            
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-wallet"></i> <span> Quản lý lương </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a>Thêm lương</a></li>
                                    <li><a>Danh sách lương</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-user-group"></i> <span> Quản lý phòng ban </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{URL::to('/add-department')}}">Thêm phòng ban</a></li>
                                    <li><a href="{{URL::to('/all-department')}}">Danh sách phòng ban</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-user-id"></i> <span> Quản lý chức vụ </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{URL::to('/add-position')}}">Thêm chức vụ</a></li>
                                    <li><a href="{{URL::to('/all-position')}}">Danh sách chức vụ</a></li>
                                </ul>
                            </li>    
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->
            <!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <!-- Top Bar Start -->
                    <div class="topbar">
                        <div class="topbar-left d-none d-lg-block">
                            <div class="text-center">
                                <a href="{{URL::to('/admin-dashboard')}}" class="logo"><img src="{{asset('assets/images/logo_dark.png')}}" height="22" alt="logo"></a>
                            </div>
                        </div>
                        <nav class="navbar-custom">
                            <ul class="list-inline float-right mb-0">
                                <li class="list-inline-item dropdown notification-list nav-user">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="false" aria-expanded="false">
                                        <img src="{{asset('assets/images/users/avatar-6.jpg')}}" alt="user" class="rounded-circle">

                                        <?php
                                            $name = Session::get('e_name');
                                            if($name){
                                                echo $name;
                                                
                                            }
                                        ?>

                                        <span class="d-none d-md-inline-block ml-1"><i class="mdi mdi-chevron-down"></i> </span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                        <a class="dropdown-item"  href="{{URL::to('/logout')}}"><i class="dripicons-exit text-muted"></i> Logout</a>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-inline menu-left mb-0">
                                <li class="list-inline-item">
                                    <button type="button" class="button-menu-mobile open-left waves-effect">
                                        <i class="mdi mdi-menu"></i>
                                    </button>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Top Bar End -->
                    @yield('admin_content') 
                </div> <!-- content -->
                <footer class="footer">
                    © 2019 - 2020 Zinzer <span class="d-none d-md-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign.</span>
                </footer>
            </div>
            <!-- End Right content here -->
        </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/modernizr.min.js')}}"></script>
        <script src="{{asset('assets/js/detect.js')}}"></script>
        <script src="{{asset('assets/js/fastclick.js')}}"></script>
        <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('assets/js/jquery.blockUI.js')}}"></script>
        <script src="{{asset('assets/js/waves.js')}}"></script>
        <script src="{{asset('assets/js/jquery.nicescroll.js')}}"></script>
        <script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
        <!-- Required datatable js -->
        <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Datatable init js -->
        <script src="{{asset('assets/pages/datatables.init.js')}}"></script>    
        <!-- App js -->
        <script src="{{asset('assets/js/app.js')}}"></script>
    </body>
</html>