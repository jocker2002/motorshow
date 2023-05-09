<?php
session_start();
# Соединение с базой данных
include("../../includes/dbconnection.php");

$id = $_GET['kods']; // Получить ID через GET

// Проверка на наличие значения
if (isset($id)) {
   
    $remove = mysqli_query($conn, "DELETE FROM pasutijumu_detalas WHERE kods = '$id'");

    if ($remove) {

        $_SESSION['message'] = "<center><div class=\"alert alert-success\" style='margin-top:1em;text-align:center'><p>Ieraksts ar numuru <b>" . $id . "</b> tika veiksmīgi izdzēsts!</p></div></center>";

        mysqli_close($conn); // Закрыть соединение
        header('Location: requisitions.php');
        exit;
    }
    else {
        die("Ieraksta dzēšanas kļūda: <strong>" . mysqli_error($conn) . "</strong>");
    }
    
}
else {
    header('Location: requisitions.php');
}
?>
