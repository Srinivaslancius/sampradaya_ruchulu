<?php include_once 'main_header.php'; error_reporting(0); ?>
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
                        <div class="pm-menu-item-price"><p>&#2352; <?php echo $getProductsData['product_price']; ?></p></div>
                    </div>
                    
                    <h6><?php echo $getProductsData['product_name']; ?></h6>
                    
                    <p><?php echo substr($getProductsData['product_info'],0,150); ?></p>
                    <?php if(isset($_SESSION['session_mobile']) && $_SESSION['session_mobile']!='') { ?>
                        <a href="#" class="pm-rounded-btn animated pm-primary pay_now_cart"  data-product-id="<?php echo encryptPassword($getProductsData['id']) ?>" data-product-price="<?php echo encryptPassword($getProductsData['product_price']); ?>">Add To Cart <i class="fa fa-angle-right"></i></a>
                    <?php } else { ?>
                        <a href="#" data-toggle="modal" data-target="#myModal" class="pm-rounded-btn animated pm-primary">Add To Cart <i class="fa fa-angle-right"></i></a>
                        <div class="pm-menu-item-price"><p>&#2352; <?php echo $getProductsData['product_price']; ?></p></div>
                    <?php } ?>
                    
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
                            <div class="pm-menu-item-price"><p>&#2352; <?php echo $getProductsData['product_price']; ?></p></div>
                        </div>
                        
                        <div class="pm-menu-item-desc">
                            <p class="pm-menu-item-title"><?php echo $getProductsData['product_name']; ?></p>
                            <p class="pm-menu-item-excerpt"><?php echo substr($getProductsData['product_info'],0,125); ?> </p>
                            <?php if(isset($_SESSION['session_mobile']) && $_SESSION['session_mobile']!='') { ?>
                            <a href="#" class="pm-rounded-btn animated pm-primary pay_now_cart"  data-product-id="<?php echo encryptPassword($getProductsData['id']) ?>" data-product-price="<?php echo encryptPassword($getProductsData['product_price']); ?>">Add To Cart <i class="fa fa-angle-right"></i></a>
                            <?php } else { ?>
                            <a href="#" data-toggle="modal" data-target="#myModal" class="pm-rounded-btn animated pm-primary">Add To Cart <i class="fa fa-angle-right"></i></a>
                            <?php } ?>
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

      <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" 
                           data-dismiss="modal">
                               <span aria-hidden="true">&times;</span>
                               <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                            Log In
                        </h4>
                    </div>
                    
                    <!-- Modal Body -->
                    <div class="modal-body">
                        
                        <form class="form-horizontal" role="form" autocomplete="off" method="post">

                            <div class="send_opt_div">
                                  <div class="form-group">
                                    <label  class="col-sm-2 control-label" for="inputEmail3">Mobile</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" 
                                        id="verify_mobile" name="verify_mobile" placeholder="Please Enter Mobile Number"  onkeypress="return isNumberKey(event)" required maxlength="10"/>
                                    </div>
                                  </div>                  
                                  <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-10">
                                      <button type="button" class="btn btn-primary check_login">Send OTP</button>
                                    </div>
                                  </div>
                            </div>
                          <!-- OTP Verified here -->
                            <div class="verify_opt_div" style="display:none">
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label" for="inputEmail3">OTP</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" 
                                        id="verify_otp"  id="verify_otp" maxlength="4" placeholder="Enter OTP" onkeypress="return isNumberKey(event)"required />
                                    </div>                                    
                                </div>
                                <p class="show_msg" style="color:#32CD32; text-align:center"></p>
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-10">
                                      <button type="button" class="btn btn-primary verify_opt_mobile">Send OTP</button>
                                    </div>
                                </div>                             
                            </div>
                        </form>               
                        
                    </div>
                    
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                        
                    </div>
                </div>
            </div>
        </div>

    <script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').focus()
    })

    </script>
    <?php include_once 'footer.php'; ?>