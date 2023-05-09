<?php
session_start();
unset($_SESSION['carinfo']);
if (isset($_SESSION['user'])) {
  header('Location: profile/profile.php');
}
?>

<!DOCTYPE HTML>
<html>

<?php

# Навигационное меню
include("navbar/navbar.php");

?>

<head>

  <meta charset="UTF-8">

  <style>
    body {
      font: 14px sans-serif;
      background-color: rgb(245, 251, 255);
    }

    .wrapper {
      width: 360px;
      padding: 20px;
    }
    .error {
      color: #FF0000;
    }
  </style>

</head>

<body>

  <center>

    <?php

    $username = $usernameErr = $password = $passwordErr = "";

    // Валидация
/*
    function validation($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if (empty($_POST["username"])) {
      $usernameErr = "Jānorāda lietotājvārdu!";
    } else {
      $username = validation($_POST["username"]);
      if (!preg_match("/^[ĀāČčĒēĢģĪīĶķĻļŅņŠšŪūŽža-zA-Z0-9-' ]*$/", $username)) {
        $usernameErr = "Nederīgs lietotājvārda formāts!";
      }
    }

    if (empty($_POST["password"])) {
      $passwordErr = "Jānorāda paroli!";
    } else {
      $password = validation($_POST["password"]);
    }
*/
    ?>

    <!-- Форма авторизации -->

    <h2><br>Darbinieka autorizācija</h2>

    <?php
         // Вывод сообщения

         if (isset($_SESSION['message']))
         {
           echo $_SESSION['message'];
         unset($_SESSION['message']);
         }
    ?>

    <form action="includes/auth_admin.php" method="post">
      <div class="wrapper">
          <div class="form-group" style="text-align:left;font-size:16px">
            <label>E-pasts:</label>
            <input type="email" name="email_admin" class="form-control" placeholder="Ievadiet savu e-pastu!" maxlength="254">
            <!-- <span class="error">* <?php # echo $usernameErr; ?> </span> -->
          </div>
          <div class="form-group" style="text-align:left;font-size:16px">
          <label>Parole:</label>
          <input type="password" name="password_admin" class="form-control" placeholder="Ievadiet savu paroli!" maxlength="128">
          <!-- <span class="error">* <?php # echo $passwordErr; ?> </span> -->
          </div>
          <div style="margin:25px">
          <input type="submit" class="btn btn-primary" name="login_admin" value="Ielogoties">
          </div>
    </form>


    <center>

 
</body>

</html>