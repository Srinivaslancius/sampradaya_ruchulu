<?php 
include "admin/includes/config.php"; 
if(isset($_POST["submit"]) && $_POST["submit"]!="") {	

	$cartCount = count($_POST["cart_id"]);	

	for($i=0;$i<$cartCount;$i++) {
		$updateq = "UPDATE cart SET product_quantity = '" . $_POST["product_quantity"][$i] . "',product_total_price ='" . $_POST["product_quantity"][$i]*$_POST["product_price"][$i] . "' WHERE id = '" . $_POST["cart_id"][$i] . "'";
		$result = $conn->query($updateq);
	}
	header('Location: cart.php?suc=1');
}

?>