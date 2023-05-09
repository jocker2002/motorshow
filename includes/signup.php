<?php
session_start();

if ($_SESSION['user']) {
  header('Location: ..profile/profile.php');
}


# Соединение с базой данных (дома)
include("dbconnection.php");

function validation($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$username = validation($_POST['username']);
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
// Подключиться, если ругается PHP
#$conn = mysqli_connect("localhost", "root", "mysql", "cernobrovs");

if (!empty($username) && !empty($password) && !empty($password_confirm)) {
  if ($password == $password_confirm) { // Проверка на совпадение паролей

    // Запрос для проверки на существующего пользователя
    $check_user = mysqli_query($conn, "SELECT * FROM lietotajs WHERE username = '$username'");

    if (mysqli_num_rows($check_user) > 0) { // Проверка на существующего пользователя
      $_SESSION['message'] = "<div class=\"alert alert-danger\"><p>Lietotājvards \"<strong>$username</strong>\" jau pastāv! Izdomājiet citu!</p></div>";

      header('Location: ../register.php');
    } else { // Если нет ошибок, то добавляем в БД нового пользователя

      // $password = md5($password);

      // Подключиться, если ругается PHP
      # $conn = mysqli_connect("10.0.114.133", "cernobrovs", "cernobrovs1", "cernobrovs");

      $sql =
        "INSERT INTO lietotajs VALUES (NULL,'$username','$password','http://localhost/Cernobrovs/navbar/assets/default.png')";

      mysqli_query($conn, $sql);

      $_SESSION['message'] = "<div class=\"alert alert-success\"><p>Reģistrācija veiksmīgi pabeigta!</p></div>";
      echo "num_rows = " . $num_rows;
      header('Location: ../login.php');
    }
  } else {
    $_SESSION['message'] = "<div class=\"alert alert-danger\"><p>Paroles nesakrīt!</p></div>";
    header('Location: ../register.php');
  }
} else {
  $_SESSION['message'] = "<div class=\"alert alert-danger\"><p>Lūdzu, aizpildiet visus laukus!</p></div>";
  header('Location: ../register.php');
}
