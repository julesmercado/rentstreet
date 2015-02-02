 <!-- Navigation -->

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->

            <div class="navbar-header">
                <button class="navbar-toggle" data-target=
                "#bs-example-navbar-collapse-1" data-toggle="collapse" type=
                "button"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span> <span class="icon-bar"></span>
                <span class="icon-bar"></span></button> <a class="navbar-brand"
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
        </div><!-- MODAL -->
        <!-- /.container -->
    </nav><!-- Header -->

    <div class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="intro-message">
                        <h1>RentStreet<span>.ph</span></h1>

                        <h3>Everything you need for rent.</h3>
                        <hr class="intro-divider">

                        <div class="row">
                            <select class="cat-cover" name="category" >
                              
                                <option ng-repeat="data in queryResult.categories | filter: query" value="{{data.id}}">{{data.category}}</option>
                            </select>
                            <!--  <input type="text" class="search-text-cat"  placeholder="Category?"> -->
                             <input class="search-text" placeholder=
                            "What are you looking for?" type="text">
                            <input class="btn btn-default btn-lg btn-search-login"
                            type="button" value="Search">
                        </div><!-- <div class="row">
                            <h3>Or</h3>
                        </div> -->

                        <div class="row post-item-row">
                            <input class="btn post-item-big" type="button"
                            value="POST NOW YOUR ITEM!">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-section-a">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading p-heading-mp">
            
                </div>

                <div class="panel-body">
                    <div class="row row-cuz">
                <div class="col-lg-5 col-sm-6 spacer-left">
                    <hr class="section-heading-spacer-left-cuz">
                </div>

                <div class="most-rented-item">
                    <h4>NEWLY POSTED ITEMS</h4>
                </div>

                <div class="col-lg-5 col-sm-6 spacer-left">
                    <hr class="section-heading-spacer-right-cuz">
                </div>
            </div>

            <div class="row">
                <div class="container container-hp">
                    <div class="row row-lp-cuz">
                        <div class=" col-md-3 center-img" ng-repeat="data in queryResult.items | filter: query">
                   
                            <img class="img-con-sr2 d2" ng-src="{{data.item_path}}">

                            <div class="contenthover" ng-mouseover="hoverItem()">
                                <h3>{{data.title}}</h3>

                                <p> {{data.description}} </p>

                                <p><a class="mybutton" href="<?php echo base_url('view-details')?>/{{data.id}}">View More Ad Details</a></p>
                            </div>

                     
                         

                        <div class="row row-top-margin">
                            <div class="col-md-6">
                                <p>{{data.title}}</p>
                            </div>

                            <div class="col-md-6">
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
        </div><!-- /.container -->
    </div><!-- /.banner -->
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