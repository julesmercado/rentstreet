<!-- Navigation -->

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->

            <div class="navbar-header">
                <button class="navbar-toggle" data-target=
                "#bs-example-navbar-collapse-1" data-toggle="collapse" type=
                "button"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span> <span class="icon-bar"></span>
                <span class="icon-bar"></span></button> 
                <a class="navbar-brand"
                href="<?php echo base_url('landing-page'); ?>">RentStreet.ph</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse" id=
            "bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo base_url('login-account'); ?>">Login</a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('create-account'); ?>">Get Started</a>
                    </li>

                    <li><input class="btn btn-post-header" type="button" value=
                    "Post Now Your Item!"></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
    <form action="<?php echo base_url('registerAccount'); ?>" name="form" method="post" novalidate>
    <div class="content-section-a">
        <div class="container">
            <div class="container-sign-in">
                <div class="row row-sign-in">
                    <h1>Create Account</h1>
                </div>

                <div class="row row-sign-in">
                    <?php echo validation_errors('<div class="alert alert-danger text-center" style="font-size: 13px; ">','</div>'); ?>
                    <input type="email" placeholder="Email Address" name="email" ng-model="user.email" required value="<?php echo set_value('email'); ?>">
                </div>

                <div class="row row-sign-in">
                    <input type="text" placeholder="Username" name="username" ng-model="user.username" required value="<?php echo set_value('username'); ?>">
                    </div>

                <div class="row row-sign-in">
                    <input type="password" placeholder="Password" name="password" ng-model="user.password" required ng-minlength="6" ng-maxlength="12"> 
                   </div>

                <div class="row row-sign-in">
                    <input type="submit" value="Create Account" class="create-btn">  
                </div>

                <div class="row row-sign-in">
                    <p>Already have an account? <a href="<?php echo base_url('login-account'); ?>">Sign
                    in</a></p>
                </div>
            </div>
        </div>
    </div>
    </form>

    <!-- Footer -->

        <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a class="footer-li" href="#home">About Us</a>
                        </li>

                        <li class="footer-menu-divider">&sdot;</li>

                        <li>
                            <a class="footer-li" href="#about">Rules</a>
                        </li>

                        <li class="footer-menu-divider">&sdot;</li>

                        <li>
                            <a class="footer-li" href="#services">Rent Safely</a>
                        </li>

                        <li class="footer-menu-divider">&sdot;</li>

                        <li>
                            <a class="footer-li" href="#contact">Costumer Services</a>
                        </li>

                        <li class="footer-menu-divider">&sdot;</li>

                        <li>
                            <a class="footer-li" href="#contact">Careers</a>
                        </li>

                        <li class="footer-menu-divider">&sdot;</li>

                        <li>
                            <a class="footer-li" href="#contact">Help</a>
                        </li>
                    </ul>

                    <p class="copyright text-muted small">Copyright &copy;
                    RentSteet.ph 2014. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>