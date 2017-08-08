<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
error_reporting(0);
$id = $_GET['uid'];
 if (!isset($_POST['submit']))  {
            echo "";
    } else  {            

            $admin_name = $_POST['admin_name'];
            $admin_email = $_POST['admin_email'];
            $admin_password = encryptPassword($_POST['admin_password']);
            $created_at = date("Y-m-d h:i:s");
            $status = $_POST['status'];
            
            $sql = "UPDATE `admin_users` SET admin_name='$admin_name', admin_email='$admin_email', admin_password='$admin_password', status = '$status' WHERE id = '$id' ";
            if($conn->query($sql) === TRUE){
               echo "<script>alert('Data Updated Successfully');window.location.href='admin_users.php';</script>";
            } else {
               echo "<script>alert('Data Updation Failed');window.location.href='admin_users.php';</script>";
            }
        }
?>
<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Admin Users</div>
        </div>
        <div class="col s12 m12 l2"></div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">                                
                    <div class="row">
                        <form class="col s12" method="post">
                            <div class="row">
                                <?php $getUsers = getAllDataWhere('admin_users', 'id', $id); $getUsers1 = $getUsers->fetch_assoc(); ?>                                    
                                    <div class="input-field col s6">
                                        <input id="admin_name" type="text" class="validate" name="admin_name" required value="<?php echo $getUsers1['admin_name'];?>">
                                        <label for="admin_name">Name</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="admin_email" type="email" class="validate" name="admin_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required value="<?php echo $getUsers1['admin_email'];?>">
                                        <label for="admin_email">Email</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="admin_password" type="password" class="validate" name="admin_password" required value="<?php echo decryptPassword($getUsers1['admin_password']);?>">
                                        <label for="admin_password">Password</label>
                                    </div>
                                    <?php $getStatus = getAllData('user_status'); ?>
                                    <div class="input-field col s12">
                                        <select name="status" required >
                                            <option value="" >Choose your Status</option> 
                                            <?php while($row = $getStatus->fetch_assoc()) {  ?>
                                                <option <?php if($row['id'] == $getUsers1['status']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['status']; ?></option>
                                            <?php } ?>                                
                                        </select>                                    
                                    </div>

                                    </div>
                                    <div class="row">                                            
                                        <div class="col s12 l3">                                                
                                            <input type="submit" name="submit" value="Submit" class="waves-effect waves-light btn blue m-b-xs">
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
<script>
function getState(val) {
    $.ajax({
    type: "POST",
    url: "get_state.php",
    data:'country_id='+val,
    success: function(data){
        $("#user_state_id").html(data);
    }
    });
}

function getCities(val) { 
    $.ajax({
    type: "POST",
    url: "get_cities.php",
    data:'state_id='+val,
    success: function(data){
        $("#user_city_id").html(data);
    }
    });
}

function getLocations(val) { 
    $.ajax({
    type: "POST",
    url: "get_locations.php",
    data:'city_id='+val,
    success: function(data){
        $("#user_location_id").html(data);
    }
    });
}
</script>