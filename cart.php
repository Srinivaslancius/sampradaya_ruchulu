<?php include_once 'main_header.php'; ?>
<?php $id = $_GET['pid']; ?>
<?php $mobile_session="8887776665"; 
/*$sql = "INSERT INTO cart ( `user_id`,`product_name`) VALUES ('$mobile_session','$id')";
if($conn->query($sql) === TRUE){
    echo "success";
}*/
$sql1="SELECT * from cart WHERE user_id=2147483647";
$res=$conn->query($sql1);
?>
                
        <!-- SUB-HEADER area -->
        <div class="pm-sub-header-container pm-parallax-panel" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
            
            <div class="pm-sub-header-title-container">
                <p class="pm-sub-header-title"><span>Shopping cart</span></p>
                <p class="pm-sub-header-message">Ready to checkout?</p>
            </div>
            
        </div>
        
        <!-- SUB-HEADER area end -->
        
        <!-- BODY CONTENT starts here -->
        
        <div class="container pm-containerPadding-top-80 pm-containerPadding-bottom-40">
            <div class="row">
              

                <div class="col-lg-12">
                    
                   <?php $sub_total=0; if ($res->num_rows > 0) { ?>

                    <div class="pm-cart-info-container">
                        
                        <div class="col-lg-12">
                                <div class="pm-cart-info-title">
                                  <h3>You have added <?php echo $res->num_rows;  ?> item in your cart</h3>
                                </div>
                            </div>

                        <?php while($getProductsData = $res->fetch_assoc()) { 
                                $getProTitle =  getIndividualDetails($getProductsData['product_name'],'products','id');
                                $sub_total +=$getProTitle['product_price'];
                                ?>

                        <div class="row">                        
                            

                            <?php //$getAllActiveProducts = getAllDataWithLimit('products',3,0); ?>
                                                      <div class="col-lg-4 col-md-2 col-sm-3 pm-cart-info-column">
                                <img src="<?php echo $base_url . 'uploads/product_images/'.$getProTitle['product_image'] ?>" height="50" width="50" id="output" /> 
                            </div>
                            
                            <div class="col-lg-3 col-md-2 col-sm-3 pm-cart-info-column text">
                                <a href="#"><?php echo $getProTitle['product_name']?></a>
                            </div>
                            
                            <div class="col-lg-4 col-md-2 col-sm-3 pm-cart-info-column text">
                                <p>Price: <?php echo $getProTitle['product_price']; ?></p>
                            </div>

                            
                            <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column quantity">
                                <div class="quantity buttons_added pm-checkout-quantity">
                                    <input type="number" size="4" class="input-text qty cart text" title="Qty" value="1" name="quantity" min="1" step="1" >
                                    <div class="pm-quantity-btns-container">
                                        <input type="button" class="minus" value="-">
                                        <input type="button" class="plus" value="+">
                                    </div>                                                            
                                </div><!-- quantity buttons end -->
                            </div>
                            
                            <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column">
                                <a href="cart_delete.php?did=<?php echo $getProductsData['id']?>" class="pm-rounded-btn pm-primary pm-cart-remove">Remove</a>
                            </div>
                        
                        </div><!-- /.row -->
                        <?php } ?>
                        
                    </div><!-- /.pm-cart-info-container -->
                    <?php  } else { ?>
                    No Items Found
                    <?php } ?>
                </div><!-- /.col-lg-12 -->
            
            </div>
        </div>
        
        <div class="container pm-containerPadding-bottom-80">
            <div class="row">
                
                <div class="col-lg-4 col-md-4 col-sm-4">
                    
                    
                </div>
                
                <div class="col-lg-8 col-md-8 col-sm-8">
                    
                    <div class="pm-cart-totals">
                        
                        <div class="pm-cart-totals-title">
                            <h3>Cart Totals</h3>
                        </div>
                        
                        <div class="row">
                        
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="pm-cart-totals-column">
                                    <p class="pm-cart-totals-label">Cart subtotal</p>
                                </div>
                            </div>
                            
                            <div class="col-lg-8 col-md-6 col-sm-6">
                                <div class="pm-cart-totals-column">
                                    <p>&#2352; <?php echo $sub_total; ?></p>
                                </div>
                            </div>
                        
                        </div><!-- /.row -->
                        
                        <div class="row">
                        
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="pm-cart-totals-column">
                                    <p class="pm-cart-totals-label">shipping and handling</p>
                                </div>
                            </div>
                            
                            <div class="col-lg-8 col-md-6 col-sm-6">
                                <div class="pm-cart-totals-column">
                                    <p>&#2352; <?php echo $shipping=5; ?></p>
                                </div>
                            </div>
                        
                        </div><!-- /.row -->
                        
                        <div class="row">
                        
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="pm-cart-totals-column">
                                    <p class="pm-cart-totals-label">order total</p>
                                </div>
                            </div>
                            
                            <div class="col-lg-8 col-md-6 col-sm-6">
                                <div class="pm-cart-totals-column">
                                    <p>&#2352; <?php echo $sub_total +$shipping; ?></p>
                                </div>
                            </div>
                        
                        </div><!-- /.row -->
                        
                        <div class="pm-cart-totals-buttons">
                            <input type="submit" value="Update Cart" class="pm-rounded-submit-btn pm-primary" style="margin-bottom:0px;" />
                            <a href="checkout.php" class="pm-rounded-btn pm-primary" style="margin-bottom:0px;">Checkout</a>
                        </div>
                        
                    </div><!-- /.pm-cart-totals -->
                    
                </div><!-- /.col-lg-8 -->
                
            </div>
        </div>
        
        <!-- BODY CONTENT end -->
      <?php include_once "footer_sub_content.php"; ?>
        
      <?php include_once 'footer.php'; ?>