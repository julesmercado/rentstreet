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
                    <li><input class="btn btn-post-header-cuz" type="button" value=
                    "Post Now Your Item!">
                    </li>
                </ul>
            </div>
            </div>
        </div>
    </nav>
    <div class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="intro-message">
                        <h1>RentStreet<span>.ph</span></h1>

                        <h3>Everything you need for rent.</h3>
                        <hr class="intro-divider">

                        <div class="row">
                            <select class="cat-cover" name="category">
                               <?php foreach ($categories as $item) {
                                    echo "<option value=\"".$item->id."\">";
                                    echo $item->category;
                                    echo "</option>";
                                }?>
                            </select>
                            <!--  <input type="text" class="search-text-cat"  placeholder="Category?"> -->
                             <input class="search-text" placeholder=
                            "What are you looking for?" type="text">
                            <input class="btn btn-default btn-lg btn-search"
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
            <div class="row row-cuz">
                <div class="col-lg-5 col-sm-6 spacer-left">
                    <hr class="section-heading-spacer-left-cuz">
                </div>

                <div class="most-rented-item">
                    <h3>Newly Posted Items</h3>
                </div>

                <div class="col-lg-5 col-sm-6 spacer-left">
                    <hr class="section-heading-spacer-right-cuz">
                </div>
            </div>

            <div class="row">
                <div class="container container-hp">
                    
<?php foreach($path as $items): 
  $images = $this->db->where('post_id',$items->id)->get('images')->result();
  if($images != null){
    $i = 0;
    foreach ($images as $key) {
        $img = explode('C:/wamp/www',$key->img_path);
        $path_url[$i] = "http://localhost".$img[1];    
        $i++;
    }
$category = $this->db->where('id',$items->cat_id)->get('category')->result();
    foreach ($category as $cat) {
    }
}

?>               
                    <div class=" col-md-3">
                        <div class="row">
                            <img class="img-con-sr d1" src="<?php echo $path_url[0];?>">

                            <div class="contenthover">
                                <h3><?php echo $items->title; ?></h3>

                                <p><?php echo $items->description; ?></p>

                                <p><a class="mybutton" href="<?php echo base_url('view-items/'.$items->id); ?>">View More Ad Details</a></p>
                            </div>
                        </div>

                        <div class="row row-top-margin">
                            <div class="col-md-6">
                                <p><?php echo $items->title; ?></p>
                            </div>

                            <div class="col-md-6">
                                <p class="price-hp">₱ <?php echo $items->price; ?> | <?php echo $items->daily; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <p class="cat-hp"><?php echo $cat->category; ?></p>
                            </div>
                        </div>
                    </div>
<?php endforeach; ?>
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