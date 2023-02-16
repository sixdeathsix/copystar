<?php 
  session_start();
  require 'connect.php';

  $update = $_POST['update'];
  $category = $_POST['category'];
  $update_category = $_POST['update_category'];
  $update_id = $_POST['update_id'];
  $delete = $_POST['delete'];

  if ($update) {
    $categorydata = mysqli_query($connect, "
      select * from categories where id = $update
    ");

    $_SESSION['categorydata'] = mysqli_fetch_assoc($categorydata);
  }

  if ($category) {
    mysqli_query($connect, "
      insert into categories values (null, '$category')
    ");

    move_uploaded_file($tempname, $image);
  } else if ($delete) {
    mysqli_query($connect, "
      delete from categories where id = $delete
    ");
  } else if ($update_id) {
    mysqli_query($connect, "
      update categories 
      set category = '$update_category' 
      where id = $update_id
    ");
  }

  header('Location: ../admincategory.php');

?>