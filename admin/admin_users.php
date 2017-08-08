            <?php include_once 'main_header.php'; ?>
           
            <?php include_once 'side_navigation.php';?>

            <main class="mn-inner">
                <div class="row">
                    
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <a href="add_admin_users.php" style="float:right">Add Admin User</a>
                                <span class="card-title">Admin Users</span>
                                <?php $getData = getAllDataWithActiveRecent('admin_users'); $i=1; ?>
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Admin Name</th>
                                            <th>Admin Email </th>
                                            <th>Created Date</th>                                            
                                            <th>Actions</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php while ($row = $getData->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row['admin_name'];?></td>
                                            <td><?php echo $row['admin_email'];?></td>
                                            <td><?php echo $row['created_at'];?></td>
                                            <td><a href="edit_admin_users.php?uid=<?php echo $row['id']; ?>"><i class="material-icons dp48">edit</i></a><a href="#"><a class="click_view" data-modalId="<?php echo $row['id']?>" href="#"><i class="material-icons dp48">visibility</i></a></td>
                                            <div id="myModal_<?php echo $row['id']; ?>" class="modal fade" >
                                            <div class="modal-dialog" Style="margin-top:10%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                       <h3 class="modal-title"><b>Admin User Information</b></h3>
                                                    </div>
                                                    <div class="modal-body" >
                                                        <h5 class="modal-title-set"><b>Name :</b><?php echo $row['admin_name'];?></h5>
                                                        <h5 class="modal-title-set"><b>Email :</b><?php echo $row['admin_email'];?></h5>
                                                        <h5 class="modal-title-set"><b>Created Date :</b><?php echo $row['created_at']."<br>"; ?></h5>
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
        