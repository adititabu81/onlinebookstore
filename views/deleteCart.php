<?php 
  function save($cart) {
      $expires = 86400;
      $tmpserialize = serialize($cart);
      setcookie("cart",$tmpserialize,time()+$expires);
    }

  if(empty($_COOKIE["cart"])){
    $cartarray = array();
    save($cartarray);
  } 

  $book_id = $_GET['id'];
  echo $book_id;
  $arr = unserialize($_COOKIE["cart"]);
  foreach ($arr as $value) {
    if($value[0] == $book_id){
      unset($value);
      break;
    }
  }
  save($arr);
  echo count($arr);
?>