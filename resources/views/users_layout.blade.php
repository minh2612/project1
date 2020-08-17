<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Users</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="{{asset('assets2/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets2/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets2/css/style.css')}}" rel="stylesheet" type="text/css" />

    </head>


    <body>

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

        <div class="header-bg">
            <!-- Navigation Bar-->
            <header id="topnav">
                <div class="topbar-main">
                    <div class="container-fluid">

                        <!-- Logo-->
                        <div>
                            
                            <a href="{{URL::to('/index')}}" class="logo">
                                <img src="{{asset('assets2/images/logo_dark.png')}}" alt="" height="26"> 
                            </a>

                        </div>
                        <!-- End Logo-->

                        <div class="menu-extras topbar-custom navbar p-0">

                            <ul class="list-inline ml-auto mb-0">
                                <!-- User-->
                                <li class="list-inline-item dropdown notification-list nav-user">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="false" aria-expanded="false">
                                        <img src="{{asset('assets2/images/users/avatar-6.jpg')}}" alt="user" class="rounded-circle">

                                        <?php
                                            $name = Session::get('e_name');
                                            if($name){
                                                echo $name;
                                                
                                            }
                                        ?>

                                        <span class="d-none d-md-inline-block ml-1"><i class="mdi mdi-chevron-down"></i> </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                        <a class="dropdown-item" href="{{URL::to('/logout')}}"><i class="dripicons-exit text-muted"></i> Logout</a>
                                    </div>
                                </li>
                                <li class="menu-item list-inline-item">
                                    <!-- Mobile menu toggle-->
                                    <a class="navbar-toggle nav-link">
                                        <div class="lines">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </a>
                                    <!-- End mobile menu toggle-->
                                </li>

                            </ul>

                        </div>
                        <!-- end menu-extras -->

                        <div class="clearfix"></div>

                    </div> <!-- end container -->
                </div>
                <!-- end topbar-main -->

                <!-- MENU Start -->
                <div class="navbar-custom">
                    <div class="container-fluid">
                        
                        <div id="navigation">

                            <!-- Navigation Menu-->
                            <ul class="navigation-menu">

                                <li class="has-submenu">
                                    <a href="{{URL::to('/user-dashboard')}}"><i class="dripicons-home"></i> Trang chủ</a>
                                </li>

                            </ul>
                            <!-- End navigation menu -->
                        </div> <!-- end #navigation -->
                    </div> <!-- end container -->
                </div> <!-- end navbar-custom -->
            </header>
            <!-- End Navigation Bar-->

        </div>
        <!-- header-bg -->

        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Công việc của tôi</h4>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end page-title-box -->
            </div>
        </div> 
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary mini-stat text-white">
                    <div class="p-3 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50" style="color:black">Công việc đang chạy</h6>
                            <h4 class="mb-3 mt-0 float-right">0</h4>
                        </div>                     
                    </div>
                    <div class="p-3">
                        <a href="{{URL::to('/loading-task')}}" style="color:white" class="font-14 m-0">Xem các công việc đang chạy</a>
                    </div>
                </div>
            </div>

            
            <div class="col-xl-3 col-md-6">
                <div class="card bg-pink mini-stat text-white">
                    <div class="p-3 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">Công việc chờ duyệt</h6>
                            <h4 class="mb-3 mt-0 float-right">0</h4>
                        </div>
                    </div>
                    <div class="p-3">
                        <a href="{{URL::to('/wait-user-task')}}" style="color:white" class="font-14 m-0">Xem các công việc chờ duyệt</a>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info mini-stat text-white">
                    <div class="p-3 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">Công việc bị từ chối</h6>
                            <h4 class="mb-3 mt-0 float-right">0</h4>
                        </div>
                    </div>
                    <div class="p-3">
                        <a  href="{{URL::to('/refuse-user-task')}}" style="color:white" class="font-14 m-0">Xem các công việc bị từ chối</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-success mini-stat text-white">
                    <div class="p-3 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">Công việc hoàn thành</h6>
                            <h4 class="mb-3 mt-0 float-right">0</h4>
                        </div>
                    </div>
                    <div class="p-3">
                        <a  href="{{URL::to('/end-user-task')}}" style="color:white" class="font-14 m-0">Xem các công việc đã hoàn thành</a>
                    </div>
                </div>
            </div>

          
        </div>  
                        @yield('users_content')              
                    </div>
                </div>

            </div> <!-- end container-fluid -->
        </div>
        <!-- end wrapper -->
        

        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                         <span class="d-none d-md-inline-block">Quản lý <i class="mdi mdi-heart text-danger"></i> công việc</span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->


        <!-- jQuery  -->
        <script src="{{asset('assets2/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets2/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets2/js/modernizr.min.js')}}"></script>
        <script src="{{asset('assets2/js/waves.js')}}"></script>
        <script src="{{asset('assets2/js/jquery.slimscroll.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets2/js/app.js')}}"></script>

    </body>
</html>