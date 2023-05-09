<?php

session_start();

if (!$_SESSION['request_success']) {
    header('Location: catalog.php');
}

?>

<!DOCTYPE html>
<html>

<head>
    <?php
    # Навигационное меню
    include("../navbar/navbar.php");
    ?>
</head>

<body>

<center>
<h2 style="margin-top:75px;text-align:center">Jūsu pieprasījums ir veiksmīgi iesniegts pārskatīšanai!</h2>
<p style="margin-top:20px;text-align:center">Paldies, ka pieprasījāt pie mums!<br>
    Mēs ar jums sazināsimies pa <b>tālruņi</b> vai pa <b>e-pastu</b> un norādīsim turpmākās darbības.</p>

<a href="../home.php" class="btn btn-primary" style="margin-top:20px">Turpināt skatīt preces</a>
</center>

 
</body>

<html>