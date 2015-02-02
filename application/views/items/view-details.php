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

                    <li >
                       <a href="#" id="msg">Notification <span id="nbrmsg" class="badge">42</span></a>
                    </li>
                    
                </ul>
            </div>
          
            </div>
            
        </div>
    </nav>
     <div class="row">
                <hr class="intro-divider">
            </div>
    <div class="content-section-a">
        <div class="container">
            <div class="col-dashboard panel panel-default col-dashboard-cuz panel-body-cuz">
                <div class="panel-heading p-heading-d-mp">
               
                </div>

                <div class="panel-body">

<?php 
$images = $this->db->where('post_id',$details->id)->get('images')->result();
if($images != null){
    $i = 0;
    foreach ($images as $key) {
        $img = explode('C:/wamp/www',$key->img_path);
        $path_url[$i] = "http://localhost".$img[1];    
        $i++;
    }
$picture = $this->db->where('user_id',$details->user_id)->get('clients')->result();
    foreach ($picture as $client) {
        if($client->images != null) {
         $img = explode('C:/wamp/www',$client->images);
        $profile = "http://localhost".$img[1];
        } else {
         $profile = "http://localhost/rentstreet.ph/assets/img/user.png";
        }
    }
$category = $this->db->where('id',$details->cat_id)->get('category')->result();
    foreach ($category as $cat) {
    }
}
?>
            <div class="carousel-container">
                <!-- main slider carousel -->
                <div class="row row-cuz-sr2">

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12" id="slider">
                            <div class="col-md-12" id="carousel-bounding-box">
                                <div class="carousel slide" id="myCarousel">
                                    <!-- main slider carousel items -->

                                    <div class=
                                    "carousel-inner carousel-inner-cuz">
                                    <?php for($t=0;$t<$i;$t++){ if ($t==0) {echo "<div class=\"active item\" data-slide-number=".$t.">
                                    <img class=\"img-responsive big-img\" src=".$path_url[$t]."></div>";} else { echo "<div class=\"item\" data-slide-number=".$t.">
                                    <img class=\"img-responsive big-img\" src=".$path_url[$t]."></div>";} }?>
                                </div>
                                    <!-- main slider carousel nav controls --><a class="carousel-control left"
                                    data-slide="prev" href="#myCarousel">‹</a>
                                    <a class="carousel-control right"
                                    data-slide="next" href="#myCarousel">›</a>
                                </div>
                            </div>
                        </div>
                        <div class=
                        "col-md-12 hidden-sm hidden-xs slider-thumbs-cuz" id=
                        "slider-thumbs">
                            <!-- thumb navigation carousel items -->

                            <ul class="list-inline">
                                    <?php for($t=0;$t<$i;$t++){ echo "<li> <a class=\"selected\" id=\"carousel-selector-".$t."\">
                                    <img class=\"img-responsive img-cuz\" src=".$path_url[$t]."></a></li>"; }?>
                            </ul>
                        </div>
                    </div>
                    <div class="row margin-left-vi ">
                        <div class="row">
                        <div class="col-md-12">
                            <input id="input-21b" value="4" type="number" class="rating form-control hide" min="0" max="5" step="0.2" data-size="xs">
                        </div>
                       
                    </div>
                     <div class="row row-margin-from-to">
                        <div class="col-md-12">
                            <div class="row" ng-class="{'has-error': datepickerForm.date.$invalid}">
                                <div class="col-md-4">
                                    <input type="text" class="from-input" ng-model="date.date_from" bs-datepicker placeholder="From" required>
                                </div>
                                <div class="col-md-4 margin-left-vd">
                                    <input type="text" class="from-input" ng-model="date.date_to" bs-datepicker  placeholder="To" required>
                                </div>
                                <div class="col-md-4">
                                </div>
                                 
                              </div>
                                <!-- <div class="hero-unit">
                                    <input type='text' ng-model="date.w">
                                    <div class="input-daterange" id="datepicker" >
                                        <input type="text" class="input-small is-cuz" name="start" placeholder="From" ng-model="date2.from" />
                                       
                                        <input type="text" class="input-small is-cuz" name="end" placeholder="To" ng-model="date2.to"/>
                                    </div>
                                </div> -->
                        </div>
                        
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <button id="sbr" ng-click="submitRequest( <?php echo $user_id;?>, <?php echo $details->user_id; ?>, <?php echo $details->id ?>)" class="btn btn-sbr">Send Borrow Request</button>
                        </div>
                    </div>
                    <div class="row row-vi-margin">
                        
                            <div class="row">
                                <h5>Desciption</h5>
                            </div>
                            <div class="row desc-vi">
                                <p><span><?php echo $details->description; ?></span></p>
                            </div>
                       
                    </div>
                    <div class="row row-vi-margin row-margin-left-vi">
                        <div class="row">
                            <div class="col-md-12">                              
                                  <label for="comment">Comment:</label>
                                  <textarea class="form-control fc-vi" rows="5" id="comment"></textarea>                      
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                 <button class="btn btn-comment ">Post Comment</button>
                            </div>
                        </div>
                        
                    </div>
                    </div>
                   
                    

                    </div>
                    <div class="col-md-4">
                        <div class="row row-col-panel">
                            <div class=
                        "col-dashboard panel panel-default col-dashboard-cuz panel-body-cuz">
                            <div class="panel-heading p-heading-d-mp2">
                                DESCRIPTION
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-5 lbl-vi">
                                        <label>Price:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <span>₱ <?php echo $details->price; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 lbl-vi">
                                        <label>Mode Of Payment</label>
                                    </div>
                                    <div class="col-md-7">
                                        <span><?php echo $details->daily; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 lbl-vi">
                                        <label>Contact Number:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <span><?php echo $client->contact; ?></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5 lbl-vi">
                                        <label>Date Posted:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <span><?php echo $details->created_on; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 lbl-vi">
                                        <label>Status:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <span>Available</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 lbl-vi">
                                        <label>Location:</label>
                                    </div>
                                    <div class="col-md-7">
                                       <span><?php echo $details->location; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 lbl-vi">
                                        <label>Ad ID:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <span><?php echo $details->id; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 lbl-vi">
                                        <label>Category:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <span><?php echo $cat->category; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="row row-col-panel">
                            <div class=
                        "col-dashboard panel panel-default col-dashboard-cuz">
                            <div class="panel-heading  p-heading-d-mp2">
                                BASIC INFORMATION
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-7 prof-img-vi">
                                        <img class="img-profile-ui img-circle"  src="<?php echo $profile; ?>">
                                    </div>
                                    <div class="col-md-5 col-user-vi">
                                        <span><?php echo $client->username ?></span>
                                        <p><?php echo $client->name; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 lbl-vi">
                                        <label>Email Address:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <span><?php echo $client->email; ?></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5 lbl-vi">
                                        <label>Date Registered:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <span><?php echo $client->registered_on; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 lbl-vi">
                                        <label>Address:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <span><?php echo $client->address; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 lbl-vi">
                                        <label>Last login:</label>
                                    </div>
                                    <div class="col-md-7">
                                       <span><?php echo $client->last_login; ?></span>
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
            </div>     
                </div>
            </div>

            
        </div>
    </div>

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