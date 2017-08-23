       <footer style="background:#920000">
        
            <div class="container">
                <div class="row">
                    
                   <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="pm-footer-social-info-container">
                            <h4 style="color:#fff">Follow us </h4>
                            <ul class="pm-footer-social-icons">
                                <li title="Facebook" class="pm_tip_static_top"><a href="<?php echo $getSiteSettingsData['fb_link']; ?>"  target="_blank"><i class="fa fa-facebook fb"></i></a></li>
                                <li title="Instagram" class="pm_tip_static_top"><a href="<?php echo $getSiteSettingsData['twitter_link']; ?>"  target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li title="Youtube" class="pm_tip_static_top"><a href="<?php echo $getSiteSettingsData['gplus_link']; ?>"  target="_blank"><i class="fa fa-youtube"></i></a></li>
                                
                            </ul>
                        </div>
                        
                   </div>
                    
                </div>
            </div>  

                
        </footer>                
    
    </div><!-- /pm_layout-wrapper -->
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/jquery.viewport.mini.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="bootstrap3/js/bootstrap.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="js/owl-carousel/owl.carousel.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery.tooltip.js"></script>
    <script src="js/jquery.hoverPanel.js"></script>
    <script src="js/superfish/superfish.js"></script>
    <script src="js/superfish/hoverIntent.js"></script>
    <script src="js/tinynav.js"></script>
    <script src="js/stellar/jquery.stellar.js"></script>
    <script src="js/countdown/countdown.js"></script>
    <script src="js/theme-color-selector/theme-color-selector.js"></script>
    <script src="js/wow/wow.min.js"></script>
    <script src="js/prettyphoto/js/prettyPhoto.js"></script>
    <script src="js/jquery-migrate-1.1.1.js"></script>
    <script src="js/pulse/jquery.PMSlider.js"></script>        
    <p id="back-top" class="visible-lg visible-md visible-sm"> </p>

    <script type="text/javascript">
    $(".pay_now_cart").click(function(){
       
     var product_id = $(this).attr('data-product-id');
     var product_price=$(this).attr('data-product-price');     

     $.ajax({
          type:"post",
          url:"savecart.php",
          data:"product_id="+product_id+"&product_price="+product_price,              
          success:function(result){      
            if(result == 0) {
                alert("Your Item Failed");
            } 
            window.location.href = "cart.php";
          }

        });
     
    });

    //check login functionlaity
    $(".check_login").click(function(){
      if($('#verify_mobile').val()==''){
        alert("Please Enter Valid Mobile Number");
        return false;
      } else {
        $('.send_opt_div').hide();
        var mobile = $('#verify_mobile').val();        
        $.ajax({
            type:"post",
            url:"save_otp.php",
            data:"mobile="+mobile,              
            success:function(result){              
              if(result!='') {
                $('.verify_opt_div').show();
                $('.show_msg').html("Check Your Mobile For The OTP");
              }
            }
        });
        
      }        
    }); 
    $(".verify_opt_mobile").click(function(){
       var mobile = $('#verify_mobile').val();
       var otp = $('#verify_otp').val();
          if(otp!='') {
            $.ajax({
            type:"post",
            url:"verify_otp.php",
            data:"mobile="+mobile+"&otp="+otp,              
            success:function(result){          
              if(result == 1) {
                  $('.show_msg').html("OTP Verified");
                  $(".show_msg").css("color","#32CD32");
                  $.ajax({
                    type: "POST",
                    data:"mobile="+mobile+"&otp="+otp,
                    url: 'update_verify_user.php',
                    success: function(data){
                        window.location.href = "index.php";
                    }
                });
              } else {
                $('#verify_otp').val('');
                $('.show_msg').html("Your Entered Invalid OTP!");
                $(".show_msg").css("color","#ff0000");
                return false;
              }
              //window.location.href = "index.php";
            }

          });
        } else {
          alert("Please Enter Valid OTP");
          return false;
        }
        

    }); 

     function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    
    </script>
    
  </body>
</html>