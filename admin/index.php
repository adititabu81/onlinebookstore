<?php
    if ($_SESSION['id'] == ""){
    	header('Refresh:3,Url=http://localhost/onlinebookstore/admin/views/adminLogin.php');
		alter '3s 后跳转';
		die;
    	//header("Location: http://localhost/onlinebookstore/admin/views/adminLogin.php");     
    }
    
    include("../functions.php");

    include("views/header.php");

    include("views/home.php");

    include("views/footer.php");
?>