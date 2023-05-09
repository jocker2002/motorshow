<?php
session_start();
unset($_SESSION['carinfo']);
?>

    <?php
    # Навигационное меню
    include("navbar/navbar.php");

    # Соединение с базой данных
    include("includes/dbconnection.php");   
    ?>

<head>

    <meta charset="UTF-8">
    <link rel='stylesheet' href='navbar/bootstrap.min.css'>
    <link rel='stylesheet' href='home_style.css'>
</head>

<body>

<div class="header">
<a href="http://localhost/Cernobrovs/newcars/catalog.php#!"><img src="https://fontmeme.com/permalink/211029/053524b15c85d25dfcb2e035ed16d13d.png" alt="need-for-speed-font" border="0"></a>
</div>


    <section class="container-brand main-brands margin-t1-b1">
        <div class="catalog-brands">

            <div class="block-brand">
                <a href='newcars/catalog.php?brand=Audi'>
                    <span class="logo-brand">
                        <img src='assets/audi-logo.webp' alt="Audi"/>
                    </span>
                    <span class="name-brand">Audi</span>
                </a>
            </div>

            <div class="block-brand">
                <a href='newcars/catalog.php?brand=BMW'>
                    <span class="logo-brand">
                        <img src='assets/bmw-logo.webp' alt="Audi"/>
                    </span>
                    <span class="name-brand">BMW</span>
                </a>
            </div>

            <div class="block-brand">
                <a href='newcars/catalog.php?brand=Chevrolet'>
                    <span class="logo-brand">
                        <img src='assets/chevrolet-logo.webp' alt="Chevrolet"/>
                    </span>
                    <span class="name-brand">Chevrolet</span>
                </a>
            </div>

            <div class="block-brand">
                <a href='newcars/catalog.php?brand=Ford'>
                    <span class="logo-brand">
                        <img src='assets/ford-logo.webp' alt="Ford"/>
                    </span>
                    <span class="name-brand">Ford</span>
                </a>
            </div>

            <div class="block-brand">
                <a href='newcars/catalog.php?brand=Kia'>
                    <span class="logo-brand">
                        <img src='assets/kia-logo.webp' alt="Kia"/>
                    </span>
                    <span class="name-brand">Kia</span>
                </a>
            </div>

            <div class="block-brand">
                <a href='newcars/catalog.php?brand=Lamborghini'>
                    <span class="logo-brand">
                        <img src='assets/lamborghini-logo.webp' alt="Lamborghini"/>
                    </span>
                    <span class="name-brand">Lamborghini</span>
                </a>
            </div>

            <div class="block-brand">
                <a href='newcars/catalog.php?brand=Mercedes-Benz'>
                    <span class="logo-brand">
                        <img src='assets/mercedes-benz-logo.webp' alt="Mercedes-Benz"/>
                    </span>
                    <span class="name-brand">Mercedes-Benz</span>
                </a>
            </div>

            <div class="block-brand">
                <a href='newcars/catalog.php?brand=Nissan'>
                    <span class="logo-brand">
                        <img src='assets/nissan-logo.webp' alt="Nissan"/>
                    </span>
                    <span class="name-brand">Nissan</span>
                </a>
            </div>

            <div class="block-brand">
                <a href='newcars/catalog.php?brand=Porsche'>
                    <span class="logo-brand">
                        <img src='assets/porsche-logo.webp' alt="Porsche"/>
                    </span>
                    <span class="name-brand">Porsche</span>
                </a>
            </div>

            <div class="block-brand">
                <a href='newcars/catalog.php?brand=Tesla'>
                    <span class="logo-brand">
                        <img src='assets/tesla-logo.webp' alt="Tesla"/>
                    </span>
                    <span class="name-brand">Tesla</span>
                </a>
            </div>

            <div class="block-brand">
                <a href='newcars/catalog.php?brand=Toyota'>
                    <span class="logo-brand">
                        <img src='assets/toyota-logo.webp' alt="Toyota"/>
                    </span>
                    <span class="name-brand">Toyota</span>
                </a>
            </div>

            <div class="block-brand">
                <a href='newcars/catalog.php?brand=Volvo'>
                    <span class="logo-brand">
                        <img src='assets/volvo-logo.svg' alt="Volvo"/>
                    </span>
                    <span class="name-brand">Volvo</span>
                </a>
            </div>
          
        </div>
    </section>

<div class="container">
        <div class="car-slides">
            <div class="numbertext">1 / 6</div>
            <img class="car-gif" src="https://i.gifer.com/1Kd7.gif">
        </div>

        <div class="car-slides">
            <div class="numbertext">2 / 6</div>

            <img class="car-gif" src="https://media4.giphy.com/media/dwF9nuAzpOGJZcaxLl/giphy.gif">

        </div>

        <div class="car-slides">
            <div class="numbertext">3 / 6</div>
            
            <img class="car-gif" src="https://media1.giphy.com/media/WTd1sQAk9i4GlXdRoi/giphy.gif">
        </div>

        <div class="car-slides">
            <div class="numbertext">4 / 6</div>

            <img class="car-gif" src="https://c.tenor.com/OVvlsLJeM-oAAAAd/dubai-night.gif">
        </div>

        <div class="car-slides">
            <div class="numbertext">5 / 6</div>
            
            <img class="car-gif" src="https://i.makeagif.com/media/2-22-2015/Nz5F79.gif">
        </div>

        <div class="car-slides">
            <div class="numbertext">6 / 6</div>
            <img class="car-gif" src="https://thumbs.gfycat.com/UnhealthyPeacefulApisdorsatalaboriosa-size_restricted.gif">
 
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

        <div class="caption-container">
            <p id="caption"></p>
        </div>

        <div class="row">
            <div class="column">
                <img class="demo cursor" src="https://i.pinimg.com/originals/cd/48/38/cd483869c3df9521a39e9bd134ab6a9d.jpg?q=65" style="width:100%;height:125px" onclick="currentSlide(1)" alt="Tesla Model X P90D 2016">
            </div>
            <div class="column">
                <img class="demo cursor" src="https://f7432d8eadcf865aa9d9-9c672a3a4ecaaacdf2fee3b3e6fd2716.ssl.cf3.rackcdn.com/C2299/U7083/IMG_22526-large.jpg" style="width:100%;height:125px" onclick="currentSlide(2)" alt="Porsche Cayenne 2021">
            </div>
            <div class="column">
                <img class="demo cursor" src="https://i.ytimg.com/vi/3emaldhNwvw/maxresdefault.jpg" style="width:100%;height:125px" onclick="currentSlide(3)" alt="Kia Sorento 2021">
            </div>
            <div class="column">
                <img class="demo cursor" src="https://i.ytimg.com/vi/oL-fHltu9ro/maxresdefault.jpg" style="width:100%;height:125px" onclick="currentSlide(4)" alt="Lamborghini Urus 2019">
            </div>
            <div class="column">
                <img class="demo cursor" src="https://i.ytimg.com/vi/z2adoVl9FqQ/maxresdefault.jpg" style="width:100%;height:125px" onclick="currentSlide(5)" alt="Toyota Mirai 2019">
            </div>
            <div class="column">
                <img class="demo cursor" src="https://images.drive.com.au/driveau/image/upload/c_fill,f_auto,g_auto,h_674,q_auto:eco,w_1200/v1/cms/uploads/RX0wBjrPTPCUWny3Ghrf" style="width:100%;height:125px" onclick="currentSlide(6)" alt="Ford Mondeo 2015">
            </div>
        </div>
    </div>
    
    <script src="home_script.js"></script>
</body>
</html>