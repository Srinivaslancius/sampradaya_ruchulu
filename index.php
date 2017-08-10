<?php include_once 'main_header.php'; ?>
<?php $getAllActiveMenus = getAllDataCheckActive('categories',0); ?>
<?php $getAllActiveBanners = getAllDataCheckActive('banners',0); ?>
<?php $getAllActiveProducts = getAllDataWithLimit('products',3,0); ?>
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
            
            <?php while($getProductsData = $getAllActiveProducts->fetch_assoc()) { ?>
                <div class="col-lg-4 col-md-4 col-sm-12 pm-center pm-column-spacing">
                    
                    <div class="pm-image-container">
                        <img src="uploads/product_images/<?php echo $getProductsData['product_image']; ?>" alt="image1">
                    </div>
                    
                    <h6><?php echo $getProductsData['product_name']; ?></h6>
                    
                    <p><?php echo $getProductsData['product_info']; ?></p>
                    
                    <a href="cart.php" class="pm-rounded-btn animated pm-primary">Add To Cart <i class="fa fa-angle-right"></i></a>
                    
                </div>
            <?php } ?>
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
                                    <li><a href="menus.php?id=<?php echo $getAllMen['id']; ?>"><?php echo $getAllMen['category_name']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- Filter menu end -->
                    
                    </div>
                    
                </div><!-- /.col-lg-12 -->
                <?php $getAllActiveProducts = getAllDataWithLimit('products',3,0); ?>
                <?php while($getProductsData = $getAllActiveProducts->fetch_assoc()) { ?>
                <!-- menu item -->
                <div class="col-lg-4 col-md-4 col-sm-6 pm-column-spacing">
                    <div class="pm-menu-item-container">
                        <div class="pm-menu-item-img-container" style="background-image:url(uploads/product_images/<?php echo $getProductsData['product_image']; ?>);">
                            <div class="pm-menu-item-price"><p>&#2352; 14.99</p></div>
                        </div>
                        
                        <div class="pm-menu-item-desc">
                            <p class="pm-menu-item-title"><?php echo $getProductsData['product_name']; ?></p>
                            <p class="pm-menu-item-excerpt"><?php echo $getProductsData['product_info']; ?> </p>
                        </div>
                    </div>
                    
                </div><!-- /.col-lg-4 -->
                <!-- /menu item -->
                <?php } ?>
                
            </div>
        </div>
        <!-- Menu filter system end -->
        
        <!-- BODY CONTENT end -->
        
    <?php include_once "footer_sub_content.php"; ?>
            
        </div>

    <?php include_once 'footer.php'; ?>
