<?php
session_start();
$id = $_GET['kods']; // Получить ID запроса через GET  
if (!isset($id)) {
    header('Location: requisitions.php');
} else {
?>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="button.css">
    </style>
</head>

<body>
    <?php

    # Навигационное меню
    include("../navbar_admin.php");

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
            WHERE pasutijumu_detalas.kods = $id
            ";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Vaicājuma kļūda: <strong>" . mysqli_error($conn) . "</strong>");
        }

        // Вывод сообщения
        if ($_SESSION['message']) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }

        $row = mysqli_fetch_array($result);

        $_SESSION['request'] = [
            "code" => $row['kods'],
            "darbinieks" => $_SESSION['admin']['vards'] . " " . $_SESSION['admin']['uzvards'],
            "adresats" => $row['username'],
            "klients" => $row['vards'] . " " . $row['uzvards'] . ", " . $row['talrunis'] . ", " . $row['epasts'],
            "prece" => $row['marka'] . " " . $row['modelis'] . ", VIN: " . $row['VIN'],
            "cena" => $row['preces_cena'] . " €",
            "user_code" => $row['lietotajs_kods'],
            "product_code" => $row['prece_kods'],
            "client_code" => $row['klients_kods']
        ];

    ?>

        <div style="margin-left:10em;margin-right:10em">

            <table id="responstable">
                <tr>
                    <th width="15%">Darbinieks:</th>
                    <td><b><?= $_SESSION['request']['darbinieks'] ?></b></td>
                </tr>
                <tr>
                    <th>Amats:</th>
                    <td><?= $_SESSION['admin']['amats'] ?></td>
                </tr>
                <tr>
                    <th>Adresats:</th>
                    <td><b><?= $_SESSION['request']['adresats'] ?></b></td>
                </tr>
                <tr>
                    <th>Klients:</th>
                    <td><?= $_SESSION['request']['klients'] ?></td>
                </tr>
                <tr>
                    <th>Prece:</th>
                    <td> <?= $_SESSION['request']['prece'] ?> </td>
                </tr>
                <tr>
                    <th>Cena:</th>
                    <td style="font-weight:bold;color:#e60000"><?= $_SESSION['request']['cena'] ?></td>
                </tr>
                <tr>
                    <th>Pieņemts:</th>
                    <td>
                        <form action="send_email.php?lietotajs_kods=<?= $_SESSION['request']['user_code'] ?>" method="post" style="margin-bottom:0px" id="email">
                            <select name="accepted" class="form-control" style="width:250px">
                                <option hidden value="NULL">Atlasiet pieņemšanas veidu!</option>
                                <option value="JĀ" <?= $_GET['pienemt'] == "JĀ" ? "selected=\"selected\"" : ""?>>JĀ</option>
                                <option value="NĒ" <?= $_GET['pienemt'] == "NĒ" ? "selected=\"selected\"" : ""?>>NĒ</option>
                            </select>
                            <span style="margin-left:10px;color:red">*Obligāts lauks</span>
                        </form>

                    </td>
                </tr>
                <tr>
                    <th>Temats:</th>
                    <td>
                        <input type="text" name="subject" placeholder="Ievadiet ziņojuma tematu!" maxlength="255" style="width:700px" form="email" class="form-control">
                    </td>
                </tr>
                <tr>
                    <th>Saturs:</th>
                    <td>
                        <textarea name="content" rows="4" cols="50" style="width:700px" placeholder="Ievadiet savas ziņas tekstu!" form="email" class="form-control"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" class="btn btn-primary" name="submit_register" value="Nosūtīt ziņu!" form="email">
                    </td>
                </tr>
            </table>

        </div>
    <?php
    } 
    ?>
</body>