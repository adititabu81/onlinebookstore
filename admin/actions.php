<?php

    if ($_GET['action'] == "adminLoginIn") {
        setcookie("admin_id", "sucess", time()+3600);
        echo 1;
    }

    if ($_GET['action'] == "signOut") {
        setcookie("admin_id", "", time()-3600);
        echo 1;
    }

?>