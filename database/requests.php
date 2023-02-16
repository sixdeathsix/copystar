<?php 

  session_start();

  function fetch_data($string) {

    require 'connect.php';

    return mysqli_fetch_all(mysqli_query($connect, $string), MYSQLI_ASSOC);

  }

  $sliderItems = fetch_data("
    select p.id, p.product, c.category, p.price, p.image from products as p
    left join categories as c on c.id = p.categoryId
    order by p.id desc limit 5
  ");

  $category = $_GET['category'];

  $items = fetch_data("
    select p.id, p.product, c.category, p.price, p.image from products as p
    left join categories as c on c.id = p.categoryId
    where c.id like '%$category%'
  ");

  $categories = fetch_data("
    select * from categories
  ");

  $id = $_GET['id'];

  $product = fetch_data("
    select p.id, p.product, c.category, p.price, p.image from products as p
    left join categories as c on c.id = p.categoryId
    where p.id = '$id'
  ");

  $product = $product[0];

  if($_SESSION['user']) {

    $userId = $_SESSION['user']['id'];

    $new_orders = fetch_data("
      select * from orders o 
      left join statuses s on s.id = o.status
      left join products p on p.id = o.product_id
      where o.user_id = '$userId' and s.status = 'Новый';
    ");

    $accepted_orders = fetch_data("
      select * from orders o 
      left join statuses s on s.id = o.status
      left join products p on p.id = o.product_id
      where o.user_id = '$userId' and s.status = 'Подтвержденный';
    ");

    $canceled_orders = fetch_data("
      select * from orders o 
      left join statuses s on s.id = o.status
      left join products p on p.id = o.product_id
      where o.user_id = '$userId' and s.status = 'Отмененный';
    ");

    $carts = fetch_data("
      select * from cart c
      left join products p on p.id = c.product_id
      where c.user_id = '$userId'
    ");
  
  }
  
  $orders = fetch_data("
    select o.id, o.count, s.status, p.product, p.price, u.surname, u.name, u.patronymic from orders o
    left join products p on p.id = o.product_id
    left join users u on u.id = o.user_id
    left join statuses s on s.id = o.status
    where o.status = 1;
  ");

?>