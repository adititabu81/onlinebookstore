<div class="container">
<?php
  $query = "SELECT book_id,book_name,book_price,book_photoid FROM books";
  $result = mysqli_query($link, $query);
  echo "<div class=\"alert alert-info\" role=\"alert\">
  There are total ".mysqli_num_rows($result)." results!</div>";
  $book_id;
  $book_name;
  $book_price;
  $book_photoid;
  if ($result){
      while($row = $result->fetch_assoc()){
          foreach($row as $key=>$value){
              switch ($key){
              case "book_id":
              $book_id = $value;
              break;  
              case "book_name":
              $book_name = $value;
              break;
              case "book_price":
              $book_price = $value;
              break;
              case "book_photoid":
              $book_photoid = $value;
              break;
              default:
              break;
            }
          } 
          echo "<div class=\"col-sm-12 col-md-3 float-left\">
  <div class=\"card\" style=\"width: 15rem;\">
    <img class=\"card-img-top\" src=\"pic/".$book_photoid.".jpg\" alt=\"Card image cap\">
    <div class=\"card-body\">
      <p class=\"card-text\">$".$book_price."</p>
    <a href=\"?page=search&q=".$book_id."\" class=\"card-link\">".$book_name."</a>
    </div>
  </div>
  </div>
</div>";
        }

      }
      
?>
  

