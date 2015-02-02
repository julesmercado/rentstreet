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
                                <a href="<?php echo base_url('member-page'); ?>" class="dropdown-toggle" data-toggle="dropdown">Dashboard</a>
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
<?php echo $this->session->flashdata('notify'); ?>
            <div class="row row-dash-mp">
                <div class="container">
                    <div class="row container-mp">
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
                                    <a href="<?php echo base_url('my-profile'); ?>"><i class="glyphicon glyphicon-user tab-space"></i>PROFILE</a>
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
<?php foreach($record as $row):
  if($row->images != null) {
   $img = explode('C:/wamp/www',$row->images);
  $path_url = "http://localhost".$img[1];
}
else $path_url = "http://localhost/rentstreet.ph/assets/img/camera.png";
?>

                        <div class="col-md-9">
                            <div class="panel panel-default">
                                <div class="panel-heading p-heading-mp">
                                    MY PROFILE
                                </div>

                                <div class="panel-body">
                                    <div class="container-bi">
                                        <div class="row">
                                            <div class=
                                            "col-md-2 col-md-offset-1 p-text-align">
                                            <p>Photo</p>
                                            </div>

                                            <div class="col-md-9">
                                                <div class="colcuz-pbl">
                                                    <?php echo form_open_multipart('uploadProfile');?>
                                                    <img class="img-profile" id="output" src=
                                                    "<?php echo $path_url; ?>">
                                                    <input type="hidden" name="user_id" value="<?php echo $row->user_id; ?>"/>
                                                    <input accept="image/*"
                                                    class="custom-file-input" onchange=
                                                    "loadFile(event)" name="userfile" id="userfile" value="<?php echo $row->images; ?>" type="file">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row wrap-inputs">
                                            <div class=
                                            "col-md-2 col-md-offset-1 p-text-align">
                                            <p>Name</p>
                                            </div>

                                            <div class="col-md-9 col3-pbl">
                                                <input type="text" name="name" value="<?php echo $row->name; ?>">
                                            </div>
                                        </div>

                                        <div class="row wrap-inputs">
                                            <div class=
                                            "col-md-2 col-md-offset-1 p-text-align">
                                            <p>Email Address</p>
                                            </div>

                                            <div class="col-md-9 col3-pbl">
                                                <input type="email" name="email" value="<?php echo $row->email; ?>">
                                            </div>
                                        </div>

                                        <div class="row wrap-inputs">
                                            <div class=
                                            "col-md-2 col-md-offset-1 p-text-align">
                                            <p>Contact #</p>
                                            </div>

                                            <div class="col-md-9 col3-pbl">
                                                <input type="number" name="contact" value="<?php echo $row->contact; ?>">
                                            </div>
                                        </div>

                                        <div class="row wrap-inputs">
                                            <div class=
                                            "col-md-2 col-md-offset-1 p-text-align">
                                            <p>Address</p>
                                            </div>

                                            <div class="col-md-9 col4-pbl">
                                                <textarea class="text-area" cols="58" id="" name="address" rows="5"><?php echo $row->address; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="row wrap-inputs">
                                            <div class="col-md-9">
                                                <input type=
                                                "submit" class=
                                                "btn post-item-big-mp" value=
                                                "Update my profile">
                                            </div>

                                            <div class="col-md-3"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
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