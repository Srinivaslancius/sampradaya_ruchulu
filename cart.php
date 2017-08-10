<?php include_once 'main_header.php'; ?>
                
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
                	
                    <div class="pm-cart-info-container">
                    	
                        <div class="row">
                        
                        	<div class="col-lg-12">
                            	<div class="pm-cart-info-title">
                               	  <h3>You have 1 item in your cart</h3>
                                </div>
                          	</div>
                        
                        	<div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column">
                       	    	<img src="img/store/item.jpg" width="50" height="50"> 
                            </div>
                            
                            <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column text">
                            	<a href="#">WOO SINGLE #1</a>
                            </div>
                            
                            <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column text">
                            	<p>Price: $9</p>
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
                            
                            <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column text">
                            	<p>Sub-Total: $9</p>
                            </div>
                            
                            <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column">
                            	<a href="#" class="pm-rounded-btn pm-primary pm-cart-remove">Remove</a>
                            </div>
                        
                        </div><!-- /.row -->
                        
                    </div><!-- /.pm-cart-info-container -->
                    
                </div><!-- /.col-lg-12 -->
            
            </div>
        </div>
        
        <div class="container pm-containerPadding-bottom-80">
        	<div class="row">
            	
                <div class="col-lg-4 col-md-4 col-sm-4">
                	
                    <div class="pm-cart-shipping-calculator">
                    
                    	<div class="pm-cart-shipping-calculator-title">
                        	<h3>Shipping Calculator</h3>
                        </div>
                        
                      <div class="pm-cart-shipping-calculator-fields">
                        	<select name="">
                        	  <option>United States (US)</option>
                        	  <option>Canada (CA)</option>
                        	</select>
                            <input name="" type="text" placeholder="Postal/Zip" class="pm-textfield">
                            <input type="submit" value="Calculate" class="pm-rounded-submit-btn pm-primary" style="margin-bottom:0px;" />
                        </div>
                    
                    </div>
                    
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
                                	<p>$9</p>
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
                                	<p>$7.99</p>
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
                                	<p>$16.99</p>
                                </div>
                            </div>
                        
                        </div><!-- /.row -->
                        
                        <div class="pm-cart-totals-buttons">
                        	<input type="submit" value="Update Cart" class="pm-rounded-submit-btn pm-primary" style="margin-bottom:0px;" />
                            <a href="checkout.html" class="pm-rounded-btn pm-primary" style="margin-bottom:0px;">Checkout</a>
                        </div>
                        
                    </div><!-- /.pm-cart-totals -->
                    
                </div><!-- /.col-lg-8 -->
                
            </div>
        </div>
        
        <!-- BODY CONTENT end -->
      <?php include_once "footer_sub_content.php"; ?>
        
      <?php include_once 'footer.php'; ?>