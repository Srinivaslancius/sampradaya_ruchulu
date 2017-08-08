<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
error_reporting(0);
if (!isset($_POST['submit']))  {
            echo "";
} else  {
    //Save data into database
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_mobile = $_POST['user_mobile'];
    $user_country_id = $_POST['user_country_id'];
    $user_state_id = $_POST['user_state_id'];
    $user_city_id = $_POST['user_city_id'];
    $user_location_id = $_POST['user_location_id'];
    $user_password = encryptPassword($_POST['user_password']);
    $user_address = $_POST['user_address'];
    $created_admin_id = $_SESSION['admin_user_id'];
    $created_at = date("Y-m-d h:i:s");
    $sql = "INSERT INTO users (`user_name`, `user_email`, `user_mobile`, `user_country_id`, `user_state_id`, `user_city_id`, `user_location_id`, `user_password`, `user_address`,`created_admin_id`, `created_at`, `status`) VALUES ('$user_name', '$user_email', '$user_mobile', '$user_country_id', '$user_state_id', '$user_city_id', '$user_location_id', '$user_password', '$user_address', '$created_admin_id', '$created_at', 1)";
    if($conn->query($sql) === TRUE){
       echo "<script>alert('Data Updated Successfully');window.location.href='users.php';</script>";
    } else {
       echo "<script>alert('Data Updation Failed');window.location.href='users.php';</script>";
    }
}
?>

    <main class="mn-inner">
        <div class="row">
            
            <div class="col s12 m12 l2"></div>
            <div class="col s12 m12 l8">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Users</span><br>
                        <div class="row">
                           <form class="col s12" method="post">
                                <div class="row">
                                    
                                    <div class="input-field col s6">
                                        <input id="user_name"  autofocus="autofocus" type="text" class="validate" name="user_name" required>
                                        <label for="user_name">Name</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="user_email" type="email" class="validate" name="user_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                                        <label for="user_email">Email</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="user_mobile" type="text" class="validate" name="user_mobile" maxlength="10"  pattern="[0-9]{10}" onkeypress="return isNumberKey(event)" required>
                                        <label for="user_mobile">Mobile</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="user_password" type="password" class="validate" name="user_password" required>
                                        <label for="user_password">Password</label>
                                    </div>
                                    <?php $getCountries = getAllDataCheckActive('lkp_countries',0); ?>
                                    <div class="input-field col s6">
                                        <select name="user_country_id" id="user_country_id" required onChange="getState(this.value);">
                                            <option value="">Select Country</option>
                                            <?php while($row = $getCountries->fetch_assoc()) {  ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['country_name']; ?></option>
                                            <?php } ?>
                                        </select> 
                                    </div>                               
                                    <div class="input-field col s6">
                                        <select name="user_state_id" id="user_state_id" required onChange="getCities(this.value);">
                                            <option value="">Select State</option>                                        
                                        </select> 
                                    </div>                                    
                                    <div class="input-field col s6">
                                        <select name="user_city_id" id="user_city_id" required onChange="getLocations(this.value);">
                                            <option value="">Select City</option>                                           
                                        </select> 
                                    </div>
                                    <div class="input-field col s6">
                                        <select name="user_location_id" id="user_location_id" required >
                                            <option value="" >Choose your Location</option>                                 
                                        </select>                                    
                                    </div>
                                    <div class="input-field col s12">
                                        <textarea id="user_address" class="materialize-textarea" name="user_address" required></textarea>
                                        <label for="user_address">Address</label>
                                    </div>
                                    <?php $getStatus = getAllData('user_status'); ?>
                                    <div class="input-field col s12">
                                        <select name="status" required>
                                            <option value="">Select Status</option>
                                            <?php while($row = $getStatus->fetch_assoc()) {  ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['status']; ?></option>
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
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>