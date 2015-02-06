<nav class="navbar navbar-default navbar-fixed-top navbar-cuz">
        <div class="container">
            <div class="row">
                <form action="<?php echo base_url('search-output-page'); ?>" method="get">
                <div class="col-md-2"><a class="navbar-brand"
                href='<?php echo base_url('main-page'); ?>'>RentStreet.ph</a></div>
                 
                <div class="col-md-7 row-cuz-header">
                    <div class="row ">
                        <div class="col-md-5 margin-bottom">
                            <select class="cat-cover2" name="category">
                                  <option ng-repeat="data in queryResult.categories | filter: query" value="{{data.id}}">{{data.category}}</option>
                        </select>
                        </div>
                        <div class="col-md-5 margin-bottom" >
                            <input class="search-text2" placeholder=
                            "What are you looking for?" id="textVal" type="text" name="search">
                        </div>
                        <div class="col-md-2 margin-bottom" >
                            <button class="btn-search-new"><i class="glyphicon glyphicon-search icon-search-cuz"></i></button>
                            <!-- <input class="btn btn-default btn-lg btn-search" id="changeVal" type=
                            "submit"><i class="glyphicon glyphicon-search"></i> -->
                        </div>
                    </div>
                </form>
                </div>
                <div class="col-md-3"></div><div class="cssmenu-cuz" id="cssmenu">
                <ul>
                    <li class='active has-sub'>
                        <a href='<?php echo base_url('member-page'); ?>'><?php echo $username; ?></a>

                        <ul>
                            <li>
                                <a href='<?php echo base_url('member-page'); ?>' class="dropdown-toggle" data-toggle="dropdown">Dashboard</a>
                            </li>

                            <li class="dropdown">
                                <a href="#">Advertisement</a>
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
                                    <li>
                                        <a href='<?php echo base_url('returned-items'); ?>'>Post Items</a>
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
                                <a href="<?php echo base_url('my-profile'); ?>">Profile</a>
                            </li>
                            
                            <li>
                                <a href='#'>Help</a>
                            </li>

                            <li>
                                <a href="<?php echo base_url('logout'); ?>">Logout</a>
                            </li>
                        </ul>
                    </li>

                    <li ng-init="getNotification(<?php echo $user_id; ?>)">
                       <a href="<?php echo base_url('notifications'); ?>" id="msg">Notification <span id="nbrmsg" class="badge">{{count}}</span></a>
                    </li>
                    
                </ul>
            </div>
          
            </div>
            
        </div>
    </nav>

    <div class="content-section-a">
        <div class="container">
            

            <div class="row">
                <hr class="intro-divider">
            </div>

            <div class="row">
                <div class="col-md-12 search-item-bi">
                    <input class="text" placeholder="Search Borrowed Item..." type="text">
                </div>
            </div>

            <div class="row row-dash-mp">
                <div class="container">
                    <div class="row container-mp">
                        <div class="col-md-3">
                        <div class=" panel panel-default panel-body-cuz">
                        <div class="panel-heading p-heading-d-mp ">
                            DASHBOARD
                        </div>

                        <div class="panel-body ">
                            <ul class="nav nav-pills nav-pills-cuz nav-stacked ul-cuz">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle dash-a" data-toggle="dropdown"><i class="glyphicon glyphicon-th-large tab-space"></i>ADVERTISEMENTS</a>
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
                                        <li>
                                            <a href='<?php echo base_url('upload-items'); ?>'><i class="glyphicon glyphicon-indent-left tab-space"></i>POST YOUR ITEM</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href='<?php echo base_url('my-ads'); ?>' class="dash-a"><i class="glyphicon glyphicon-tags tab-space"></i>MANAGE ADS</a>
                                </li>

                                
                                <li>
                                    <a href="#" class="dash-a"><i class="glyphicon glyphicon-share tab-space"></i>RETURN ITEMS</a>
                                </li>
                                
                                <li>
                                    <a href="<?php echo base_url('my-profile'); ?>" class="dash-a"><i class="glyphicon glyphicon-user tab-space"></i>PROFILE</a>
                                </li>

                                <li>
                                    <a href="#" class="dash-a"><i class="glyphicon glyphicon-question-sign tab-space"></i>HELP</a>
                                </li>

                                <li>
                                    <a href="<?php echo base_url('logout'); ?>"><i class="glyphicon glyphicon-off tab-space"></i>LOGOUT</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>   


                        <div class="col-md-9">
                            <div class="panel panel-default">
                                <div class="panel-heading p-heading-mp">
                                     RETURNED ITEMS
                                </div>
                                    <div class="col-lg-5 col-sm-6 spacer-center">
                                        <hr class="section-heading-spacer-center-ma">
                                    </div>
                                <div class="panel-body" ng-init="getMyReturnedItems(<?php echo $user_id; ?>)">
                                    <div class="container-bi">
                                        <div class="row ">
                                       

                                            <div class="row" ng-repeat="data in myReturnedList | filter: query">
                                                <div class="col-md-4 img-bi">
                                                    <div class="center-img-ma">
                                                        <img alt="" ng-src="{{data.items_path}}"/>
                                                    </div>
                                                   
                                                </div>

                                            <div class="col-md-8">
                                                <div class="row item-detail">
                                                    <h1><a class="hoverTitle" href="<?php echo base_url('view-details')?>/{{data.items_id}}">{{data.items_title}}</a></h1>
                                                </div>
                                                
                                                <div class="row item-detail">
                                                    <h2><h2>₱ {{data.items_price}} | {{data.mode}}</h2></h2>
                                                </div>
                                                
                                                <div class="row item-detail">
                                                   <p>Rentee: {{" " + data.borrowers_name + " "}}| <a href="<?php echo base_url('view-other-profile'); ?>/{{data.borrowers_id}}">View More Information</a></p>
                                                </div>
                                               
                                                <div class=
                                                "row item-detail item-bi-margin">
                                                <a href="<?php echo base_url('view-details');?>/{{data.items_id}}">
                                                    <h5>More Ad
                                                    Details</h5></a>

                                                <p class="from-to-ri">From: {{data.date_from}}
                                                    To: {{data.date_to}}</p>
                                                </div>
                                                <div class="row item-detail">
                                                   <p class="from-to-ri">Date Returned: {{" " + data.date_returned}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-sm-6 spacer-center">
                                                <hr class="section-heading-spacer-center-ma">
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
    <!-- Footer -->

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