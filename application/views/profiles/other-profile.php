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
                                BASIC INFORMATION
                            </div>

                            <div class="panel-body" ng-init="getSingleInfoRequest(<?php echo $borrowers_id; ?>)">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-12 img-vop">
                                                <img class="img-circle"  ng-src="{{requestSingleInfo[0].images}}">

                                            </div>  
                                        </div>
                                        <div ng-controller="RatingDemoCtrl">
                                            <h4>Default</h4>
                                            <rating ng-model="rate" max="max" readonly="isReadonly" on-hover="hoveringOver(value)" on-leave="overStar = null"></rating>
                                            <span class="label" ng-class="{'label-warning': percent<30, 'label-info': percent>=30 && percent<70, 'label-success': percent>=70}" ng-show="overStar && !isReadonly">{{percent}}%</span>

                                            <pre style="margin:15px 0;">Rate: <b>{{rate}}</b> - Readonly is: <i>{{isReadonly}}</i> - Hovering over: <b>{{overStar || "none"}}</b></pre>

                                            <button class="btn btn-sm btn-danger" ng-click="rate = 0" ng-disabled="isReadonly">Clear</button>
                                            <button class="btn btn-sm btn-default" ng-click="isReadonly = ! isReadonly">Toggle Readonly</button>
                                            <hr />

                                            <h4>Custom icons</h4>
                                            <div ng-init="x = 5"><rating ng-model="x" max="15" state-on="'glyphicon-ok-sign'" state-off="'glyphicon-ok-circle'"></rating> <b>(<i>Rate:</i> {{x}})</b></div>
                                            <div ng-init="y = 2"><rating ng-model="y" rating-states="ratingStates"></rating> <b>(<i>Rate:</i> {{y}})</b></div>
                                        </div>
                                                                            </div>
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="username-other">
                                                    {{requestSingleInfo[0].username}}
                                                </h3>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 padding-none-vop">
                                                <p>{{requestSingleInfo[0].name}}</p>
                                            </div> 

                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 lbl-vop">
                                                <label>Email Address:</label>
                                            </div>
                                            <div class="col-md-7">
                                                <span>{{requestSingleInfo[0].email}}</span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 lbl-vop">
                                                <label>Date Registered:</label>
                                            </div>
                                            <div class="col-md-7">
                                                <span>{{requestSingleInfo[0].registered_on}}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                    <div class="col-md-5 lbl-vop">
                                        <label>Address:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <span>{{requestSingleInfo[0].address}}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 lbl-vop">
                                        <label>Last login:</label>
                                    </div>
                                    <div class="col-md-7">
                                       <span>{{requestSingleInfo[0].last_login}}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input id="input-21b" value="4" type="number" class="rating" min=0 max=5 step=0.2 data-size="xs" disabled>
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