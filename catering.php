<?php include_once 'main_header.php'; 
    
    error_reporting(0);
if (!isset($_POST['submit']))  {
            echo "";
        } else  { 

    $first_name = $_POST['first_name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $no_of_guests = $_POST['no_of_guests'];
    $catering_type_id = $_POST['catering_type_id'];
    $catering_time = $_POST['event_time'];
    $catering_date = date("Y-m-d h:i:s");
    $description = $_POST['description'];
   
    $sql = "INSERT INTO book_an_catering (`first_name`, `mobile`,`email`, `no_of_guests`, `catering_type_id`,`catering_time`,`catering_date`,`description`) VALUES ('$first_name','$mobile','$email','$no_of_guests','$catering_type_id','$catering_time','$catering_date','$description')";
    if($conn->query($sql) === TRUE){
       echo "<script>alert('Data Updated Successfully');window.location.href='catering.php';</script>";
    } else {
       echo "<script>alert('Data Updation Failed');window.location.href='catering.php';</script>";
    }
}
?>        
<?php $getAboutData = getIndividualDetails('1',"content_pages","id");  ?>       
<!-- SUB-HEADER area -->
<div class="pm-sub-header-container pm-parallax-panel" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
    
    <div class="pm-sub-header-title-container">
        <p class="pm-sub-header-title"><span>Book Catering</span></p>
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
                
                <?php echo $getAboutData['description']; ?>
                
                <a href="#catering-form" class="pm-rounded-btn pm-primary pm-page-scroll">Book &nbsp;<i class="fa fa-angle-down"></i></a>
                
            </div>
        
        </div>
    </div>

    <div class="container pm-containerPadding-top-60 pm-containerPadding-bottom-60" id="catering-form">
        <div class="row">
        
            <div class="col-lg-12 pm-column-spacing">
                <h2>CATERING form</h2>
                
                <form action="#" method="post" id="pm-event-form">
                
                    <div class="row">
                    
                        <div class="col-lg-4 col-md-4 col-sm-4">
                        
                            <input name="first_name" class="pm-textfield" type="text" placeholder="Name *" id="event-form-first-name" required> 
                                
                            <input name="email" class="pm-textfield" type="email" placeholder="Email address *" id="event-form-email-address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required> 

                            <input name="mobile" class="pm-textfield" type="text" placeholder="Phone Number" required maxlength="10" pattern="[0-9]{10}" onkeypress="return isNumberKey(event)">
                        
                        </div><!-- /.col-lg-4 -->
                        
                        <div class="col-lg-4 col-md-4 col-sm-4">
                        
                            <?php
                                $getCaterings = getAllDataCheckActive('catering_types',0);
                            ?>
                            <select name="catering_type_id" required>
                                    <option value="">Select Catering</option>
                                    <?php while($row = $getCaterings->fetch_assoc()) {  ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['catering_type']; ?></option>
                                    <?php } ?>
                            </select>
                            
                            <input name="catering_date" class="pm-textfield event-form-datepicker" type="text" placeholder="Date of Catering *" id="datepicker" required>

                            <input name="no_of_guests" class="pm-textfield" type="text" placeholder="Number of Guests (Maximum of 50) *" id="event-form-guests-field" onkeypress="return isNumberKey(event)" required> 
                        
                        </div><!-- /.col-lg-4 -->
                        
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            
                            <input name="catering_time" class="pm-textfield" type="text" placeholder="Time of Catering (ex. 7:00pm - 9:00pm) *" id="event-form-time-field" required>  
                            
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
