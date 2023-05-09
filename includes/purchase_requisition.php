<?php

// Установить Латвийский часовой пояс
date_default_timezone_set('Europe/Riga');
// Получить сегодняшнюю дату
$date_today = date('Y-m-d');
// Получить настоящее время
$present_time  = date('H:i:s', time());

session_start();

$name_request = $_POST['name_request'];
$surname_request = $_POST['surname_request'];
$phone_request = $_POST['phone_request'];
$email_request = $_POST['email_request'];
$user_code = $_SESSION['user']['kods'];
$car_code = $_SESSION['user']['carid'];

if (!$_SESSION['user']) {

    $_SESSION['message'] = "<div class=\"alert alert-danger\"><p>Jums ir jāautorizējas/jāreģistrējas, lai varētu iesniegt pasūtījumu pārskatīšanai!</p></div>";
    header('Location: '.$_SESSION['carinfo']);
} elseif (empty($name_request) || empty($surname_request) || empty($phone_request)|| empty($email_request)) {
    $_SESSION['message'] = "<div class=\"alert alert-danger\"><p>Lūdzu, aizpildiet laukus!</p></div>";
    header('Location: '.$_SESSION['carinfo']);
}
else {

# Соединение с базой данных
include("../includes/dbconnection.php");

// ВЫВОД ЗНАЧЕНИЙ

foreach($_SESSION['user'] as $x => $x_value) {
    echo "Key = " . $x . ", Value = " . $x_value;
    echo "<br>";
  }
  echo "<br>";

echo "User username = ".$_SESSION['user']['username']."<br>";
echo "User name = ".$name_request."<br>";
echo "User surname = ".$surname_request."<br>";
echo "User phone = ".$phone_request."<br>";
echo "User phone = ".$email_request."<br>";
echo "User ID = ".$user_code."<br>";
echo "Car ID = ".$car_code."<br><br>";


$sql = "INSERT INTO klients (vards,uzvards,talrunis,epasts,lietotajs_kods) VALUES ('$name_request','$surname_request','$phone_request','$email_request','$user_code')";

$client_data = mysqli_query($conn, $sql);

if (!$client_data) {
    die("Vaicājuma kļūda: <strong>" . mysqli_error($conn) . "</strong>");
}
else {
    echo "Dati ir veiksmīgi pievienoti \"klients\" tabulai!<br>";
}

// Получить ID последнего добавленного клиента
$client_code = mysqli_insert_id($conn);
echo "<br>Client ID = " . $client_code . "<br>";

$sql = "INSERT INTO pasutijumu_detalas (prece_kods,lietotajs_kods,klients_kods,izveides_datums,izveides_laiks) VALUES ('$car_code','$user_code','$client_code','$date_today','$present_time')";

$requisition = mysqli_query($conn, $sql);

if (!$requisition) {
    die("Vaicājuma kļūda: <strong>" . mysqli_error($conn) ."</strong>");
}
else {
    echo "Dati ir veiksmīgi pievienoti \"pasutijumu_detalas\" tabulai!<br>";
}

if ($client_data && $requisition) {
    echo "<strong>Pirkuma pieprasījums ir veiksmīgi izveidots!</strong>";
    $_SESSION['request_success'] = TRUE;
    header('Location: ../newcars/sent_requisition.php');
}
}
?>