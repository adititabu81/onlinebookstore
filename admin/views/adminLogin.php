<?php
    if (!empty($_COOKIE["admin_id"])){

      header('Location: http://localhost/onlinebookstore/admin');

    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>

  <body class="text-center">
    <form class="form-signin">
      <img class="mb-4" src="../pic/administrator.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <p>
      <label for="select">Roles Select</label>
      <select id="select">
        <option value="">Manager</option>
        <option value="">Salesperson</option>
      </select>
    </p>
      </div>
      <button id="loginButton" class="btn btn-lg btn-primary btn-block" type="button">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018 Bookstore Admin System</p>
    </form>
    <script>
    $("#loginButton").click(function() {
        
        $.ajax({
            type: "POST",
            url: "http://localhost/onlinebookstore/admin/actions.php?action=adminLoginIn",
            data: "",
            success: function(result) {
                if (result == "1") {
                    
                    window.location.assign("http://localhost/onlinebookstore/admin");
                    
                } else {
                    
                    $("#loginAlert").html(result).show();
                    
                }
            }
            
        })
        
    })
    </script>
    
  </body>
</html>
