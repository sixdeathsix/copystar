<?php 
  session_start();
  $user = $_SESSION['user'];

  if(!$_SESSION['user']) {
    header('Location: index.php');
  }
?>

<body>
  <?php require 'templates/header.php'; ?>
  <?php require 'database/requests.php'; ?>

  <div class="container">
    <div>ID пользователя: <?= $user['id']; ?></div>
    <div>ФИО пользователя: 
      <?= $user['surname']; ?> 
      <?= $user['name']; ?> 
      <?= $user['patronymic']; ?>
    </div>
    <div>Логин пользователя: <?= $user['login']; ?></div>
    <div>Почта пользователя: <?= $user['email']; ?></div>

    <h2>Новые заказы</h2>
    <div class="d-flex align-center products">
      <?php foreach($new_orders as $order): ?>
        <a href="product.php?id=<?= $order['id']; ?>">
          <div class="product-item">
            <img src="<?= $order['image']; ?>" alt="">
            <p><?= $order['product']; ?></p>
            <p class="bold"><?= $order['price']; ?> Р </p>
            <p>Количество: <?= $order['count']; ?></p>
          </div>
        </a>
      <?php endforeach; ?>
     </div>

     <h2>Подтвержденные заказы</h2>
    <div class="d-flex align-center products">
      <?php foreach($accepted_orders as $order): ?>
        <a href="product.php?id=<?= $order['id']; ?>">
          <div class="product-item">
            <img src="<?= $order['image']; ?>" alt="">
            <p><?= $order['product']; ?></p>
            <p class="bold"><?= $order['price']; ?> Р </p>
            <p>Количество: <?= $order['count']; ?></p>
          </div>
        </a>
      <?php endforeach; ?>
     </div>

     <h2>Отмененные заказы</h2>
    <div class="d-flex align-center products">
      <?php foreach($canceled_orders as $order): ?>
        <a href="product.php?id=<?= $order['id']; ?>">
          <div class="product-item">
            <img src="<?= $order['image']; ?>" alt="">
            <p><?= $order['product']; ?></p>
            <p class="bold"><?= $order['price']; ?> Р </p>
            <p>Количество: <?= $order['count']; ?></p>
          </div>
        </a>
      <?php endforeach; ?>
     </div>

  </div>
</body>