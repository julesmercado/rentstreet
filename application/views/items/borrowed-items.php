<!-- Navigation -->

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6"><a class="navbar-brand"
                href='<?php echo base_url('main-page'); ?>'>RentStreet.ph</a></div>
                <div class="col-md-6"></div><div class="cssmenu-cuz" id="cssmenu">
                <ul>
                    <li class='active has-sub'>
                        <a href='<?php echo base_url('member-page'); ?>'><?php echo $username; ?></a>

                        <ul>
                            <li>
                                <a href='<?php echo base_url('member-page'); ?>' class="dropdown-toggle" data-toggle="dropdown">Dashboard</a>
                            </li>

                            <li class="dropdown">
                                <a href='#'>Advertisement</a>
                                <ul class="dropdown-menu">
                                       
                                    <li>
                                        <a href='<?php echo base_url('myrented-items'); ?>'>My Rented Items</a>
                                    </li>
                                    <li>
                                        <a href='<?php echo base_url('borrowed-items'); ?>'>Rented From Others</a>
                                    </li>
                                    <li>
                                        <a href='<?php echo base_url('returned-items'); ?>'>Returned Items</a>
                                    </li>
                                </ul>
                            </li>
                             <li>
                                <a href='<?php echo base_url('my-ads'); ?>'>Manage Ads</a>
                            </li>
                            <li>
                                <a href='#'>Return Items</a>
                            </li>

                            <li>
                                <a href='<?php echo base_url('my-profile'); ?>'>Profile</a>
                            </li>
                            
                            <li>
                                <a href='#'>Help</a>
                            </li>

                            <li>
                                <a href='<?php echo base_url('logout'); ?>'>Logout</a>
                            </li>
                        </ul>
                    </li>

                    <li class="has-sub">
                       <a href="#" id="msg">Notification <span id="nbrmsg" class="badge">42</span></a>
                            <ul>
                                <li>
                                    <a href='#' class="dropdown-toggle" data-toggle="dropdown"><span id="nbrmsg" class="badge">42</span>Item Request</a>
                                </li>
                                <li>
                                    <a href='#' class="dropdown-toggle" data-toggle="dropdown"><span id="nbrmsg" class="badge">42</span>Return Request</a>
                                </li>
                            </ul>
                    </li>
                    <li><input class="btn btn-post-header-cuz" type="button" value=
                    "Post Now Your Item!">
                    </li>
                </ul>
            </div>
            </div>
        </div>
    </nav>

    <div class="content-section-a">
        <div class="container">
            <div class="row">
                <div class="col-md-3 margin-bottom">
                    <h1>Borrowed Items</h1>
                </div>

                <div class="col-md-9 margin-top">
                    <div class="col-md-5 margin-bottom">
                        <select class="cat-cover2" name="category">
                        <?php foreach ($categories as $item) {
                            echo "<option value=\"".$item->id."\">";
                            echo $item->category;
                            echo "</option>";
                        }?>
                    </select>
                    </div>

                    <div class="col-md-5 margin-bottom">
                        <input class="search-text2" placeholder=
                        "What are you looking for?" type="text">
                    </div>

                    <div class="col-md-2 margin-bottom">
                        <input class="btn btn-default btn-lg btn-search" type=
                        "button" value="Search">
                    </div>
                </div>
            </div>

            <div class="row">
                <hr class="intro-divider">
            </div>

            <div class="row">
                <div class="container">
                    <div class="col-md-12 search-item-bi">
                        <input class="text" placeholder=
                        "Search Borrowed Item..." type="text">
                    </div>
                </div>
            </div>

            <div class="row row-dash-mp">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                        <div class=" panel panel-default">
                        <div class="panel-heading p-heading-d-mp">
                            DASHBOARD
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked ul-cuz">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-th-large tab-space"></i>ADVERTISEMENTS</a>
                                    <ul class="dropdown-menu dropdown-menu-cuz">
                                      
                                        <li>
                                            <a href='<?php echo base_url('myrented-items'); ?>'><i class="glyphicon glyphicon-hand-right tab-space"></i>MY RENTED ITEMS</a>
                                        </li>
                                        <li>
                                            <a href='<?php echo base_url('borrowed-items'); ?>'><i class="glyphicon glyphicon-hand-left tab-space"></i>RENTED FROM OTHERS</a>
                                        </li>
                                        <li>
                                            <a href='<?php echo base_url('returned-items'); ?>'><i class="glyphicon glyphicon-indent-left tab-space"></i>RETURNED ITEMS</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href='<?php echo base_url('my-ads'); ?>'><i class="glyphicon glyphicon-tags tab-space"></i>MANAGE ADS</a>
                                </li>

                                
                                <li>
                                    <a href="#"><i class="glyphicon glyphicon-share tab-space"></i>RETURN ITEMS</a>
                                </li>
                                
                                <li>
                                    <a href='<?php echo base_url('my-profile'); ?>'><i class="glyphicon glyphicon-user tab-space"></i>PROFILE</a>
                                </li>

                                <li>
                                    <a href="#"><i class="glyphicon glyphicon-question-sign tab-space"></i>HELP</a>
                                </li>

                                <li>
                                    <a href='<?php echo base_url('logout'); ?>'><i class="glyphicon glyphicon-off tab-space"></i>LOGOUT</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>   

                        <div class="col-md-9">
                            <div class="panel panel-default">
                                <div class="panel-heading p-heading-mp">
                                    BORROWED ITEMS
                                </div>

                                <div class="panel-body">
                                    <div class="container-bi">
                                        <div class="row">
                                            <div class="col-md-3 img-bi">
                                            <img alt="" src=
                                            "<?php echo base_url('assets/img/img1.jpg'); ?>"></div>

                                            <div class="col-md-9">
                                                <div class="row item-detail">
                                                    <h1>Samsung Galaxy S1 -
                                                    GT-1900</h1>
                                                </div>

                                                <div class="row item-detail">
                                                    <h2>₱ 2,000.00 | Daily</h2>
                                                </div>

                                                <div class="row">
                                                   <button id="returnId" class="btn btn-return">Return Item</button>
                                                </div>

                                                <div class="row row-star">
                                                    <div class="col-md-12">
                                                        <input id="input-21b" value="4" type="number" class="rating" min=0 max=5 step=0.2 data-size="xs" disabled>
                                                    </div>
                                                </div>

                                                <div class=
                                                "row item-detail item-bi-margin">
                                                <a href="">
                                                    <h5>More Ad
                                                    Details</h5></a>

                                                    <p>From: January 1, 2014
                                                    To: April 1, 2014</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class=
                                        "col-lg-5 col-sm-6 spacer-center">
                                            <hr class=
                                            "section-heading-spacer-center-cuz">
                                            </div>

                                        <div class="row">
                                            <div class="col-md-3 img-bi">
                                            <img alt="" src=
                                            "<?php echo base_url('assets/img/img2.jpg'); ?>"></div>

                                            <div class="col-md-9">
                                                <div class="row item-detail">
                                                    <h1>Samsung Galaxy S1 -
                                                    GT-1900</h1>
                                                </div>

                                                <div class="row item-detail">
                                                    <h2>₱ 2,000.00 | Daily</h2>
                                                </div>

                                                <div class="row item-detail">
                                                   <button id="returnId" class="btn btn-return">Return Item</button>
                                                </div>
                                                
                                                <div class="row row-star">
                                                    <div class="col-md-12">
                                                        <input id="input-21b" value="4" type="number" class="rating" min=0 max=5 step=0.2 data-size="xs" disabled>
                                                    </div>
                                                </div>

                                                <div class=
                                                "row item-detail item-bi-margin">
                                                <a href="">
                                                    <h5>More Ad
                                                    Details</h5></a>

                                                    <p>From: January 1, 2014
                                                    To: April 1, 2014</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class=
                                        "col-lg-5 col-sm-6 spacer-center">
                                            <hr class=
                                            "section-heading-spacer-center-cuz">
                                            </div>

                                        <div class="row">
                                            <div class="col-md-3 img-bi">
                                            <img alt="" src=
                                            "<?php echo base_url('assets/img/img3.jpg'); ?>"></div>

                                            <div class="col-md-9">
                                                <div class="row item-detail">
                                                    <h1>Samsung Galaxy S1 -
                                                    GT-1900</h1>
                                                </div>

                                                <div class="row item-detail">
                                                    <h2>₱ 2,000.00 | Daily</h2>
                                                </div>

                                                <div class="row item-detail">
                                                   <button id="returnId" class="btn btn-return">Return Item</button>
                                                </div>

                                                <div class="row row-star">
                                                    <div class="col-md-12">
                                                        <input id="input-21b" value="4" type="number" class="rating" min=0 max=5 step=0.2 data-size="xs" disabled>
                                                    </div>
                                                </div>

                                                <div class=
                                                "row item-detail item-bi-margin">
                                                <a href="">
                                                    <h5>More Ad
                                                    Details</h5></a>

                                                    <p>From: January 1, 2014
                                                    To: April 1, 2014</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=
                                        "col-lg-5 col-sm-6 spacer-center">
                                            <hr class=
                                            "section-heading-spacer-center-cuz">
                                            </div>

                                        <div class="row">
                                            <div class="col-md-3 img-bi">
                                            <img alt="" src=
                                            "<?php echo base_url('assets/img/img2.jpg'); ?>"></div>

                                            <div class="col-md-9">
                                                <div class="row item-detail">
                                                    <h1>Samsung Galaxy S1 -
                                                    GT-1900</h1>
                                                </div>

                                                <div class="row item-detail">
                                                    <h2>₱ 2,000.00 | Daily</h2>
                                                </div>

                                                <div class="row item-detail">
                                                   <button id="returnId" class="btn btn-return">Return Item</button>
                                                </div>
                                                
                                                <div class="row row-star">
                                                    <div class="col-md-12">
                                                        <input id="input-21b" value="4" type="number" class="rating" min=0 max=5 step=0.2 data-size="xs" disabled>
                                                    </div>
                                                </div>

                                                <div class=
                                                "row item-detail item-bi-margin">
                                                <a href="">
                                                    <h5>More Ad
                                                    Details</h5></a>

                                                    <p>From: January 1, 2014
                                                    To: April 1, 2014</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Footer -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#home">About Us</a>
                        </li>

                        <li class="footer-menu-divider">&sdot;</li>

                        <li>
                            <a href="#about">Rules</a>
                        </li>

                        <li class="footer-menu-divider">&sdot;</li>

                        <li>
                            <a href="#services">Rent Safely</a>
                        </li>

                        <li class="footer-menu-divider">&sdot;</li>

                        <li>
                            <a href="#contact">Costumer Services</a>
                        </li>

                        <li class="footer-menu-divider">&sdot;</li>

                        <li>
                            <a href="#contact">Careers</a>
                        </li>

                        <li class="footer-menu-divider">&sdot;</li>

                        <li>
                            <a href="#contact">Help</a>
                        </li>
                    </ul>

                    <p class="copyright text-muted small">Copyright &copy;
                    RentSteet.ph 2014. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>