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
	$string1 = str_shuffle('abcdefghijklmnopqrstuvwxyz');
	$random1 = substr($string1,0,3);
	$string2 = str_shuffle('1234567890');
	$random2 = substr($string2,0,3);
	$contstr = "SMPDR";
	$order_id = $contstr.$random1.$random2;

	$productsCount = count($_POST["product_id"]);
	for($i=0;$i<$productsCount;$i++) {
		$sql = "INSERT INTO orders (`first_name`, `mobile`,`email`, `district`, `address1`,`pin_code`,`product_id`,`product_name`,`product_price`,`product_total_price`,`cart_sub_total`,`order_total`,`order_date`,`product_quantity`,`payment_status`,`order_status`,`order_id`) VALUES ('$name','$mobile','$email','$location_name','$address','$zipcode','" . $_POST["product_id"][$i] . "','" . $_POST["product_name"][$i] . "','" . $_POST["product_price"][$i] . "','" . $_POST["product_total_price"][$i] . "','$cart_sub_total','$order_total','$order_date','" . $_POST["product_quantity"][$i] . "','1','1','$order_id')";
	    $res = $conn->query($sql);
	}
	
    header('Location: thankyou.php');   

}

?>