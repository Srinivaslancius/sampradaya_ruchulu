<?php include_once 'main_header.php'; error_reporting(0);?>
<?php 
$getAllActiveMenus = getAllDataCheckActive('categories',0); 
$id= $_GET['id'];
$sqlMultiple="SELECT * FROM products WHERE category_id LIKE '%$id%'";
$getAllProductData = $conn->query($sqlMultiple);
?>

        <!-- SUB-HEADER area -->
        <div class="pm-sub-header-container pm-parallax-panel" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
        	
            <div class="pm-sub-header-title-container">
            	<p class="pm-sub-header-title"><span>Menus</span></p>
                <p class="pm-sub-header-message">Discover our amazing entree of delicious Italian cusine</p>
            </div>
            
        </div>
        
        <!-- SUB-HEADER area end -->
        
        <!-- BODY CONTENT starts here -->
        
        <!-- Menu filter system -->
        <div class="container pm-containerPadding80">
        	<div class="row">
            
                <div class="col-lg-12 pm-containerPadding-bottom-40">
                	
                    <div class="pm-featured-header-container">
                    
                    	<!-- Featured panel header -->
                        <div class="pm-featured-header-title-container menus">
                        	<p class="pm-featured-header-title">Award Winning Menu</p>
                            <p class="pm-featured-header-message">Our menu has won numerous awards for best authentic cuisine</p>
                        </div>
                        <!-- Featured panel header end -->
                        
                        <!-- Filter menu -->
                        <div class="pm-isotope-filter-container">
                        	<ul class="pm-isotope-filter-system">
                            	<li class="pm-isotope-filter-system-expand">Expand <i class="fa fa-angle-down"></i></li>
                            	<?php while($getAllMen = $getAllActiveMenus->fetch_assoc()) { $activeclas = "class='current'"; ?>
                                    <li><a href="menus.php?id=<?php echo $getAllMen['id']; ?>" <?php if($getAllMen['id'] == $id) { echo "$activeclas"; } ?>><?php echo $getAllMen['category_name']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- Filter menu end -->
                    
                    </div>
                    
                </div><!-- /.col-lg-12 -->
                
                <?php while($getAllProducts = $getAllProductData->fetch_assoc()) { ?>
                <!-- menu item -->
                <div class="col-lg-4 col-md-4 col-sm-6 pm-column-spacing">
                    <div class="pm-menu-item-container">
                    	<div class="pm-menu-item-img-container" style="background-image:url(uploads/product_images/<?php echo $getAllProducts['product_image']; ?>);">
                        	<div class="pm-menu-item-price"><p>&#2352; <?php echo $getAllProducts['product_price']; ?></p></div>
                        </div>
                        
                        <div class="pm-menu-item-desc">
                        	<p class="pm-menu-item-title"><?php echo $getAllProducts['product_name']; ?></p>
                            <p class="pm-menu-item-excerpt"><?php echo $getAllProducts['product_info']; ?> </p>
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
                                        id="verify_otp"  id="verify_otp" maxlength="5" placeholder="Enter OTP" onkeypress="return isNumberKey(event)"required />
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
