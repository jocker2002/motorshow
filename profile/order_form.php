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
  <link href="../newcars/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font: 14px "Helvetica Neue", Helvetica, Arial, sans-serif;
      background-color: rgb(245, 251, 255);
    }

    .error {
      color: #FF0000;
      font-size: 12px;
    }

    .btn {
      width: 100%;
    }

    #profile {
      border: 2px solid #dbdfe2;
      background-color: white;
    }

    #profile td {
      padding: 10px;
      /*
      border: 3px solid grey;
      */
    }

    #profile tr:nth-child(2) td:first-child {
      width: 150px;
    }

    #profile tr:nth-child(2) td:nth-child(2) {
      width: 300px;
    }

    #profile tr:nth-child(2) td:nth-child(3) {
      width: 25px;
    }

    #profile tr:nth-child(2) td:nth-child(4) {
      width: 150px;
    }

    #profile tr:nth-child(2) td:last-child {
      width: 300px;
    }

    #profile label {
      margin-top: 8px;
      font-size: 18px;
      font-weight: bold;
    }

    /*
    #profile div {
      width:300px
    }
    */
  </style>
</head>

<body>

  <br>
  <center>

    <!-- Профиль -->

    <?php

    // Валидация
    /*
    $nameErr = $surnameErr = $genderErr = $perscodeErr = $countryErr = $cityErr = $streetErr = $postalcodeErr = $phoneErr = $emailErr = $passwordErr = "";
    $name = $surname = $gender = $perscode = $country = $city = $street = $postalcode = $phone = $email = $password = "";
    $check = 1;

    function validation($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if (isset($_POST['submit'])) {
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["name"])) {
          $nameErr = "* Jānorāda vārds!";
        } else {
          $name = validation($_POST["name"]);
          if (!preg_match("/^[ĀāČčĒēĢģĪīĶķĻļŅņŠšŪūŽža-zA-Z-' ]*$/", $name) || substr_count($name, '-') > 1) {
            $nameErr = "* Ir atļauti tikai burti, atstarpes un viena defise!";
          }
        }
        if (empty($_POST["surname"])) {
          $surnameErr = "* Jānorāda uzvārds!";
        } else {
          $surname = validation($_POST["surname"]);
          if (!preg_match("/^[ĀāČčĒēĢģĪīĶķĻļŅņŠšŪūŽža-zA-Z-' ]*$/", $surname) || substr_count($surname, '-') > 1) {
            $surnameErr = "* Ir atļauti tikai burti, atstarpes un viena defise!";
          }
        }

        if (empty($_POST["perscode"])) {
          $perscodeErr = "* Jānorāda personas kods!";
        } else {
          $perscode = validation($_POST["perscode"]);
          if (!preg_match("/^[0-9-]*$/", $perscode)  || substr_count($perscode, '-') > 1) {
            $perscodeErr = "* Ir atļauti tikai cipari un viena defise!";
          }
        }

        if (empty($_POST["country"])) {
          $countryErr = "* Jānorāda valsts!";
        } else {
          $country = validation($_POST["country"]);
          if (!preg_match("/^[ĀāČčĒēĢģĪīĶķĻļŅņŠšŪūŽža-zA-Z-' ]*$/", $country)) {
            $countryErr = "* Ir atļauti tikai burti un atstarpes!";
          }
        }

        if (empty($_POST["city"])) {
          $cityErr = "* Jānorāda pilsēta!";
        } else {
          $city = validation($_POST["city"]);
          if (!preg_match("/^[ĀāČčĒēĢģĪīĶķĻļŅņŠšŪūŽža-zA-Z-' ]*$/", $city)) {
            $cityErr = "* Ir atļauti tikai burti un atstarpes!";
          }
        }

        if (empty($_POST["street"])) {
          $streetErr = "* Jānorāda iela!";
        } else {
          $street = validation($_POST["street"]);
          if (!preg_match("/^[ĀāČčĒēĢģĪīĶķĻļŅņŠšŪūŽža-zA-Z-0-9-,\/' ]*$/", $street)) {
            $streetErr = "* Ir atļauti tikai burti, cipari, simboli (,/-) un atstarpes!";
          }
        }

        if (empty($_POST["postalcode"])) {
          $postalcodeErr = "* Jānorāda pasta indekss!";
        } else {
          $postalcode = validation($_POST["postalcode"]);
          if (!preg_match("/^[A-Z0-9-]*$/", $postalcode)) {
            $postalcodeErr = "* Ir atļauti tikai lielie burti, cipari, defise!";
          }
        }

        if (empty($_POST["phone"])) {
          $phoneErr = "* Jānorāda tālrunis!";
        } else {
          $phone = validation($_POST["phone"]);
          if (!preg_match("/^[0-9+]*$/", $phone)  || substr_count($phone, '+') > 1) {
            $phoneErr = "* Ir atļauti tikai cipari un \"+\"!";
          }
        }

        if (empty($_POST["email"])) {
          $emailErr = "* Jānorāda e-pasts!";
        } else {
          $email = validation($_POST["email"]);
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "* Nederīgs e-pasta formāts!";
          }
        }

        if (empty($_POST["password"])) {
          $passwordErr = "* Jānorāda parole!";
        } else {
          $password = validation($_POST["password"]);
        }
      }
    }
    */
    ?>

    <?php
    // Вывод сообщения
    if ($_SESSION['message']) {
      echo $_SESSION['message'];
      unset($_SESSION['message']);
    }
    ?>

    <table id="profile">

      <tr>
        <td colspan="5">
          <h4 style="text-align:center"><b>Lūdzu, aizpildiet informāciju par klientu!</h4>
        </td>
      </tr>

      <tr>
          <td style="text-align:right">
            <label>Personas kods</label>
          </td>

          <td>
          <form action="../includes/add_order.php" method="post" id="make_order">
            <div class="form-group">
              <span class="error">*Obligāts lauks</span>
              <input type="tel" name="perscode_order" class="form-control" value="<?php echo $perscode; ?>" placeholder="Ievadiet savu personas kodu" pattern="[0-9]{6}-[0-9]{5}" title="123456-12345" maxlength="12" required>
            </div>
          <form>
          </td>

          <td>
            <label>&nbsp</label>
          </td>

          <td style="text-align:right">
            <label>Valsts</label>
          </td>

          <td>
            </div>
            <div class="form-group">
              <span class="error">*Obligāts lauks</span>
              <input type="text" name="country_order" class="form-control" value="<?php echo $country; ?>" placeholder="Ievadiet savu valsti" maxlength="60" form="make_order" required>
            </div>
          </td>

      </tr>

      <tr>

        <td style="text-align:right">
          <label>Pilsēta</label>
        </td>

        <td>
          <div class="form-group">
            <span class="error">*Obligāts lauks</span>
            <input type="text" name="city_order" class="form-control" value="<?php echo $city; ?>" placeholder="Ievadiet savu pilsētu" maxlength="30" form="make_order" required>
          </div>
        </td>

        <td>
          <label>&nbsp</label>
        </td>

        <td style="text-align:right">
          <label>Iela</label>
        </td>

        <td>
          </div>
          <div class="form-group">
            <span class="error">*Obligāts lauks</span>
            <input type="text" name="street_order" class="form-control" value="<?php echo $street; ?>" placeholder="Ievadiet savu ielu" form="make_order" maxlength="50">
          </div>
        </td>

      </tr>

      <tr>

            <label>&nbsp</label>
          </td>
        <td style="text-align:right">
          <label>Pasta indekss</label>
        </td>

        <td>
          <div class="form-group">
            <span class="error">*Obligāts lauks</span>
            <input type="text" name="postalcode_order" class="form-control" value="<?php echo $postalcode; ?>" placeholder="Ievadiet savu pasta indeksu" form="make_order" maxlength="12">
          </div>
        </td>

        <td>
          <label>&nbsp</label>
        </td>
        <td>
          <label>&nbsp</label>
        </td>
        <td>
          <label>&nbsp</label>
        </td>

      </tr>


      <tr>
        <td colspan="5">
          <h4 style="text-align:center"><b>Lūdzu, aizpildiet informāciju par preces pasūtījumu!</h4>
        </td>
      </tr>


      <tr>
        <!-- Начало формы об информации о товаре -->
        <td style="text-align:right">
          <label>Piegādes veids</label>
        </td>

        <td>
          <div class="form-group">
            <span class="error">*Obligāts lauks</span><br>
            <select  name="delivery_order" class="form-control" form="make_order">
              <option value="" hidden>Izvēlieties piegādes veidu</option>
              <option value="1">Pašizvešana. Cena: 0,00 €</option>
              <option value="2">Autovadītājs-pārdevējs. Cena: 20,00 €</option>
              <option value="3">Autovedējs. Cena: 50,00 €</option>
              <option value="4">Vilciens. Cena: 200,00 €</option>
              <option value="5">Kuģis. Cena: 500,00 €</option>
              <option value="6">Lidmašīna. Cena: 1000,00 €</option>
            </select>
          </div>
        </td>

        <td>
          <label>&nbsp</label>
        </td>

        <td style="text-align:right">
          <label>Maksājuma veids</label>
        </td>

        <td>
          </div>
          <div class="form-group">
            <span class="error">*Obligāts lauks</span><br>
            <select  name="payment_order" class="form-control" form="make_order">
              <option value="" hidden>Izvēlieties maksājuma  veidu</option>
              <option value="1">Pārskaitījums (uzreiz)</option>
              <option value="2">Pārskaitījums (kredīts)</option>
              <option value="3">Skaidra nauda</option>
              <option value="4">Līzings</option>
            </select>
          </div>
        </td>

      </tr>

      <tr></tr>
      <td colspan="5" style="text-align:center">
        <input type="submit" class="btn btn-primary" name="submit_profile" value="Saglabāt informāciju!" form="make_order">
      </td>
      </tr>
      </form>
    </table>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
  </center>


</body>

</html>