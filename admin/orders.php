            <?php include_once 'main_header.php'; ?>
           
            <?php include_once 'side_navigation.php';?>
            <style>
                .table1 {
                    display: table;
                    border: 1px solid #808080;
                    text-align: center;
                    border-top-left-radius: 3px;
                    border-top-right-radius: 3px;
                    padding: 0px;
                    margin-bottom: 0;
                }

                .table1-row {
                    display: table-row;
                }

                .table1-cell {
                    display: table-cell;
                    border-bottom: 1px solid #b2b2b2;
                    padding: 6px;
                }
                .table1-footer .table1-cell{
                    border-bottom: 0;
                    padding-top:25px;
                }
                .table1-header {
                    font-weight: bold;
                    background-color: #d8d8d8;
                }
            </style>

            <main class="mn-inner">
                <div class="row">
                    
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                 <!-- <a href="add_orders.php" style="float:right">Add Order</a> -->
                                <span class="card-title">Orders</span>
                                <?php $sql ="SELECT * from orders GROUP BY order_id";
                                    $res = $conn->query($sql);
                                    // $res1 = $res->fetch_array();
                                ?>
                                
                                    
                                    <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Order Id</th>
                                            <th>Mobile No</th>
                                            <th>Created Date</th>
                                            <th>Order Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($res1 = $res->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $res1['first_name'];?></td>
                                            <td><?php echo $res1['order_id'];?></td>
                                            <td><?php echo $res1['mobile'];?></td>
                                            <td><?php echo $res1['order_date'];?></td>
                                            <td><?php if ($res1['order_status']==1) { echo "Pending" ;} elseif($res1['order_status']==2) { echo "Completed" ;} else{ echo "Cancelled";}?></td>
                                            <td><a href="edit_orders.php?oid=<?php echo $res1['id'];?>"><i class="material-icons dp48">edit</i></a><a class="click_view" data-modalId="<?php echo $res1['id']?>" href="#"><i class="material-icons dp48">visibility</i></a>
                                            <div id="myModal_<?php echo $res1['id']; ?>" class="modal fade" >
                                            <div class="modal-dialog" Style="margin-top:10%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h3 class="modal-title"><b>Order Information</b></h3>
                                                    </div>
                                                    <div class="modal-body" >
                                                    
                                                        <h5 class="modal-title-set"><b>Name:</b><?php echo $res1['first_name'];?></h5>
                                                        <h5 class="modal-title-set"><b>Order Id :</b><?php echo $res1['order_id']."<br>"; ?></h5>
                                                        <h5 class="modal-title-set"><b>Mobile :</b><?php echo $res1['mobile']."<br>"; ?></h5>
                                                        <h5 class="modal-title-set"><b>Order Date :</b><?php echo $res1['order_date']."<br>"; ?></h5>
                                                        <h5 class="modal-title-set"><b>Email :</b><?php echo $res1['email']."<br>"; ?></h5>
                                                        <h5 class="modal-title-set"><b>Address :</b><?php echo $res1['address1']."<br>"; ?></h5>
                                                        <h5 class="modal-title-set"><b>Pin Code :</b><?php echo $res1['pin_code']."<br>"; ?></h5>
                                                        <h5 class="modal-title-set"><b>Status :</b><?php if ($res1['order_status']==1) { echo "Pending" ;} elseif($res1['order_status']==2) { echo "Completed" ;} else{ echo "Cancelled";}?></h5>
                                                        <div class="table1" style="width:100%">
                                                            <div class="table1-row table1-header">
                                                                <div class="table1-cell">Item Name</div>
                                                                <div class="table1-cell">Quantity</div>
                                                                <div class="table1-cell">Price</div>
                                                                <div class="table1-cell">Total</div>
                                                            </div>
                                                            <?php $proInfo = getAllDataWhere('orders','order_id',$res1['order_id']); ?>
                                                            <?php while($getAllProInfo = $proInfo->fetch_assoc()) { ?>
                                                            <div class="table1-row">
                                                                <div class="table1-cell"><?php echo $getAllProInfo['product_name']; ?></div>
                                                                <div class="table1-cell"><?php echo $getAllProInfo['product_quantity']; ?></div>
                                                                <div class="table1-cell"><?php echo $getAllProInfo['product_price']; ?></div>
                                                                <div class="table1-cell"><?php echo $getAllProInfo['product_total_price']; ?></div>
                                                            </div>
                                                            <?php } ?>
                                                            <div class="table1-row table1-footer">
                                                                <div class="table1-cell">Sub Total</div>
                                                                <div class="table1-cell"></div>
                                                                <div class="table1-cell"><?php echo $res1['cart_sub_total']; ?></div>                        
                                                                <div class="table1-cell"></div>
                                                            </div>  

                                                            <div class="table1-row table1-footer">
                                                                <div class="table1-cell">Shipping and Handling</div>
                                                                <div class="table1-cell"></div>
                                                                <div class="table1-cell"><?php echo $getSiteSettingsData['delivery_charges']; ?></div>                        
                                                                <div class="table1-cell"></div>
                                                            </div>

                                                            <div class="table1-row table1-footer">
                                                                <div class="table1-cell">Order Total</div>
                                                                <div class="table1-cell"></div>
                                                                <div class="table1-cell"><?php echo $res1['order_total']; ?></div>                        
                                                                <div class="table1-cell"></div>
                                                            </div>                                                         
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer" >
                                                        <button type="button" class="btn" data-dismiss="modal" style="background-color:#f00; color:#fff">Print</button>
                                                        <button type="button" class="btn" data-dismiss="modal" style="background-color:#f00; color:#fff">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        </tr>
                                         
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
         <?php include_once 'footer.php'; ?>
     