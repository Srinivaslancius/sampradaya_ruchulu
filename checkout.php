<?php include_once 'main_header.php'; ?>
    <?php
        if($_SESSION['session_mobile'] == ''){
            header ("Location: logout.php");
        } 
    ?> 
    <?php 
        error_reporting(0);
        if (!isset($_POST['submit']))  {
                    echo "";
                } else  { 

            $first_name = $_POST['first_name'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
                       
            $sql = "INSERT INTO orders (`first_name`, `mobile`,`email`, `no_of_guests`, `catering_type_id`,`catering_time`,`catering_date`,`description`) VALUES ('$first_name','$mobile','$email','$no_of_guests','$catering_type_id','$catering_time','$catering_date','$description')";
            if($conn->query($sql) === TRUE){
               echo "<script>alert('Data Updated Successfully');window.location.href='catering.php';</script>";
            } else {
               echo "<script>alert('Data Updation Failed');window.location.href='catering.php';</script>";
            }
        }
<<<<<<< HEAD
    ?>
    
=======
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
?>   
>>>>>>> f4f6504524b22c32207b3764b0dcc324e97d2632
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
                
                        <div class="col-lg-12">
                                <h3 class="pm-primary" style = "text-align:center;margin-top:10px">Billing Details</h3>
                        </div>  
                        <div class="row">  
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <?php
                                        $getLocations = getAllDataCheckActive('lkp_locations',0);
                                    ?>
                                <label for="pm-country-list">Location *</label>
                                <select name="location_name" required>
                                    <option value="">Select Location</option>
                                            <?php while($row = $getLocations->fetch_assoc()) {  ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['location_name']; ?></option>
                                            <?php } ?>
                                    </select>
                              
                                <label for="pm-first-name-field">Name *</label>
                                <input name="first_name" class="pm-textfield" type="text" required>

                                <label for="mobile">Phone *</label>
                                <input name="mobile" class="pm-textfield" type="text" maxlength="10"  pattern="[0-9]{10}" onkeypress="return isNumberKey(event)" required value="<?php echo $_SESSION['session_mobile'];?>">
                                    
                                <label for="pm-address-field">Address *</label>
                                <input name="pm-address-field" class="pm-textfield" type="text" required>
                            </div>    
                            <div class="col-lg-6 col-md-6 col-sm-6">    
                                <label for="pm-town-field">Town / City *</label>
                                <input name="pm-town-field" class="pm-textfield" type="text" required>
                                    
                                <label for="pm-zip-field">Zip *</label>
                                <input name="pm-zip-field" class="pm-textfield" type="text" required maxlength="6"  pattern="[0-9]{10}" onkeypress="return isNumberKey(event)">
                                    
                                <label for="pm-email-address-field">Email Address *</label>
                                <input name="pm-email-address-field" class="pm-textfield" type="text" required>
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
                                
                                <p class="title"><?php echo $getProData['product_name']?> × <?php echo $getProductsData['product_quantity']; ?></p> <br />
                                <p class="price">&#2352; <?php echo $getProductsData['product_total_price']; ?></p><br />
                                <?php } ?>
                                </li>
                                
                                <li>
                                    <p class="label">Cart Sub-Total</p>
                                    <p class="price">&#2352; <?php echo $sub_total; ?></p>
                                </li>
                                <li>
                                    <p class="label">shipping and handling</p>
                                    <p class="price">&#2352; <?php echo $shipping=$getSiteSettingsData['delivery_charges']; ?></p>
                                </li>
                                <li>
                                    <p class="label">Order Total</p>
                                    <p class="price">&#2352; <?php echo $sub_total +$shipping; ?></p>
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
                                    <input name="pm-selected-payment[]" type="radio" value=""  required>
                                    <label for="direct-transfer">Cash and Delivery</label>
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