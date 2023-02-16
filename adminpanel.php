<body>
  <?php require 'templates/header.php'; ?>
  <?php require 'database/requests.php'; ?>

  <div class="container">
    <table class='w-50 table' border="1">
      <tr>
        <th>Список заказов</th>
      </tr>
      <?php foreach ($orders as $order): ?>
        <tr>
          <td>
            <div>
              <div>
                Номер заказа: <?= $order['id'] ?> 
                Наименование товара: <?= $order['product'] ?>
              </div>
              <div>
                ФИО заказчика: <?= $order['surname'] ?> <?= $order['name'] ?> <?= $order['patronymic'] ?>
              </div>
            </div>

            <div class='d-flex'>
              <form action="database/orders.php" method='post'>
                <input name='accept' value="<?= $order['id'] ?>" type="hidden">
                <button class='btn'>&#9989;</button>
              </form>
              <form action="database/orders.php" method='post'>
                <input name='cancel' value="<?= $order['id'] ?>" type="hidden">
                <button class='btn'>&#10060;</button>
              </form>
            </div>
          </td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>
</body>