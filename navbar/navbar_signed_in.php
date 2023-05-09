<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="cache-control" content="no-cache">
    <title>Alfa Ωmega Cars</title>

    <link rel="shortcut icon" href="http://localhost/Cernobrovs/navbar/assets/icon.ico" type="image/x-icon">
    <link rel='stylesheet' href='http://localhost/Cernobrovs/navbar/bootstrap.min.css'>
    <link rel='stylesheet' href='http://localhost/Cernobrovs/navbar/navbar_style.css'>
</head>

<body>

    <section class="navigation">
        <div class="nav-container">
            <div class="brand">
                <a href="http://localhost/Cernobrovs/home.php" data-link="/home.php">
                    <img src="http://localhost/Cernobrovs/navbar/assets/logo.png" width="20% " height="20%" alt="logo" />
                </a>
            </div>
            <nav>
                <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
                <ul class="nav-list">
                    <li>
                        <a href="#!" class="navbar-link" data-link="/newcars">Jaunas automašīnas</a>
                        <ul class="nav-dropdown">
                            <li>
                                <a href="http://localhost/Cernobrovs/newcars/catalog.php#!" class="navbar-link" data-link="/catalog.php#!">Visas automašīnas</a>
                            </li>
                            <li>
                                <a href="http://localhost/Cernobrovs/newcars/catalog.php?passenger_car=true" class="navbar-link" data-link="/catalog.php?passenger_car=true">Vieglie automobiļi</a>
                            </li>
                            <li>
                                <a href="http://localhost/Cernobrovs/newcars/catalog.php?SUV=true" class="navbar-link" data-link="/catalog.php?SUV=true">Apvidus automašīnas un krosoveri</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="http://localhost/Cernobrovs/brands/brand_catalog.php" class="navbar-link" data-link="/brands">Zīmolu vēsture</a>
                    </li>
                    <li>
                        <a href="http://localhost/Cernobrovs/contacts.php" class="navbar-link" data-link="/contacts.php">Kontakti</a>
                    </li>
                    <li>
                        <a href="http://localhost/Cernobrovs/aboutus.php" class="navbar-link" data-link="/aboutus.php">Par mums</a>
                    </li>
                    <li>
                        <a href="#!" class="navbar-link" data-link="/profile">
                            <img src=<?= $_SESSION['user']['avatar'] ?> width="45px" height="45px" alt="Avatar" style="margin-right:15px"><?= $_SESSION['user']['username'] ?>
                        </a>

                        <ul class="nav-dropdown">
                            <li>
                                <a href="http://localhost/Cernobrovs/profile/profile.php" class="navbar-link" data-link="/profile.php">
                                    <img src="http://localhost/Cernobrovs/navbar/assets/edit.png" width="45px" height="45px" alt="Email" />
                                    Rediģēt profilu</a>
                            </li>
                            <li>
                                <a href="http://localhost/Cernobrovs/profile/email.php" class="navbar-link" data-link="/email.php">
                                    <img src="http://localhost/Cernobrovs/navbar/assets/email.png" width="65px" height="45px" alt="Email" />
                                    E-pasta ziņas</a>
                            </li>
                            <li>
                                <a href="http://localhost/Cernobrovs/profile/favorites.php" class="navbar-link" data-link="/favorites.php">
                                    <img src="http://localhost/Cernobrovs/navbar/assets/heart.png" width="52px" height="45px" alt="Favorites" />
                                    Izlases saraksts</a>
                            </li>
                            <li>
                                <a href="http://localhost/Cernobrovs/profile/comparison.php" class="navbar-link" data-link="/comparison.php">
                                    <img src="http://localhost/Cernobrovs/navbar/assets/pedestal.png" width="70px" height="45px" alt="Comparison" />
                                    Salīdzināšanas saraksts</a>
                            </li>
                            <li>
                                <a href="http://localhost/Cernobrovs/includes/signout.php" class="navbar-link" data-link="/signout.php">
                                    <img src="http://localhost/Cernobrovs/navbar/assets/signout.png" width="45px" height="45px" alt="Iziet" />
                                    Iziet</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="http://localhost/Cernobrovs/navbar/navbar_script.js"></script>

</body>

</html>