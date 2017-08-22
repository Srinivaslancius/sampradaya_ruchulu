<?php include_once 'main_header.php'; 
   
error_reporting(1);   
$statusMsg = '';
$msgClass = '';
    if(isset($_POST['submit'])){
        // Get the submitted form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $inquiry = $_POST['inquiry'];
        
        // Check whether submitted data is not empty
        if(!empty($email) && !empty($name) && !empty($subject) && !empty($inquiry)){
            
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                $statusMsg = 'Please enter your valid email.';
                $msgClass = 'errordiv';
            }else{
                // Recipient email
                $toEmail = '<?php echo $getSiteSettingsData["email"]; ?>';
                $emailSubject = 'Contact Request Submitted by '.$name;
                $htmlContent = '<h2>Contact Request Submitted</h2>
                    <h4>Name</h4><p>'.$name.'</p>
                    <h4>Email</h4><p>'.$email.'</p>
                    <h4>Subject</h4><p>'.$subject.'</p>
                    <h4>Message</h4><p>'.$inquiry.'</p>';
                
                // Set content-type header for sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                
                // Additional headers
                $headers .= 'From: '.$name.'<'.$email.'>'. "\r\n";
                
                // Send email
                if(mail($toEmail,$emailSubject,$htmlContent,$headers)){
                    $statusMsg = 'Your contact request has been submitted successfully !';
                    $msgClass = 'succdiv';
                }else{
                    $statusMsg = 'Your contact request submission failed, please try again.';
                    $msgClass = 'errordiv';
                }
            }
        }else{
            $statusMsg = 'Please fill all the fields.';
            $msgClass = 'errordiv';
        }
    }
?>
<?php $getContactData = getIndividualDetails('2',"content_pages","id"); 
  $address =$getContactData['description']; // Google HQ
  $prepAddr = str_replace(' ','+',$address);
  $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
  $output= json_decode($geocode);
  $latitude = $output->results[0]->geometry->location->lat;
  $longitude = $output->results[0]->geometry->location->lng;?>

      <!-- SUB-HEADER area -->
        <div class="pm-sub-header-container-contact pm-parallax-panel" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
        	
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
                    <div id="map" style="display:block; height: 350px;"></div>
                    <div id="message"><?php echo $getContactData['description']; ?></div>
                        <script src="http://maps.google.com/maps/api/js?key=AIzaSyA04qekzxWtnZq6KLkabMN_4abcJt9nCDk"
                                type="text/javascript"></script>
                        <script type="text/javascript">
                            var map;
                            var infowindow = new google.maps.InfoWindow({
                                content: document.getElementById('message')
                            });
                            function initialize() {
                                // Set static latitude, longitude value
                                var latlng = new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>);
                                // Set map options
                                var myOptions = {
                                    zoom: 16,
                                    center: latlng,
                                    panControl: true,
                                    zoomControl: true,
                                    scaleControl: true,
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                }
                                // Create map object with options
                                map = new google.maps.Map(document.getElementById("map"), myOptions);
                            <?php


                                    echo "addMarker(new google.maps.LatLng(".$latitude.", ".$longitude."), map);";
                            ?>
                            }
                            function addMarker(latLng, map) {
                                var marker = new google.maps.Marker({
                                    position: latLng,
                                    map: map,
                                    draggable: true, // enables drag & drop
                                    animation: google.maps.Animation.DROP
                                });
                                google.maps.event.addListener(marker, 'click', function() {
                                    infowindow.open(map, marker);
                                  });

                                return marker;
                            }
                            google.maps.event.addDomListener(window, 'load', initialize);
                        </script>
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
                    	<form action="#" method="post" id="pm-contact-form">
                            <input name="name" id="pm_s_full_name" type="text" placeholder="Name *" class="pm-form-textfield" required>
                            <input name="email" id="pm_s_email_address" type="email" placeholder="Email *" class="pm-form-textfield" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                            <input name="subject" id="pm_s_subject" type="text" placeholder="Subject *" class="pm-form-textfield" required>
                            <textarea name="inquiry" id="pm_s_message" cols="20" rows="6" placeholder="Inquiry *" class="pm-form-textarea" required></textarea>                            
                            <div id="pm-contact-form-response"></div>
                            <input name="submit" class="pm-rounded-submit-btn pm-primary" type="submit" value="Submit" id="pm-contact-form-btn" />
                            <input type="hidden" name="pm_s_email_address_contact" value="info@pulsarmedia.ca" />
                        </form>
                    </div>
                      
                </div>
            </div>
        </div>
        
        <!-- BODY CONTENT end -->
    <?php include_once "footer_sub_content.php"; ?>
    <?php include_once 'footer.php'; ?>
