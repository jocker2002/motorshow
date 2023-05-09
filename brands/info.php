<?php
if (!isset($_GET['car_brand']))
    header('Location: brand_catalog.php')
?>

<!DOCTYPE html>
<html>

<head>
    <?php
    # Навигационное меню
    include("../navbar/navbar.php");

    # Соединение с базой данных
    include("../includes/dbconnection.php");
    ?>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <?php

    $sql = "SELECT kods,
    nosaukums,
    tips,
    darbibas_joma,
    dibinasanas_gads,
    likvidesanas_gads,
    dibinataji,
    galvenais_birojs,
    valsts_karogs,
    darbibas_zona,
    produkcija,
    meitas_uznemums,
    majaslapa,
    mates_uznemums,
    majaslapa,
    logotips,
    attels,
    attela_apraksts,
    html_teksts
    FROM zimols
    WHERE nosaukums = '" . str_replace("_", " ", $_GET['car_brand']) . "'";

    // Получить результат
    $result = mysqli_query($conn, $sql);

    $zimols = mysqli_fetch_array($result);

    // Сериализваноое значение преобразуем в массив
    $zimols['majaslapa'] = unserialize($zimols['majaslapa']);

    ?>

    <div id="page_main">
        <h1><?= $zimols["nosaukums"] ?></h1>
        <hr>
        <div class="page_table">
            <table>
                <tr>
                    <td colspan="2" style="text-align:center;font-weight:bold;background:#cfe3ff;padding:0"><?= $zimols['nosaukums'] ?></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href=<?= "\"" . $zimols['logotips'] . "\"" ?>><img src=<?= "\"" . $zimols['logotips'] . "\"" ?> alt="Logo"></a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href=<?= "\"" . $zimols['attels'] . "\"" ?>><img src=<?= "\"" . $zimols['attels'] . "\"" ?> alt="Picture"></a>
                    </td>
                </tr>
                <?php if (!empty($zimols['attela_apraksts'])) { ?>
                    <tr style="text-align:center">
                        <td colspan="2"><?= $zimols['attela_apraksts'] ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2" style="border-bottom:2px solid rgb(75,75,75)"></td>
                </tr>
                <tr>
                    <th></th>
                    <td></td>
                </tr>
                <tr>
                    <th>Tips</th>
                    <td><?= $zimols['tips'] ?></td>
                </tr>
                <tr>
                    <th>Dibināts</th>
                    <td><?= $zimols['dibinasanas_gads'] ?></td>
                </tr>

                <?php if (!empty($zimols['likvidesanas_gads'])) { ?>
                    <tr>
                        <th>Likvidēts</th>
                        <td><?= $zimols['likvidesanas_gads'] ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <th>Dibinātāji</th>
                    <td><?= $zimols['dibinataji'] ?></td>
                </tr>
                <tr>
                    <th>Galvenais birojs</th>
                    <td><?= $zimols['galvenais_birojs'] ?>
                        <?php if (!empty($zimols['valsts_karogs'])) { ?>
                            <img src=<?= "'" . $zimols['valsts_karogs'] . "'" ?> alt="country flag" style="width:35px;padding-left:5px">
                    </td>
                <?php } ?>
                </tr>
                <tr>
                    <th>Darbības zona</th>
                    <td><?= $zimols['darbibas_zona'] ?></td>
                </tr>
                <tr>
                    <th>Produkcija</th>
                    <td><?= $zimols['produkcija'] ?></td>
                </tr>
                <?php if (!empty($zimols['mates_uznemums'])) { ?>
                    <tr>
                        <th>Mātes uzņēmumi</th>
                        <td><?= $zimols['mates_uznemums'] ?></td>
                    </tr>
                <?php } ?>
                <?php if (!empty($zimols['meitas_uznemums'])) { ?>
                    <tr>
                        <th>Meitas uzņēmumi</th>
                        <td><?= $zimols['meitas_uznemums'] ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <th>Tīmekļa vietne</th>
                    <td><a href=<?= $zimols['majaslapa'][0] ?>><?= $zimols['majaslapa'][1] ?></a></td>
                </tr>
            </table>
        </div>


        <p class="page_text">
            <?php
            include_once($zimols['html_teksts']);
            ?>
        </p>

    </div>
</body>

</html>