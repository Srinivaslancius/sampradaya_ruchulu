<?php 
include "admin/includes/config.php"; 
if(isset($_POST["submit"]) && $_POST["submit"]!="") {	
	//echo "<pre>"; print_r($_POST); die;
	$location_name = $_POST["location_name"];
	$name = $_POST["name"];
	$mobile = $_POST["pm-phone-field"];
	$address = $_POST["pm-address-field"];
	$city = $_POST["pm-town-field"];
	$zipcode = $_POST["pm-zip-field"];
	$email = $_POST["pm-email-address-field"];

	$productsCount = count($_POST["product_id"]);	
	for($i=0;$i<$productsCount;$i++) {
		$sql = "INSERT INTO orders (`first_name`, `mobile`,`email`, `district`, `address1`,`pin_code`,`product_id`,`product_name`,`product_price`,`product_total_price`) VALUES ('$name','$mobile','$email','$location_name','$address','$zipcode','" . $_POST["product_id"][$i] . "','" . $_POST["product_name"][$i] . "','" . $_POST["product_price"][$i] . "','" . $_POST["product_total_price"][$i] . "')";
	    $res = $conn->query($sql);
	}
	
    header('Location: thankyou.php');   

}

?>