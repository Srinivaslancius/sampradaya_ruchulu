            <?php include_once 'main_header.php'; ?>
           
            <?php include_once 'side_navigation.php';?>

            <main class="mn-inner">
                <div class="row">
                    
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                  <!-- <a href="add_categories.php" style="float:right">Add Categories</a> -->
                                <span class="card-title">Categories</span>
                                <?php $getData = getAllDataWithActiveRecent('categories'); $i=1; ?>
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php while ($row = $getData->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row['category_name'];?></td>
                                            <td><a href="edit_categories.php?uid=<?php echo $row['id'];?>"><i class="material-icons dp48">edit</i></a></td>
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