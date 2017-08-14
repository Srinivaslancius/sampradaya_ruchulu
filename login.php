<?php include_once 'main_header.php'; ?>
<!-- SUB-HEADER area -->
<?php if (!isset($_POST['submit']))  { 
		} else { 
			$mobile = $_POST['mobile'];
			$sql = "INSERT INTO users ( `user_mobile`) VALUES ('$mobile')";
		    if($conn->query($sql) === TRUE){
		    	$_SESSION['session_mobile'] = $mobile;
		       echo "<script>alert('Data Updated Successfully');window.location.href='index.php';</script>";
		    } else {
		       echo "<script>alert('Data Updation Failed');window.location.href='login.php';</script>";
		    }
		} ?>
        <div class="pm-sub-header-container pm-parallax-panel" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
        	
            <div class="pm-sub-header-title-container">
            	<p class="pm-sub-header-title"><span>Login</span></p>
                
            </div>
            
        </div>
        
        <!-- SUB-HEADER area end -->
      
<div class="container pm-containerPadding-top-60 pm-containerPadding-bottom-60" id="catering-form">
        	<div class="row">
            
            	<div class="col-lg-12 pm-column-spacing">
                	<h2>Login form</h2>
                    
                    <form action="#" method="post" id="pm-event-form">
                    
                    	<div class="row">
                        
                        	<div class="col-lg-4 col-md-4 col-sm-4">                       

                                <input name="mobile" class="pm-textfield" type="text" placeholder="Phone Number" required maxlength="10" pattern="[0-9]{10}" onkeypress="return isNumberKey(event)">
                            
                            </div><!-- /.col-lg-4 -->
                            
                            
                        
                        <div class="row">
                            <div class="col-lg-12">                            
                            	
                                <div id="pm-event-form-response"></div>
                            
                                 <input type="submit" name="submit" class="pm-rounded-submit-btn pm-primary" value="login" id="pm-event-form-btn" />
                            </div>
                        </div>
                        
                        <input type="hidden" name="pm_event_email_address_contact" value="info@pulsarmedia.ca" />
                      
                    </form>
                    
                </div>
            
            	
            
            </div>
        </div>
    </div>
        <?php include_once 'footer.php'; ?>
         <script type="text/javascript">
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
        </script>