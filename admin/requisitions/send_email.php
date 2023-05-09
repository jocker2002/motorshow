<?php

// Установить Латвийский часовой пояс
date_default_timezone_set('Europe/Riga');
// Получить сегодняшнюю дату
$date_today = date('Y-m-d');
// Получить настоящее время
$present_time  = date('H:i:s', time());

session_start();

$id = $_GET['lietotajs_kods']; // Получить ID через GET

// Проверка на наличие значения

if (!isset($id)) {
    header('Location: requisitions.php');
}
else {

    # Соединение с базой данных
    include("../../includes/dbconnection.php");

    $request_code = $_SESSION['request']['code'];
    $user_code = $_SESSION['request']['user_code'];
    $product_code = $_SESSION['request']['product_code'];
    $client_code = $_SESSION['request']['client_code'];
    $darbinieks_kods = $_SESSION['admin']['kods'];
    $darbinieks = $_SESSION['request']['darbinieks'];
    $amats = $_SESSION['admin']['amats'];
    $adresats = $_SESSION['request']['adresats'];
    $klients = $_SESSION['request']['klients'];
    $prece = $_SESSION['request']['prece'];
    $cena = $_SESSION['request']['cena'];
    $pienemts = $_POST['accepted'];
    $temats = $_POST['subject'];
    $saturs = $_POST['content'];

    if ($pienemts == "JĀ") {
        $statuss = "Pieņemts";
    }
    else if ($pienemts == "NĒ") {
        $statuss = "Noraidīts";
    }
    else {
        $statuss = "Nav apstrādāts";
    }

    
    // Отправить сообщение
    $send_email = mysqli_query($conn, "INSERT INTO epasta_zinas (lietotajs_kods,prece_kods,klients_kods,darbinieks_kods,darbinieks,amats,adresats,klients,prece,cena,datums,laiks,statuss,temats,saturs) VALUE ('$user_code','$product_code','$client_code','$darbinieks_kods','$darbinieks','$amats','$adresats','$klients','$prece','$cena','$date_today','$present_time','$statuss','$temats','$saturs')");

    if (!$send_email) {
        die("Ziņas nosūtīšanas kļūda: <strong>" . mysqli_error($conn) . "</strong>");
    }
 
    // Обновить статус запроса
    $update_status = mysqli_query($conn, "UPDATE pasutijumu_detalas SET statuss='$statuss' WHERE kods='$request_code'");

    if (!$update_status) {
        die("Statusa atjaunināšanas kļūda: <strong>" . mysqli_error($conn) . "</strong>");
    }
    
    if ($send_email && $update_status) {

        $_SESSION['message'] = "
        <center>
            <div class=\"alert alert-success\" style='margin-top:1em;text-align:center'>
                <p>Ziņa adresātam <b>". $adresats ."</b> ir veiksmīgi nosūtīta!</p>
            </div>
            <div class=\"alert alert-success\" style='margin-top:1em;text-align:center'>
                <p>Pieprasījuma statuss ar numuru <b>" . $request_code . "</b> tika mainīts uz <b>\"" . $statuss . "\"</b></p>
            </div>
        </center>";
        mysqli_close($conn); // Закрыть соединение
        header('Location: requisitions.php');
        exit;
    }
}
    
?>
