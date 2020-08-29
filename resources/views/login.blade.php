<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Zinzer - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

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
        <div class="account-pages">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 offset-lg-1">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="p-2">

                                    <h4 class="text-muted float-left font-18 mt-4">Sign In</h4>
                                    <div>
                                        <a href="" class="logo logo-admin"><img src="assets/images/logo_dark.png" height="28" alt="logo"></a>

                                    
                                    </div>
                                </div>
                                <div class="p-2">
                                    <form class="form-horizontal m-t-20" method="post" action="{{URL::to('/login')}}">
                                        {{ csrf_field() }}
                                   
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" type="text" required="" placeholder="Username" name="e_email"> 
                                            </div>
                                        </div>
        
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" type="password" required="" placeholder="Password" name="e_password">
                                            </div>
                                        </div>
        
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <ul>
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                     <li style="color:red">{{$error}}</li>
                                                @endforeach
                                            </ul>     
                                        </ul>
                                         
                                        <div class="form-group text-center row m-t-20">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </div>
                                          <div>
                                       <?php
                                            $message= Session::get('message');
                                            if($message){
                                                echo '<span style="color:red" class="text-alert">'.$message.'</span>';
                                                Session::put('message', null);
                                            }
                                        ?>

                                    
                                    </div>
                                    </form>
                                   
                                </div>                            
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>



        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>
</html>