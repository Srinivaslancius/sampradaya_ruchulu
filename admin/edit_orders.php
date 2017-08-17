<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
error_reporting(0);
$id = $_GET['oid'];
 if (!isset($_POST['submit']))  {
            echo "";
    } else  {            

            $mobile = $_POST['mobile'];
            $order_date = date("Y-m-d h:i:s");
            $order_status = $_POST['order_status'];
            
            $sql = "UPDATE `orders` SET mobile='$mobile',order_status = '$order_status' WHERE id = '$id' ";
            if($conn->query($sql) === TRUE){
               echo "<script>alert('Data Updated Successfully');window.location.href='orders.php';</script>";
            } else {
               echo "<script>alert('Data Updation Failed');window.location.href='orders.php';</script>";
            }
        }
?>
<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Orders</div>
        </div>
        <div class="col s12 m12 l2"></div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">                                
                    <div class="row">
                        <form class="col s12" method="post">
                            <div class="row">
                                <?php $getOrders = getAllDataWhere('orders', 'id', $id); $getOrders1 = $getOrders->fetch_assoc(); ?>                                    
                                    <div class="input-field col s12">
                                        <input id="mobile" type="text" class="validate" name="mobile" required value="<?php echo $getOrders1['mobile'];?>">
                                        <label for="mobile">Mobile</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <select name="order_status" required>
                                            <option value="" disabled selected>Choose your status</option>
                                            <option value="0" <?php if($getOrders1['order_status'] == 0) { echo "Selected"; }?>>Active</option>
                                            <option value="1" <?php if($getOrders1['order_status'] == 1) { echo "Selected"; }?>>In Active</option> 
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