<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
$id = $_GET['bid'];
 if (!isset($_POST['submit']))  {
            echo "";
    } else  {            

            $status = $_POST['status'];
            $title = $_POST['title'];
            if($_FILES["fileToUpload"]["name"]!='') {
                                             
                $fileToUpload = $_FILES["fileToUpload"]["name"];               

                $target_dir = "../uploads/gallery_images/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                $getImgUnlink = getImageUnlink('image','gallery','id',$id,$target_dir);
                //Send parameters for img val,tablename,clause,id,imgpath for image ubnlink from folder

                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $sql = "UPDATE `gallery` SET title = '$title', image = '$fileToUpload', status='$status' WHERE id = '$id' ";
                    if($conn->query($sql) === TRUE){
                       echo "<script>alert('Data Updated Successfully');window.location.href='gallery.php';</script>";
                    } else {
                       echo "<script>alert('Data Updation Failed');window.location.href='gallery.php';</script>";
                    }
                    //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }  else {
                $sql = "UPDATE `gallery` SET title = '$title', status='$status' WHERE id = '$id' ";
                if($conn->query($sql) === TRUE){
                   echo "<script>alert('Data Updated Successfully');window.location.href='gallery.php';</script>";
                } else {
                   echo "<script>alert('Data Updation Failed');window.location.href='gallery.php';</script>";
                }
            }   
            
        }
?>
<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Gallery</div>
        </div>
        <div class="col s12 m12 l2"></div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <form class="col s12" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <?php $getGallery = getAllDataWhere('gallery', 'id', $_GET['bid']); $getGallery1 = $getGallery->fetch_assoc(); ?>
                                <div class="input-field col s12">
                                    <input id="title" type="text" class="validate" name="title" required value="<?php echo $getGallery1['title'];?>">
                                    <label for="title">Title</label>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-lg-3 col-sm-3 control-label"></label>
                                    <div class="col-lg-9">
                                        <img src="<?php echo $base_url . 'uploads/gallery_images/'.$getGallery1['image'] ?>" height="200" width="200" id="output" />
                                    </div>
                                </div> 
                                
                                <div class="input-field col s6">
                                   Image : <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" onchange="loadFile(event)">
                                   <p>(Please upload this size images 900*361)</p>
                                </div>

                               <div class="input-field col s12">
                                    <select name="status" required>
                                        <option value="" disabled selected>Choose your status</option>
                                        <option value="0" <?php if($getGallery1['status'] == 0) { echo "Selected"; }?>>Active</option>
                                        <option value="1" <?php if($getGallery1['status'] == 1) { echo "Selected"; }?>>In Active</option>                                       
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