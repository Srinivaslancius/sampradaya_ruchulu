<?php include_once 'main_header.php'; ?>
                
        <!-- SUB-HEADER area -->
        <div class="pm-sub-header-container pm-parallax-panel" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
        	
            <div class="pm-sub-header-title-container">
            	<p class="pm-sub-header-title"><span>Book an event</span></p>
                <p class="pm-sub-header-message">host your event with the best restaurant in town</p>
            </div>
            
        </div>
        
        <!-- SUB-HEADER area end -->
        
        <!-- BODY CONTENT starts here -->
        
        <div class="container pm-containerPadding-top-60">
        	<div class="row">
            
            	<div class="col-lg-12">
                	
                    <h2>planning a personal or business event?</h2>
                    
                    <p>Sampradaya Ruchulu can accomodate up to 50 people in our private dining area. </p>
                    
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet purus consectetur, rhoncus urna eget, semper sapien. Integer vehicula, dolor gravida lobortis consectetur, lorem elit mollis magna, vitae rutrum velit nulla id dui. </p>
                    
                    <p>Morbi eu mattis justo, vitae porta orci. Sed et est a elit ultrices posuere. Fusce nibh enim, sollicitudin sed orci vitae, mollis elementum risus. Aliquam hendrerit, dui quis tincidunt ultrices, purus nisl aliquet enim, at eleifend nisi ante et justo.</p>
                    
                    <a href="#catering-form" class="pm-rounded-btn pm-primary pm-page-scroll">Book your event now &nbsp;<i class="fa fa-angle-down"></i></a>
                    
                </div>
            
            </div>
        </div>
        
        <div class="container pm-containerPadding-top-60 pm-containerPadding-bottom-60" id="catering-form">
        	<div class="row">
            
            	<div class="col-lg-12 pm-column-spacing">
                	<h2>EVENT form</h2>
                    
                    <form action="#" method="post" id="pm-event-form">
                    
                    	<div class="row">
                        
                        	<div class="col-lg-4 col-md-4 col-sm-4">
                            
                            	<input name="pm-first-name-field" class="pm-textfield" type="text" placeholder="First name *" id="event-form-first-name">	
                                
                                <input name="pm-last-name-field" class="pm-textfield" type="text" placeholder="Last name *" id="event-form-last-name">	
                                
                                <input name="pm-email-field" class="pm-textfield" type="text" placeholder="Email address *" id="event-form-email-address">	
                            
                            </div><!-- /.col-lg-4 -->
                            
                            <div class="col-lg-4 col-md-4 col-sm-4">
                            
                            	<input name="pm-phone-field" class="pm-textfield" type="text" placeholder="Phone Number">	
                                
                                <select name="pm-event-inquiry-field" id="event-form-event-type">
                                    <option value="default">Event Type *</option>
                                    <option value="Corporate Party">Corporate Party</option>
                                    <option value="School Function">School Function</option>
                                    <option value="Engagement">Engagement</option>
                                    <option value="Baby Shower">Baby Shower</option>
                                    <option value="Birthday Party">Birthday Party</option>
                                    <option value="Social Gathering">Social Gathering</option>
                                    <option value="Other">Other</option>
                                </select>
                                
                                <input name="pm-date-of-event-field" class="pm-textfield event-form-datepicker" type="text" placeholder="Date of Event *" id="datepicker">	
                            
                            </div><!-- /.col-lg-4 -->
                            
                            <div class="col-lg-4 col-md-4 col-sm-6">
                            	
                                <input name="pm-num-of-guests-field" class="pm-textfield" type="text" placeholder="Number of Guests (Maximum of 50) *" id="event-form-guests-field">
                                                                
                                <input name="pm-time-of-event-field" class="pm-textfield" type="text" placeholder="Time of Event (ex. 7:00pm - 9:00pm) *" id="event-form-time-field">	
                                
                            </div>
                                                    
                        </div>
  
  						<div class="row">
                        
                        	<div class="col-lg-12">
                                <textarea name="pm-additional-info-field" cols="" rows="" placeholder="Additional Information" class="pm-form-textarea"></textarea>
                            </div>
                        
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">                            
                            	
                                <div id="pm-event-form-response"></div>
                            
                                 <input type="submit" class="pm-rounded-submit-btn pm-primary" value="send request" id="pm-event-form-btn" />
                            </div>
                        </div>
                        
                        <input type="hidden" name="pm_event_email_address_contact" value="info@pulsarmedia.ca" />
                      
                    </form>
                    
                </div>
            
            	
            
            </div>
        </div>
        
        <!-- BODY CONTENT end -->
        
        <?php include_once "footer_sub_content.php"; ?>
        
        <?php include_once 'footer.php'; ?>
