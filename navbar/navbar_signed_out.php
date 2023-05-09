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
                    <img src="http://localhost/Cernobrovs/navbar/assets/logo.png" alt="logo" />
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
                        <a href="#!" class="navbar-link" data-link="/login">
                            <img src="http://localhost/Cernobrovs/navbar/assets/signin.png" alt="Ielogoties" />
                        </a>
                        <ul class="nav-dropdown">
                            <li>
                                <a href="http://localhost/Cernobrovs/login.php" class="navbar-link" data-link="/login.php">Klients</a>
                            </li>
                            <li>
                                <a href="http://localhost/Cernobrovs/login_admin.php" class="navbar-link" data-link="/login_admin.php">Darbinieks</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php if(strpos($_SERVER['REQUEST_URI'],"home.php") || strpos($_SERVER['REQUEST_URI'],"carinfo.php")) echo "style='margin-top:16px'" ?> >
                        <a href="http://localhost/Cernobrovs/register.php" class="navbar-link" data-link="/register.php">
                            <img src="http://localhost/Cernobrovs/navbar/assets/signup.png" alt="Reģistrēties" />
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="http://localhost/Cernobrovs/navbar/navbar_script.js"></script>

</body>

</html>