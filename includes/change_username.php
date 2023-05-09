<?php
session_start();

  # Соединение с базой данных (в школе)
  // include("//10.0.114.133/Cernobrovs/includes/dbconnection.php");

  # Соединение с базой данных (дома)
  include("dbconnection.php");

  $username = $_POST['username'];
  $user_code = $_SESSION['user']['kods'];
  
    // Подключиться, если ругается PHP
    # $conn = mysqli_connect("localhost", "root", "mysql", "cernobrovs");

    // Проверка на существующего пользователя
    $check_user = mysqli_query($conn, "SELECT * FROM lietotajs WHERE username = '$username' AND password = '$password'");

    if (mysqli_num_rows($check_user) > 1)
    {
        $_SESSION['message'] = "Šis lietotājvards jau pastāv :(. Izdomā citu!";
        header('Location: ../profile/profile.php');
    }
    else
    {

    $sql =
    "UPDATE lietotajs SET username = '$username' WHERE kods = '$user_code'";

    mysqli_query($conn, $sql);

    $_SESSION['message'] = "<div class=\"alert alert-success\"><p>Lietotājvārds ir nomainīts veiksmīgi!</p></div>
    <div class=\"alert alert-warning\"><p>Pierakstieties vēlreiz, lai iegūtu aktuālos datus!</p></div>";

    header('Location: ../profile/profile.php');
    
    }
?>