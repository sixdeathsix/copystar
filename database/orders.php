<?php 
  require 'connect.php';
  $accept = $_POST['accept'];
  $cancel = $_POST['cancel'];

  if ($accept) {
    $categorydata = mysqli_query($connect, "
      update orders set status = '2' where id = '$accept'
    ");
  }

  if ($cancel) {
    mysqli_query($connect, "
      update orders set status = '3' where id = '$cancel'
    ");
  } 

  header('Location: ../adminpanel.php');
?>