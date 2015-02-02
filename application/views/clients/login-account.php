<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('landing-page'); ?>">RentStreet.ph</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                         <a href="<?php echo base_url('login-account'); ?>">Login</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('create-account'); ?>">Get Started</a>
                    </li>
                    <li>
                        <input type="button" class="btn btn-post-header" value="Post Now Your Item!">
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>
<?php foreach($record as $row): ?>
    <form action="<?php echo base_url('verifyLogin'); ?>" method="post" id="contactform" name="form" novalidate>
    <div class="content-section-a">
        <div class="container">
            <div class="container-sign-in">
                <div class="row row-sign-in">
                    <h2>Sign In</h2>
                    <?php echo $this->session->flashdata('notify'); ?>
                    <?php echo validation_errors('<div class="alert alert-danger text-center" style="font-size: 13px; ">','</div>'); ?>
                    <div class="text-center" style="font-size: 13px; color: red;"  id="warning"></div>
                </div>
                <div class="row row-sign-in">
                    
                    <div class="row">
                        <input type="hidden" name="user_id" value="<?php echo $row->user_id; ?>">
                        <input type="text" placeholder="Username" name="username" value="<?php echo set_value('username'); ?>">
                    </div>
                    
                </div>
                <div class="row row-sign-in">
                    <input type="password" placeholder="Password" name="password"> 
                </div>

                <div class="row row-sign-in">
                    <input type="submit" value="Login" class="login-btn">
                </div>

                <div class="row row-sign-in">
                    <p>Don't have an account? <a href="<?php echo base_url('create-account'); ?>">Create an account</a></p>
                </div>

           </div>
        </div>
    </div>
    </form>
<?php endforeach; ?>

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