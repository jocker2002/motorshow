<?php
session_start();

/*if (!$_SESSION['user']) {
  header('Location: ../home.php');
}*/
?>

<!DOCTYPE HTML>
<html>

<head>
  <?php

  # Навигационное меню
  include("navbar_admin.php");

  # Соединение с базой данных
  require_once("../includes/dbconnection.php");

  $id_admin = $_SESSION['admin']['kods'];

  $sql =
  "SELECT darbinieka_amats.nosaukums AS amats FROM darbinieks
  LEFT JOIN darbinieka_amats ON darbinieks.amats_kods = darbinieka_amats.kods
  WHERE darbinieks.kods = $id_admin
  ";

  // Получить результат
  $amats_admin = mysqli_query($conn, $sql);

  if (!$amats_admin) {
    die("Amata izvades kļūda: <strong>" . mysqli_error($conn) . "</strong>");
}

  $row = mysqli_fetch_array($amats_admin);

  if (isset($_SESSION['admin'])) {
    $_SESSION['admin'] += ["amats"];
    $_SESSION['admin']['amats'] = $row['amats'];
  }
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
      width:200px;
    }

    #profile tr:nth-child(1) td:nth-child(5) {
      width:300px;
    }

    #profile label {
      margin-top: 8px;
      font-size: 18px;
    }

    #label {
      font-weight: bold;
    }

  </style>
</head>

<body>

  <br>
  <center>

    <!-- Профиль -->

    <h2 style="margin-top:10px;margin-bottom:30px">Darbinieka profils</h2>

    <?php
    // Вывод сообщения
    if ($_SESSION['message']) {
      echo $_SESSION['message'];
      unset($_SESSION['message']);
    }
    ?>
  
    <table id="profile">
      <tr>
        <td>
        <!-- 1 -->
        </td>
        <td style="text-align:center" rowspan="5">
          <img src=<?= $_SESSION['admin']['avatar'] ?> width="265" alt="Avatar">
        </td>
        <td>
        <!-- 2 -->
        </td>
        <td style="text-align:right">
          <label>Vārds:</label>
        </td>
        <td>
        <label id="label"><?= $_SESSION['admin']['vards'] ?></label>
        </td>
      </tr>

      <tr>
      <td style="text-align:right">
        <label>Avatars:</label>
        </td>
        <td>
        <!-- 2 -->
        </td>
        <td style="text-align:right">
          <label>Uzvards:</label>
        </td>
        <td>
        <label id="label"><?= $_SESSION['admin']['uzvards'] ?></label>
        </td>
      </tr>

      <tr>
      <td>
        <!-- 1 -->
        </td>
        <td>
        <!-- 2 -->
        </td>
        <td style="text-align:right">
          <label>Personas kods:</label>
        </td>
        <td>
        <label id="label"><?= $_SESSION['admin']['personas_kods'] ?></label>
        </td>
      </tr>

      <tr>
      <td>
        <!-- 1 -->
        </td>
        <td>
        <!-- 2 -->
        </td>
        <td style="text-align:right">
         <label>Amats:</label>
        </td>
        <td>
        <label id="label"><?= $row['amats'] ?></label>
        </td>
      </tr>

      <tr>
      <td>
        <!-- 1 -->
        </td>
        <td>
        <!-- 2 -->
        </td>
        <td style="text-align:right">
          <label>Tālrunis:</label>
        </td>
        <td>
        <label id="label"><?= $_SESSION['admin']['talrunis'] ?></label>
        </td>
      </tr>

      <tr>
      <td style="text-align:right">
        <label>Ceļš uz attēlu:</label>
        </td>
        <td rowspan="2">
        <div class="form-group" enctype="multipart/form-data">
              <input class="form-control" type="text" name="avatar_url" placeholder="https://example.com/img.jpg">
            </div>
            <input type="file" name="avatar_change" value="Izmainīt attēlu"> <br><br>
            <input type="submit" class="btn btn-primary" name="submit_avatar" value="Saglabāt attēlu" style="margin-top:-20px">
        </td>
        <td>
        <!-- 2 -->
        </td>
        <td style="text-align:right">
          <label>E-pasts:</label>
        </td>
        <td>
        <label id="label"><?= $_SESSION['admin']['epasts'] ?></label>
        </td>
      </tr>

      <tr>
      <td>
        <!-- 1 -->
        </td>
        <td>
        <!-- 2 -->
        </td>
        <td style="text-align:right">
          <label>Piekļuves līmenis:</label>
        </td>
        <td>
        <label id="label"><?= $_SESSION['admin']['piekluves_limenis'] ?></label>
        </td>
      </tr>

    </table>
  </center>

</body>

</html>