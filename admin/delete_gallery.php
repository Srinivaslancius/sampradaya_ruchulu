<?php
include_once('includes/config.php');
include_once('includes/functions.php');
$id = $_GET['bid'];
//echo $music_number;
$target_dir = '../uploads/gallery_images/';
$getImgUnlink = getImageUnlink('image','gallery','id',$id,$target_dir);
$qry = "DELETE FROM gallery WHERE id ='$id'";
$result = $conn->query($qry);
if(isset($result)) {
   echo "<script>alert('Banner Deleted Successfully');window.location.href='gallery.php';</script>";
} else {
   echo "<script>alert('Banner Not Deleted');window.location.href='gallery.php';</script>";
}
?>
