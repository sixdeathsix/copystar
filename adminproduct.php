<?php session_start(); ?>
<body>

  <?php require 'templates/header.php'; ?>
  <?php require 'database/requests.php'; ?>

  <div class="container">

    <table class='w-50 table' border="1">
      <tr>
        <th>Список товаров</th>
      </tr>
      <?php foreach ($items as $product): ?>
        <tr>
          <td>
            <div>id: <?= $product['id'] ?> | Наименование: <?= $product['product'] ?></div>

            <div class='d-flex'>
              <form action="database/product.php" method='post'>
                <input name='update' value="<?= $product['id'] ?>" type="hidden">
                <button class='btn'>Р</button>
              </form>
              <form action="database/product.php" method='post'>
                <input name='delete' value="<?= $product['id'] ?>" type="hidden">
                <button class='btn'>X</button>
              </form>
            </div>
          </td>
        </tr>  
      <?php endforeach ?>
    </table>

    <?php if($_SESSION['productdata']): ?>
      <?php $productdata = $_SESSION['productdata']; ?>
      <form class='form-action' action="database/product.php" method='post'>
        <input name='update_id' value='<?= $productdata['id'] ?>' type="hidden">
        <input 
          name='update_product' value='<?= $productdata['product'] ?>' 
          placeholder='Наименование товара' class='input' type="text">
        <input 
          name='price' value='<?= $productdata['price'] ?>' 
          placeholder='Цена товара' class='input' type="number">
        <button class='btn' type='submit'>Применить изменения</button>
      </form>
      <?php unset($_SESSION['productdata']); ?>
    <?php endif; ?>

    <form class='form-action' action="database/product.php" method='post' enctype='multipart/form-data'>
      <input name='product' placeholder='Наименование товара' class='input' type="text">
      <select class='input' name="categoryId">
        <?php foreach($categories as $category): ?>
          <option value="<?= $category['id'] ?>"><?= $category['category'] ?></option>
        <?php endforeach; ?>
      </select>
      <input name='price' placeholder='Цена товара' class='input' type="number">
      <input name='image' class='input' type="file">
      <button class='btn' type='submit'>Добавить товар</button>
    </form>
  </div>
</body>