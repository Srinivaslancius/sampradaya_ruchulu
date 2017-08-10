<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
$id = $_GET['uid'];
 if (!isset($_POST['submit']))  {
            echo "";
    } else  {            

    $event_type = $_POST['event_type'];  
    $status = $_POST['status'];
    
        $sql = "UPDATE `event_types` SET event_type = '$event_type', status='$status' WHERE id = '$id' ";
        if($conn->query($sql) === TRUE){
           echo "<script>alert('Data Updated Successfully');window.location.href='event_types.php';</script>";
        } else {
           echo "<script>alert('Data Updation Failed');window.location.href='event_types.php';</script>";
        }
    }   

?>
<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Events</div>
        </div>
        <div class="col s12 m12 l2"></div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">                                
                    <div class="row">
                        <form class="col s12" method="post" enctype="multipart/form-data">
                            <div class="row">
                            <?php $getEvents = getAllDataWhere('event_types', 'id', $_GET['uid']); $getEvents1 = $getEvents->fetch_assoc(); ?>
                                <div class="input-field col s12">
                                    <input id="title" type="text" class="validate" name="event_type" required value="<?php echo $getEvents1['event_type'];?>">
                                    <label for="title">Event Type</label>
                                </div>

                                <div class="input-field col s12">
                                    <select name="status" required>
                                        <option value="" disabled selected>Choose your status</option>
                                        <option value="0" <?php if($getEvents1['status'] == 0) { echo "Selected"; }?>>Active</option>
                                        <option value="1" <?php if($getEvents1['status'] == 1) { echo "Selected"; }?>>In Active</option>                                       
                                    </select>                                    
                                </div>                            
                                
                                <div class="input-field col s12">
                                    <input type="submit" name="submit" value="Submit" class="waves-effect waves-light btn teal">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col s12 m12 l2"></div>
    </div>
</main>
<?php include_once 'footer.php'; ?>