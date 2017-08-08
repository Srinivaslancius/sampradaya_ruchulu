<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
error_reporting(0);
if (!isset($_POST['submit']))  {
            echo "";
        } else  { 

    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = encryptPassword($_POST['admin_password']);
    $created_at = date("Y-m-d h:i:s");
    $status = $_POST['status'];
    $sql = "INSERT INTO admin_users (`admin_name`, `admin_email`, `admin_password`, `created_at`, `status`) VALUES ('$admin_name', '$admin_email', '$admin_password','$created_at','$status')";
    if($conn->query($sql) === TRUE){
       echo "<script>alert('Data Updated Successfully');window.location.href='admin_users.php';</script>";
    } else {
       echo "<script>alert('Data Updation Failed');window.location.href='admin_users.php';</script>";
    }
}
?>

    <main class="mn-inner">
        <div class="row">
            
            <div class="col s12 m12 l2"></div>
            <div class="col s12 m12 l8">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Admin Users</span><br>
                        <div class="row">
                           <form class="col s12" method="post">
                                <div class="row">
                                    
                                    <div class="input-field col s6">
                                        <input id="admin_name" autofocus="autofocus" type="text" class="validate" name="admin_name" required>
                                        <label for="admin_name">Name</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="admin_email" type="email" class="validate" name="admin_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                                        <label for="admin_email">Email</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="admin_password" type="password" class="validate" name="admin_password" required>
                                        <label for="admin_password">Password</label>
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