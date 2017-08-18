<?php include_once 'main_header.php'; ?>

<?php         
      if(isset($_SESSION['session_mobile']) && $_SESSION['session_mobile']!='') {
        $session_mobile = $_SESSION['session_mobile'];
      } else {
        $session_mobile = '0';
      }    
      $sql ="SELECT * from orders GROUP BY order_id";
      $res = $conn->query($sql);

?>
        <form name="cart_form" method="post" action="update_cart.php">        
        <!-- SUB-HEADER area -->
        <div class="pm-sub-header-container pm-parallax-panel" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
            
            <div class="pm-sub-header-title-container">
                <p class="pm-sub-header-title"><span>Shopping cart</span></p>
                <p class="pm-sub-header-message">Ready to checkout?</p>
            </div>
            
        </div>
        
        <!-- SUB-HEADER area end -->
        
        <!-- BODY CONTENT starts here -->
        
        <div class="container pm-containerPadding-top-80 pm-containerPadding-bottom-40">
            <div class="row">
            
                <div class="col-lg-12">
                    <div class="pm-cart-info-container">
                        
                        <!-- <div class="col-lg-12">
                            <div class="pm-cart-info-title">
                              <h3>You have <?php echo $res->num_rows;  ?> item in your cart</h3>
                            </div>
                        </div> -->
                        
                        <?php while($res1 = $res->fetch_assoc()) { ?>
                            
                            <div class="row">
                                                
                                <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column text">
                                    <p><?php echo $res1['first_name']?></p>
                                </div>
                                
                                <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column text">
                                    <p><?php echo $res1['order_id']; ?></p>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column text">
                                    <p><?php echo $res1['mobile']; ?></p>
                                </div>
                                
                                                            
                            </div><!-- /.row -->
                        <?php } ?>
                        
                    </div><!-- /.pm-cart-info-container -->
                                        
                </div><!-- /.col-lg-12 -->
            
            </div>
        </div>
        
       </form>
        
    <?php include_once 'footer.php'; ?>