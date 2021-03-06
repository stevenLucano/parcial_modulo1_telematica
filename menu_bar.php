<?php

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/menu_bar.css">
    <link rel="shortcut icon" href="./SRC/icono.png">

</head>

<body>
    <div class="navigation has-background-white-bis">
        <div class="menuToggle"></div>
        <ul>
            <li class="list active" style="--clr:#d50000;">
                <a href="./index.php?page=0">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="text">Home</span>
                </a>
            </li>
            <li class="list" style="--clr:#f06292;">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="woman-outline"></ion-icon>
                    </span>
                    <span class="text">Mujer</span>
                </a>
            </li>
            <li class="list" style="--clr:#2196f3;">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="man-outline"></ion-icon>
                    </span>
                    <span class="text">Hombre</span>
                </a>
            </li>
            <li class="list" style="--clr:#f44336;">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="game-controller-outline"></ion-icon>
                    </span>
                    <span class="text">Infantil</span>
                </a>
            </li>
            <li class="list" style="--clr:#ff9800;">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="american-football-outline"></ion-icon>
                    </span>
                    <span class="text">Deportiva</span>
                </a>
            </li>
            <li class="list" style="--clr:#795548;">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="footsteps-outline"></ion-icon>
                    </span>
                    <span class="text">Calzado</span>
                </a>
            </li>
            <li class="list" style="--clr:#00c853;">
                <a href="./bolsos_maletines.php?page=6">
                    <span class="icon">
                        <ion-icon name="bag-handle-outline"></ion-icon>
                    </span>
                    <span class="text">Bolsos-Maletines</span>
                </a>
            </li>
            <li class="list" style="--clr:#00b8d4;">
                <a href="./carrito.php?page=7">
                    <span class="icon">
                        <ion-icon name="cart-outline"></ion-icon>
                    </span>
                    <span class="text">Carrito de compras</span>
                </a>
            </li>
            <li class="list" style="--clr:#651fff;">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="chatbubble-outline"></ion-icon>
                    </span>
                    <span class="text">Preguntas frecuentes</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- <script>
        const menuToggle = document.querySelector(".menuToggle");
        const navigation = document.querySelector(".navigation");
        const contenido = document.querySelector(".contenido");
        console.log(contenido);
        menuToggle.onclick = function() {
            navigation.classList.toggle("open");
            contenido.classList.toggle("open");
        }

        const list = document.querySelectorAll(".list");

        function activeLink() {
            list.forEach(item => item.classList.remove("active"));
            this.classList.add('active');
        }
        list.forEach(item => item.addEventListener('click', activeLink))
    </script> -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>