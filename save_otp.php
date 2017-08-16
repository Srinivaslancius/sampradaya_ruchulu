<?php 
include "admin/includes/config.php"; 
include "admin/includes/functions.php"; 
if(!empty($_POST['mobile']) && !empty($_POST['mobile']))  {
	//echo "<pre>"; print_r($_POST); die;	
	$user_mobile = $_POST['mobile'];  
	$date = date("Y-m-d h:i:s");
	$status = 1;
	$user_otp= rand ( 1000 , 9999 );
		  
	$getCount = getRowsCountWithUsermobile('users',$user_mobile); 
	if($getCount==0) {
		$sql = "INSERT INTO users ( `user_mobile`,`user_password`, `created_at`, `status`) VALUES ('$user_mobile','$user_otp','$date', '$status')";
		if($conn->query($sql) === TRUE){
			$succ = "1";
		} else {
			$succ = "0";
		}
	} else {
		$sql = "UPDATE users SET user_password = '$user_otp', status = '$status' WHERE user_mobile = '$user_mobile' ";
		if($conn->query($sql) === TRUE){
			$succ = "1";
		} else {
			$succ = "0";
		}
	}
	echo $succ;	  
}

?>