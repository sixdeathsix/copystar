<body>
  <?php require 'templates/header.php'; ?>
  <?php require 'database/requests.php'; ?>

  <div class='container d-flex'>

    <div>
      <img class='product-image' src="<?= $product['image']; ?>" alt="">
    </div>

    <form action="database/addbasket.php" method='post' class='product'>
      <p class='product-name'><?= $product['product']; ?></p>
      <p class='product-price'><?= $product['price']; ?> Р </p>
      <input name='id' value='<?= $product['id']; ?>' type="hidden">
      <input placeholder='Введите количество' class="form_actions" name='count' type="number">
      <button class="btn">В корзину</button>
    </form>

  </div>
</body>