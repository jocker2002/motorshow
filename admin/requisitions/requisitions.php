<?php
session_start();
?>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="button.css">
    <?php
    # Навигационное меню
    include("../navbar_admin.php");
    ?>
</style>
</head>
<body>
<?php

# Соединение с базой данных
include("../../includes/dbconnection.php");

$sql =
  "SELECT pasutijumu_detalas.kods,
  pasutijumu_detalas.prece_kods,
  pasutijumu_detalas.lietotajs_kods,
  pasutijumu_detalas.klients_kods,
  DATE_FORMAT(pasutijumu_detalas.izveides_datums, '%d.%m.%Y') AS izveides_datums,
  pasutijumu_detalas.izveides_laiks,
  DATE_FORMAT(prece.piegadata_noliktava, '%M %D, %Y') AS noliktava,
  pasutijumu_detalas.statuss,
  automasinas_marka.nosaukums AS marka,
  prece.modelis AS modelis,
  prece.VIN AS VIN,
  prece.preces_cena,
  prece.attels AS attels,
  lietotajs.avatar AS avatar,
  lietotajs.username AS username,
  klients.vards AS vards,
  klients.uzvards AS uzvards,
  klients.talrunis AS talrunis,
  klients.epasts AS epasts
  FROM pasutijumu_detalas
  LEFT JOIN prece ON pasutijumu_detalas.prece_kods = prece.kods
  LEFT JOIN automasinas_marka ON prece.automasinas_marka_kods = automasinas_marka.kods
  LEFT JOIN lietotajs ON pasutijumu_detalas.lietotajs_kods = lietotajs.kods
  LEFT JOIN klients ON pasutijumu_detalas.klients_kods = klients.kods
  ORDER BY izveides_datums DESC, izveides_laiks DESC
  ";

  $result = mysqli_query($conn, $sql);

  if (!$result) {
    die("Vaicājuma kļūda: <strong>" . mysqli_error($conn) . "</strong>");
}


// Вывод сообщения
if ($_SESSION['message']){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

?>

<div style="margin-left:2em;margin-right:2em">

<table id="responstable">

    <tr>
        <th>№</th>
        <th>Prece</th>
        <th>Lietotājs</th>
        <th>Klients</th>
        <th>Izveides datums un laiks</th>
        <th>Statuss</th>
        <th>Darbība</th>
    </tr>
<?php
if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <tr style='border:3px solid gray'>
            <td style="width:5%;font-weight:bold;font-size:20px"><?= $row['kods'] ?></td>
            <td width="30%">
                <!-- Prece -->
                <table id="sub-responstable">
                    <tr>
                        <th width="30%">Attēls:</th>
                        <td><?= "<img src=".$row['attels']." width='150px'>" ?></td>
                    </tr>
                    <tr>
                        <th>Piegādāts noliktavā:</th>
                        <td><?= $row['noliktava'] ?></td>
                    </tr>
                    <tr>
                        <th>Marka:</th>
                        <td> <?= $row['marka'] ?> </td>
                    </tr>
                    <tr>
                        <th>Modelis:</th>
                        <td><?= $row['modelis'] ?></td>
                    </tr>
                    <tr>
                        <th>VIN:</th>
                        <td><?= $row['VIN'] ?></td>
                    </tr>
                    <tr>
                        <th>Cena:</th>
                        <td style="font-weight:bold;color:#e60000"><?= $row['preces_cena']." €" ?></td>
                    </tr>
                </table>
            </td>

            <!-- Lietotājs -->
            <td width="20%">
                <table id="sub-responstable">
                    <tr>
                        <th width="20%">Avatars:</th>
                        <td><?= "<img src=".$row['avatar']." width='75px'>" ?></td>
                    </tr>
                    <tr>
                        <th>Lietotājvārds:</th>
                        <td><?= $row['username'] ?></td>
                    </tr>
                </table>
            </td>

            <!-- Klients -->
            <td width="20%">
                <table id="sub-responstable">
                    <tr>
                        <th width="20%">Vārds:</th>
                        <td><?= $row['vards'] ?></td>
                    </tr>
                    <tr>
                        <th>Uzvārds:</th>
                        <td><?= $row['uzvards'] ?></td>
                    </tr>
                    <tr>
                        <th>Tālrunis:</th>
                        <td><?= $row['talrunis'] ?></td>
                    </tr>
                    <tr>
                        <th>E-pasts:</th>
                        <td><?= $row['epasts'] ?></td>
                    </tr>
                </table>
            </td>

            <!-- Izveides datums un laiks -->
            <td width="20%">
                <table id="sub-responstable">
                    <tr>
                        <th width="20%">Datums:</th>
                        <td><?= $row['izveides_datums'] ?></td>
                    </tr>
                    <tr>
                        <th>Laiks:</th>
                        <td><?= $row['izveides_laiks'] ?></td>
                    </tr>
                </table>
            </td>
                        
            <!-- Statuss -->
            <td>
                <table id="sub-responstable">
                    <tr>
                        <td <?php if ($row['statuss'] == "Pieņemts") { echo "id='accepted'"; } elseif ($row['statuss'] == "Noraidīts") { echo "id='rejected'"; } else echo "id='not-processed'" ?>><?= $row['statuss'] ?></td>
                    </tr>
                </table>
            </td>

           

            <!-- Darbība (pogas) -->
            <td width="5%">
                <?php if ($row['statuss'] == "Nav apstrādāts") { ?>
                    <a class="btn btn-success" href="email.php?kods=<?= $row['kods'] ?>&pienemt=JĀ" style="margin-bottom:30px;width:75px">Pieņemt</a>
                    <a class="btn btn-warning" href="email.php?kods=<?= $row['kods'] ?>&pienemt=NĒ" style="margin-bottom:30px;width:75px">Noraidīt</a>
                <?php } ?>
                <a href="remove.php?kods=<?= $row['kods'] ?>" class="btn btn-danger" style="width:75px" onclick="return confirm('Vai Jūs tiešām vēlaties dzēst šo pieprasījumu?')">Dzēst</a>
            </td>
        </tr>
<?php  
    }
}
?>
</table>
</div>
</body>