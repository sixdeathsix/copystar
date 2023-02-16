<?php
    
    session_start();

    require 'connect.php';

    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $patronymic = $_POST['patronymic'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $roleId  = 1;

    $check_login = mysqli_query($connect, "select login from users where login = '$login'");

    if(mysqli_num_rows($check_login) < 1) {

      mysqli_query($connect, "
        insert into users values (null, '$surname', '$name', '$patronymic', '$login', '$email', '$password', '$roleId')
      ");

      $_SESSION['message'] = 'Регистрация прошла успешно';
      header('Location: ../auth.php');
    } else {
      $_SESSION['message'] = 'Пользователь с таким логином уже существует';
      header('Location: ../register.php');
    }

?>