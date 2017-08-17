            <?php include_once 'main_header.php'; ?>
           
            <?php include_once 'side_navigation.php';?>

            <main class="mn-inner">
                <div class="row">
                    
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                 <!-- <a href="add_orders.php" style="float:right">Add Order</a> -->
                                <span class="card-title">Orders</span>
                                <?php $getData = getAllData('orders');?>
                                
                                    
                                    <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>Mobile No</th>
                                            <th>Created Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = $getData->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $row['mobile'];?></td>
                                            <td><?php echo $row['order_date'];?></td>
                                            <td><?php if ($row['order_status']==0) { echo "Active" ;} else{ echo "In Active" ;}?></td>
                                            <td><a href="edit_orders.php?oid=<?php echo $row['id'];?>"><i class="material-icons dp48">edit</i></a><a class="click_view" data-modalId="<?php echo $row['id']?>" href="#"><i class="material-icons dp48">visibility</i></a>
                                            <div id="myModal_<?php echo $row['id']; ?>" class="modal fade" >
                                            <div class="modal-dialog" Style="margin-top:10%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h3 class="modal-title"><b>User Information</b></h3>
                                                    </div>
                                                    <div class="modal-body" >
                                                        <h5 class="modal-title-set"><b>Mobile :</b><?php echo $row['mobile'];?></h5>
                                                        <h5 class="modal-title-set"><b>Created Date :</b><?php echo $row['order_date']."<br>"; ?></h5>
                                                        <h5 class="modal-title-set"><b>Status :</b><?php if ($row['order_status']==0){echo 'Active';} else {echo  'InActive';}?></h5>
                                                    </div>
                                                    <div class="modal-footer" >
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
     