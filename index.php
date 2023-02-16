<body>
  <?php require 'templates/header.php'; ?>
  <?php require 'database/requests.php'; ?>

  <div class='container'>

    <div id="viewport">
      <div class="slider">
        <?php foreach($sliderItems as $item): ?>
          <div class="slide"><p><?= $item['product'] ?></p><img src="<?= $item['image'] ?>" alt=""></div>
        <?php endforeach ?>
      </div>
    </div>

    <div class='slider-button'>
      <button class="prev btn" id="prev">Назад</button>
      <button class="next btn" id="next">Вперёд</button>
    </div>

  </div>

</body>