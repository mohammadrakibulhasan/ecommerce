<section id="wrapper">
        <div class="login-register" style="background-image:url(<?=base_url().'assets/images/background/login-register1.jpg'?>);">        
            <div class="login-box card">
            <div class="card-block">
                <form class="form-horizontal form-material" id="loginform" action="<?= base_url() . 'user/signup' ?>" method="post">
                    <h3 class="box-title m-b-20">Sign In</h3>
                   <p style="color: red;"><?=validation_errors()?></p>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" name="username" placeholder="Username" pattern="[a-zA-Z][a-zA-Z0-9-_.]{5,12}" title="The username must start with a letter"> </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" required="" name="email" placeholder="Email"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" name="password" placeholder="Password"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" name="confpassword" placeholder="Confirm Password"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <!-- <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label>
                            </div> -->
                             <!-- <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div> -->
                    </div>
                    <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                            <input type="submit" name="submit" value="Signup">
                        </div>
                        <!-- <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Signup</button>
                        </div> -->
                    </div>
                    <!-- <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                            <div class="social">
                                <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                                <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>have an account? <a href="<?=base_url().'user'?>" class="text-info m-l-5"><b>Login</b></a></p>
                        </div>
                    </div>
                </form>
                <!-- <form class="form-horizontal" id="recoverform" action="#">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email"> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    </div>
                </form> -->
            </div>
          </div>
        </div>
        
    </section>