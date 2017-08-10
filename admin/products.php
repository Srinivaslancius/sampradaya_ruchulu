            <?php include_once 'main_header.php'; ?>
           
            <?php include_once 'side_navigation.php';?>

            <main class="mn-inner">
                <div class="row">
                    
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                 <a href="add_products.php" style="float:right">Add Product</a>
                                <span class="card-title">Products</span>
                                <?php $getData = getAllDataWithActiveRecent('products'); $i=1; ?>
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Product Name</th>
                                            <th>Product Price</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php while ($row = $getData->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row['product_name'];?></td>
                                            <td><?php echo $row['product_price'];?></td>
                                            <td><?php if ($row['status']==1) { echo "Active" ;} else{ echo "In Active" ;}?></td>
                                            <td><a href="edit_products.php?pid=<?php echo $row['id']; ?>"><i class="material-icons dp48">edit</i></a><a class="click_view" data-modalId="<?php echo $row['id']?>" href="#"><i class="material-icons dp48">visibility</i></a>
                                            <div id="myModal_<?php echo $row['id']; ?>" class="modal fade" >
                                            <div class="modal-dialog" Style="margin-top:10%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h3 class="modal-title"><b>Product Information</b></h3>
                                                    </div>
                                                    <div class="modal-body" >
                                                        <h5 class="modal-title-set"><b>Name :</b><?php echo $row['product_name'];?></h5>
                                                        <h5 class="modal-title-set"><b>Product Price :</b><?php echo strip_tags($row['product_price']);?></h5>
                                                        <h5 class="modal-title-set"><b>Quantity:</b><?php echo strip_tags($row['quantity']);?></h5>
                                                        <h5 class="modal-title-set"><b>Product Info :</b><?php echo strip_tags($row['product_info']);?></h5>
                                                   </div>
                                                    <div class="modal-footer" >
                                                          <button type="button" class="btn" data-dismiss="modal" style="background-color:#f00; color:#fff">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </tr>               
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
         <?php include_once 'footer.php'; ?>
         