<?php
session_start();
$pagepath = $_SERVER['PHP_SELF'];

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Alfa Ωmega Cars</title>
    <link rel="shortcut icon" href="http://localhost/Cernobrovs/navbar/assets/icon.ico" type="image/x-icon">
    <link rel='stylesheet' href='http://localhost/Cernobrovs/navbar/bootstrap.min.css'>

    <style>
        @charset "UTF-8";

        .navigation {
            height: 70px;
            background: #d8edfc;
        }

        .brand {
            position: absolute;
            padding-top: 0px;
            padding-left: 20px;
            float: left;
            line-height: 70px;
            text-transform: uppercase;
            font-size: 1.4em;
        }

        .brand a,
        .brand a:visited {
            color: #041769;
            text-decoration: none;
            font-weight: 550;
        }

        .brand a:hover {
            color: #1e98a6;
        }

        .nav-container {
            max-width: 1100px;
            margin: 0 auto;
        }

        nav {
            float: right;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            float: left;
            position: relative;
        }

        nav ul li a,
        nav ul li a:visited {
            display: block;
            padding: 0 19.5px;
            line-height: 70px;
            font-size: 18px;
            background: #d8edfc;
            color: #041769;
            text-decoration: none;
        }

        #active {
            background-color: #3795ff;
            color: #ffffff;
            text-decoration: none;
        }

        nav ul li a:hover,
        nav ul li a:visited:hover {
            background: #99d5ff;
            color: #041769;
            text-decoration: none;
        }

        nav ul li a:not(:only-child):after,
        nav ul li a:visited:not(:only-child):after {
            padding-left: 4px;
            content: " ▾";
            text-decoration: none;
        }

        nav ul li ul li {
            min-width: 300px;
        }

        nav ul li ul li a {
            padding: 15px;
            line-height: 20px;
        }

        .nav-dropdown {
            position: absolute;
            display: none;
            z-index: 1;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.15);
        }

        /* Mobile navigation */

        .nav-mobile {
            display: none;
            position: absolute;
            top: 0;
            right: 0;
            background: #3795ff;
            height: 70px;
            width: 70px;
        }

        @media only screen and (max-width: 798px) {
            .nav-mobile {
                display: block;
            }

            nav {
                width: 100%;
                padding: 70px 0 15px;
            }

            nav ul {
                display: none;
            }

            nav ul li {
                float: none;
            }

            nav ul li a {
                padding: 15px;
                line-height: 20px;
            }

            nav ul li ul li a {
                padding-left: 30px;
            }

            .nav-dropdown {
                position: static;
            }
        }

        @media screen and (min-width: 799px) {
            .nav-list {
                display: block !important;
            }
        }

        #nav-toggle {
            position: absolute;
            left: 18px;
            top: 22px;
            cursor: pointer;
            padding: 10px 35px 16px 0px;
        }

        #nav-toggle span,
        #nav-toggle span:before,
        #nav-toggle span:after {
            cursor: pointer;
            border-radius: 1px;
            height: 5px;
            width: 35px;
            background: #ffffff;
            position: absolute;
            display: block;
            content: "";
            transition: all 300ms ease-in-out;
        }

        #nav-toggle span:before {
            top: -10px;
        }

        #nav-toggle span:after {
            bottom: -10px;
        }

        #nav-toggle.active span {
            background-color: transparent;
        }

        #nav-toggle.active span:before,
        #nav-toggle.active span:after {
            top: 0;
        }

        #nav-toggle.active span:before {
            transform: rotate(45deg);
        }

        #nav-toggle.active span:after {
            transform: rotate(-45deg);
        }

        article {
            max-width: 1000px;
            margin: 0 auto;
            padding: 10px;
        }
    </style>
</head>

<body>

    <section class="navigation">
        <div class="nav-container">
            <div class="brand">
                <a href="http://localhost/Cernobrovs/admin/profile_admin.php">
                    <img src="http://localhost/Cernobrovs/navbar/assets/logo.png" width="20% " height="20%" alt="logo" />
                </a>
            </div>
            <nav>
                <div class="nav-mobile"><a id="nav-toggle" href="#!"></a></div>
                <ul class="nav-list">
                    <li>
                        <a href="#!" id=<?= strpos($pagepath, "requisitions.php") || strpos($pagepath, "orders.php") || strpos($pagepath, "allcars.php") ? "active" : "" ?>>Jaunas automašīnas</a>
                        <ul class="nav-dropdown">
                            <li>
                            <li>
                                <a href="http://localhost/Cernobrovs/admin/requisitions/requisitions.php" id=<?= strpos($pagepath, "requisitions.php") ? "active" : "" ?>>Pirkuma pieprasījumi</a>
                            </li>
                              <li>
                                <a href="http://localhost/Cernobrovs/admin/orders/orders.php" id=<?= strpos($pagepath, "orders.php") ? "active" : "" ?>>Automašīnu pasūtījumi</a>
                            </li>
                            <li>
                                <a href="http://localhost/Cernobrovs/admin/allcars/allcars.php" id=<?= strpos($pagepath, "allcars.php") ? "active" : "" ?>>Jaunas automašīnas</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="http://localhost/Cernobrovs/admin/clients/clients.php" id=<?= strpos($pagepath, "clients.php") ? "active" : "" ?>>Klienti</a>
                    </li>
                    <li>
                        <a href="http://localhost/Cernobrovs/admin/users/users.php" id=<?= strpos($pagepath, "users.php") ? "active" : "" ?>>Lietotāji</a>
                    </li>
                    <li>
                        <a href="http://localhost/Cernobrovs/admin/employees/employees.php" id=<?= strpos($pagepath, "employees.php") ? "active" : "" ?>>Darbinieki</a>
                    </li>
                    <li>
                        <a href="#!" id=<?= strpos($pagepath, "profile_admin.php") || strpos($pagepath, "signout.php") ? "active" : "" ?>>
                            <img src=<?= $_SESSION['admin']['avatar'] ?> width="45px" height="45px" alt="Avatar" style="margin-right:15px"><?= $_SESSION['admin']['vards'] . " " . $_SESSION['admin']['uzvards'] ?>
                        </a>

                        <ul class="nav-dropdown">
                            <li>
                                <a href="http://localhost/Cernobrovs/admin/profile_admin.php" id=<?= strpos($pagepath, "profile_admin.php") ? "active" : "" ?>>
                                    <img src="http://localhost/Cernobrovs/navbar/assets/edit.png" width="45" height="45" alt="Email" />
                                    Rediģēt profilu</a>
                            </li>
                            <li>
                                <a href="http://localhost/Cernobrovs/includes/signout.php" id=<?= strpos($pagepath, "signout.php") ? "active" : "" ?>>
                                    <img src="http://localhost/Cernobrovs/navbar/assets/signout.png" width="45px" height="45" alt="Iziet" />
                                    Iziet</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script>
        (function($) { // Begin jQuery
            $(function() { // DOM ready
                // If a link has a dropdown, add sub menu toggle.
                $('nav ul li a:not(:only-child)').click(function(e) {
                    $(this).siblings('.nav-dropdown').toggle();
                    // Close one dropdown when selecting another
                    $('.nav-dropdown').not($(this).siblings()).hide();
                    e.stopPropagation();
                });
                // Clicking away from dropdown will remove the dropdown class
                $('html').click(function() {
                    $('.nav-dropdown').hide();
                });
                // Toggle open and close nav styles on click
                $('#nav-toggle').click(function() {
                    $('nav ul').slideToggle();
                });
                // Hamburger to X toggle
                $('#nav-toggle').on('click', function() {
                    this.classList.toggle('active');
                });
            }); // end DOM ready
        })(jQuery); // end jQuery
    </script>


    <script>
        // Активная страница
        var links = document.getElementsByClassName("myLink");
        var URL = window.location.pathname;
        URL = URL.substring(URL.lastIndexOf('/'));
        for (var i = 0; i < links.length; i++) {
            if (links[i].dataset.pathname == URL) {
                links[i].classList.add("active");
            }
        }
    </script>

</body>

</html>