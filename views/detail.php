
<div class="container">
<?php
// Start the session
session_start();
?>
    
    <?php
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
    $_SESSION['cart'] = array();

if($_POST['id'] != null){

$cat = $_POST['type'];
$qty = $_POST['quantity'];
$book_id = $_POST['id'];
echo "$book_id";
$_SESSION['cart'][$id] = array('type' => $cat, 'quantity' => $qty);   
}

else
$book_id = $_GET['id'];
    
$stmt = $conn->prepare("SELECT book_name, inventory_amount, book_price, book_category, book_genre, author, publication, book_language, book_cover_photo  FROM books WHERE book_id = ?");

$stmt->bind_param("s", $book_id);

$stmt->execute();

$stmt->bind_result($book_name, $inventory_amount, $book_price, $book_category, $book_genre, $author, $publication, $book_language, $book_cover_photo);

while($stmt->fetch()) {

    echo "<div class=\"col-lg-auto float-left\">
  <div class=\"card \" style=\"width: 15rem;\">
    <img class=\"card-img-top\" src=\"pic/" . $book_cover_photo . "\" alt=\"Card image cap\">
    <div class=\"card-body\">
      <p class=\"card-text\">$" . $book_price . "</p>
    </div>
  </div>
  </div>";


    echo "<div class='col-sm-auto'><span style='font-size: 200%'>" . $book_name . "</span><br>
       <span style='font-size: 100%'>By " . $author . "</span><br>
       <span style='font-size: 100%'>Genre: " . $book_genre . "</span><br>
       <span style='font-size: 100%'>Publication: " . $publication . "</span><br>";

    echo "</div>";

    echo "<div class='col-lg-auto float-right'>";
    echo "Categories Available in: ";
    $keywords = preg_split("/[\s,]+/", $book_category);
    echo "<form method=POST action=\"?page=addCart\">";
    echo "<input type='hidden' name='id' value='$book_id'>";
    echo "<table border='1'>";
    echo "";
    echo "<tr><th><input type ='radio' name = 'type' value='$keywords[0]'>$keywords[0]</th><th><input type ='radio' name = 'type' value='$keywords[1]' checked>$keywords[1]</th><th><input type ='radio' name = 'type' value='$keywords[2]'>$keywords[2]</th></tr>";
    echo "</table>";
    if ($inventory_amount > 0) {
        echo "<span style='font-size: 150%; color:green'>IN STOCK</span><br>";
    } else {
        echo "<span style='font-size: 150%; color:red'>OUT OF STOCK</span><br>";
    }

    echo "Qty<br>";
    echo "<select name='quantity'>";

if ($inventory_amount > 0) {
    for ($i = 1; $i <= $inventory_amount && $i<=30; $i++) {
        echo "<option value='$i'>" . $i . "</option>";
    }
}

    echo "</select>";
    echo "<br>";
if ($inventory_amount > 0) {
    echo "<input type='submit' value='Add to Cart'>";
}
else{
    echo "<input type='submit' value='Add to Cart' disabled>";
}
    echo "</form>";
    echo "</div>";
}
?>
  </div>
  <div style="clear: both;">
    <p>&nbsp</p>
    <p>&nbsp</p>
  </div>
