<?php
session_start();
unset($_SESSION['carinfo']);
if (!$_SESSION['user']) {
  header('Location: ../home.php');
}
?>

<!DOCTYPE HTML>
<html>

<head>
  <?php

  # Навигационное меню
  include("../navbar/navbar.php");

  # Соединение с базой данных
  require_once("../includes/dbconnection.php");

  ?>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="../newcars/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font: 14px "Helvetica Neue", Helvetica, Arial, sans-serif;
      background-color: rgb(245, 251, 255);
    }

    .error {
      color: #FF0000;
    }

    .btn {
      width: 100%;
    }

    #profile {
      border: 2px solid #dbdfe2;
      background-color:white;
    }

    #profile td {
      padding: 10px;
      /*
      border: 3px solid grey;
      */
    }

    #profile tr:first-child td:first-child {
      width:150px;
    }

    #profile tr:nth-child(1) td:nth-child(3) {
      width:50px;
    }

    #profile tr:nth-child(1) td:nth-child(4) {
      width:150px;
    }

    #profile tr:nth-child(1) td:nth-child(5) {
      width:265px;
    }

    #profile label {
      margin-top: 8px;
      font-size: 18px;
      font-weight: bold;
    }
  </style>
</head>

<body>

  <br>
  <center>

    <!-- Профиль -->

    <h2 style="margin: 10px;">Mans profils</h2>

    <?php
    // Вывод сообщения
    if ($_SESSION['message']) {
      echo $_SESSION['message'];
      unset($_SESSION['message']);
    }
    ?>

    <br><br>

    <table id="profile">

      <tr>

        <td style="text-align:right">
          <label style="margin-bottom:79px">Avatars</label>
        </td>

        <td style="text-align:center" rowspan="2">
          <img src=<?= $_SESSION['user']['avatar'] ?> width="265" alt="Avatar">
        </td>
        <td>
          &nbsp
        </td>
        <td style="text-align:right">
          <label style="margin-bottom:79px">Lietotājvārds</label><br>
        </td>

        <td style="padding-right:20px">
          <div class="form-group">
            <form action="../includes/change_username.php" method="post" enctype="multipart/form-data">
              <input class="form-control" type="text" name="username" placeholder="nickname" value=<?= $_SESSION['user']['username'] ?>><br>
              <input type="submit" class="btn btn-primary" name="submit_username" value="Saglabāt lietotājvārdu">
            </form>
          </div>
        </td>

      </tr>

      <tr>
        <td>
          <label>&nbsp</label>
        </td>
        <td>
          &nbsp
        </td>


        <td style="text-align:right">
          <label>Jauna parole</label>
        </td>

        <form action="../includes/change_password.php" method="post" id="form_password">
          <td style="padding-right:20px">
            <input class="form-control" type="password" name="password_change">
          </td>
      </tr>
      </form>

      <form action="../includes/change_avatar.php" method="post" id="form_avatar">
        <tr>
          <td style="text-align:right;padding-right:20px">
            <label style="margin-bottom:102px">Ceļš uz attēlu</label>
          </td>
          <td>
            <div class="form-group">
              <input class="form-control" type="text" name="avatar_url" placeholder="https://example.com/img.jpg">
            </div>
            <input type="file" name="avatar_change" value="Izmainīt attēlu"> <br><br>
            <input type="submit" class="btn btn-primary" name="submit_avatar" value="Saglabāt attēlu">
          </td>
      </form>

      <td>
        &nbsp
      </td>
      <td style="text-align:right">
        <label style="margin-bottom:102px">Apstiprināt paroli</label>
      </td>

      <td style="padding-bottom:49px;padding-right:20px">
        <input class="form-control" type="password" name="password_change_confirm" form="form_password"><br>
        <input type="submit" class="btn btn-primary" name="submit_password" value="Saglabāt paroli" form="form_password">
      </td>
      </tr>


    </table>
  </center>

</body>

</html>