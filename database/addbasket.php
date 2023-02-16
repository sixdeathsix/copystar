<?php 

  session_start();

  require 'connect.php';

  $id = $_POST['id'];
  $userId = $_SESSION['user']['id'];
  $count = $_POST['count'];

  mysqli_query($connect, "
    INSERT INTO `cart`(`id`, `user_id`, `product_id`, `count`) VALUES (null,'$userId','$id','$count')
  ");

  header('Location: ../basket.php');

?>