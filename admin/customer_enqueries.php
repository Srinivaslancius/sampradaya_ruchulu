            <?php include_once 'main_header.php'; ?>
           
            <?php include_once 'side_navigation.php';?>

            <main class="mn-inner">
                <div class="row">
                    
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Customer Enqueries</span>
                                <?php $getData = getAllData('customer_enqueries'); ?>
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Customer Mobile </th>
                                            <th>Customer Address </th>
                                            <th>Created Date</th>
                                            <th>Customer Email </th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php while ($row = $getData->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $row['customer_name'];?></td>
                                            <td><?php echo $row['customer_mobile'];?></td>
                                            <td><?php echo $row['customer_feedback'];?></td>
                                            <td><?php echo $row['created_at'];?></td>
                                            <td><a href="mailto:<?php echo $row['customer_email'];?>" target="_top"><?php echo $row['customer_email'];?></a></td>
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