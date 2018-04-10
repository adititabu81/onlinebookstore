<?php

    include("functions.php");

    include("views/header.php");

    if ($_GET['page'] == 'cart') {
        
        include("views/cart.php");
        
    } else if ($_GET['page'] == 'search') {
        
        include("views/search.php");
        
    } else if ($_GET['page'] == 'account'){

        include("views/account.php");
        
    } else if ($_GET['page'] == 'detail'){

        include("views/detail.php");
        
    } else if ($_GET['page'] == 'addCart'){

        include("views/addCart.php");
        
    } else 
        include("views/home.php");
        
    include("views/footer.php");


?>