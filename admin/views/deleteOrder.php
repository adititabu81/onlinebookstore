<?php

	$order_id = $_GET['orderid'];
	$query = "DELETE FROM transactions WHERE order_id='".$order_id."'" ;
	$result = mysqli_query($link, $query);
	$url = "?page=orders";  
	echo "<script type='text/javascript'>";  
	echo "window.location.href='".$url."'";  
	echo "</script>";  
?>