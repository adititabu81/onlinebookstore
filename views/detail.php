
<div class="container">
    <?php
   echo " <div class='row' id='detail' style='width: 100vw;
 position: relative;
 margin-left: -50vw;
 height: 100%;
 left: 50%;'>";
    
/**
 * Created by PhpStorm.
 * User: Ashutosh
 * Date: 4/4/18
 * Time: 12:45 PM
 */

$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "bookstore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    // $_SESSION['cart'] = array();

// if($_POST['id'] != null){

// $cat = $_POST['type'];
// $qty = $_POST['quantity'];
// $book_id = $_POST['id'];
// echo "$book_id";
// $_SESSION['cart'][$id] = array('type' => $cat, 'quantity' => $qty);   
// }

// else
$book_id = $_GET['q'];
    
$stmt = $conn->prepare("SELECT book_name, inventory_amount, book_price, book_category, book_genre, author, publication, book_language, book_cover_photo, book_description FROM books WHERE book_id = ?");

$stmt->bind_param("s", $book_id);

$stmt->execute();

$stmt->bind_result($book_name, $inventory_amount, $book_price, $book_category, $book_genre, $author, $publication, $book_language, $book_cover_photo, $book_description);

while($stmt->fetch()) {

    echo "<div class=\"col-lg-4\">
  <div class=\"card \" style=\"width: 25rem;\">
    <img class=\"card-img-top\" src=\"pic/" . $book_cover_photo . "\" alt=\"Card image cap\">
  </div>
  </div>";


    echo "<div class='col-lg-5'><span style='font-size: 200%'>" . $book_name . "</span><br>
       <span style='font-size: 100%'>By " . $author . "</span><br>
       <span style='font-size: 100%'>Genre: " . $book_genre . "</span><br>
       <span style='font-size: 100%'>Publication: " . $publication . "</span><br>
       <span style='font-size: 100%'>Price: $" . $book_price . "</span><br><br><br>";
    echo "<span style='font-size: 100%'>Description: " . $book_description . "</span><br>";
    
    echo "</div>";

    echo "<div class='col-lg-3'>";
    echo "Categories Available in: ";
    $keywords = preg_split("/[\s,]+/", $book_category);
    echo "<form method=POST action=\"?page=addCart\">";
    echo "<input type='hidden' name='id' value='$book_id'>";
    
    $i = 0;
    
    foreach($keywords as $value){
        if($i == 0)
        echo "<input type ='radio' name = 'type' value='$value' checked>$value";
        else
        echo "<input type ='radio' name = 'type' value='$value'>$value";
        
        $i++;
    }
    
    
    echo "<br>";
    if ($inventory_amount > 0) {
        echo "<span style='font-size: 150%; color:green'>IN STOCK</span><br>";
    } else {
        echo "<span style='font-size: 150%; color:red'>OUT OF STOCK</span><br>";
    }

    echo "Qty<br>";
    echo "<select name='quantity' class='form-control'>";

if ($inventory_amount > 0) {
    for ($i = 1; $i <= $inventory_amount && $i<=30; $i++) {
        echo "<option value='$i'>" . $i . "</option>";
    }
}

    echo "</select>";
    echo "<br>";
if ($inventory_amount > 0) {
    echo "<input type='submit' class='btn btn-outline-success' value='Add to Cart'>";
}
else{
    echo "<input type='submit' value='Add to Cart' disabled>";
}
    echo "</form>";
    echo "</div>";
}

  echo "</div>";

    $query = "SELECT customer_name, review, star_rating FROM customers c,book_review br WHERE c.customer_id = br.customer_id AND br.book_id = ? ORDER BY star_rating DESC;";
    
    $stmt = $link->prepare($query);
    $stmt->bind_param("s", $book_id);
    $stmt->execute();
    
    $stmt->store_result();
    $num_of_rows = $stmt->num_rows;
    
    $stmt->bind_result($name,$review,$stars);
    
    
    echo "<br><br><br><br><div class=row>
    Reviews:<br>
    <table class='table'>
        <thead class='thead'>
            <tr>
                <th scope='col'>Name</th>
                <th scope='col'>Review</th>
                <th scope='col'>Stars</th>
            </tr>
    </thead>";
     while ($stmt->fetch()) { 
        echo "<tr>
      <th scope='row'>".$name."</th>
      <td>".$review."</td>";
         
      echo "<td>";
         while($stars > 0){echo "<img src='pic/star.png'>"; $stars--;}
        echo"</td>";
             
        echo "</tr>
        ";}
    echo"</table>
    </div>";
        ?>
</div>
  <div style="clear: both;">
    <p>&nbsp</p>
    <p>&nbsp</p>
  </div>
