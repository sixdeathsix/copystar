<?php 

  session_start();

  require 'connect.php';

  $login = $_POST['login'];
  $password = $_POST['password'];

  $check_user = mysqli_query($connect, "
    select * from users where login = '$login' and password = '$password'
  ");

  if(mysqli_num_rows($check_user) > 0) {
    
    $user = mysqli_fetch_assoc($check_user);

    $_SESSION['user'] = [
      'id' => $user['id'],
      'email' => $user['email'],
      'surname' => $user['surname'],
      'name' => $user['name'],
      'patronymic' => $user['patronymic'],
      'login' => $user['login'], 
      'role' => $user['role']
    ];

    header('Location: ../index.php');

  } else {
    $_SESSION['message'] = 'Ошибка авторизации';
    header('Location: ../auth.php');
  }

?>