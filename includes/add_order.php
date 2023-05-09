<?php

// Установить Латвийский часовой пояс
date_default_timezone_set('Europe/Riga');
// Получить сегодняшнюю дату
$date_today = date('Y-m-d');
// Получить настоящее время
$present_time  = date('H:i:s', time());

session_start();

include "dbconnection.php";

$perscode_order = $_POST['perscode_order'];
$country_order = $_POST['country_order'];
$city_order = $_POST['city_order'];
$street_order = $_POST['street_order'];
$postalcode_order = $_POST['postalcode_order'];
$delivery_order = $_POST['delivery_order'];
$payment_order = $_POST['payment_order'];

$user_code = $_SESSION['order']['user_code'];
$product_code = $_SESSION['order']['product_code'];
$client_code = $_SESSION['order']['client_code'];
$employee_code = $_SESSION['order']['employee_code'];
$price = $_SESSION['order']['price'];


$sql = "SELECT sakotneja_cena FROM piegades_veids WHERE kods = $delivery_order";

$get_deilvery_price = mysqli_query($conn, $sql);

if (!$get_deilvery_price) {
die("Piegādes cenas izgūšanas kļūda: <strong>" . mysqli_error($conn) . "</strong>");
}

$row = mysqli_fetch_array($get_deilvery_price);

echo "$ Deilvery price = ".$row['sakotneja_cena']."<br>";
$deilvery_price = $row['sakotneja_cena'];

echo "$ Order price = ".$price."<br>";

$total_price = $price + $deilvery_price;
echo "$ Total price = ".$total_price."<br><br><br>";

echo "perscode_order = ".$perscode_order."<br>";
echo "country_order = ".$country_order."<br>";
echo "city_order = ".$city_order."<br>";
echo "street_order = ".$street_order."<br>";
echo "postalcode_order = ".$postalcode_order."<br>";
echo "delivery_order = ".$delivery_order."<br>";
echo "payment_order = ".$payment_order."<br>";

echo "user_code = ".$user_code."<br>";
echo "product_code = ".$product_code."<br>";
echo "client_code = ".$client_code."<br>";
echo "employee_code = ".$employee_code."<br>";

echo "<br><br> --- PRECE --- <br><br>";
echo "klients_kods = ".$user_code."<br>";
echo "datums = ".$date_today."<br>";
echo "laiks = ".$present_time."<br>";
echo "piegades_veids_kods = ".$delivery_order."<br>";
echo "maksajuma_veids_kods = ".$payment_order."<br>";
echo "cena = ".$total_price."<br>";
echo "darbinieks_kods = ".$employee_code."<br>";
echo "<br><br> --- PRECE --- <br><br>";




$update_client = mysqli_query($conn, "UPDATE klients SET personas_kods='$perscode_order', valsts='$country_order', pilseta='$city_order', iela='$street_order', pasta_indekss='$postalcode_order' WHERE kods=$client_code");

if (!$update_client) {
    die("Klienta informācijas atjaunināšanas kļūda: <strong>" . mysqli_error($conn) . "</strong>");
}


$make_order = mysqli_query($conn, "UPDATE prece SET klients_kods='$user_code', datums='$date_today', laiks='$present_time', piegades_veids_kods='$delivery_order', maksajuma_veids_kods='$payment_order', cena='$total_price', darbinieks_kods='$employee_code' WHERE kods=$product_code");

if (!$make_order) {
    die("Veidojot pasūtījumu, radās kļūda: <strong>" . mysqli_error($conn) . "</strong>");
}

if ($update_client && $make_order) {
    echo "<br><b>Visi dati ir veiksmīgi pievienoti!</b>";
    $_SESSION['order_success'] = TRUE;
    header('Location: ../newcars/order_success.php');

}







