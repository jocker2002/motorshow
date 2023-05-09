<?php
session_start();
$id = $_GET['kods']; // Получить ID через GET  
if (!isset($id)) {
    header('Location: email.php');
} else {
    # Навигационное меню
    include("../navbar/navbar.php");

    # Соединение с базой данных
    include("../includes/dbconnection.php");
?>
    <html>

    <head>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <?php

        # Навигационное меню
        include("../navbar/navbar.php");

        # Соединение с базой данных
        include("../includes/dbconnection.php");

        $sql =
            "SELECT kods,
            lietotajs_kods,
            prece_kods,
            klients_kods,
            darbinieks_kods,
            darbinieks,
            amats,
            adresats,
            klients,
            prece,
            cena,
            DATE_FORMAT(datums, '%d.%m.%Y') AS datums,
            laiks,
            statuss,
            temats,
            saturs
            FROM epasta_zinas
            WHERE kods = '$id'";

        $open_email = mysqli_query($conn, $sql);

        if (!$open_email) {
            die("Ziņu izvades kļūda: <strong>" . mysqli_error($conn) . "</strong>");
        }
        
        $row = mysqli_fetch_array($open_email);

        
        $_SESSION['order'] = [
            "user_code" => $row['lietotajs_kods'],
            "product_code" => $row['prece_kods'],
            "client_code" => $row['klients_kods'],
            "employee_code" => $row['darbinieks_kods'],
            "price" => $row['cena']
        ];
        

        ?>
        <div style="margin-left:2em;margin-right:2em">

            <table id="responstable" style="text-align:left">
                <tr>
                    <th width="15%">Darbinieks:</th>
                    <td><b><?= $row['darbinieks'] ?></b></td>
                </tr>
                <tr>
                    <th>Amats:</th>
                    <td><?= $row['amats'] ?></td>
                </tr>
                <tr>
                    <th>Adresats:</th>
                    <td><b><?= $row['adresats'] ?></b></td>
                </tr>
                <tr>
                    <th>Klients:</th>
                    <td><?= $row['klients'] ?></td>
                </tr>
                <tr>
                    <th>Prece:</th>
                    <td> <?= $row['prece'] ?> </td>
                </tr>
                <tr>
                    <th>Datums:</th>
                    <td> <?= $row['datums'] ?> </td>
                </tr>
                <tr>
                    <th>Laiks:</th>
                    <td> <?= $row['laiks'] ?> </td>
                </tr>
                <tr>
                    <th>Cena:</th>
                    <td style="font-weight:bold;color:#e60000"><?= $row['cena'] ?></td>
                </tr>
                <tr>
                    <th>Statuss:</th>
                    <td><b><?= $row['statuss'] ?></b></td>
                </tr>
                <tr>
                    <th>Temats:</th>
                    <td><?= $row['temats'] ?></td>
                </tr>
                <tr>
                    <th>Saturs:</th>
                    <td><textarea name="email_saturs" rows="4" cols="50" style="width:700px" disabled><?= $row['saturs'] ?></textarea>
                </td>
                </tr>
                
            </table>
        </div>
        <div>
            <?php if ($row['statuss'] == "Pieņemts") { include("order_form.php"); }?>
        </div>
    <?php
}
    ?>