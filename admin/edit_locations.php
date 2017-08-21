<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
$id = $_GET['lid'];
 if (!isset($_POST['submit']))  {
            echo "";
    } else  {            

    $location_name = $_POST['location_name'];
    
        $sql = "UPDATE `lkp_locations` SET location_name = '$location_name' WHERE id = '$id' ";
        if($conn->query($sql) === TRUE){
           echo "<script>alert('Data Updated Successfully');window.location.href='locations.php';</script>";
        } else {
           echo "<script>alert('Data Updation Failed');window.location.href='locations.php';</script>";
        }
    }   

?>
<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Locations</div>
        </div>
        <div class="col s12 m12 l2"></div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">                                
                    <div class="row">
                        <form class="col s12" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <?php $getCategories = getAllDataWhere('lkp_locations', 'id', $_GET['lid']); 
                                $getCategories1 = $getCategories->fetch_assoc(); ?>
                                <div class="input-field col s12">
                                    <input id="title" type="text" class="validate" name="location_name" required value="<?php echo $getCategories1['location_name'];?>">
                                    <label for="title">Location Name</label>
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