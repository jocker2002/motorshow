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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../newcars/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">


</head>

<body>

    <?php
    $sql = "SELECT nosaukums,
            logotips
            FROM zimols
            ORDER BY nosaukums ASC";

    // Получить результат
    $result = mysqli_query($conn, $sql);

    ?>
    <div class="page-wrapper">
        <div id="page_main" style="background:whitesmoke;margin-left:auto;margin-right:auto">
            <div class="container content" style="box-sizing:border-box">
                <div class="row">
                    <div class="col-md-12 products page-catalog">
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            $link = "'http://localhost/Cernobrovs/brands/info.php?car_brand=" . $row['nosaukums'] . "'";
                            $link_onclick = "onclick=\"location.href=$link\"";
                        ?>

                            <div class="col-sm-2 brand-catalog" <?= $link_onclick ?> style="cursor:pointer;border-radius:10px">
                            
                                <figure class="brand-wrapper">
                                    <img src=<?= "\"" . $row['logotips'] . "\""; ?> alt="Brand Logo" style="margin:auto;;width:100%">
                                    <figcaption class="brand-name"><a href=<?= $link ?>><?= $row['nosaukums'] ?></a></figcaption>
                                </figure>
                            </div>

                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>