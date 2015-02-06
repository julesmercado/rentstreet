<!-- Navigation -->
<?php
// Start the session
session_start();
?>
<nav class="navbar navbar-default navbar-fixed-top navbar-cuz">
        <div class="container">
            <div class="row">
               <form novalidate ng-submit="submitSearch( )" ng-init="userInit('<?php echo $searchKey;?>')">
                <div class="col-md-2"><a class="navbar-brand"
                href='<?php echo base_url('main-page'); ?>'>RentStreet.ph</a></div>
                 
                <div class="col-md-7 row-cuz-header">
                    <div class="row ">
                        <div class="col-md-5 margin-bottom">
                            <select class="cat-cover2" name="category">
                                 <option ng-repeat="data in getCategories | filter: query" value="{{data.id}}">{{data.category}}</option>
                            </select>
                        </div>
                        <div class="col-md-5 margin-bottom" >
                            <input class="search-text2" placeholder=
                            "What are you looking for?" id="textVal" type="text" name="search" value="<?php echo $searchKey; ?>" ng-model="search.search_item">
                        </div>
                        <div class="col-md-2 margin-bottom" >
                            <button class="btn-search-new" id="changeVal" type=
                            "submit"><i class="glyphicon glyphicon-search icon-search-cuz"></i></button>
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
           
         
    <div class="content-section-a content-section-a-cuz-2">

        <div class="container">
           
                <div class="panel panel-default">
                        <div class="panel-heading p-heading-mp">
                    
                        </div>

                        <div class="panel-body">
                            <div class="row">

                <div class="col-lg-12">
                    <div class="form-group" ng-binding="data in queryResult | filter: query | pagination: curPage * pageSize | limitTo: pageSiz">
                        <h3 class="search-results"> {{queryResult.length}} Results for "<span ng-init="displaySpan='<?php echo $searchKey ?>'" id="spanResult">{{displaySpan}}</span>" </h3>
                    </div>
                </div>
                <div class="row">
                    <hr class="intro-divider intro-divider-sr">
                </div>
               
            </div>

            <div class="row">
                <div class="container container-hp">
                    <div class="row row-lp-cuz">
                        <div class=" col-md-3 center-img" ng-repeat="data in queryResult | filter: query">
                   
                            <img class="img-con-sr2 d2" ng-src="{{data.item_path}}">

                            <div class="contenthover" ng-mouseover="hoverItem()">
                                <h3>{{data.title}}</h3>

                                <p> {{data.description}} </p>

                                <p><a class="mybutton" href="<?php echo base_url('view-details')?>/{{data.id}}">View More Ad Details</a></p>
                            </div>

                     
                         

                        <div class="row row-top-margin">
                            <div class="col-md-12">
                                <p class="title-sr">{{data.title}}</p>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <p class="price-hp">₱ {{data.price}} | {{data.mode}} </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <p class="cat-hp">{{data.category}}</p>
                            </div>
                        </div> 
                    </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                             <div class="pagination pagination-centered" ng-show="data.length">
                                <ul class="pagination-controle pagination">
                                 <li>
                                  <button type="button" class="btn btn-primary" ng-disabled="curPage == 0"
                                 ng-click="curPage=curPage-1"> &lt; PREV</button>
                                 </li>
                                 <li>
                                 <span>Page {{curPage + 1}} of {{ numberOfPages() }}</span>
                                 </li>
                                 <li>
                                 <button type="button" class="btn btn-primary"
                                 ng-disabled="curPage >= data.length/pageSize - 1"
                                 ng-click="curPage = curPage+1">NEXT &gt;</button>
                                 </li>
                                </ul>
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