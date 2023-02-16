<?php 
  session_start();

  if($_SESSION['user']) {
    header('Location: index.php');
  }
?>

<body>
  <?php require 'templates/header.php'; ?>
  <div class="auth">
    <form action="database/signin.php" method='post'>
      <input class='form_actions' placeholder='Введите логин' name='login' type="text">
      <input class='form_actions' placeholder='Введите пароль' name='password'  type="password">
      <button class='form_actions btn' type='submit'>Войти</button>
      <p>
        У вас нет аккаунта? - <a href="/register.php">Зарегистрируйтесь</a>!
      </p>
      <?php if($_SESSION['message']): ?>
        <p class="message"><?= $_SESSION['message']; ?></p>
      <?php endif; unset($_SESSION['message']); ?>
    </form>
  </div>
</body>