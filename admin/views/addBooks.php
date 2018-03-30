<?php
  if($_POST["book_id"]){
        $book_id = $_POST["book_id"];
        $book_name = $_POST["book_name"];
        $inventory_amount = $_POST["inventory_amount"];
        $book_price = $_POST["book_price"];
        $book_category = $_POST["book_category"];
        $book_genre = $_POST["book_genre"];
        $author = $_POST["author"];
        $publication = $_POST["publication"];
        $book_language = $_POST["book_language"];
        $book_cover_photo = $_FILES["cover_photo"]["name"];

        move_uploaded_file($_FILES["cover_photo"]["tmp_name"],"../pic/" . $_FILES["cover_photo"]["name"]);
        
        $query = "INSERT INTO books VALUES ('$book_id','$book_name','$inventory_amount','$book_price','$book_category','$book_genre','$author','$publication','$book_language','$book_cover_photo');";
        if(mysqli_query($link, $query));
          echo "<div class=\"alert alert-success\" role=\"alert\">New book has been upload!</div>";
    }
?>
<body class="bg-light">

    <div class="container">
      

<div class="row">
  
        <div class="col-md-4 order-md-1 mb-4">
          
        </div>
        <div class="col-md-8 order-md-2">
          <h4 class="mb-3">New Book Info</h4>
          <form class="needs-validation" novalidate action="?page=addBooks" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">ID</label>
                <input type="text" class="form-control" name="book_id" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Book ID is required.
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Name</label>
                <input type="text" class="form-control" name="book_name" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Book Name is required.
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Inventory Amount</label>
                <input type="text" class="form-control" name="inventory_amount" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Inventory Amount is required.
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Price</label>
                <input type="text" class="form-control" name="book_price" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Book Price is required.
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Category</label>
                <input type="text" class="form-control" name="book_category" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Book Category is required.
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Genre</label>
                <input type="text" class="form-control" name="book_genre" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Book Genre is required.
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Author</label>
                <input type="text" class="form-control" name="author" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Author is required.
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Publication</label>
                <input type="text" class="form-control" name="publication" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Publication is required.
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Language</label>
                <input type="text" class="form-control" name="book_language" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Language is required.
                </div>
              </div>
            </div>

            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="cover_photo" id="cover_photo">
                <label class="custom-file-label" for="inputGroupFile01">Choose Picture</label>
            </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
          </form>
        </div>
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
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>