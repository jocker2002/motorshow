<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: ../home.php');
} else {
?>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="button.css">
</head>
<body>
<?php

    # Навигационное меню
    include("../navbar/navbar.php");

    # Соединение с базой данных
    include("../includes/dbconnection.php");

    $user_code = $_SESSION['user']['kods'];
    echo "<br>";

    $sql = 
    "SELECT kods,
    lietotajs_kods,
    darbinieks,
    DATE_FORMAT(datums, '%d.%m.%Y') AS datums,
    laiks,
    temats,
    saturs
    FROM epasta_zinas
    WHERE lietotajs_kods = '$user_code'
    ORDER BY datums DESC, laiks DESC";

    $recieve_email = mysqli_query($conn, $sql);

    if (!$recieve_email) {
        die("Ziņu izvades kļūda: <strong>" . mysqli_error($conn) . "</strong>");
    }
?>
<div style="margin-left:5em;margin-right:5em">
    <table id="responstable">
    <tr>
        <th width="10%">Datums</th>
        <th width="10%">Laiks</th>
        <th width="15%">No darbinieka</th>
        <th width="55%">Temats</th>
    </tr>

<?php
        if (mysqli_num_rows($recieve_email)) {
        while ($row = mysqli_fetch_array($recieve_email)) {
?>
        <tr onclick="document.location = 'open_email.php?kods=<?= $row['kods'] ?>';" style="cursor:pointer">
            <td> <?= $row['datums'] ?> </td>
            <td> <?= $row['laiks'] ?> </td>
            <td> <?= $row['darbinieks'] ?> </td>
            <td><b> <?= $row['temats'] ?> </b></td>
        </tr>
        <?php
        }
    }
}
?>
    </table>
</div>
</body>
</html>