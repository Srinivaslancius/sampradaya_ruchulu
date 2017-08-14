<?php include_once 'main_header.php'; 
    
    error_reporting(0);
if (!isset($_POST['submit']))  {
            echo "";
        } else  { 

    $first_name = $_POST['first_name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $no_of_guests = $_POST['no_of_guests'];
    $event_type_id = $_POST['event_type_id'];
    $event_time = $_POST['event_time'];
    $event_date = date("Y-m-d h:i:s");
    $description = $_POST['description'];
   
    $sql = "INSERT INTO book_an_event (`first_name`, `mobile`,`email`, `no_of_guests`, `event_type_id`,`event_time`,`event_date`,`description`) VALUES ('$first_name','$mobile','$email','$no_of_guests','$event_type_id','$event_time','$event_date','$description')";
    if($conn->query($sql) === TRUE){
       echo "<script>alert('Data Updated Successfully');window.location.href='book-an-event.php';</script>";
    } else {
       echo "<script>alert('Data Updation Failed');window.location.href='book-an-event.php';</script>";
    }
}
?>            
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
                            
                            	<input name="first_name" class="pm-textfield" type="text" placeholder="Name *" id="event-form-first-name" required>	
                                	
                                <input name="email" class="pm-textfield" type="email" placeholder="Email address *" id="event-form-email-address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>	

                                <input name="mobile" class="pm-textfield" type="text" placeholder="Phone Number" required maxlength="10" pattern="[0-9]{10}" onkeypress="return isNumberKey(event)">
                            
                            </div><!-- /.col-lg-4 -->
                            
                            <div class="col-lg-4 col-md-4 col-sm-4">
                            
                            	<?php
                                    $getEvents = getAllDataCheckActive('event_types',0);
                                ?>
                                <select name="event_type_id" required>
                                        <option value="">Select Event</option>
                                        <?php while($row = $getEvents->fetch_assoc()) {  ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['event_type']; ?></option>
                                        <?php } ?>
                                </select>
                                
                                <input name="event_date" class="pm-textfield event-form-datepicker" type="text" placeholder="Date of Event *" id="datepicker" required>

                                <input name="no_of_guests" class="pm-textfield" type="text" placeholder="Number of Guests (Maximum of 50) *" id="event-form-guests-field" required>	
                            
                            </div><!-- /.col-lg-4 -->
                            
                            <div class="col-lg-4 col-md-4 col-sm-6">
                            	
                                <input name="event_time" class="pm-textfield" type="text" placeholder="Time of Event (ex. 7:00pm - 9:00pm) *" id="event-form-time-field" required>	
                                
                            </div>
                                                    
                        </div>
  
  						<div class="row">
                        
                        	<div class="col-lg-12">
                                <textarea name="description" cols="" rows="" placeholder="Additional Information" class="pm-form-textarea" required></textarea>
                            </div>
                        
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">                            
                            	
                                <div id="pm-event-form-response"></div>
                            
                                 <input type="submit" name="submit" class="pm-rounded-submit-btn pm-primary" value="send request" id="pm-event-form-btn" />
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
        <!--Script allowed only numeric value-->
        <script type="text/javascript">
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
        </script>
