<?php 
include "admin/includes/config.php"; 
if(isset($_POST["submit"]) && $_POST["submit"]!="") {
	// echo "<pre>"; print_r($_POST); die;
	$location_name = $_POST["location_name"];
	$name = $_POST["name"];
	$mobile = $_POST["pm-phone-field"];
	$address = $_POST["pm-address-field"];
	$city = $_POST["pm-town-field"];
	$zipcode = $_POST["pm-zip-field"];
	$email = $_POST["pm-email-address-field"];
	$cart_sub_total = $_POST["cart_sub_total"];
	$order_total = $_POST["order_total"];
	$order_date = date("Y-m-d h:i:s");

	$productsCount = count($_POST["product_id"]);
	for($i=0;$i<$productsCount;$i++) {
		$sql = "INSERT INTO orders (`first_name`, `mobile`,`email`, `district`, `address1`,`pin_code`,`product_id`,`product_name`,`product_price`,`product_total_price`,`cart_sub_total`,`order_total`,`order_date`,`product_quantity`,`payment_status`,`order_status`) VALUES ('$name','$mobile','$email','$location_name','$address','$zipcode','" . $_POST["product_id"][$i] . "','" . $_POST["product_name"][$i] . "','" . $_POST["product_price"][$i] . "','" . $_POST["product_total_price"][$i] . "','$cart_sub_total','$order_total','$order_date','" . $_POST["product_quantity"][$i] . "','1','1')";
	    $res = $conn->query($sql);
	}
	
    header('Location: thankyou.php');   

}

?>