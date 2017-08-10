<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
$id = $_GET['uid'];
 if (!isset($_POST['submit']))  {
            echo "";
    } else  {            

    $catering_type = $_POST['catering_type'];  
    $status = $_POST['status'];
    
        $sql = "UPDATE `catering_types` SET catering_type = '$catering_type', status='$status' WHERE id = '$id' ";
        if($conn->query($sql) === TRUE){
           echo "<script>alert('Data Updated Successfully');window.location.href='catering_types.php';</script>";
        } else {
           echo "<script>alert('Data Updation Failed');window.location.href='catering_types.php';</script>";
        }
    }   

?>
<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Catering</div>
        </div>
        <div class="col s12 m12 l2"></div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">                                
                    <div class="row">
                        <form class="col s12" method="post" enctype="multipart/form-data">
                            <div class="row">
                            <?php $getCatering = getAllDataWhere('catering_types', 'id', $_GET['uid']); $getCatering1 = $getCatering->fetch_assoc(); ?>
                                <div class="input-field col s12">
                                    <input id="title" type="text" class="validate" name="catering_type" required value="<?php echo $getCatering1['catering_type'];?>">
                                    <label for="title">Catering Type</label>
                                </div>

                                <div class="input-field col s12">
                                    <select name="status" required>
                                        <option value="" disabled selected>Choose your status</option>
                                        <option value="0" <?php if($getCatering1['status'] == 0) { echo "Selected"; }?>>Active</option>
                                        <option value="1" <?php if($getCatering1['status'] == 1) { echo "Selected"; }?>>In Active</option>                                       
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