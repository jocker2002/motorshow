<?php

session_start();

if (!$_SESSION['order_success']) {
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
<h2 style="margin-top:75px;text-align:center">Jūsu pasūtījums ir veiksmīgi noformēts!</h2>
<p style="margin-top:20px;text-align:center">Paldies, ka pasūtījāt pie mums!<br>Tagad Jūs varat apmaksāt pasūtīto preci.</p>

<a href="../home.php" class="btn btn-primary" style="margin-top:20px">Turpināt skatīt preces</a>
</center>

 
</body>

<html>