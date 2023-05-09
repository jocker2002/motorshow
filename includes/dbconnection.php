<?php

# Соединение с базой данных (в школе)
/*
$conn = mysqli_connect("10.0.114.133", "cernobrovs", "cernobrovs1", "cernobrovs");
if (!$conn) {
  die("Savienojums neizdevās: " . mysqli_connect_error());
}
*/

# Соединение с базой данных

$conn = mysqli_connect("localhost", "root", "mysql", "cernobrovs");
if (!$conn) {
  die("Savienojums neizdevās: " . mysqli_connect_error());
}

?>