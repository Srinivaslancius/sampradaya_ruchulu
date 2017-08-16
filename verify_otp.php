<?php 
include "admin/includes/config.php"; 
include "admin/includes/functions.php"; 
if(!empty($_POST['mobile']) && !empty($_POST['mobile']))  {
	//echo "<pre>"; print_r($_POST); die;	
	$user_mobile = $_POST['mobile'];
	$otp = $_POST['otp'];	
		  
	$sql = "SELECT id,user_mobile,user_password FROM users WHERE user_mobile = '$user_mobile' AND user_password = '$otp' ";
	$result = $conn->query($sql);	
	echo $result->num_rows;	  
}

?>