<?php include_once 'main_header.php'; ?>

<?php include_once 'side_navigation.php';?>

    <main class="mn-inner">
        <div class="row">
            
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Booked Events</span>
                        <?php $getData = getAllData('book_an_event'); $i=1;?>
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email </th>
                                    <th>Mobile</th>
                                    <th>Event Date</th>                                            
                                </tr>
                            </thead>                                    
                            <tbody>
                                <?php while ($row = $getData->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $row['first_name'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><?php echo $row['mobile'];?></td>
                                    <td><?php echo $row['event_date'];?></td>
                                </tr>               
                                <?php $i++;} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include_once 'footer.php'; ?>
        