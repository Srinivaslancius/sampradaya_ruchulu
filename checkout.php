<?php include_once 'main_header.php'; ?>
                
        <!-- SUB-HEADER area -->
        <div class="pm-sub-header-container pm-parallax-panel" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
            
            <div class="pm-sub-header-title-container">
                <p class="pm-sub-header-title"><span>Checkout</span></p>
                <p class="pm-sub-header-message">Almost done!</p>
            </div>
            
        </div>
        
        <!-- SUB-HEADER area end -->      
        
        <form action="post">
        
            <div class="container pm-containerPadding-bottom-40">
                <div class="row">
                
                    <div class="col-lg-6">
                    
                        <h3 class="pm-primary">Billing Details</h3>
                                                                    
                      <label for="pm-country-list">Location *</label>
                        <select name="pm-country-list">
                          <option>Canada</option>
                          <option selected>United States (US)</option>
                        </select>
                        
                      <label for="pm-first-name-field">First Name *</label>
                        <input name="pm-first-name-field" class="pm-textfield" type="text">
                        
                      <label for="pm-last-name-field">Last Name *</label>
                        <input name="pm-last-name-field" class="pm-textfield" type="text">
                        
                      <label for="pm-company-name-field">Company Name</label>
                        <input name="pm-company-name-field" class="pm-textfield" type="text">
                        
                      <label for="pm-address-field">Address *</label>
                        <input name="pm-address-field" class="pm-textfield" type="text">
                        
                      <label for="pm-town-field">Town / City *</label>
                        <input name="pm-town-field" class="pm-textfield" type="text">
                        
                        <label for="pm-state-list">State *</label>
                        <select name="pm-state-list">
                          <option>San Francisco</option>
                          <option selected>New York</option>
                        </select>
                        
                      <label for="pm-zip-field">Zip *</label>
                        <input name="pm-zip-field" class="pm-textfield" type="text">
                        
                      <label for="pm-email-address-field">Email Address *</label>
                        <input name="pm-email-address-field" class="pm-textfield" type="text">
                        
                      <label for="pm-phone-field">Phone *</label>
                        <input name="pm-phone-field" class="pm-textfield" type="text">
                  
                                                
                  </div>
                
                </div>
            </div>
            
            <div class="container">
                <div class="row">
                
                    <div class="col-lg-6">
                    
                        <h3 class="pm-primary">Order Summary</h3>
                        
                        <div class="pm-order-summary-container">
                            
                            <ul class="pm-order-summary">
                                <li>
                                    <p class="title">Woo Single × 1</p>
                                    <p class="price">$9</p>
                                </li>
                                <li>
                                    <p class="label">Cart Sub-Total</p>
                                    <p class="price">$9</p>
                                </li>
                                <li>
                                    <p class="label">Order Total</p>
                                    <p class="price">$9</p>
                                </li>
                            </ul>
                                                        
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <div class="container pm-containerPadding-bottom-60">
                <div class="row">
                    <div class="col-lg-6">
                    
                        <h3 class="pm-primary">Payment Method</h3>
                        
                        <div class="pm-payment-option-container">
                        
                            <ul class="pm-payment-options">
                                <li>
                                    <input name="pm-selected-payment[]" type="radio" value="">
                                    <label for="direct-transfer">Direct Transfer</label>
                                </li>
                                <li>
                                    <input name="pm-selected-payment[]" type="radio" value="">
                                    <label for="direct-transfer">Cheque Draft</label>
                                </li>
                                <li>
                                    <input name="pm-selected-payment[]" type="radio" value="">
                                    <label for="direct-transfer">PayPal</label>
                                </li>
                            </ul>
                                                    
                            <div class="pm-clear-element">
                                <div class="pm-divider clearfix"></div>
                                <input name="" type="button" value="process order" class="pm-rounded-submit-btn pm-primary" />
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        
        </form>
        
    <?php include_once 'footer.php'; ?>