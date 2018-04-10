<?php 
  function save($cart) {
      $expires = 86400;
      $tmpserialize = serialize($cart);
      setcookie("cart",$tmpserialize,time()+$expires);
    }

  if(empty($_COOKIE[$userid])){
    $cartarray = array();
    save($cartarray);
  } 
  $bookid = $_POST['id'];
  $type = $_POST['type'];
  $quantity = $_POST['quantity'];

  $arr = unserialize($_COOKIE["cart"]);
  $tmp = array($bookid,$type,$quantity);
  $arr[] = $tmp;
  save($arr);
  echo count($arr);
?>