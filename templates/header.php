<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <script defer src='assets/js/app.js'></script>
  <title>Document</title>
</head>
<body>
  <div class="header container">
    <div class="logo">
      Copystar
    </div>
    <div class="nav">
      <a href="/">Главная</a>
      <a href="/catalog.php">Каталог</a>
      <?php if(!$_SESSION['user']): ?>
        <a href="/auth.php">Войти</a>
      <?php elseif($_SESSION['user']): ?>
        <a href="/profile.php">Профиль</a>
        <a href="/basket.php">Корзина</a>
        <?php if($_SESSION['user']['role'] == '2'): ?>
          <a href="/adminproduct.php">Добавить продукт</a>
          <a href="/admincategory.php">Добавить категории</a>
          <a href="/adminpanel.php">Список заказов</a>
        <?php endif ?>
        <a href="database/logout.php">Выйти</a>
      <?php endif ?>
    </div>
  </div>
</body>
</html>