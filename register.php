<?php 
  session_start();
  
  if($_SESSION['user']) {
    header('Location: index.php');
  }
?>

<body>
  <?php require 'templates/header.php'; ?>
  <div class="auth">
    <form action="database/signup.php" method='post'>
      <input class='form_actions' placeholder='Фамилия' name='surname' type="text">
      <input class='form_actions' placeholder='Имя' name='name'  type="text">
      <input class='form_actions' placeholder='Отчество' name='patronymic'  type="text">
      <input class='form_actions' placeholder='Желаемый логин' name='login'  type="text">
      <input class='form_actions' placeholder='Email' name='email'  type="text">
      <input class='form_actions' placeholder='Пароль' name='password'  type="password">
      <button class='form_actions btn' type='submit'>Зарегистрироваться</button>
      <p>
        У вас уже есть аккаунт? - <a href="/auth.php">Войдите</a>!
      </p>
      <?php if($_SESSION['message']): ?>
        <p class="message"><?= $_SESSION['message']; ?></p>
      <?php endif; unset($_SESSION['message']); ?>
    </form>
  </div>
</body>