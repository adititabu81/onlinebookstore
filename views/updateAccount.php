<?php
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$name = mysqli_real_escape_string($link, $_POST['name']);
	$password = mysqli_real_escape_string($link, $_POST['password']);
	$kind = mysqli_real_escape_string($link, $_POST['kind']);
	$marriage = mysqli_real_escape_string($link, $_POST['marriage']);
	$gender = mysqli_real_escape_string($link, $_POST['gender']);
	$age = mysqli_real_escape_string($link, $_POST['age']);
	$income = mysqli_real_escape_string($link, $_POST['income']);
	$customerId = $_SESSION['id'];
	$category = mysqli_real_escape_string($link, $_POST['category']);
	$annualIncome = mysqli_real_escape_string($link, $_POST['annualIncome']);

	//Update basic info
	mysqli_query($link, "UPDATE customers SET customer_email='$email', customer_name='$name',customer_kind='$kind' WHERE customer_id=$customerId");

	//Update passwords if customer entered
	if(!empty($password)){
		mysqli_query($link, "UPDATE customers SET customer_password = '".md5(md5($_SESSION['id']).$password)."' WHERE customer_id = ".$_SESSION['id']." LIMIT 1");
	}
	//Insert new one into home_* table if record not available
	//Update customer_home and customer_business
	if(!empty($marriage)){
	$query = "SELECT * FROM customer_home WHERE home_id=$customer_id";
    $result = mysqli_query($link, $query);
    if(empty($result)){
		mysqli_query($link, "INSERT INTO customer_home (home_id) VALUE ('$customerId')");
	}
	mysqli_query($link, "UPDATE customer_home SET marriage_status='$marriage', gender ='$gender.', age =$age, income ='$income.'");
	}
	if(!empty($category)){
	$query = "SELECT * FROM customer_business WHERE business_id=".$customer_id;
    $result = mysqli_query($link, $query);
    if(empty($result)){
		mysqli_query($link, "INSERT INTO customer_business (business_id) VALUE ('".$customerId."')");
	}
	mysqli_query($link, "UPDATE customer_business SET business_category='$category', gross_annual_income='$annualIncome'");
	}


?>

<script type="text/javascript">
	alert("Info saved successfully");
	window.location.assign("http://localhost/onlinebookstore/?page=account");
</script>