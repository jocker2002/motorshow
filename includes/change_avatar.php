<?php
session_start();

  # Соединение с базой данных (в школе)
  // include("//10.0.114.133/Cernobrovs/includes/dbconnection.php");

  # Соединение с базой данных (дома)
  include("dbconnection.php");

  $avatar = $_POST['avatar_url'];
  $user_code = $_SESSION['user']['kods'];
  
  // Подключиться, если ругается PHP
  # $conn = mysqli_connect("10.0.114.133", "cernobrovs", "cernobrovs1", "cernobrovs");

  $sql =
  "UPDATE lietotajs SET avatar = '$avatar' WHERE kods = '$user_code'";

  mysqli_query($conn, $sql);

  $_SESSION['message'] = "<div class=\"alert alert-success\"><p>Attēls ir nomainīts veiksmīgi!</p></div>
  <div class=\"alert alert-warning\"><p>Pierakstieties vēlreiz, lai iegūtu aktuālos datus!</p></div>";
  header('Location: ../profile/profile.php');
  
?>