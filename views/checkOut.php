<?php
	
	$firstname = mysqli_real_escape_string($link, $_POST['firstName']);
	$lastname = mysqli_real_escape_string($link, $_POST['lastName']);
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$address = mysqli_real_escape_string($link, $_POST['address'])."  ".mysqli_real_escape_string($link, $_POST['address2']);
	$country = mysqli_real_escape_string($link, $_POST['country']);
	$state = mysqli_real_escape_string($link, $_POST['state']);
	$zip = mysqli_real_escape_string($link, $_POST['zip']);
	$payment_method = mysqli_real_escape_string($link, $_POST['paymentMethod']);
	$cc_name = mysqli_real_escape_string($link, $_POST['cc-name']);
	$cc_number = mysqli_real_escape_string($link, $_POST['cc-number']);
	$cc_expiration = mysqli_real_escape_string($link, $_POST['cc-expiration']);
	$cc_cvv = mysqli_real_escape_string($link, $_POST['cc-cvv']);

	$customer_id = $_SESSION['id'];
	$query = "SELECT customer_address FROM customers WHERE customer_id=".$customer_id;
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	//if user has no address before, insert new one
	if ($row['customer_address']==NULL){
	$query = "INSERT INTO address_payment (`first_name`, `last_name`, `email`, `address`, `country`, `state`, `zip`, `card_type`, `name_on_card`, `card_number`,`expiration`, `cvv`) VALUES ('".$firstname."','".$lastname."','".$email."','".$address."','".$country."','".$state."','".$zip."','".$payment_method."','".$cc_name."','".$cc_number."','".$cc_expiration."','".$cc_cvv."')";
	mysqli_query($link, $query);
	$id = mysqli_insert_id($link);
	$query = "UPDATE customers SET customer_address='".$id."' WHERE customer_id='".$customer_id."'";
	mysqli_query($link, $query);
	} 
	//else update address info every time when user checkout
	else {
		$query = "UPDATE address_payment SET first_name = '".$firstname."', last_name='".$lastname."', email='$email', address='$address', country='$country', state='$state', zip='$zip', card_type='$payment_method', name_on_card='$cc_name', card_number='$cc_number',expiration='$cc_expiration', cvv='$cc_cvv' WHERE address_id ='".$row['customer_address']."'";
			mysqli_query($link, $query);	
	}
	$order_id = md5(date("Y-m-d h:i:s").$_SESSION['id']);
	$query = "INSERT INTO transactions (order_id,order_date,order_status,customer_id,store_id,total_cost_price)VALUES('".$order_id."','".date("Y-m-d h:i:s")."','Paid','".$_SESSION['id']."','".$state."','".$_POST["totalPrice"]."')";
	mysqli_query($link, $query);
	$arr = unserialize($_COOKIE["cart"]);
  	for($i = 0; $i < count($arr);$i++){
  		$query = "SELECT book_price FROM books WHERE book_id='".$arr[$i][0]."'";
  		$result = mysqli_query($link, $query);
  		$row = mysqli_fetch_assoc($result);
    	$query = "INSERT INTO books_transactions (order_id,book_id,price,quantity,category) VALUES('$order_id','".$arr[$i][0]."','".$row['book_price']."','".$arr[$i][2]."','".$arr[$i][1]."')";
    	mysqli_query($link, $query);
  	}
  	setcookie("cart","");
  	header('Refresh:0.1,Url=http://localhost/onlinebookstore/?page=orders');
?>