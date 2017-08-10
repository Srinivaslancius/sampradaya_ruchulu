<?php include_once 'main_header.php'; ?>
<?php $getContactData = getIndividualDetails('2',"content_pages","id");  
 ?>
                
        <!-- SUB-HEADER area -->
        <div class="pm-sub-header-container pm-parallax-panel" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
        	
            <div class="pm-sub-header-title-container">
            	<p class="pm-sub-header-title"><span>Contact Us</span></p>
                <p class="pm-sub-header-message">Need assistance? We're here to help.</p>
            </div>
            
        </div>
        
        <!-- SUB-HEADER area end -->
        
        <!-- BODY CONTENT starts here -->
        
        <div class="container pm-containerPadding-top-60 pm-containerPadding-bottom-60">
        	<div class="row">
                <div class="col-lg-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2886.610286532898!2d-79.38211079999994!3d43.65627589999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b34ca4e2d4c49%3A0x2f3acf786271e874!2s1+Dundas+St+W%2C+Toronto%2C+ON+M5G+1Z1!5e0!3m2!1sen!2sca!4v1405449927496" width="320" height="260" style="border:4px solid #e3e3e3;"></iframe>
                </div>
            </div>
        </div>
        
        <div class="container pm-containerPadding-bottom-60">
        	<div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 pm-column-spacing">
                
                      <h6><?php echo $getContactData['title']; ?></h6>
                    
                    <?php echo $getContactData['description']; ?>
                      
                      <div class="pm-divider" style="margin:20px 0;"></div>
                      
                      <h6>Telephone</h6>
                      <p><strong>Restaurant:</strong> <?php echo $getSiteSettingsData['mobile']; ?></p>
                      
                      <div class="pm-divider" style="margin:20px 0;"></div>
                      
                      <h6>Email</h6>
                      <p><a href="mailto:<?php echo $getSiteSettingsData['email']; ?>"><?php echo $getSiteSettingsData['email']; ?></a></p>
                      
                      <div class="pm-divider" style="margin:20px 0;"></div>
                      
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 pm-column-spacing">
                      
                    <h6 class="pm-primary">Send us a message</h6>
                    <div class="pm-contact-form-container">
                    	<p class="pm-required">Your email address will be held strictly confidential. <br />Required fields are marked *</p>
                    	<form id="pm-contact-form" action="#" method="post">
                            <input name="pm_s_full_name" id="pm_s_full_name" type="text" placeholder="Name *" class="pm-form-textfield">
                            <input name="pm_s_email_address" id="pm_s_email_address" type="text" placeholder="Email *" class="pm-form-textfield">
                            <input name="pm_s_subject" id="pm_s_subject" type="text" placeholder="Subject *" class="pm-form-textfield">
                            <textarea name="pm_s_message" id="pm_s_message" cols="20" rows="6" placeholder="Inquiry *" class="pm-form-textarea"></textarea>                            
                            <div id="pm-contact-form-response"></div>
                            <input name="pm-form-submit-btn" class="pm-rounded-submit-btn pm-primary" type="button" value="Submit" id="pm-contact-form-btn" />
                            <input type="hidden" name="pm_s_email_address_contact" value="info@pulsarmedia.ca" />
                        </form>
                    </div>
                      
                </div>
            </div>
        </div>
        
        <!-- BODY CONTENT end -->
        
        <div class="pm-fat-footer">
        	
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 pm-widget-footer">
                    	<img src="img/vienna-logo.png" class="img-responsive"> 
                        <p>
                        Vienna a premium restaurant theme designed for restaurant and bar owners. This theme features many practical elements such as a catering and event form, photo gallery, events system, blog system and a menu system. Vienna is also WordPress and Woocommerce ready and is designed on an 1170 grid for bootstrap 3.
                        </p>
                    </div>
                  
                 
                   
                </div>	
            </div>
            
        </div>
    <?php include_once 'footer.php'; ?>
