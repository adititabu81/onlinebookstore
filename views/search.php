<div class="container">
<?php
  $query = "SELECT book_id,book_name,book_price,book_cover_photo FROM books";
  $result = mysqli_query($link, $query);
  echo "<div class=\"alert alert-info\" role=\"alert\">
  There are total ".mysqli_num_rows($result)." results!</div>";
  $book_id;
  $book_name;
  $book_price;
  $book_cover_photo;
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
              case "book_cover_photo":
              $book_cover_photo = $value;
              break;
              default:
              break;
            }
          } 
          echo "<div class=\"col-sm-12 col-md-3 float-left\">
  <div class=\"card \" style=\"width: 15rem;\">
    <img class=\"card-img-top\" src=\"pic/".$book_cover_photo."\" alt=\"Card image cap\">
    <div class=\"card-body\">
      <p class=\"card-text\">$".$book_price."</p>
    <a href=\"?page=search&q=".$book_id."\" class=\"card-link\">".$book_name."</a>
    </div>
  </div>
  </div>";
        }

      }
      
?>
  </div>
  <div style="clear: both;">
    <p>&nbsp</p>
    <p>&nbsp</p>
  </div>
