<?php include_once 'main_header.php'; ?>

<?php         
      if(isset($_SESSION['session_mobile']) && $_SESSION['session_mobile']!='') {
        $session_mobile = $_SESSION['session_mobile'];
      } else {
        $session_mobile = '0';
      }    
      $sql ="SELECT * from orders group by order_id";
      $res = $conn->query($sql);

?>
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
                                               
                        <?php while($res1 = $res->fetch_assoc()) { ?>
                            
                            <div class="row">
                                                
                                <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column text">
                                    <p>Name :<?php echo $res1['first_name']?></p>
                                </div>
                                
                                <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column text">
                                    <p>Order Id :<?php echo $res1['order_id']; ?></p>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column text">
                                    <p>Mobile no :<?php echo $res1['mobile']; ?></p>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column text">
                                    <a class="click_view" data-modalId="<?php echo $res1['id']?>" href="#">View</a>
                                </div>
                                <div id="myModal_<?php echo $res1['id']; ?>" class="modal fade" >
                                            <div class="modal-dialog" Style="margin-top:10%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <p class="modal-title" style="text-align:center; font-weight:bold;"><b>Order Information</b></p>
                                                    </div>
                                                    <div class="modal-body" >
                                                    
                                                        <p class="modal-title-set"><b>Name:</b><?php echo $res1['first_name'];?></p>
                                                        <p class="modal-title-set"><b>Order Id :</b><?php echo $res1['order_id']."<br>"; ?></p>
                                                        <p class="modal-title-set"><b>Mobile :</b><?php echo $res1['mobile']."<br>"; ?></p>
                                                        <p class="modal-title-set"><b>Order Date :</b><?php echo $res1['order_date']."<br>"; ?></p>
                                                        <p class="modal-title-set"><b>Email :</b><?php echo $res1['email']."<br>"; ?></p>
                                                        <p class="modal-title-set"><b>Address :</b><?php echo $res1['address1']."<br>"; ?></p>
                                                        <p class="modal-title-set"><b>Pin Code :</b><?php echo $res1['pin_code']."<br>"; ?></p>
                                                        <p class="modal-title-set"><b>Status :</b><?php if ($res1['order_status']==1) { echo "Pending" ;} elseif($res1['order_status']==2) { echo "Completed" ;} else{ echo "Cancelled";}?></p>
                                                    <p style="text-align:center; font-weight:bold;">Product Information</p>
                                                    <?php $proInfo = getAllDataWhere('orders','order_id',$res1['order_id']); ?>
                                                    <?php while($getAllProInfo = $proInfo->fetch_assoc()) { ?>
                                                    <p> <?php echo $getAllProInfo['product_name']; ?> - <?php echo $getAllProInfo['product_quantity']; ?> - <?php echo $getAllProInfo['product_price']; ?>- <?php echo $getAllProInfo['product_total_price']; ?></p>
                                                    <?php } ?>
                                                    <p>Sub Total : <?php echo $res1['cart_sub_total']."<br>"; ?></p>
                                                    <p>Shipping and Handling : <?php echo $getSiteSettingsData['delivery_charges']."<br>"; ?></p>
                                                    <p>Order Total : <?php echo $res1['order_total']."<br>"; ?></p>
                                                    </div>
                                                    <div class="modal-footer" >
                                                          <button type="button" class="btn" data-dismiss="modal" style="background-color:#f00; color:#fff">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                
                                                            
                            </div><!-- /.row -->
                        <?php } ?>
                        
                    </div><!-- /.pm-cart-info-container -->
                                        
                </div><!-- /.col-lg-12 -->
            
            </div>
        </div>
        
    <?php include_once 'footer.php'; ?>
    <!-- model pop-up Script for all pages with bootstrap js -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".click_view").click(function(){
                    var modalId = $(this).attr('data-modalId');
                    $("#myModal_"+modalId).modal('show');  
                });                  
            });
        </script>