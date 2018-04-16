<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">BookStore Admin System</a>
      <li>
          <font color="red">Hi ! <?php
            $query = "SELECT * FROM ".$_COOKIE["role"]." WHERE ".$_COOKIE["role"]."_id='".$_COOKIE["id"]."'";
            $result = mysqli_query($link, $query);
            $row = $result->fetch_assoc();
            $tmp = $_COOKIE["role"]."_name";
            echo $_COOKIE["role"]."  ".$row[$tmp];
          ?></font>
        </li>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a id="signOut" class="nav-link" href="">Sign out</a>
        </li>
      </ul>

    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=orders">
                  <span data-feather="file"></span>
                  Orders
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=addBooks">
                  <span data-feather="shopping-cart"></span>
                  Books
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li>


            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="?page=genreStatistics">
                  <span data-feather="file-text"></span>
                  SalesByGenre
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=salesOfStores">
                  <span data-feather="file-text"></span>
                  SalesByStores
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=totalSales">
                  <span data-feather="file-text"></span>
                  SalesBybooks
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=salesByYear">
                  <span data-feather="file-text"></span>
                  SalesByYear
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=salesByRegion">
                  <span data-feather="file-text"></span>
                  SalesByRegion
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=topPopular">
                  <span data-feather="file-text"></span>
                  TopPopular
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=monthlySales">
                  <span data-feather="file-text"></span>
                  MonthlySales
                </a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="col-md-8 ">
          <?php
            if ($_GET['page'] == 'addBooks') {
                include("views/addBooks.php");
            } else if ($_GET['page'] == 'orders') {
                include("views/orders.php");
            } else if ($_GET['page'] == 'updateOrder') {
                include("views/updateOrder.php");
            } else if ($_GET['page'] == 'deleteOrder') {
                include("views/deleteOrder.php");
            } else if ($_GET['page'] == 'genreStatistics') {
                include("views/genreStatistics.php");
            } else if ($_GET['page'] == 'salesOfStores') {
                include("views/salesOfStores.php");
            } else if ($_GET['page'] == 'totalSales') {
                include("views/totalSales.php");
            } else if ($_GET['page'] == 'topPopular') {
                include("views/topPopular.php");
            } else if ($_GET['page'] == 'monthlySales') {
                include("views/monthlySales.php");
            } else if ($_GET['page'] == 'salesByYear') {
                include("views/salesByYear.php");
            } else if ($_GET['page'] == 'salesByRegion') {
                include("views/salesByRegion.php");
            }
          ?>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      $("#signOut").click(function() {

        $.ajax({
            type: "POST",
            url: "http://localhost/onlinebookstore/admin/actions.php?action=signOut",
            data: "",
            success: function(result) {
                if (result == "1") {

                    window.location.assign("http://localhost/onlinebookstore/admin/views/adminLogin.php");

                } else {

                    $("#loginAlert").html(result).show();

                }
            }

        })

    })
    </script>
  </body>
</html>
