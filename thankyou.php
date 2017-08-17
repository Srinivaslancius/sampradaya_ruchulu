<?php include_once 'main_header.php'; ?>

<?php         
      if(isset($_SESSION['session_mobile']) && $_SESSION['session_mobile']!='') {
        $session_mobile = $_SESSION['session_mobile'];
      } else {
        $session_mobile = '0';
      }    
      $sql1="SELECT id,product_id,product_price,product_quantity,product_total_price,user_mobile from cart WHERE user_mobile='$session_mobile'";
      $res=$conn->query($sql1);

?>
        <form name="cart_form" method="post" action="update_cart.php">        
        <!-- SUB-HEADER area -->
        <div class="pm-sub-header-container pm-parallax-panel" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
            
            <div class="pm-sub-header-title-container">
                <p class="pm-sub-header-title"><span>Thank You</span></p>
                <p class="pm-sub-header-message">Order Confirmation</p>
            </div>
            
        </div>
        
        <!-- SUB-HEADER area end -->
        
        <!-- BODY CONTENT starts here -->
        
        <div class="container pm-containerPadding-top-80 pm-containerPadding-bottom-40">
            <div class="row">
            
                <div class="container text-center">
                    <h1 style="font-weight:bold;">Thank YOU</h1>
                </div>
                <div class="container text-center" style="color:#008000; font-size:65px;">
                    <span class="glyphicon glyphicon glyphicon-ok"></span>
                </div>
                <div class="container text-center two">
                    <p> Your coupon is on its way to your email.But it first...</p>
                    <a href="#">Click here to book your appointment online instantly. It only takes a minute.</a>
                    <br><br>
                    <p> We can't wait to meet and your 'do!</p>
                </div>
            
            </div>
        </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <?php include_once 'footer.php'; ?>