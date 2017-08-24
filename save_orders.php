<?php 
include "admin/includes/config.php"; 
include "admin/includes/functions.php"; 
$getSiteSettingsData = getIndividualDetails('1',"site_settings","id"); 
if(isset($_POST["submit"]) && $_POST["submit"]!="") {
	// echo "<pre>"; print_r($_POST); die;
	$location_name = $_POST["location_name"];
	$name = $_POST["name"];
	$mobile = $_POST["pm-phone-field"];
	$address = $_POST["pm-address-field"];
	$city = $_POST["pm-town-field"];
	$email = $_POST["pm-email-address-field"];
	$delivery_charges = $_POST["delivery_charges"];
	$packaging_charges=$_POST["packaging_charges"];
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
		$sql = "INSERT INTO orders (`first_name`, `mobile`,`email`, `district`, `address1`,`product_id`,`product_name`,`product_price`,`product_total_price`,`delivery_charges`,`packaging_charges`,`cart_sub_total`,`order_total`,`order_date`,`product_quantity`,`payment_status`,`order_status`,`order_id`) VALUES ('$name','$mobile','$email','$location_name','$address','" . $_POST["product_id"][$i] . "','" . $_POST["product_name"][$i] . "','" . $_POST["product_price"][$i] . "','" . $_POST["product_total_price"][$i] . "','" . $_POST["delivery_charges"]. "','" . $_POST["packaging_charges"] . "','$cart_sub_total','$order_total','$order_date','" . $_POST["product_quantity"][$i] . "','1','1','$order_id')";
	    $res = $conn->query($sql);
	}
	$sessionMobile = $_SESSION['session_mobile'];

	$updateUserTable = "UPDATE users SET user_name='$name',user_email='$email',town='$location_name',user_address='$address' WHERE user_mobile='$sessionMobile' ";
	$conn->query($updateUserTable);	

	//sms gateway integration for custome sms order paling
	$message = urlencode('Thank You for Ordering SAMPRADAYA RUCHULU . Your Order Number is: '.$order_id.', Order Total: '.$order_total.' '); // Message text required to deliver on mobile number
	$sendSMS = sendMobileOTP($message,$sessionMobile);

	$delCart ="DELETE FROM cart WHERE user_mobile = '$sessionMobile' ";
	$conn->query($delCart);
	//sms gateway integration for custome sms order paling
	$admin_mobile=$getSiteSettingsData['mobile'];
	$message = urlencode('New Order Placed ,Order Number is: '.$order_id.', Name : '.$name.' , Address : '.$city.' , Mobile : '.$mobile.',Order Date: '.$order_date.', Order Total: '.$order_total.' '); // Message text required to deliver on mobile number
	$sendSMS = sendMobileOTP($message,$admin_mobile);
    header("Location: thankyou.php?odi=".$order_id."");

}

?>