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
                                <a href="<?php echo base_url('my-ads'); ?>">Advertisement</a>
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

    <div class="content-section-a">
        <div class="container">
            <div class="row">
                <div class="col-md-3 margin-bottom">
                    <h1>Upload Item</h1>
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
<?php echo validation_errors('<div class="alert alert-danger text-center" style="font-size: 13px; margin-left: 200px; margin-right: 200px;">','</div>'); ?>
            <div class="row row-dash-mp">
                <div class="container">
                    <div class="row row-ui">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading p-heading-mp">
                                    UPLOAD YOUR ITEM HERE
                                </div>

                                <div class="panel-body">
                                    <div class="container-bi">
                                        <?php echo form_open_multipart('items/addItem','name="form"');?>
                                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>1. Select Your
                                                Category</h4>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="container-ui">
                                                <hr class=
                                                "section-heading-spacer-left-cuz-ui">
                                                </div>
                                        </div>

                                        <div class="row">
                                            <div class=
                                            "col-md-2 ui-text-align">
                                                <p>Category</p>
                                            </div>

                                            <div class=
                                            "col-md-6 sel-selectcat">
                                                <select name="category" ng-model="category">
                                                    <?php foreach ($categories as $item) {
                                                        echo "<option value=\"".$item->id."\">";
                                                        echo $item->category;
                                                        echo "</option>";
                                                    }?>
                                                </select>
                                            </div>

                                            <div class="col-md-4"></div>
                                        </div>

                                        <div class="row row-margin-top-ui">
                                            <div class="col-md-12">
                                                <h4>2. Upload Your Items</h4>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="container-ui">
                                                <hr class=
                                                "section-heading-spacer-left-cuz-ui">
                                                </div>
                                        </div>

                                        <div class="row">
                                            <div class=
                                            "col-md-2 ui-text-align">
                                                <p>Upload Photos</p>
                                            </div>

                                            <div class="col-md-10">
                                                <div class=
                                                "col-md-3 upload-margin-bottom">
                                                <img class="img-profile" id="output1" src="<?php echo base_url('assets/img/camera.png'); ?>">
                                                    <input accept="image/*"
                                                    class="custom-file-input"
                                                    onchange="loadFile1(event)"
                                                    type="file" name="userfile1">
                                                </div>

                                                <div class=
                                                "col-md-3 upload-margin-bottom">
                                               <img class="img-profile" id="output2" src="<?php echo base_url('assets/img/camera.png'); ?>">
                                                    <input accept="image/*"
                                                    class="custom-file-input"
                                                    onchange="loadFile2(event)" name="userfile2"
                                                    type="file">
                                                </div>

                                                <div class=
                                                "col-md-3 upload-margin-bottom">
                                                <img class="img-profile" id="output3" src="<?php echo base_url('assets/img/camera.png'); ?>">
                                                    <input accept="image/*"
                                                    class="custom-file-input"
                                                    onchange="loadFile3(event)" name="userfile3"
                                                    type="file">
                                                </div>

                                                <div class="col-md-3"></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class=
                                            "col-md-2 ui-text-align"></div>

                                            <div class="col-md-10">
                                                <div class=
                                                "col-md-3 upload-margin-bottom">
                                                <img class="img-profile" id="output4" src="<?php echo base_url('assets/img/camera.png'); ?>">
                                                    <input accept="image/*"
                                                    class="custom-file-input"
                                                    onchange="loadFile4(event)" name="userfile4"
                                                    type="file">
                                                </div>

                                                <div class=
                                                "col-md-3 upload-margin-bottom">
                                               <img class="img-profile" id="output5" src="<?php echo base_url('assets/img/camera.png'); ?>">
                                                    <input accept="image/*"
                                                    class="custom-file-input"
                                                    onchange="loadFile5(event)" name="userfile5"
                                                    type="file">
                                                </div>

                                                <div class=
                                                "col-md-3 upload-margin-bottom">
                                                <img class="img-profile" id="output6" src="<?php echo base_url('assets/img/camera.png'); ?>">
                                                    <input accept="image/*"
                                                    class="custom-file-input"
                                                    onchange="loadFile6(event)" name="userfile6"
                                                    type="file">
                                                </div>

                                                <div class="col-md-3"></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>3. Describe Your Item</h4>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="container-ui">
                                                <hr class=
                                                "section-heading-spacer-left-cuz-ui">
                                                </div>
                                        </div>

                                        <div class="row">
                                            <div class=
                                            "col-md-2 ui-text-align">
                                                <p>Ad Location</p>
                                            </div>

                                            <div class=
                                            "col-md-6 sel-selectcat">
                                                <input type="text" name="location" ng-model="locaton" ng-minlength="5" value="<?php echo set_value('location'); ?>">
                                            </div>

                                            <div class="col-md-4"></div>
                                        </div>

                                        <div class="row margin-top-ui">
                                            <div class=
                                            "col-md-2 ui-text-align">
                                                <p>Price</p>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class=
                                                    "col-md-6 price-mod margin-bottom-ui">
                                                    <input type="text" name="price" ng-model="price" ng-minlength="2" value="<?php echo set_value('price'); ?>">
                                                    </div>

                                                    <div class=
                                                    "col-md-6 price-mod">
                                                        <select name="daily" ng-model="daily">
                                                    <option value="Daily">
                                                        Daily
                                                    </option>
                                                    <option value="Weekly">
                                                        Weekly
                                                    </option>
                                                    <option value="Monthly">
                                                        Monthly
                                                    </option>
                                                    <option value="Quarterly">
                                                        Quarterly
                                                    </option>
                                                    <option value="Yearly">
                                                        Yearly
                                                    </option>
                                                </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4"></div>
                                        </div>

                                        <div class="row margin-bottom-ui">
                                            <div class=
                                            "col-md-2 ui-text-align">
                                                <p>Ad Title</p>
                                            </div>

                                            <div class=
                                            "col-md-6 sel-selectcat">
                                               <input type="text" name="title" ng-model="title" ng-minlength="6" value="<?php echo set_value('title'); ?>">
                                            </div>

                                            <div class="col-md-4"></div>
                                        </div>

                                        <div class="row margin-bottom-ui">
                                            <div class=
                                            "col-md-2 ui-text-align">
                                                <p>Ad Description</p>
                                            </div>

                                            <div class=
                                            "col-md-6 sel-selectcat">
                                                <textarea class="text-area" cols="58" id="" name="description" rows="5" ng-model="description" ng-minlength="11"><?php echo set_value('description'); ?></textarea>
                                            </div>

                                            <div class="col-md-4"></div>
                                        </div>

                                        <div class="row">
                                            <div class=
                                            "col-md-2 ui-text-align"></div>

                                            <div class=
                                            "col-md-6 sel-selectcat">
                                                <input type=
                                                "submit" class=
                                                "btn post-item-big-ui"  value=
                                                "Post Your Item Now!">
                                            </div>

                                            <div class="col-md-4"></div>
                                        </div>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
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

                            <p class="copyright text-muted small">Copyright
                            &copy; RentSteet.ph 2014. All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </footer>