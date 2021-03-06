<?php include_once 'main_header.php'; ?>

<?php         
      if(isset($_SESSION['session_mobile']) && $_SESSION['session_mobile']!='') {
        $session_mobile = $_SESSION['session_mobile'];
      } else {
        $session_mobile = '0';
      }    
      $sql1="SELECT id,product_id,product_price,product_quantity,product_total_price,user_mobile from cart WHERE user_mobile='$session_mobile'";
      $res=$conn->query($sql1);

?>
        <form name="cart_form" method="post" action="update_cart.php">        
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
                    <?php if(isset($_GET['suc']) && $_GET['suc']!='') { 
                        echo "<p style='color:#32CD32; text-align:center'>Your cart items updated successfully</p>";
                    } ?>
                    <div class="pm-cart-info-container">

                        <div class="col-lg-12">
                            <div class="pm-cart-info-title">
                              <h3>You have <?php echo $res->num_rows;  ?> item in your cart</h3>
                            </div>
                        </div>
                        
                        <?php while($getProductsData = $res->fetch_assoc()) { 
                              $getProData =  getIndividualDetails($getProductsData['product_id'],'products','id');
                              $sub_total +=$getProductsData['product_total_price'];
                        ?>
                            <input type="hidden" name="cart_id[]" value="<?php echo $getProductsData['id']; ?>">
                            <input type="hidden" name="product_price[]" value="<?php echo $getProductsData['product_price']; ?>">


                            <div class="row">
                            
                                <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column">
                                    <img src="<?php echo $base_url . 'uploads/product_images/'.$getProData['product_image'] ?>" height="50" width="50" /> 
                                </div>
                                
                                <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column text">
                                    <a href="#"><?php echo $getProData['product_name']?></a>
                                </div>
                                
                                <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column text">
                                    <p>Price: &#2352; <?php echo $getProductsData['product_price']; ?></p>
                                </div>
                                
                                <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column quantity">
                                    <div class="quantity buttons_added pm-checkout-quantity">
                                        <input type="number" size="4" class="input-text qty cart text" title="Qty" value="<?php echo $getProductsData['product_quantity']; ?>" name="product_quantity[]" min="1" step="1" >                                                                                                
                                    </div><!-- quantity buttons end -->
                                </div>
                                
                                <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column text">
                                    <p>Sub-Total: &#2352; <?php echo $getProductsData['product_total_price']; ?></p>
                                </div>
                                
                                <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column">
                                    <a href="cart_delete.php?did=<?php echo $getProductsData['id']?>" class="pm-rounded-btn pm-primary pm-cart-remove" onclick="return confirm('Are you sure you want to remove item from cart?')">Remove</a>
                                </div>
                            
                            </div><!-- /.row -->
                        <?php } ?>
                        
                    </div><!-- /.pm-cart-info-container -->
                    <?php  } else { ?>
                       <p style="text-align:center"> No Items Found</p>
                       <p style="text-align:center"><a style="text-align:center" href="index.php">Click here for menu</a></p>
                    <?php } ?>
                    
                </div><!-- /.col-lg-12 -->
            
            </div>
        </div>
        
        <?php if ($res->num_rows > 0) { ?>
            <div class="container pm-containerPadding-bottom-80">
                <div class="row">
                    
                    
                    <div class="col-lg-12 col-md-12 col-sm-8">
                        
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
                                        <p class="pm-cart-totals-label">Delivery Charges</p>
                                    </div>
                                </div>
                                
                                <div class="col-lg-8 col-md-6 col-sm-6">
                                    <div class="pm-cart-totals-column">
                                        <p>&#2352; <?php echo $shipping=$getSiteSettingsData['delivery_charges']; ?></p>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="pm-cart-totals-column">
                                        <p class="pm-cart-totals-label">Packaging Charges</p>
                                    </div>
                                </div>
                                
                                <div class="col-lg-8 col-md-6 col-sm-6">
                                    <div class="pm-cart-totals-column">
                                        <p>&#2352; <?php echo $packaging=$getSiteSettingsData['packaging_charges']; ?></p>
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
                                        <p>&#2352; <?php echo $sub_total +$shipping +$packaging; ?></p>
                                    </div>
                                </div>
                            
                            </div><!-- /.row -->
                            
                            <div class="pm-cart-totals-buttons">
                                <input type="submit" name="submit" value="Update Cart" class="pm-rounded-submit-btn pm-primary" style="margin-bottom:0px;" />
                                <a href="checkout.php" class="pm-rounded-btn pm-primary" style="margin-bottom:0px;">Checkout</a>
                            </div>
                            
                        </div><!-- /.pm-cart-totals -->
                        
                    </div><!-- /.col-lg-8 -->
                    
                </div>
            </div>
        <?php } ?>
       </form>
        
    <?php include_once 'footer.php'; ?>