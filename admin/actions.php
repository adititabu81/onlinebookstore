<?php
	include("functions.php");
    if ($_GET['action'] == "adminLoginIn") {
    	if($_POST['role'] == "manager"){
    		$query = "SELECT * FROM manager WHERE manager_email = '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
            
            $result = mysqli_query($link, $query);
            
            $row = mysqli_fetch_assoc($result);
                
                if ($row['manager_password'] == $_POST['password']) {
                    setcookie("id", $row['manager_id'], time()+3600);
                    setcookie("role", "manager", time()+3600);
                    echo 1;  
                } else {
                    
                    $error = "Could not find that email/password combination. Please try again.";  
                }
    	} else {
    		$query = "SELECT * FROM salesperson WHERE salesperson_email = '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
            
            $result = mysqli_query($link, $query);
            
            $row = mysqli_fetch_assoc($result);
                
                if ($row['salesperson_password'] == $_POST['password']) {
                    setcookie("id", $row['salesperson_id'], time()+3600);
                    setcookie("role", "salesperson", time()+3600);
                    setcookie("store_id", $row['store_id'], time()+3600);
                    echo 1;  
                } else {
                    
                    $error = "Could not find that email/password combination. Please try again.";
                }
    	}
    	echo $error;
    }

    if ($_GET['action'] == "signOut") {
        setcookie("role","", time()-3600);
        setcookie("id", "", time()-3600);
        setcookie("store_id", "", time()-3600);
        echo 1;
    }

?>