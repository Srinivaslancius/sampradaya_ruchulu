<?php include_once 'main_header.php'; error_reporting(0);?>

<?php         
 if($_SESSION['session_mobile'] == '') {
    header ("Location: logout.php");
}
$orderId = $_GET['odi'];
$sql ="SELECT * from `orders` WHERE order_id='$orderId'";
$res = $conn->query($sql);
$res1 = $res->fetch_array();
?>
              
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
                    <h3 style="color:green">Your order has been received</h3></strong>
                        <hr class="message-inner-separator">
                        <p>Thank you for your purchase</p>
                        <p>Your Order#is:<strong><?php echo $orderId; ?></strong></p>
                        <p>Billing&Shipping Information:</p>
                        <p><?php echo $res1['district']; ?></p>
                        <p><?php echo $res1['pin_code']; ?></p>
                </div>
                
            
            </div>
        </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <?php include_once 'footer.php'; ?>