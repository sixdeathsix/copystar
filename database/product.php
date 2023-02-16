<?php 
  session_start();
  require 'connect.php';

  $update = $_POST['update'];
  $product = $_POST['product'];
  $price = $_POST['price'];
  $categoryId = $_POST['categoryId'];
  $update_product = $_POST['update_product'];
  $update_id = $_POST['update_id'];
  $filename = $_FILES["image"]["name"];
  $tempname = $_FILES["image"]["tmp_name"];
  $image = "../assets/images/" . $filename;
  $delete = $_POST['delete'];

  if ($update) {
    $productdata = mysqli_query($connect, "
      select * from products where id = $update
    ");

    $_SESSION['productdata'] = mysqli_fetch_assoc($productdata);
  }

  if ($product) {
    mysqli_query($connect, "
      INSERT INTO `products`
      (`id`, `product`, `categoryId`, `price`, `image`) 
      VALUES 
      (null, '$product', '$categoryId', '$price','$image')
    ");

    move_uploaded_file($tempname, $image);

  } else if ($delete) {
    mysqli_query($connect, "
      delete from products where id = $delete
    ");
  } else if ($update_id) {
    mysqli_query($connect, "
      update products 
      set product = '$update_product', 
      price = '$price' 
      where id = '$update_id'
    ");
  }

  header('Location: ../adminproduct.php');
?>