<?php include_once 'main_header.php'; ?>
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
                    	<div class="pm-menu-item-img-container" style="background-image:url(uploads/product_images/<?php echo $getAllProducts['product_name']; ?>);">
                        	<div class="pm-menu-item-price"><p>$14.99</p></div>
                        </div>
                        
                        <div class="pm-menu-item-desc">
                        	<p class="pm-menu-item-title"><?php echo $getAllProducts['product_name']; ?></p>
                            <p class="pm-menu-item-excerpt"><?php echo $getAllProducts['product_info']; ?> </p>
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
        
       <?php include_once 'footer.php'; ?>
