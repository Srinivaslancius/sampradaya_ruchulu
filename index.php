<?php include_once 'main_header.php'; ?>
<?php $getAllActiveMenus = getAllDataCheckActive('categories',0); ?>
<?php $getAllActiveBanners = getAllDataCheckActive('banners',0); ?>
        <!-- SLIDER AREA -->
        
        <div class="pm-pulse-container" id="pm-pulse-container">
        
            <div id="pm-pulse-loader">
                <img src="js/pulse/img/ajax-loader.gif" alt="slider loading" />
            </div>
            
            <div id="pm-slider" class="pm-slider">
                
                <div id="pm-slider-progress-bar"></div>
            
                <ul class="pm-slides-container" id="pm_slides_container">
                    
                    <!-- FULL WIDTH slides -->
                    <?php while($getBannerData = $getAllActiveBanners->fetch_assoc()) { ?>
                    <li class="pmslide_0">

                        <img src="uploads/banner_images/<?php echo $getBannerData['banner']; ?>" alt="img01" />
                    
                        <div class="pm-holder">
                            <div class="pm-caption">
                                  <h1><span><?php echo $getBannerData['title']; ?></span></h1>
                            </div>
                        </div>
                    
                    </li>
                    <?php } ?>
                                    
                </ul>
               
            </div>
        
        </div>
        
        <!-- SLIDER AREA end -->
        
        <!-- BODY CONTENT starts here -->
        
        <!-- Overview boxes -->
        <div class="container pm-containerPadding-top-90">
            <div class="row">
            
                <div class="col-lg-4 col-md-4 col-sm-12 pm-center pm-column-spacing">
                    
                    <div class="pm-image-container">
                        <img src="img/home/image1.jpg" alt="image1">
                    </div>
                    
                    <h6>say hello to vienna</h6>
                    
                    <p>A powerful restaurant theme for restaurants, bars and catering companies.</p>
                    
                    <a href="about-us.html" class="pm-rounded-btn animated pm-primary">learn more about us <i class="fa fa-angle-right"></i></a>
                    
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-12 pm-center pm-column-spacing">
                    
                    <div class="pm-image-container">
                        <img src="img/home/image2.jpg" alt="image2">
                    </div>
                    
                    <h6>we serve authentic cuisine</h6>
                    
                    <p>Come experience Vienna for yourself...we’ve been told it’s an unforgettable experience</p>
                    
                    <a href="menus.html" class="pm-rounded-btn animated pm-primary">View our Menus <i class="fa fa-angle-right"></i></a>
                    
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-12 pm-center pm-column-spacing">
                    
                    <div class="pm-image-container">
                        <img src="img/home/image3.jpg" alt="image3">
                    </div>
                    
                    <h6>take home the pleasure</h6>
                    
                    <p>Visit our shop and browse some of our famous spices and sauces.</p>
                    
                    <a href="store.html" class="pm-rounded-btn animated pm-primary">visit our store <i class="fa fa-angle-right"></i></a>
                    
                </div>
            
            </div>
        </div>
        <!-- Overview boxes end -->
        
        <!-- Menu filter system -->
        <div class="container pm-containerPadding-top-50 pm-containerPadding-bottom-10">
            <div class="row">
            
                <div class="col-lg-12 pm-containerPadding-bottom-40">
                    
                    <div class="pm-featured-header-container">
                    
                        <!-- Featured panel header -->
                        <div class="pm-featured-header-title-container menus">
                            <p class="pm-featured-header-title">Featured Dishes</p>
                            <p class="pm-featured-header-message">Browse some of the best dishes on our menu</p>
                        </div>
                        <!-- Featured panel header end -->
                        
                        <!-- Filter menu -->
                        <div class="pm-isotope-filter-container">
                            <ul class="pm-isotope-filter-system">
                                <li class="pm-isotope-filter-system-expand">Expand <i class="fa fa-angle-down"></i></li>
                                <?php while($getAllMen = $getAllActiveMenus->fetch_assoc()) { ?>
                                    <li><a href="menus.php"><?php echo $getAllMen['category_name']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- Filter menu end -->
                    
                    </div>
                    
                </div><!-- /.col-lg-12 -->
                
                <!-- menu item -->
                <div class="col-lg-4 col-md-4 col-sm-6 pm-column-spacing">
                    <div class="pm-menu-item-container">
                        <div class="pm-menu-item-img-container" style="background-image:url(img/menu/item1.jpg);">
                            <div class="pm-menu-item-price"><p>$14.99</p></div>
                        </div>
                        
                        <div class="pm-menu-item-desc">
                            <p class="pm-menu-item-title">shrimp salad</p>
                            <p class="pm-menu-item-excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut malesuada orci nec tortor tincidunt. </p>
                        </div>
                    </div>
                    
                </div><!-- /.col-lg-4 -->
                <!-- /menu item -->
                
                <!-- menu item -->
                <div class="col-lg-4 col-md-4 col-sm-6 pm-column-spacing">
                    <div class="pm-menu-item-container">
                        <div class="pm-menu-item-img-container" style="background-image:url(img/menu/item2.jpg);">
                            <div class="pm-menu-item-price">
                              <p>$12.99</p></div>
                        </div>
                        
                        <div class="pm-menu-item-desc">
                            <p class="pm-menu-item-title">broccoli pesto</p>
                            <p class="pm-menu-item-excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut malesuada orci nec tortor tincidunt. </p>
                        </div>
                    </div>
                    
                </div><!-- /.col-lg-4 -->
                <!-- /menu item -->
                
                <!-- menu item -->
                <div class="col-lg-4 col-md-4 col-sm-6 pm-column-spacing">
                    <div class="pm-menu-item-container">
                        <div class="pm-menu-item-img-container" style="background-image:url(img/menu/item3.jpg);">
                            <div class="pm-menu-item-price">
                              <p>$13.99</p></div>
                        </div>
                        
                        <div class="pm-menu-item-desc">
                            <p class="pm-menu-item-title">linguini</p>
                            <p class="pm-menu-item-excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut malesuada orci nec tortor tincidunt. </p>
                        </div>
                    </div>
                    
                </div><!-- /.col-lg-4 -->
                <!-- /menu item -->
                
            </div>
        </div>
        <!-- Menu filter system end -->
        
        <!-- BODY CONTENT end -->
        
    <?php include_once "footer_sub_content.php"; ?>
            
        </div>

    <?php include_once 'footer.php'; ?>
