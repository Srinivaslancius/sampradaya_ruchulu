<?php include_once 'main_header.php'; ?>
<?php $id = $_GET['did']; 

 $sql1="DELETE FROM cart WHERE id={$id}";
if($conn->query($sql1) === TRUE) {
      echo  "<script>alert('Item Removed Successfully');window.location.href='cart.php';</script>";
         
    } else {
       echo "<script>alert('Item Updation Failed');window.location.href='cart.php';</script>";
    }
?>
            
      <?php include_once "footer_sub_content.php"; ?>
        
      <?php include_once 'footer.php'; ?>