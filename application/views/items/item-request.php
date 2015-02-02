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
            <div class="row marin-top-vop">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="row">
                            <div class=
                        "col-dashboard panel panel-default col-dashboard-cuz">
                            <div class="panel-heading p-heading-dashborad-ma">
                                ITEM REQUEST
                            </div>

                            <div class="panel-body">
                                <div class="row" ng-init="getAllInfoRequest(<?php echo $user_id; ?>)">
                                    <div class="container-ir">
                                        <div class="row">
                                            <div class="row" ng-repeat="data in requestInfo | filter: query">
                                                
                                                <div class="col-md-9 img-ir">
                                                    <p><img class="img-circle" ng-src="{{data.img_path}}"><a href="<?php echo base_url('view-other-profile'); ?>/{{data.borrowers_id}}">{{data.borrowers_name}}</a> wants to borrow your <a href="<?php echo base_url('view-details')?>/{{data.items_id}}">{{data.items_title}}.</a><i class="from-to">From:{{+ " " + data.date_from + " "}}To:{{+ " "+ data.date_to}}</i></p>
                                                </div>
                                                <div class="col-md-3">
                                                    <button class="btn btn-accept" ng-click="acceptButton(data.borrowers_id, data.owners_id, data.items_id)">Accept</button>
                                                    <button class="btn btn-ignore">Ignore</button>
                                                </div>
                                            
                                            </div>
                                          
                                        </div>
                                    </div>

                                </div>
                        </div>
                        </div>
                </div>
                <div class="col-md-2">
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