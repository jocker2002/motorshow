<?php
session_start();
unset($_SESSION['carinfo']);
?>
<!DOCTYPE html>
<html>

<head>
<?php

    # Навигационное меню
    include("navbar/navbar.php");

    # Соединение с базой данных
    include("includes/dbconnection.php");
    ?>

  <meta charset="UTF-8">
  <style>
    
    body {
      font: 14px sans-serif;
      background-color: rgb(245, 251, 255);
    }

    .margin-left {
      margin-left: 20px;
    }

    /*
    td {
      border: 3px solid grey;
    }
    */

  </style>
</head>

<body>

<center>

<h2 style="margin:30px">Kontakti</h2>

<table>
    <tr>
      <td rowspan="8">
        <img src="uploads/map.jpg" width="600" height="480">
      </td>
    </tr>
    <tr>
      <td>
        <span class="margin-left"><b>Autosalona tālrunis:</b></span>
      </td>
    </tr>
    <tr>
      <td>
        <span class="margin-left">+371 21345876</span>
      </td>
    </tr>
      <td>
        <span class="margin-left"><b>Autosalona darba laiks:</b></span>
      </td>
    </tr>
    <tr>
      <td>
        <span class="margin-left">Pm.-St. 9:00-21:00, Sv. 9:00-20:00</span>
      </td>
    </tr>
    <tr>
      <td>
        <span class="margin-left"><b>Servisa centrs:</b></span>
      </td>
    </tr>
    <tr>
      <td>
        <span class="margin-left">Pm.-Sv. 7:00-21:00</span>
      </td>
    </tr>
    <tr>
      <td colspan="2" style="text-align:center">
        <form style="visibility: hidden">
          <textarea name="email" rows="4" cols="50" class="margin-left"></textarea><br>
          <input type="submit" value="Uzrakstīt vēstuli" style="margin-top:10px">
        </form>
      </td>
    </tr>
</table>


  <!--
    <b>Autosalona tālrunis:</b>
    +371 21345876 
    <b>Autosalona darba laiks:</b>
    Pm.-St. 9:00-21:00, Sv. 9:00-20:00 
    <b>Servisa centrs:</b>
    Pm.-Sv. 7:00-21:00  
    
    
    
    <textarea name="email" rows="4" cols="50"></textarea> 
    <input type="submit" value="Uzrakstīt vēstuli"> 
    
    
    <img src="uploads/map.jpg" width="600" height="480">

-->
  </center>


</body>

</html>