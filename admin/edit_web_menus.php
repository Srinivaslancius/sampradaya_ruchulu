<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
$id = $_GET['uid'];
 if (!isset($_POST['submit']))  {
            echo "";
    } else  {            

    $menu_name = $_POST['menu_name'];  
    $status = $_POST['status'];

        $sql = "UPDATE `web_menus` SET menu_name = '$menu_name', status='$status' WHERE id = '$id' ";
        if($conn->query($sql) === TRUE){
           echo "<script>alert('Data Updated Successfully');window.location.href='web_menus.php';</script>";
        } else {
           echo "<script>alert('Data Updation Failed');window.location.href='web_menus.php';</script>";
        }
    }   
    
?>
<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Web Menus</div>
        </div>
        <div class="col s12 m12 l2"></div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">                                
                    <div class="row">
                        <form class="col s12" method="post" enctype="multipart/form-data">
                            <div class="row">
<?php $getWebMenus = getAllDataWhere('web_menus', 'id', $_GET['uid']); $getWebMenus1 = $getWebMenus->fetch_assoc(); ?>
                                <div class="input-field col s12">
                                    <input id="title" type="text" class="validate" name="menu_name" required value="<?php echo $getWebMenus1['menu_name'];?>">
                                    <label for="title">Menu Name </label>
                                </div>
                                
                                <div class="input-field col s12">
                                    <select name="status" required>
                                        <option value="" disabled selected>Choose your status</option>
                                        <option value="0" <?php if($getWebMenus1['status'] == 0) { echo "Selected"; }?>>Active</option>
                                        <option value="1" <?php if($getWebMenus1['status'] == 1) { echo "Selected"; }?>>In Active</option>                                       
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