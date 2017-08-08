<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
$id = $_GET['uid'];
 if (!isset($_POST['submit']))  {
            echo "";
    } else  {            

    $category_name = $_POST['category_name'];  
    $status = $_POST['status'];
    if($_FILES["category_image"]["name"]!='') {
                                          
        $category_image = $_FILES["category_image"]["name"];        
        $target_dir = "../uploads/category_images/";
        $target_file = $target_dir . basename($_FILES["category_image"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        $getImgUnlink = getImageUnlink('category_image','categories','id',$id,$target_dir);
        //Send parameters for img val,tablename,clause,id,imgpath for image ubnlink from folder

        if (move_uploaded_file($_FILES["category_image"]["tmp_name"], $target_file)) {
            $sql = "UPDATE `categories` SET category_name = '$category_name', category_image = '$category_image', status='$status' WHERE id = '$id' ";
            if($conn->query($sql) === TRUE){
               echo "<script>alert('Data Updated Successfully');window.location.href='categories.php';</script>";
            } else {
               echo "<script>alert('Data Updation Failed');window.location.href='categories.php';</script>";
            }
            //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }  else {
        $sql = "UPDATE `categories` SET category_name = '$category_name', status='$status' WHERE id = '$id' ";
        if($conn->query($sql) === TRUE){
           echo "<script>alert('Data Updated Successfully');window.location.href='categories.php';</script>";
        } else {
           echo "<script>alert('Data Updation Failed');window.location.href='categories.php';</script>";
        }
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

                                <div class="form-group">
                                    <label for="name" class="col-lg-3 col-sm-3 control-label"></label>
                                    <div class="col-lg-9">
                                        <img src="<?php echo $base_url . 'uploads/category_images/'.$getCategories1['category_image'] ?>" height="100" width="100" id="output"/>
                                    </div>
                                </div> 
                                
                                <div class="input-field col s6">
                                   Image : <input type="file" name="category_image" id="category_image" accept="image/*" onchange="loadFile(event)">                                     
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