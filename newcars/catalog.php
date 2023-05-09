<?php
session_start();
unset($_SESSION['carinfo']);
?>
<!DOCTYPE html>
<html>

<head>
    <?php
    # Навигационное меню
    include("../navbar/navbar.php");

    # Соединение с базой данных (в школе)
    include("../includes/dbconnection.php");
    ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="catalog_style.css">

    <style>

    </style>

    </style>
</head>

<body>

    <!-- Форма фильтрации и сортировки -->

    <div class="container content" style="box-sizing:border-box">
        <div class="row">
            <div class="col-md-12 products">
                <div class="row">

                    <div class="col-sm-3">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="form_filter">
                            <input type="text" name="brand" list="brand" value="<?= isset($_REQUEST['brand']) ? $_REQUEST['brand'] : NULL; ?>" placeholder="Marka" class="filter form-control">

                            <datalist id="brand">
                                <?php
                                $sql = "SELECT DISTINCT nosaukums FROM automasinas_marka ORDER BY nosaukums ASC";

                                $results = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_array($results)) {
                                ?>
                                    <option value=<?= "'" . $row['nosaukums'] . "'" ?>>
                                    <?php
                                }
                                    ?>
                            </datalist>
                        </form>
                    </div>


                    <div class="col-sm-3">
                        <input type="text" name="model" list="model" value="<?= isset($_REQUEST['model']) ? $_REQUEST['model'] : NULL; ?>" placeholder="Modelis" class="filter form-control" form="form_filter" <?php if (empty($_REQUEST['brand'])) echo "disabled" ?>>
                        <datalist id="model">
                            <?php
                            $sql = "SELECT DISTINCT automasinas_marka_kods, modelis, automasinas_marka.nosaukums
                            FROM prece
                            LEFT JOIN automasinas_marka ON prece.automasinas_marka_kods = automasinas_marka.kods
                            WHERE automasinas_marka.nosaukums LIKE '%" . $_REQUEST['brand'] . "%'
                            AND klients_kods IS NULL
                            ORDER BY modelis ASC";

                            $results = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_array($results)) {
                            ?>
                                <option value=<?= "'" . $row['modelis'] . "'" ?>>
                                <?php
                            }
                                ?>
                        </datalist>
                    </div>

                    <div class="col-sm-3">
                        <input type="text" name="transmission" list="transmission" value="<?= isset($_REQUEST['transmission']) ? $_REQUEST['transmission'] : NULL; ?>" placeholder="Pārnesumkārba" class="filter form-control" form="form_filter">

                        <datalist id="transmission">
                            <?php
                            $sql = "SELECT DISTINCT nosaukums FROM parnesumkarbas_tips ORDER BY nosaukums ASC";

                            $results = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_array($results)) {
                            ?>
                                <option value=<?= $row['nosaukums'] ?>>
                                <?php
                            }
                                ?>
                        </datalist>
                    </div>

                    <div class="col-sm-3">
                        <input type="text" name="body" list="body" value="<?= isset($_REQUEST['body']) ? $_REQUEST['body'] : NULL; ?>" placeholder="Virsbūve" class="filter form-control" form="form_filter">

                        <datalist id="body">
                            <?php
                            $sql = "SELECT DISTINCT nosaukums FROM virsbuves_tips ORDER BY nosaukums ASC";

                            $results = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_array($results)) {
                            ?>
                                <option value=<?= $row['nosaukums'] ?>>
                                <?php
                            }
                                ?>
                        </datalist>
                    </div>

                    <div class="col-sm-3">
                        <input type="text" name="engine" list="engine" value="<?= isset($_REQUEST['engine']) ? $_REQUEST['engine'] : NULL; ?>" placeholder="Dzinējs" class="filter form-control" form="form_filter">

                        <datalist id="engine">
                            <?php
                            $sql = "SELECT DISTINCT nosaukums FROM dzineja_tips ORDER BY nosaukums ASC";

                            $results = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_array($results)) {
                            ?>
                                <option value=<?= $row['nosaukums'] ?>>
                                <?php
                            }
                                ?>
                        </datalist>
                    </div>

                    <div class="col-sm-3">
                        <input type="text" name="year" list="year" value="<?= isset($_REQUEST['year']) ? $_REQUEST['year'] : NULL; ?>" placeholder="Gads" class="filter form-control" form="form_filter">

                        <datalist id="year">
                            <?php
                            $sql = "SELECT DISTINCT izlaiduma_gads FROM prece ORDER BY izlaiduma_gads DESC";

                            $results = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_array($results)) {
                            ?>
                                <option value=<?= $row['izlaiduma_gads'] ?>>
                                <?php
                            }
                                ?>
                        </datalist>
                    </div>

                    <div class="col-sm-3">
                        <input type="text" name="price-from" list="price-from" value="<?= isset($_REQUEST['price-from']) ? $_REQUEST['price-from'] : NULL; ?>" placeholder="Cena no:" class="filter form-control" form="form_filter">

                        <datalist id="price-from">
                            <?php
                            for ($i = 0; $i < 500000;) {
                                if ($i < 5000)
                                    $i += 1000;
                                else if ($i < 100000)
                                    $i += 5000;
                                else $i += 10000
                            ?>
                                <option value=<?= $i ?>>
                                <?php
                            }
                                ?>
                        </datalist>
                    </div>

                    <div class="col-sm-3">
                        <input type="text" name="price-up-to" list="price-up-to" value="<?= isset($_REQUEST['price-up-to']) ? $_REQUEST['price-up-to'] : NULL; ?>" placeholder="Cena līdz:" class="filter form-control" form="form_filter">

                        <datalist id="price-up-to">
                            <?php
                            for ($i = 0; $i < 500000;) {
                                if ($i < 5000)
                                    $i += 1000;
                                else if ($i < 100000)
                                    $i += 5000;
                                else $i += 10000
                            ?>
                                <option value=<?= $i ?>>
                                <?php
                            }
                                ?>
                        </datalist>
                    </div>

                    <div class="col-sm-3">
                        <label><b>Sakārtot:</b></label><br>
                        <label>Pēc cenas:</label><br>
                        <input type="radio" name="sort" value="ORDER BY preces_cena ASC" id="price_asc" form="form_filter" <?php if (isset($_REQUEST['sort']) && ($_REQUEST['sort'] == 'ORDER BY preces_cena ASC')) echo 'checked="checked"'; ?>>
                        <label for="price_asc">No maza līdz lielam.</label><br>
                        <input type="radio" name="sort" value="ORDER BY preces_cena DESC" id="price_desc" form="form_filter" <?php if (isset($_REQUEST['sort']) && ($_REQUEST['sort'] == 'ORDER BY preces_cena DESC')) echo 'checked="checked"'; ?>>
                        <label for="price_desc">No liela līdz mazam.</label>

                        <br><br>

                        <label>Pēc gada:</label><br>
                        <input type="radio" name="sort" value="ORDER BY izlaiduma_gads ASC" id="year_asc" form="form_filter" <?php if (isset($_REQUEST['sort']) && ($_REQUEST['sort'] == 'ORDER BY izlaiduma_gads ASC')) echo 'checked="checked"'; ?>>
                        <label for="year_asc">No maza līdz lielam.</label><br>
                        <input type="radio" name="sort" value="ORDER BY izlaiduma_gads DESC" id="year_desc" form="form_filter" <?php if (isset($_REQUEST['sort']) && ($_REQUEST['sort'] == 'ORDER BY izlaiduma_gads DESC')) echo 'checked="checked"'; ?>>
                        <label for="year_desc">No liela līdz mazam.</label>
                    </div>

                    <div class="col-sm-3">
                        <label><b>&nbsp</b></label><br>
                        <label>Pēc markas nosaukuma:</label><br>
                        <input type="radio" name="sort" value="ORDER BY marka ASC" id="brand_asc" form="form_filter" <?php if (isset($_REQUEST['sort']) && ($_REQUEST['sort'] == 'ORDER BY marka ASC')) echo 'checked="checked"'; ?>>
                        <label for="brand_asc">No A līdz Z.</label><br>
                        <input type="radio" name="sort" value="ORDER BY marka DESC" id="brand_desc" form="form_filter" <?php if (isset($_REQUEST['sort']) && ($_REQUEST['sort'] == 'ORDER BY marka DESC')) echo 'checked="checked"'; ?>>
                        <label for="brand_desc">No Z līdz A.</label>
                    </div>

                    <div class="col-sm-3">
                        <label><b>&nbsp</b></label><br>
                        <label>Pēc markas un modeļa nosaukuma:</label><br>
                        <input type="radio" name="sort" value="ORDER BY marka ASC, modelis ASC" id="brand_model_asc" form="form_filter" <?php if (isset($_REQUEST['sort']) && ($_REQUEST['sort'] == 'ORDER BY marka ASC, modelis ASC')) echo 'checked="checked"'; ?>>
                        <label for="brand_model_asc">No A līdz Z.</label><br>
                        <input type="radio" name="sort" value="ORDER BY marka DESC, modelis DESC" id="brand_model_desc" form="form_filter" <?php if (isset($_REQUEST['sort']) && ($_REQUEST['sort'] == 'ORDER BY marka DESC, modelis DESC')) echo 'checked="checked"'; ?>>
                        <label for="brand_model_desc">No Z līdz A.</label><br>
                        <input type="radio" name="sort" value="ORDER BY marka ASC, modelis DESC" id="brand_asc_model_desc" form="form_filter" <?php if (isset($_REQUEST['sort']) && ($_REQUEST['sort'] == 'ORDER BY marka ASC, modelis DESC')) echo 'checked="checked"'; ?>>
                        <label for="brand_asc_model_desc">Marka: No A līdz Z.<br>Modelis: No Z līdz A.</label><br>
                        <input type="radio" name="sort" value="ORDER BY marka DESC, modelis ASC" id="brand_desc_model_asc" form="form_filter" <?php if (isset($_REQUEST['sort']) && ($_REQUEST['sort'] == 'ORDER BY marka DESC, modelis ASC')) echo 'checked="checked"'; ?>>
                        <label for="brand_desc_model_asc">Marka: No Z līdz A.<br>Modelis: No A līdz Z.</label>
                    </div>

                    <div class="col-sm-3">
                        <form action="<?php echo $_SERVER['PHP_SELF'] . "?brand=&model=&transmission=&price-from=&price-up-to="; ?> method=" post">
                            <input type="submit" name="filter" value="Pielietot" class="filter form-control blue-button" form="form_filter">
                        </form>
                    </div>

                    <div class="col-sm-3">
                    </div>

                    <div class="col-sm-3">
                    </div>

                    <div class="col-sm-3">
                    </div>

                    <div class="col-sm-3" style="margin-top:-100px">
                        <input type="submit" name="reset" value="Atiestatīt" class="filter form-control btn-danger" onclick="CancelFilter()">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php


    // Запрос, фильтры и сортировка

    $brand = $_REQUEST['brand'];
    $model = $_REQUEST['model'];
    $transmission = $_REQUEST['transmission'];
    $body = $_REQUEST['body'];
    $engine = $_REQUEST['engine'];
    $year = $_REQUEST['year'];
    $price_from = $_REQUEST['price-from'];
    $price_up_to = $_REQUEST['price-up-to'];
    $sort = $_REQUEST['sort'];

    $passenger_car = $_REQUEST['passenger_car'];
    if ($passenger_car) $body = "(virsbuves_tips.nosaukums = 'Sedans' OR virsbuves_tips.nosaukums = 'Hečbeks' OR virsbuves_tips.nosaukums = 'Universālis' OR virsbuves_tips.nosaukums = 'Apvidus' OR virsbuves_tips.nosaukums = 'Krosovers' OR virsbuves_tips.nosaukums = 'Kupeja' OR virsbuves_tips.nosaukums = 'Minivens' OR virsbuves_tips.nosaukums = 'Pikaps' OR virsbuves_tips.nosaukums = 'Kabriolets')";

    $SUV = $_REQUEST['SUV'];
    if ($SUV) $body = "(virsbuves_tips.nosaukums = 'Apvidus' OR virsbuves_tips.nosaukums = 'Krosovers')";

    function make_filter($brand, $model, $transmission, $body, $engine, $year, $price_from, $price_up_to)
    {
        // Проверка на пустоту всех значений для создания фильтра
        if (!empty($brand) || !empty($model) || !empty($transmission) || !empty($body) || !empty($engine) || !empty($year) || !empty($price_from) || !empty($price_up_to)) {

            $filter_result = "WHERE klients_kods IS NULL AND ";

            // Проверка на пустое значение МАРКИ, создание параметра фильтра
            if (!empty($brand)) {
                $filter_brand = "automasinas_marka.nosaukums LIKE '%$brand%'";
            } else {
                $filter_brand = "";
            }

            // Проверка на пустое значение МОДЕЛИ, создание параметра фильтра
            if (!empty($model)) {
                $filter_model = "modelis LIKE '%$model%'";
            } else {
                $filter_model = "";
            }

            // Проверка на необходимость использования логического оператора AND между МАРКОЙ и МОДЕЛЬЮ
            if (!empty($filter_brand) && !empty($filter_model)) {
                $AND_model = " AND ";
            } else {
                $AND_model = "";
            }

            // Проверка на пустое значение КОРОБКИ ПЕРЕДАЧ, создание параметра фильтра
            if (!empty($transmission)) {
                $filter_transmission = "parnesumkarbas_tips.nosaukums LIKE '%$transmission%'";
            } else {
                $filter_transmission = "";
            }

            // Проверка на необходимость использования логического оператора AND между МАРКОЙ, МОДЕЛЬЮ и КОРОБКОЙ ПЕРЕДАЧ
            if ((!empty($filter_brand) || !empty($filter_model)) && !empty($filter_transmission)) {
                $AND_transmission = " AND ";
            } else {
                $AND_transmission = "";
            }

            // Проверка на пустое значение КУЗОВА, создание параметра фильтра
            if ($GLOBALS['passenger_car'] || $GLOBALS['SUV']) {
                $filter_body = $body;
            } else if (!empty($body)) {
                $filter_body = "virsbuves_tips.nosaukums LIKE '%$body%'";
            } else {
                $filter_body = "";
            }

            // Проверка на необходимость использования логического оператора AND между МАРКОЙ, МОДЕЛЬЮ, КОРОБКОЙ ПЕРЕДАЧ и КУЗОВОМ
            if ((!empty($filter_brand) || !empty($filter_model) || !empty($filter_transmission)) && !empty($filter_body)) {
                $AND_body = " AND ";
            } else {
                $AND_body = "";
            }

            // Проверка на пустое значение ДВИГАТЕЛЯ, создание параметра фильтра
            if (!empty($engine)) {
                $filter_engine = "dzineja_tips.nosaukums LIKE '%$engine%'";
            } else {
                $filter_engine = "";
            }

            // Проверка на необходимость использования логического оператора AND между МАРКОЙ, МОДЕЛЬЮ, КОРОБКОЙ ПЕРЕДАЧ, КУЗОВОМ и ДВИГАТЕЛЕМ
            if ((!empty($filter_brand) || !empty($filter_model) || !empty($filter_transmission) || !empty($filter_body)) && !empty($filter_engine)) {
                $AND_engine = " AND ";
            } else {
                $AND_engine = "";
            }

            // Проверка на пустое значение ГОДА, создание параметра фильтра
            if (!empty($year)) {
                $filter_year = "izlaiduma_gads = $year";
            } else {
                $filter_year = "";
            }

            // Проверка на необходимость использования логического оператора AND между МАРКОЙ, МОДЕЛЬЮ, КОРОБКОЙ ПЕРЕДАЧ, КУЗОВОМ и ДВИГАТЕЛЕМ
            if ((!empty($filter_brand) || !empty($filter_model) || !empty($filter_transmission) || !empty($filter_body) || !empty($filter_engine)) && !empty($filter_year)) {
                $AND_year = " AND ";
            } else {
                $AND_year = "";
            }

            // Если значение ЦЕНА ОТ пустое, то присваиваем 0
            if (empty($price_from)) {
                $price_from = 1;
            }

            // Если значение ЦЕНА ДО пустое, то присваиваем 0
            if (empty($price_up_to)) {
                $price_up_to = 100000000;
            }

            // Проверка на пустое значение ЦЕНЫ ОТ и ЦЕНЫ ДО, создание параметра фильтра
            if (!empty($price_from) && !empty($price_up_to)) {
                $filter_price = "preces_cena BETWEEN '$price_from' AND '$price_up_to'";
            } else {
                $filter_price = "";
            }

            // Проверка на необходимость использования логического оператора AND между МАРКОЙ, МОДЕЛЬЮ, КОРОБКОЙ ПЕРЕДАЧ и ДИАПАЗОНОМ ЦЕН
            if ((!empty($filter_brand) || !empty($filter_model) || !empty($filter_transmission) || !empty($filter_body) || !empty($filter_engine) || !empty($filter_year)) && !empty($filter_price)) {
                $AND_price = " AND ";
            } else {
                $AND_price = "";
            }

            // Создание окончательного варианта фильтраs
            $filter_result = $filter_result . $filter_brand . $AND_model . $filter_model . $AND_transmission . $filter_transmission . $AND_body . $filter_body . $AND_engine . $filter_engine . $AND_year . $filter_year . $AND_price . $filter_price;
        } else { // Присвоить пустоту, если все параметры пусты
            $filter_result = "WHERE klients_kods IS NULL";
        }

        // Вывод результата
        return $filter_result;
    }

    function make_sort($sort)
    {

        // Если есть сортировка, то добавить
        if (!empty($sort)) {
            $sort_result = " " . $sort;
        } else {
            $sort_result = " ORDER BY gads DESC";
        }

        // Вывод результата
        return $sort_result;
    }


    $sql =
        "SELECT prece.kods,
        attels,
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
        preces_cena,
        klients_kods
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
        "
        . make_filter($brand, $model, $transmission, $body, $engine, $year, $price_from, $price_up_to)
        . make_sort($sort);

    // ДЕМОНСТРАЦИЯ РАБОТЫ ФИЛЬТРА И СОРТИРОВКИ
    /*
    echo '<br><br><pre>';
    echo "Marka = $brand<br>";
    echo "Modelis = $model<br>";
    echo "Pārnesumkārba = $transmission<br>";
    echo "Cena no = $price_from<br>";
    echo "Cena līdz = $price_up_to<br>";
    echo "<br>Filter: <b>" . make_filter($brand, $model, $transmission, $body, $engine, $year, $price_from, $price_up_to) . "</b><br>";
    echo "<br>Sort: <b>" . make_sort($sort) . "</b><br><br>";
    echo $sql;
    echo '</pre>';
    */
    ?>

    <!-- Плитки каталога -->
    <div class="container content">
        <div class="row">
            <div class="col-md-12 products">
                <div class="row">

                    <?php

                    // Подключиться, если ругается PHP
                    #$conn = mysqli_connect("localhost", "root", "mysql", "cernobrovs");

                    $results = mysqli_query($conn, $sql);

                    if ($results->num_rows) {
                        while ($row = $results->fetch_object()) {
                    ?>
                            <div class="col-sm-3">
                                <div class="catalog">
                                    <div class="car-img">
                                        <img src=<?php echo "\"{$row->attels}\""; ?> style="max-width:100%;height:150px" alt="Car Photo">
                                    </div>
                                    <b class="car-brand"><?php echo "{$row->marka}"; ?></b>
                                    <p class="car-model"><?php echo "{$row->modelis}"; ?></p>
                                    <div class="car-desc">
                                        <small>Gads: </small><strong><?php echo "{$row->gads}"; ?></strong><br>
                                        <small>Ražotājvalsts: </small><strong> <?php echo "{$row->valsts}"; ?></strong><br><br>
                                        <small>Krāsa: </small><strong><?php echo "{$row->krasa}"; ?></strong> <br>
                                        <small>Virsbūves tips: </small><strong> <?php echo "{$row->virsbuve}"; ?></strong><br>
                                        <small>Dzinējs: </small><strong><?php echo "{$row->dzinejs}, {$row->tilpums}, {$row->novietojums}, {$row->DPS}"; ?></strong><br>
                                        <small>Piedziņa: </small><strong><?php echo "{$row->piedzina}"; ?></strong><br>
                                        <small>Pārnesumkārba: </small><strong><?php echo "{$row->parnesumkarba}"; ?></strong><br>
                                        <small>Durvju skaits: </small><strong><?php echo "{$row->durvju_skaits}"; ?></strong><br>
                                        <small>Sēdvietu skaits: </small><strong><?php echo "{$row->sedvietu_skaits}"; ?></strong><br>
                                    </div>
                                    <p class="car-price">Cena: <?php echo "{$row->preces_cena}"; ?> €</p>
                                    <a href="carinfo.php?kods=<?php echo "{$row->kods}"; ?>" class="btn btn-primary color">Skatīt vairāk</a>
                                </div>
                            </div>

                    <?php
                        }
                    } else {
                        $no_results = TRUE;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php
    if ($no_results) {
        echo "<h4 style='text-align:center;color:red'>Nekas nav atrasts!</h4><br>
              <h5 style='text-align:center'><strong>Atiestatiet filtrus!</strong></h5><br>
              <h6 style='text-align:center'>Iespējams, piedāvājumi ar šādiem parametriem ir ļoti reti vai tika izpārdoti.</h6>
              ";
    }
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script>
        function CancelFilter() {
            document.getElementsByName("brand")[0].value = "";
            document.getElementsByName("model")[0].value = "";
            document.getElementsByName("transmission")[0].value = "";
            document.getElementsByName("body")[0].value = "";
            document.getElementsByName("engine")[0].value = "";
            document.getElementsByName("year")[0].value = "";
            document.getElementsByName("price-from")[0].value = "";
            document.getElementsByName("price-up-to")[0].value = "";
            $_REQUEST['sort'] = "ORDER BY izlaiduma_gads DESC";
            document.querySelector('.blue-button').click()
        }
    </script>


</body>

</html>