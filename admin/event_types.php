            <?php include_once 'main_header.php'; ?>
           
            <?php include_once 'side_navigation.php';?>

            <main class="mn-inner">
                <div class="row">
                    
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <a href="add_events.php" style="float:right">Add Event</a>
                                <span class="card-title">Events</span>
                                <?php $getData = getAllDataWithActiveRecent('event_types'); $i=1; ?>
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Event Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php while ($row = $getData->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row['event_type'];?></td>
                                            <td><a href="edit_event_type.php?uid=<?php echo $row['id'];?>"><i class="material-icons dp48">edit</i></a></td>
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