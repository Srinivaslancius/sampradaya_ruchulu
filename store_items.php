<?php
  session_start();

  if(isset($_POST['total_cart_items']))
  {
	echo count($_SESSION['name']);
	exit();
  }

  if(isset($_POST['product_image']))
  {
    $name=$_POST['product_name'];
    $price=$_POST['product_price'];
    $src=$_POST['product_image'];
    echo count($_SESSION['name']);
    exit();
  }
  $qry = "INSERT into cart(`product_name`,`product_price`,`product_image`) values ('$name','$price,'$src')";
	$result = $conn->query($qry);
	if(isset($result)) {
	   echo "#";
	} else {
	   echo "#";
	}

    exit();	
?>
