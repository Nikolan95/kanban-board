<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Nikola's task board</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="account-body accountbg">

        <!-- Log In page -->
        <div class="row vh-100 ">
            <div class="col-12 align-self-center">
                <div class="auth-page">
                    <div class="card auth-card shadow-lg">
                        <div class="card-body">
                            <div class="px-3">
                                <div class="auth-logo-box">
                                    <a class="logo logo-admin"><img src="assets/images/logo-sm.png" height="55" alt="logo" class="auth-logo"></a>
                                </div><!--end auth-logo-box-->
                                
                                <div class="text-center auth-logo-text">
                                    <h4 class="mt-0 mb-3 mt-5">Free Register for tasks</h4>
                                    <p class="text-muted mb-0">Get your free tasks account now.</p>  
                                </div> <!--end auth-logo-text-->  

                                <form class="form-horizontal auth-form my-4" action="{{ route('user.store') }}" method="POST">
                                    @csrf
                                        
                                    <!--username -->
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-user"></i>
                                            </span>
                                            <input type="text" class="form-control" name="username" id="username" value="{{old('username')}}" placeholder="Type username">
                                        </div>
                                        @error('username')
                                            <div class="color"><span class="text-danger"> {{ $message }}</span> </div>
                                        @enderror()
                                    </div><!--end form-group-->

                                    <!--firstname -->
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-mail"></i>
                                            </span>
                                            <input type="text" class="form-control" name="firstname" id="firstname" value="{{old('firstname')}}" placeholder="Type first name">
                                        </div>
                                        @error('firstname')
                                            <div class="color"><span class="text-danger"> {{ $message }}</span> </div>
                                        @enderror()
                                    </div><!--end form-group-->

                                    <!--lastname -->
                                    <div class="form-group">
                                        <label for="lastname">Last name</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-mail"></i>
                                            </span>
                                            <input type="text" class="form-control" name="lastname" id="lastname" value="{{old('lastname')}}" placeholder="Type lastname">
                                        </div>
                                        @error('lastname')
                                            <div class="color"> <span class="text-danger"> {{ $message }}</span> </div>
                                        @enderror()
                                    </div><!--end form-group-->

                                    <!--email -->
                                    <div class="form-group">
                                        <label for="lastname">E-mail</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-mail"></i>
                                            </span>
                                            <input type="text" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="Type email">
                                        </div>
                                        @error('email')
                                        <div class="color"> <span class="text-danger"> {{ $message }}</span> </div>
                                        @enderror()
                                    </div><!--end form-group-->

                                    <!--address -->
                                    <div class="form-group">
                                        <label for="lastname">Address</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-mail"></i>
                                            </span>
                                            <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}" placeholder="Type address">
                                        </div>
                                        @error('address')
                                        <div class="color"> <span class="text-danger"> {{ $message }}</span> </div>
                                        @enderror()
                                    </div><!--end form-group-->

                                    <!--city -->
                                    <div class="form-group">
                                        <label for="lastname">city</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-mail"></i>
                                            </span>
                                            <input type="text" class="form-control" name="city" id="city" value="{{old('city')}}" placeholder="Type city">
                                        </div>
                                        @error('city')
                                        <div class="color"> <span class="text-danger"> {{ $message }}</span> </div>
                                        @enderror()
                                    </div><!--end form-group-->

                                    <!--password -->
                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-lock"></i>
                                            </span>
                                            <input type="password" class="form-control" name="password" id="userpassword" placeholder="Type Password">
                                        </div>
                                        @error('password')
                                            <div class="color" > <span class="text-danger"> {{ $message }}</span> </div>
                                        @enderror()
                                    </div><!--end form-group-->

                                    <!--password conformation -->
                                    <div class="form-group">
                                        <label for="conf_password">Confirm password</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-lock-open"></i>
                                            </span>
                                            <input type="password" class="form-control" name="confirm_password" id="conf_password" placeholder="Confirm your password">
                                        </div>
                                        @error('confirm_password')
                                            <div class="color"> <span class="text-danger"> {{ $message }}</span> </div>
                                        @enderror()
                                    </div>

                                    <div class="form-group row mt-4">
                                        <div class="col-sm-12">
                                            <div class="custom-control custom-switch switch-success">
                                                <input type="checkbox" class="custom-control-input" id="customSwitchSuccess">
                                                <label class="custom-control-label text-muted" for="customSwitchSuccess">By registering you agree to the Frogetor <a href="#" class="text-primary">Terms of Use</a></label>
                                            </div>
                                        </div><!--end col-->                                             
                                    </div><!--end form-group--> 
        
                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-2">
                                            <button class="btn btn-primary btn-round btn-block waves-effect waves-light" type="submit">Register <i class="fas fa-sign-in-alt ml-1"></i></button>
                                        </div><!--end col--> 
                                    </div> <!--end form-group-->      
                                </form><!--end form-->

                            </div><!--end /div-->
                            
                            <div class="m-3 text-center text-muted">
                                <p class="">Already have an account ? <a href="{{route('login')}}" class="text-primary ml-2">Log in</a></p>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end auth-page-->
            </div><!--end col-->           
        </div><!--end row-->
        <!-- End Log In page -->

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>
</html>