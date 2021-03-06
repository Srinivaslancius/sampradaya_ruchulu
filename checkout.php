<?php include_once 'main_header.php';
    if (!isset($_POST['submit']))  {
            echo "";
        }
 ?>
<?php
    if($_SESSION['session_mobile'] == ''){
        header ("Location: logout.php");
    } 
?>    

<?php         
if(isset($_SESSION['session_mobile']) && $_SESSION['session_mobile']!='') {
$session_mobile = $_SESSION['session_mobile'];
} else {
$session_mobile = '0';
}    
$sql1="SELECT id,product_id,product_price,product_quantity,product_total_price,user_mobile from cart WHERE user_mobile='$session_mobile'";
$res=$conn->query($sql1);

$getUsersData =  getIndividualDetails($_SESSION['session_mobile'],'users','user_mobile');

if($getUsersData['user_name']!='') {  $user_name = $getUsersData['user_name'];  } else { $user_name = ''; } 
if(isset($getUsersData['user_email'])) { $user_email = $getUsersData['user_email']; } else { $user_email = ''; }
if(isset($getUsersData['town'])) { $town = $getUsersData['town']; } else { $town = ''; }
if(isset($getUsersData['pincode'])) { $pincode = $getUsersData['pincode']; }  else { $pincode = ''; }
if(isset($getUsersData['user_address'])) { $user_address = $getUsersData['user_address']; }  else { $user_address = ''; }

?>   
        <!-- SUB-HEADER area -->
        <div class="pm-sub-header-container pm-parallax-panel" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
            
            <div class="pm-sub-header-title-container">
                <p class="pm-sub-header-title"><span>Checkout</span></p>
                <p class="pm-sub-header-message">Almost done!</p>
            </div>
            
        </div>
        
        <!-- SUB-HEADER area end -->      
        
        <form method="post" action="save_orders.php" id="pm-event-form">
        
            <div class="container pm-containerPadding-bottom-40">
                <div class="row">
                
                    <div class="col-lg-12">
                        <div class="row">
                            <h3 class="pm-primary" style = "text-align:center;margin-top:10px">Billing Details</h3>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <?php
                                        $getLocations = getAllDataCheckActive('lkp_locations',0);
                                    ?>
                                <label for="pm-country-list">Location *</label>
                                <select name="location_name" required>
                                <option value="">Select Location</option>
                                    <?php while($row = $getLocations->fetch_assoc()) {  ?>
                                        <option value="<?php echo $row['location_name']; ?>"><?php echo $row['location_name']; ?></option>
                                    <?php } ?>
                                </select>
                              
                                <label for="pm-first-name-field">Name *</label>
                                <input name="name" class="pm-textfield" type="text" required value="<?php echo $user_name; ?>">

                                <label for="pm-phone-field">Phone *</label>
                                <input name="pm-phone-field" class="pm-textfield" type="text" maxlength="10"  pattern="[0-9]{10}" onkeypress="return isNumberKey(event)" required value="<?php echo $_SESSION['session_mobile'];?>">
                                    
                                <label for="pm-address-field">Address *</label>
                                <input name="pm-address-field" class="pm-textfield" type="text" required value="<?php echo $user_address; ?>">
                            </div>    
                            <div class="col-lg-6 col-md-6 col-sm-6">    
                                <label for="pm-town-field">Town / City *</label>
                                <input name="pm-town-field" class="pm-textfield" type="text" required value="<?php echo $town; ?>">
                                    
                                <!-- <label for="pm-zip-field">Zip *</label>
                                <input name="pm-zip-field" class="pm-textfield" type="text" required maxlength="6"  onkeypress="return isNumberKey(event)" value="<?php echo $pincode; ?>"> -->
                                    
                                <label for="pm-email-address-field">Email Address *</label>
                                <input name="pm-email-address-field" class="pm-textfield" type="text" required  value="<?php echo $user_email; ?>">
                             </div>   
                        </div>    
                        
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
                                 <?php $sub_total=0;  while($getProductsData = $res->fetch_assoc()) { 
                                  $getProData =  getIndividualDetails($getProductsData['product_id'],'products','id');
                                  $sub_total +=$getProductsData['product_total_price'];
                                ?>
                                <input type="hidden" name="product_id[]" value="<?php echo $getProductsData['product_id']; ?>">
                                <input type="hidden" name="product_price[]" value="<?php echo $getProductsData['product_price']; ?>">
                                <input type="hidden" name="product_name[]" value="<?php echo $getProData['product_name']; ?>">
                                <input type="hidden" name="product_total_price[]" value="<?php echo $getProductsData['product_total_price']; ?>">
                                <input type="hidden" name="product_quantity[]" value="<?php echo $getProductsData['product_quantity']; ?>">
                                <input type="hidden" name="cart_sub_total" value="<?php echo $sub_total; ?>">

                                <input type="hidden" name="delivery_charges" value="<?php echo $getSiteSettingsData['delivery_charges']; ?>">
                                <input type="hidden" name="packaging_charges" value="<?php echo $getSiteSettingsData['packaging_charges']; ?>">

                                <input type="hidden" name="order_total" value="<?php echo $sub_total + $getSiteSettingsData['delivery_charges']+$getSiteSettingsData['packaging_charges'] ?>">
                                
                                <p class="title"><?php echo $getProData['product_name']?> × <?php echo $getProductsData['product_quantity']; ?></p> <br />
                                <p class="price">&#2352; <?php echo $getProductsData['product_total_price']; ?></p><br />
                                <?php } ?>
                                </li>
                                
                                <li>
                                    <p class="label">Cart Sub-Total</p>
                                    <p class="price">&#2352; <?php echo $sub_total; ?></p>
                                </li>
                                <li>
                                    <p class="label">Delivery Charges</p>
                                    <p class="price">&#2352; <?php echo $shipping=$getSiteSettingsData['delivery_charges']; ?></p>
                                </li>
                                <li>
                                    <p class="label">Packaging Charges</p>
                                    <p class="price">&#2352; <?php echo $packaging=$getSiteSettingsData['packaging_charges']; ?></p>
                                </li>
                                <li>
                                    <p class="label">Order Total</p>
                                    <p class="price">&#2352; <?php echo $sub_total +$shipping +$packaging; ?></p>
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
                                    <input name="pm-selected-payment" type="radio" value="" checked="checked" required>
                                    <label for="direct-transfer">Cash On Delivery</label>
                                </li>
                            </ul>
                                                    
                            <div class="pm-clear-element">
                                <div class="pm-divider clearfix"></div>
                                <input name="submit" type="submit" value="process order" class="pm-rounded-submit-btn pm-primary" />
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        
        </form>
        
    <?php include_once 'footer.php'; ?>