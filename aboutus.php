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
    ?>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="brands/style.css">
</head>

<body>
    <div id="page_main">
        <div class="page_table">
            <p>
            <h3>Vietnes mērķis</h3>
            <hr>
                Šaja vietne ir izstradāta ar mērķi nodrošināt informācijas glabāšanu par automašīnām, vietnes lietotājiem, klientiem un darbiniekiem, kā arī automašīnas pasūtīšanas procesa īstenošanu no klienta puses, un pasūtījuma apstiprinājuma akceptēšana no darbinieka puses.
            </p>
            <h3>Datu bāzes izstrādes nepieciešamība</h3>
            <hr>
            <p>
                Datu bāzes izstrādes nepieciešamība ir nodrošināt autosalona darbību un tās datu autonomiju no darbinieku puses, kuriem ir piekļuve rediģēšanas tiesības.
            </p>
            <h3>Papildus</h3>
            <hr>
            <p>
            Cilne "<b>Zimolu vēsture</b>" ir "<i>vēsturisks un informatīvs stūrītis</i>", kurā var izlasīt vēsturi un citu informāciju par jebkuru no 10 piedāvātajām automašīnu markām.
            </p>
            <h3>Autors</h3>
            <hr>
            <p>
                Dmitrijs Černobrovs<br>
                Grupa: 4.Ap
            </p>
        </div>
    </div>

</body>

<html>