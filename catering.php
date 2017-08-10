<?php include_once 'main_header.php'; ?>
                
        <!-- SUB-HEADER area -->
        <div class="pm-sub-header-container pm-parallax-panel" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
        	
            <div class="pm-sub-header-title-container">
            	<p class="pm-sub-header-title"><span>Catering</span></p>
                <p class="pm-sub-header-message">Our food will be the talk of the party!</p>
            </div>
            
        </div>
        
        <!-- SUB-HEADER area end -->
        
        <!-- BODY CONTENT starts here -->
        
        <div class="container pm-containerPadding-top-60">
        	<div class="row">
            
            	<div class="col-lg-12">
                	
                    <h2>hosting an event?</h2>
                    
                    <p>Vienna can provide on-site catering for medium to large size parties and events. </p>
                    
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet purus consectetur, rhoncus urna eget, semper sapien. Integer vehicula, dolor gravida lobortis consectetur, lorem elit mollis magna, vitae rutrum velit nulla id dui. </p>
                    
                    <p>Morbi eu mattis justo, vitae porta orci. Sed et est a elit ultrices posuere. Fusce nibh enim, sollicitudin sed orci vitae, mollis elementum risus. Aliquam hendrerit, dui quis tincidunt ultrices, purus nisl aliquet enim, at eleifend nisi ante et justo.</p>
                    
                    <a href="#catering-form" class="pm-rounded-btn pm-primary pm-page-scroll">Fill out our catering form &nbsp;<i class="fa fa-angle-down"></i></a>
                    
                </div>
            
            </div>
        </div>
        
        <div class="container pm-containerPadding-top-60 pm-containerPadding-bottom-60" id="catering-form">
        	<div class="row">
            
            	<div class="col-lg-12 pm-column-spacing">
                	<h2>catering form</h2>
                    
                    <form action="#" method="post" id="pm-catering-form">
                    
                    	<div class="row">
                        
                        	<div class="col-lg-4 col-md-4 col-sm-4">
                            
                            	<input name="pm-first-name-field" class="pm-textfield" type="text" placeholder="First name *" id="catering-form-first-name">	
                                
                                <input name="pm-last-name-field" class="pm-textfield" type="text" placeholder="Last name *" id="catering-form-last-name">	
                                
                                <input name="pm-email-field" class="pm-textfield" type="text" placeholder="Email address *" id="catering-form-email-address">	
                            
                            </div><!-- /.col-lg-4 -->
                            
                            <div class="col-lg-4 col-md-4 col-sm-4">
                            
                            	<input name="pm-phone-field" class="pm-textfield" type="text" placeholder="Phone Number">	
                                
                                <select name="pm-event-inquiry-field" id="catering-form-event-type">
                                    <option value="default">Event Type *</option>
                                    <option value="Wedding">Wedding</option>
                                    <option value="Corporate">Corporate</option>
                                    <option value="School Function">School Function</option>
                                    <option value="Banquet">Banquet</option>
                                    <option value="Stag">Stag</option>
                                    <option value="Engagement">Engagement</option>
                                    <option value="Backyard party">Backyard party</option>
                                    <option value="Other">Other</option>
                                </select>
                                
                                <input name="pm-date-of-event-field" class="pm-textfield catering-form-datepicker" type="text" placeholder="Date of Event *" id="datepicker">
                            
                            </div><!-- /.col-lg-4 -->
                            
                            <div class="col-lg-4 col-md-4 col-sm-6">
                            	
                                <input name="pm-num-of-guests-field" class="pm-textfield" type="text" placeholder="Number of Guests (ex. 50-100) *" id="catering-form-guests-field">
                                
                                <input name="pm-event-location-field" class="pm-textfield" type="text" placeholder="Event Location *" id="catering-form-location-field">	
                                
                                <input name="pm-time-of-event-field" class="pm-textfield" type="text" placeholder="Time of Event (ex. 7:00pm - 9:00pm) *" id="catering-form-time-field">	
                                
                            </div>
                                                    
                        </div>
  
  						<div class="row">
                        
                        	<div class="col-lg-12">
                                <textarea name="pm-additional-info-field" cols="" rows="" placeholder="Additional Information" class="pm-form-textarea"></textarea>
                            </div>
                        
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                            	
                                <div class="pm_captcha_box">
                                    <p>Security Code:</p>
                                    <img src="js/ajax-cateringform/CaptchaSecurityImages.php?width=100&height=40&characters=5" /><br />
                                    <div style="width:96px;">
                                        <div style="padding-top:2px; width:86px;">
                                            <input class="pm_s_security_code pm-form-textfield" name="security_code" type="text" id="security_code" maxlength="5" />
                                        </div>
                                    </div>
                                </div>
                                <div id="pm-catering-form-response"></div>
                            
                                <input type="submit" class="pm-rounded-submit-btn pm-primary" value="send request" id="pm-catering-form-btn" />
                                
                                <input type="hidden" name="pm_event_email_address_contact" value="leo@pulsarmedia.ca" />
                                
                            </div>
                        </div>
                      
                    </form>
                    
                </div>
            
            </div>
        </div>
        
        <!-- BODY CONTENT end -->
        
       <?php include_once "footer_sub_content.php"; ?>
        
       <?php include_once 'footer.php'; ?>