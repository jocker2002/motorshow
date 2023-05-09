<?php
session_start();

  # Соединение с базой данных (в школе)
  // include("//10.0.114.133/Cernobrovs/includes/dbconnection.php");

  # Соединение с базой данных (дома)
  include("dbconnection.php");

  $password = $_POST['password_change'];
  $password_confirm = $_POST['password_change_confirm'];
  $user_code = $_SESSION['user']['kods'];
  
  // Cравниваем введённые пароли
  if ($password === $password_confirm)
  {

  // $password = md5($password);

  // Подключиться, если ругается PHP
  # $conn = mysqli_connect("10.0.114.133", "cernobrovs", "cernobrovs1", "cernobrovs");

  $sql =
  "UPDATE lietotajs SET password = '$password' WHERE kods = '$user_code'";

  mysqli_query($conn, $sql);

  $_SESSION['message'] = "<div class=\"alert alert-success\"><p>Parole ir nomainīta veiksmīgi!</p></div>";
  header('Location: ../profile/profile.php');
  
  }
  else
  {
    $_SESSION['message'] = "<div class=\"alert alert-danger\"><p>Paroles nesakrīt!</p></div>";
  header('Location: ../profile/profile.php');
  }


?>