<?php

session_start();
unset($_SESSION['user']);
header('Location: ../home.php');

/*
session_start();
session_destroy();
header('Location: home.php');
exit;
*/

?>

