<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <style type="text/css">
    .card-link{
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    }

    .card {
      min-height:450px;
    }
</style>
  </head>
  <body>

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light ">
  <a class="navbar-brand" href="http://localhost/onlinebookstore/"><img src="pic/bookstore_icon.png" width="30" height="30" class="d-inline-block align-top" alt="">BookStore</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/onlinebookstore/?page=search">AllBooks <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Account & Lists
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="?page=account">Your Account</a>
          <a class="dropdown-item" href="?page=orders">Your Orders</a>
        </div>
      </li>
    </ul>
    <form class="form-inline">
    <input type="hidden" name="page" value="search">
    <input type="text" name="q" class="form-control mr-sm-2" id="search" placeholder="Search Books">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
    <div class="loginandsignup" style="position: fixed;right: 10px;">
      
      <?php if ($_SESSION['id']) { ?>
        <a href="?page=cart"><img src="pic/cart.png"  width="35" height="35"></a>
        <a class="btn btn-outline-success " href="?function=logout">Logout</a>
      
      <?php } else { ?>
      
    <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#myModal">Login/Signup</button>
      
      <?php } ?>
  </div>
  </div>
</nav>