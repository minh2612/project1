
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
        <link href="{{asset('plugins/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css">
        <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js')}}" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
        <script src="{{asset('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js')}}"></script>
        <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css')}}" rel="stylesheet" />
        <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js')}}"></script>
        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="jquery.form.js"></script>
        <script src="{{asset('ckeditor/ckeditor.js')}}"></script> 
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
                                    
                                    <li><a href="{{URL::to('/all-project')}}">Danh sách dự án</a></li>
                                    <li><a href="{{URL::to('/my-project')}}">Dự án của tôi</a></li>
                                </ul>
                           </li> 
                      
                          
                                      


                           
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-tasks"></i> <span> Quản lý công việc </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    
                                    <li><a href="{{URL::to('/all-task')}}">Danh sách công việc</a></li>
                                      <li><a href="{{URL::to('/my-task')}}">Công việc của tôi</a></li>
                                </ul>
                            </li>                              

               
                          
                            
                         
                          
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-user-group"></i> <span> Quản lý phòng ban </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    
                                    <li><a href="{{URL::to('/all-department')}}">Danh sách phòng ban</a></li>
                                </ul>
                            </li>
                            
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-user-id"></i> <span> Quản lý chức vụ </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    
                                    <li><a href="{{URL::to('/all-position')}}">Danh sách chức vụ</a></li>
                                </ul>

                            </li> 
                               
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-user-group"></i> <span> Quản lý khách hàng </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    
                                    <li><a href="{{URL::to('/all-customer')}}">Danh sách khách hàng</a></li>
                                    <li><a href="{{URL::to('/all-customer-group')}}">Danh sách nhóm khách hàng</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="far fa-handshake"></i> <span> Quản lý dịch vụ </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{URL::to('/all-service')}}">Danh sách dịch vụ</a></li>
                                </ul>
                            </li>  

                             <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-user"></i> <span> Quản lý vai trò </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                     <li><a href="{{URL::to('/all-roles')}}">Danh sách vai trò</a></li>
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
                                    <?php
                                    $avatar=Auth::user()->e_avatar;
                                    ?>
                                        <img src="{{ URL::to('/public/avatar/'.$avatar)}}" alt="user" class="rounded-circle">

                                        <?php
                                            $name = Auth::user()->e_name;
                                            if($name){
                                                echo $name;
                                                
                                            }
                                        ?>

                                        <span class="d-none d-md-inline-block ml-1"><i class="mdi mdi-chevron-down"></i> </span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                        <a class="dropdown-item"  href="{{URL::to('/logout')}}"><i class="dripicons-exit text-muted"></i>Đăng xuất</a>
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
                    Quản lý công việc <span class="d-none d-md-inline-block">  <i class="mdi mdi-heart text-danger"></i> by Team thực tập kalzen.</span>
                </footer>
            </div>

            <!-- End Right content here -->
        </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
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
        <!-- CK Editor -->
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script type="text/javascript">CKEDITOR.replace( 'note' );</script>
        <!-- Datatable init js -->
        <script src="{{asset('assets/pages/datatables.init.js')}}"></script>
        <script src="{{asset('plugins/tinymce/tinymce.min.js')}}"></script>    
        <!-- App js -->
        <script src="{{asset('assets/js/app.js')}}"></script>
        <script type="text/javascript">
        document.querySelector("#today").valueAsDate = new Date();
        </script>
        <script src="{{asset('plugins/dropzone/dist/dropzone.js')}}"></script>
        <!-- Show Image -->
        <script type="text/javascript">
            function showPreview(event){
                if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("show_image");
                preview.src = src;
                preview.style.fontSize ="1px";
                }
            }
        </script>
        <!-- Select2 -->
        <script type="text/javascript">
            $(document).ready(function() {
            $('.select2').select2();
            });
        </script>
    </body>
</html>