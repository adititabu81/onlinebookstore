<?php

	$order_id = mysqli_real_escape_string($link, $_POST['order_id']);
	$status = mysqli_real_escape_string($link, $_POST['order_status']);
	$query = "UPDATE transactions SET salesperson_id='".$_COOKIE["id"]."', order_status='".$status."' WHERE order_id='".$order_id."'" ;
	$result = mysqli_query($link, $query);

	$url = "?page=orders";  
echo "<script type='text/javascript'>";  
echo "window.location.href='".$url."'";  
echo "</script>";  
?>