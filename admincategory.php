<?php session_start(); ?>
<body>
  <?php require 'templates/header.php'; ?>
  <?php require 'database/requests.php'; ?>
  <div class="container">
    <table class='w-50 table' border="1">
      <tr>
        <th>Список категорий</th>
      </tr>
      <?php foreach ($categories as $category): ?>
        <tr>
          <td>
            <div><?= $category['category'] ?></div>

            <div class='d-flex'>
              <form action="database/category.php" method='post'>
                <input name='update' value="<?= $category['id'] ?>" type="hidden">
                <button class='btn'>Р</button>
              </form>
              <form action="database/category.php" method='post'>
                <input name='delete' value="<?= $category['id'] ?>" type="hidden">
                <button class='btn'>X</button>
              </form>
            </div>
          </td>
        </tr>
      <?php endforeach ?>
    </table>

    <?php if($_SESSION['categorydata']): ?>
      <?php $categorydata = $_SESSION['categorydata']; ?>
      <form class='form-action' action="database/category.php" method='post'>
        <input name='update_id' value='<?= $categorydata['id'] ?>' type="hidden">
        <input 
          value='<?= $categorydata['category']?>' 
          name='update_category' 
          placeholder='Наименование категории' class='input' type="text">
        <button class='btn' type='submit'>Применить изменения</button>
      </form>
      <?php unset($_SESSION['categorydata']); ?>
    <?php endif ?>

    <form class='form-action' action="database/category.php" method='post'>
      <input name='category' placeholder='Наименование категории' class='input' type="text">
      <button class='btn' type='submit'>Добавить категорию</button>
    </form>
  </div>
</body>