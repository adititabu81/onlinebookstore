<div class="container">
<?php
    
    $keyword = $_GET['q'];
    
    
    if(!(is_numeric($keyword) && $keyword > 0 && $keyword == round($keyword, 0))){
    $keyword = "%".$keyword."%";
    }
    $query = "SELECT book_id,book_name,book_price,book_cover_photo FROM books WHERE book_name LIKE  ? OR book_genre LIKE ? OR book_category LIKE ? OR book_genre LIKE ? OR author LIKE ? OR publication LIKE ? OR book_id = ? ";
    
    $stmt = $link->prepare($query);
    $stmt->bind_param("sssssss", $keyword,$keyword,$keyword,$keyword,$keyword,$keyword,$keyword);
    $stmt->execute();
    
    $stmt->store_result();
    $num_of_rows = $stmt->num_rows;
    
    $stmt->bind_result($book_id,$book_name,$book_price,$book_cover_photo);

  echo "<div class=\"alert alert-info\" role=\"alert\">
  There are total ".$num_of_rows." results!</div>";
 while ($stmt->fetch()) {         
          echo "<div class=\"col-sm-12 col-md-3 float-left\">
  <div class=\"card \" style=\"width: 15rem;\">
    <img class=\"card-img-top\" src=\"pic/".$book_cover_photo."\" alt=\"Card image cap\">
    <div class=\"card-body\">
      <p class=\"card-text\">$".$book_price."</p>
    <a href=\"?page=detail&q=".$book_id."\" class=\"card-link\">".$book_name."</a>
    </div>
  </div>
  </div>";
        }
      
?>
  </div>
  <div style="clear: both;">
    <p>&nbsp</p>
    <p>&nbsp</p>
  </div>
