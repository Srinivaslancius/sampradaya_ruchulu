<?php include_once 'main_header.php'; ?>

<?php         
      if(isset($_SESSION['session_mobile']) && $_SESSION['session_mobile']!='') {
        $session_mobile = $_SESSION['session_mobile'];
      } else {
        $session_mobile = '0';
      }    
      $sql ="SELECT * from orders where mobile='$session_mobile' group by order_id";
      $res = $conn->query($sql);

?>
<style>
        .table {
            display: table;
            border: 1px solid #808080;
            text-align: center;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            padding: 0px;
            margin-bottom: 0;
        }

        .table-row {
            display: table-row;
        }

        .table-cell {
            display: table-cell;
            border-bottom: 1px solid #b2b2b2;
            padding: 6px;
        }
        .table-footer .table-cell{
            border-bottom: 0;
            padding-top:10px;
        }
        .table-header {
            font-weight: bold;
            background-color: #d8d8d8;
        }
    </style>
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
                    <div class="">
                                               
                        <?php while($res1 = $res->fetch_assoc()) { ?>
                            
                            <div class="row">

                                <div class="table">
                                    <div class="table-row table-header">
                                        <div class="table-cell">Order Id</div>
                                        <div class="table-cell">Order Date</div>
                                        <div class="table-cell">Mobile Number</div>
                                        <div class="table-cell">View</div>
                                        
                                    </div>
                                    <div class="table-row table-footer">
                                        <div class="table-cell"><?php echo $res1['order_id'];?></div>
                                        <div class="table-cell"><?php echo $res1['order_date']; ?></div>
                                        <div class="table-cell"><?php echo $res1['mobile']; ?></div>
                                        <div class="table-cell"> <a class="click_view" data-modalId="<?php echo $res1['id']?>" href="#">View</a></div>
                                    </div>                                                
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2 pm-cart-info-column text">
                                   
                                </div>
                                <div id="myModal_<?php echo $res1['id']; ?>" class="modal fade" >
                                            <div class="modal-dialog" Style="margin-top:10%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <p class="modal-title" style="text-align:center; font-weight:bold;"><b>Order Information</b></p>
                                                    </div>
                                                    <div class="modal-body" >
                                                    <!-- Product Information -->
                                                        <div class="table">

                                                            <div class="table-row table-header">
                                                                <div class="table-cell">Shipping</div>
                                                                <div class="table-cell">Order Id</div>
                                                                <div class="table-cell">Order Status</div>
                                                                <div class="table-cell">Billing</div>
                                                            </div>
                                                            <div class="table-row table-footer">
                                                                <div class="table-cell"><?php echo $res1['first_name'];?></div>
                                                                <div class="table-cell"><?php echo $res1['order_id']; ?></div>
                                                                 <div class="table-cell"><?php if ($res1['order_status']==1) { echo "Pending" ;} elseif($res1['order_status']==2) { echo "Completed" ;} else{ echo "Cancelled";} ?></div>
                                                                <div class="table-cell"><?php echo $res1['first_name'];?></div>
                                                            </div>
                                                            <div class="table-row table-footer">
                                                                <div class="table-cell"><?php echo $res1['address1'];?></div>
                                                                <div class="table-cell"></div>
                                                                 <div class="table-cell"></div>
                                                                <div class="table-cell"><?php echo $res1['address1'];?></div>
                                                            </div>
                                                            <div class="table-row table-footer">
                                                                <div class="table-cell"><?php echo $res1['district'];?></div>
                                                                <div class="table-cell"></div>
                                                                 <div class="table-cell"></div>
                                                                <div class="table-cell"><?php echo $res1['district'];?></div>
                                                            </div>
                                                            <div class="table-row table-footer">
                                                                <div class="table-cell"><?php echo $res1['pin_code'];?></div>
                                                                <div class="table-cell"></div>
                                                                 <div class="table-cell"></div>
                                                                <div class="table-cell"><?php echo $res1['pin_code'];?></div>
                                                            </div>

                                                            <div class="table-row" style=" background-color: #DCDCDC;font-weight:bold; font-size:15px;">
                                                                <div class="table-cell">Item Name</div>
                                                                <div class="table-cell">Quantity</div>
                                                                <div class="table-cell">Price</div>
                                                                <div class="table-cell">Total</div>
                                                            </div>
                                                            <?php $proInfo = getAllDataWhere('orders','order_id',$res1['order_id']); ?>
                                                            <?php while($getAllProInfo = $proInfo->fetch_assoc()) { ?>
                                                            <div class="table-row">
                                                                <div class="table-cell"><?php echo $getAllProInfo['product_name']; ?></div>
                                                                <div class="table-cell"><?php echo $getAllProInfo['product_quantity']; ?></div>
                                                                <div class="table-cell"><?php echo $getAllProInfo['product_price']; ?></div>
                                                                <div class="table-cell"><?php echo $getAllProInfo['product_total_price']; ?></div>
                                                            </div>
                                                            <?php } ?>
                                                            <div class="table-row table-header">
                                                                <div class="table-cell"></div>
                                                                <div class="table-cell">Order Total</div>
                                                                <div class="table-cell"></div>
                                                                <div class="table-cell"></div>
                                                            </div>
                                                            <div class="table-row table-footer">
                                                                <div class="table-cell">Sub Total</div>
                                                                <div class="table-cell"></div>
                                                                <div class="table-cell"><?php echo $res1['cart_sub_total']; ?></div>                        
                                                                <div class="table-cell"></div>
                                                            </div>  

                                                            <div class="table-row table-footer">
                                                                <div class="table-cell">Delivery Charges</div>
                                                                <div class="table-cell"></div>
                                                                <div class="table-cell"><?php echo $getSiteSettingsData['delivery_charges']; ?></div>                        
                                                                <div class="table-cell"></div>
                                                            </div>

                                                            <div class="table-row table-footer">
                                                                <div class="table-cell">Packaging Charges</div>
                                                                <div class="table-cell"></div>
                                                                <div class="table-cell"><?php echo $getSiteSettingsData['packaging_charges']; ?></div>                        
                                                                <div class="table-cell"></div>
                                                            </div>

                                                            <div class="table-row table-footer">
                                                                <div class="table-cell">Order Total</div>
                                                                <div class="table-cell"></div>
                                                                <div class="table-cell"><?php echo $res1['order_total']; ?></div>                        
                                                                <div class="table-cell"></div>
                                                            </div>                                                         
                                                        </div>
                                                        <!-- End Product Information -->
                                                    </div>
                                                    <div class="modal-footer" >
                                                        <!-- <button type="button" class="btn" data-dismiss="modal" style="background-color:#f00; color:#fff">Print</button> -->
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