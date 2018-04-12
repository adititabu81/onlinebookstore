<?php 
  function save($cart) {
      $expires = 86400;
      $tmpserialize = serialize($cart);
      setcookie("cart",$tmpserialize,time()+$expires);
    }

  $book_id = $_POST['id'];
  echo $book_id;
  $arr = unserialize($_COOKIE["cart"]);
  for($i = 0; $i < count($arr);$i++){
    if($arr[$i][0] == $book_id){
      unset($arr[$i]);
      $arr = array_values($arr);
      break;
    }
  }
  save($arr);
  header('Refresh:0.1,Url=http://localhost/onlinebookstore/?page=cart');
?>