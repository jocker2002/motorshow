<?php
session_start();

$_SESSION['carinfo'] = $_SERVER['REQUEST_URI'];

$id = $_GET['kods']; // Получить ID машины через GET

if (!isset($id)) {
    header('Location: catalog.php');
}
else {
  
    # Навигационное меню
    include("../navbar/navbar.php");

    # Соединение с базой данных
    include("../includes/dbconnection.php");
  
  if (isset($_SESSION['user'])) {
    $_SESSION['user'] += ["carid"];
    $_SESSION['user']['carid'] = $id;
  }

  // Подключиться, если ругается PHP
  # $conn = mysqli_connect("localhost", "root", "mysql", "cernobrovs");

  $sql =
  "SELECT attels,
  DATE_FORMAT(piegadata_noliktava, '%M %D, %Y') AS noliktava,
  valsts.nosaukums AS valsts,
  automasinas_marka.nosaukums AS marka,
  modelis,
  izlaiduma_gads AS gads,
  krasa.nosaukums AS krasa,
  virsbuves_tips.nosaukums AS virsbuve,
  piedzinas_tips.nosaukums AS piedzina,
  parnesumkarbas_tips.nosaukums AS parnesumkarba,
  durvju_skaits,
  sedvietu_skaits,
  dzineja_tips.nosaukums AS dzinejs,
  degvielas_padeves_sistemas_tips.nosaukums AS DPS,
  dzineja_novietojuma_tips.nosaukums AS novietojums,
  dzineja_tilpums AS tilpums,
  VIN,
  preces_cena
  FROM prece
  LEFT JOIN automasinas_marka ON prece.automasinas_marka_kods = automasinas_marka.kods
  LEFT JOIN valsts ON prece.valsts_kods = valsts.kods
  LEFT JOIN virsbuves_tips ON prece.virsbuves_tips_kods = virsbuves_tips.kods
  LEFT JOIN krasa ON prece.krasa_kods = krasa.kods
  LEFT JOIN piedzinas_tips ON prece.piedzinas_tips_kods = piedzinas_tips.kods
  LEFT JOIN parnesumkarbas_tips ON prece.parnesumkarbas_tips_kods = parnesumkarbas_tips.kods
  LEFT JOIN dzineja_tips ON prece.dzineja_tips_kods = dzineja_tips.kods
  LEFT JOIN degvielas_padeves_sistemas_tips ON prece.degvielas_padeves_sistemas_tips_kods = degvielas_padeves_sistemas_tips.kods
  LEFT JOIN dzineja_novietojuma_tips ON prece.dzineja_novietojuma_tips_kods = dzineja_novietojuma_tips.kods
  WHERE prece.kods = $id
  ";

  // Получить результат
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_array($result);

  /*
  $row = mysqli_fetch_assoc($result);

  mysqli_free_result($result);
  mysqli_close($conn);
  */
}

?>

<!DOCTYPE html>
<html></html>

<head>

  <link rel="stylesheet" href="carinfo_style.css">

<body>
  <br>
  <center>

  <?php
     // Вывод сообщения
     if ($_SESSION['message'])
     {
      echo $_SESSION['message'];
      unset($_SESSION['message']);
     }
    ?>

    <!-- Начало формы об информации об определённой машине -->

    <table id="car">

      <tr >
        <td class="car-item">
          <label></label>
        </td>

        <td colspan="3" style="width:250px">
          <div class="form-group">
            <?php $attels = $row['attels']; ?>
            <img src=<?php echo "\"$attels\""; ?> style="max-width:100%;max-height:1000px" alt="Car Photo">
          </div>
        </td>

        <td class="void">
          <label>&nbsp</label>
        </td>

        <td style="width:10px;background-color:rgb(245, 251, 255)">
        </td>

        <td style="border: 2px solid #dbdfe2">

          <p class="car-price" style="text-align:center;font-size:22px;font-weight:bold;color:rgb(220,20,60)">Cena: <?php echo $row['preces_cena']; ?> €</p>

          <form action="../includes/purchase_requisition.php" method="post">
            <div class="wrapper">
                <div class="form-group">
                  <label>Vārds:</label>
                  <input type="text" name="name_request" class="form-control" placeholder="Ievadiet savu vārdu!" maxlength="50" required>
                </div>

                <div class="form-group">
                  <label>Uzvārds:</label>
                  <input type="text" name="surname_request" class="form-control" placeholder="Ievadiet savu uzvārdu!" maxlength="50" required>
                </div>

                <div class="form-group">
                  <label>Tālrunis:</label>
                  <input type="tel" name="phone_request" class="form-control"  placeholder="Ievadiet savu tālruni!" maxlength="16" required>
                </div>

                <div class="form-group">
                  <label>E-pasts:</label>
                  <input type="email" name="email_request" class="form-control" placeholder="Ievadiet savu e-pastu!" maxlength="64" required>
                </div>
                
            </div>
          <input type="submit" class="btn blue-button" name="submit_profile" value="Veikt pieprasījumu!" style="margin-top:15px;width:100%">
          </form>

        </td>

      </tr>
      <td class="car-item">
        <label>Piegadātā noliktāvā:</label>
      </td>

      <td class="car-data">
        <div class="form-group">
          <?php echo $row['noliktava']; ?>
        </div>
      </td>

      <td class="void">
        <label>&nbsp</label>
      </td>

      <td class="car-item">
        <label>Valsts:</label>
      </td>

      <td class="car-data">
        </div>
        <div class="form-group">
          <?php echo $row['valsts']; ?>
        </div>
      </td>
      </tr>

      </tr>
      <td class="car-item">
        <label>Marka:</label>
      </td>

      <td class="car-data">
        <div class="form-group">
          <?php echo $row['marka'] ?>
        </div>
      </td>

      <td class="void">
        <label>&nbsp</label>
      </td>

      <td class="car-item">
        <label>Modelis:</label>
      </td>

      <td class="car-data">
        </div>
        <div class="form-group">
          <?php echo $row['modelis']; ?>
        </div>
      </td>
      </tr>

      </tr>
      <td class="car-item">
        <label>Izlaiduma gads:</label>
      </td>

      <td class="car-data">
        <div class="form-group">
          <?php echo $row['gads']; ?>
        </div>
      </td>

      <td class="void">
        <label>&nbsp</label>
      </td>

      <td class="car-item">
        <label>Krasa:</label>
      </td>

      <td class="car-data">
        </div>
        <div class="form-group">
          <?php echo $row['krasa']; ?>
        </div>
      </td>
      </tr>

      </tr>
      <td class="car-item">
        <label>Virsbūves tips:</label>
      </td>

      <td class="car-data">
        <div class="form-group">
          <?php echo $row['virsbuve']; ?>
        </div>
      </td>

      <td class="void">
        <label>&nbsp</label>
      </td>

      <td class="car-item">
        <label>Piedziņas tips:</label>
      </td>

      <td class="car-data">
        </div>
        <div class="form-group">
          <?php echo $row['piedzina']; ?>
        </div>
      </td>
      </tr>

      </tr>
      <td class="car-item">
        <label>Pārnesumkārbas tips:</label>
      </td>

      <td class="car-data">
        <div class="form-group">
          <?php echo $row['parnesumkarba']; ?>
        </div>
      </td>

      <td class="void">
        <label>&nbsp</label>
      </td>

      <td class="car-item">
        <label>Dzinēja tips:</label>
      </td>

      <td class="car-data">
        </div>
        <div class="form-group">
          <?php echo $row['dzinejs']; ?>
        </div>
      </td>
      </tr>

      </tr>
      <td class="car-item">
        <label>Degvielas padeves sitēmas tips:</label>
      </td>

      <td class="car-data">
        <div class="form-group">
          <?php echo $row['DPS']; ?>
        </div>
      </td>

      <td class="void">
        <label>&nbsp</label>
      </td>

      <td class="car-item">
        <label>Dzinēja novietojuma tips:</label>
      </td>

      <td class="car-data">
        </div>
        <div class="form-group">
          <?php echo $row['novietojums']; ?>
        </div>
      </td>
      </tr>

      </tr>
      <td class="car-item">
        <label>Dzinēja tilpums:</label>
      </td>

      <td class="car-data">
        <div class="form-group">
          <?php echo $row['tilpums']; ?>
        </div>
      </td>

      <td class="void">
        <label>&nbsp</label>
      </td>

      <td class="car-item">
        <label>Durvju skaits:</label>
      </td>

      <td class="car-data">
        </div>
        <div class="form-group">
          <?php echo $row['durvju_skaits']; ?>
        </div>
      </td>
      </tr>


      </tr>
      <td class="car-item">
        <label>Sēdvietu skaits:</label>
      </td>

      <td class="car-data">
        <div class="form-group">
          <?php echo $row['sedvietu_skaits']; ?>
        </div>
      </td>

      <td class="void">
        <label>&nbsp</label>
      </td>

      <td class="car-item">
        <label>VIN:</label>
      </td>

      <td class="car-data">
        </div>
        <div class="form-group">
          <?php echo $row['VIN']; ?>
        </div>
      </td>
      </tr>

    </table>
    <br><br>

  </center>


</body>

</html>