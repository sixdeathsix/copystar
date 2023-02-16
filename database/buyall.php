<?php 

  session_start();

  require 'connect.php';
  require 'requests.php';

  $userId = $_SESSION['user']['id'];

  foreach ($carts as $cart) {

    $id = $cart['id'];
    $count = $cart['count'];

    mysqli_query($connect, "
      INSERT INTO `orders`(`id`, `user_id`, `product_id`, `count`, `status`) VALUES (null,'$userId','$id','$count','1')
    ");

    mysqli_query($connect, "
      delete from cart where user_id = $userId and product_id = $id and count = $count
    ");
  }

  header('Location: ../basket.php');

?>