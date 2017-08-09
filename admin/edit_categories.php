<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
$id = $_GET['uid'];
 if (!isset($_POST['submit']))  {
            echo "";
    } else  {            

    $category_name = $_POST['category_name'];  
    $status = $_POST['status'];
    
        $sql = "UPDATE `categories` SET category_name = '$category_name', status='$status' WHERE id = '$id' ";
        if($conn->query($sql) === TRUE){
           echo "<script>alert('Data Updated Successfully');window.location.href='categories.php';</script>";
        } else {
           echo "<script>alert('Data Updation Failed');window.location.href='categories.php';</script>";
        }
    }   

?>
<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Categoreis</div>
        </div>
        <div class="col s12 m12 l2"></div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">                                
                    <div class="row">
                        <form class="col s12" method="post" enctype="multipart/form-data">
                            <div class="row">
<?php $getCategories = getAllDataWhere('categories', 'id', $_GET['uid']); $getCategories1 = $getCategories->fetch_assoc(); ?>
                                <div class="input-field col s12">
                                    <input id="title" type="text" class="validate" name="category_name" required value="<?php echo $getCategories1['category_name'];?>">
                                    <label for="title">Category Name</label>
                                </div>

                                <div class="input-field col s12">
                                    <select name="status" required>
                                        <option value="" disabled selected>Choose your status</option>
                                        <option value="0" <?php if($getCategories1['status'] == 0) { echo "Selected"; }?>>Active</option>
                                        <option value="1" <?php if($getCategories1['status'] == 1) { echo "Selected"; }?>>In Active</option>                                       
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