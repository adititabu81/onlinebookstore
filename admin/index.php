<?php
    if (empty($_COOKIE["admin_id"])){
    	echo "<script>alert('Please sign in!');</script>";
    	header('Refresh:0.1,Url=http://localhost/onlinebookstore/admin/views/adminLogin.php');
		die;
    }
    
    include("../functions.php");

    include("views/header.php");

    include("views/home.php");

    include("views/footer.php");
?>