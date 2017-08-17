<?php 
include "admin/includes/config.php"; 
include "admin/includes/functions.php"; 
if(!empty($_POST['product_id']) && !empty($_POST['product_price']))  {
	//echo "<pre>"; print_r($_POST); die;	 
	$product_id = decryptPassword($_POST['product_id']);
	$product_price = decryptPassword($_POST['product_price']);
	$user_mobile = $_SESSION['session_mobile'];  
	$date = date("Y-m-d h:i:s");

	$sql1= "SELECT * from cart where product_id='$product_id' AND user_mobile='$user_mobile'";
	$res = $conn->query($sql1);
	if ($res->num_rows > 0) {
		echo "<script>alert('Item already added in your cart');</script>";
	} else {
		$sql = "INSERT INTO cart (`product_id`, `product_price`,  `product_quantity`,  `product_total_price`, `user_mobile`, `created_at`) VALUES ('$product_id', '$product_price', '1', '$product_price', '$user_mobile',  '$date')";
		if($conn->query($sql) === TRUE){
			$succ = "1";
		} else {
			$succ = "0";
		}
		echo $succ;
	}
		  
}

?>