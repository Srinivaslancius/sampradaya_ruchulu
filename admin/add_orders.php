<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
error_reporting(0);
if (!isset($_POST['submit']))  {
            echo "";
        } else  { 

    $mobile = $_POST['mobile'];
    $order_date = date("Y-m-d h:i:s");
    $status = $_POST['order_status'];
    $sql = "INSERT INTO orders (`mobile`,`order_date`, `order_status`) VALUES ('$mobile','$order_date','$status')";
    if($conn->query($sql) === TRUE){
       echo "<script>alert('Data Updated Successfully');window.location.href='orders.php';</script>";
    } else {
       echo "<script>alert('Data Updation Failed');window.location.href='orders.php';</script>";
    }
}
?>

    <main class="mn-inner">
        <div class="row">
            
            <div class="col s12 m12 l2"></div>
            <div class="col s12 m12 l8">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Orders</span><br>
                        <div class="row">
                           <form class="col s12" method="post">
                                <div class="row">
                                    
                                    <div class="input-field col s12">
                                        <input id="mobile" autofocus="autofocus" type="text" class="validate" name="mobile" maxlength="10"  pattern="[0-9]{10}" onkeypress="return isNumberKey(event)" required>
                                        <label for="mobile">Mobile</label>
                                    </div>
                                    
                                    <div class="input-field col s12">
                                        <select name="order_status" required>
                                            <option value="" disabled selected>Choose your status</option>
                                            <option value="0">Active</option>
                                            <option value="1">In Active</option>   
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
<script type="text/javascript">
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>