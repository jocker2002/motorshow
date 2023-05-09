<?php
session_start();
unset($_SESSION['carinfo']);
if ($_SESSION['user']) {
  header('Location: profile/profile.php');
}
?>

<!DOCTYPE HTML>
<html>

<head>
  <?php

  # Навигационное меню
  include("navbar/navbar.php");

  ?>

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

    $username = $usernameErr = $password = $passwordErr = $password_confirm = $password_confirmErr = "";

    function validation($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if (isset($_POST['submit'])) {
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["username"])) {
          $usernameErr = "* Jānorāda vārds!";
        } else {
          $username = validation($_POST["username"]);
          if (!preg_match("/^[ĀāČčĒēĢģĪīĶķĻļŅņŠšŪūŽža-zA-Z0-9-' ]*$/", $username)) {
            $usernameErr = "Ir nederīgas rakstzīmes!";
          }
        }

        if (empty($_POST["password"])) {
          $passwordErr = "* Jānorāda parole!";
        } else {
          $password = validation($_POST["password"]);
        }

        if (empty($_POST["password"])) {
          $password_confirmErr = "* Jāatkārto parole!";
        } else {
          $password_confirm = validation($_POST["password_confirm"]);
        }
      }
    }

    ?>

    <h2><br>Reģistrācija</h2>

    <?php

         // Вывод сообщения

         if ($_SESSION['message'])
         {
           echo $_SESSION['message'];
         unset($_SESSION['message']);
         }

    ?>

    <div class="wrapper">

      <!-- Форма регистрации -->

      <form action="includes/signup.php" method="post">

        <div class="form-group" style="text-align:left;font-size:16px">
          <label>Lietotājvārds:</label>
          <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="Ievadiet savu lietotājvārdu!" maxlength="64">
          <span class="error"><?php echo $usernameErr; ?></span>
        </div>

        <div class="form-group" style="text-align:left;font-size:16px">
          <label>Parole:</label>
          <input type="password" name="password" class="form-control" placeholder="Ievadiet savu paroli!" maxlength="128">
          <span class="error"><?php echo $passwordErr; ?></span>
        </div>

        <div class="form-group" style="text-align:left;font-size:16px">
          <label>Apstiprināt paroli:</label>
          <input type="password" name="password_confirm" class="form-control" placeholder="Atkārtojiet savu paroli!" maxlength="128">
          <span class="error"><?php echo $password_confirmErr; ?></span>
        </div>
         <div style="margin-top:30px">
        <input type="submit" class="btn btn-primary" name="submit_register" value="Reģistrēties!" >
        </div>
        <p>
        Vai jau ir konts? - <a href="login.php">Ielogoties</a>!
      </p>
      </form>
    </div>
      <center>

 
</body>

</html>