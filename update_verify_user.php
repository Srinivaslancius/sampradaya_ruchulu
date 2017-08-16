<?php 
include "admin/includes/config.php"; 
include "admin/includes/functions.php"; 
if(!empty($_POST['mobile']) && !empty($_POST['mobile']))  {
	//echo "<pre>"; print_r($_POST); die;	
	$user_mobile = $_POST['mobile'];
	$otp = $_POST['otp'];	
	
	$updateq = "UPDATE users SET status = 0 WHERE user_mobile = '$user_mobile' AND user_password = '$otp'";
	if($conn->query($updateq) === TRUE ) {
		$sql = "SELECT id,user_mobile,user_password FROM users WHERE user_mobile = '$user_mobile' AND user_password = '$otp' AND status='0' ";
		$result = $conn->query($sql);	
		$_SESSION['session_mobile'] = $user_mobile;
		echo $result->num_rows;	  
	} else {
		echo "0";
	}
	
}

?>