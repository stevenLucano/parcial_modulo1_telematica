<?php
//Se incluye el menu
include_once 'menu_bar.php';
//Se inclute el nav_bar
include_once 'nav_bar.php';
//Se realiza la conexion con la base de datos
include_once 'conexion.php';

//Se llama a todos los articulos de la tabla lucano_bolsos
$sql = 'SELECT * FROM lucano_bolsos';
$sentencia = $pdo->prepare($sql);
$sentencia->execute();

//En la variable resultado se obtiene todos los articulos en forma de array
$resultado = $sentencia->fetchAll();

//
?>
<!DOCTYPE html>
<html style="background-color: #283593;">

<head>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="./CSS/button_animated.css">
    <title>Lucano's Shop</title>

</head>

<body>
    <div class="section contenido">
        <div class="container">
            <p class="title is-1 has-text-centered has-text-white">¡Bienvenido a <b>Lucano's Shop</b>!</p>
            <p class="is-size-4 has-text-centered has-text-white mb-4">Elija la opción que desees visitar:</p>
            <div class="contenido-menu">
                <div class="columns">
                    <div class="column">
                        <a class="button_ani" href="#" style="--clr:#f06292;--i:0;">
                            <span class="icon is-large">
                                <ion-icon name="woman-outline"></ion-icon>
                            </span>
                            <span class="has-text-weight-semibold ml-2">Mujer</span>
                        </a>
                    </div>
                    <div class="column">
                        <a class="button_ani" href="#" style="--clr:#2196f3;--i:0;">
                            <span class="icon is-large">
                                <ion-icon name="man-outline"></ion-icon>
                            </span>
                            <span class="has-text-weight-semibold ml-2">Hombre</span>
                        </a>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <a class="button_ani" href="#" style="--clr:#f44336;--i:0;">
                            <span class="icon is-large">
                                <ion-icon name="game-controller-outline"></ion-icon>
                            </span>
                            <span class="has-text-weight-semibold ml-2">Infantil</span>
                        </a>
                    </div>
                    <div class="column">
                        <a class="button_ani" href="#" style="--clr:#ff9800;--i:0;">
                            <span class="icon is-large">
                                <ion-icon name="american-football-outline"></ion-icon>
                            </span>
                            <span class="has-text-weight-semibold ml-2">Deportiva</span>
                        </a>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <a class="button_ani" href="#" style="--clr:#795548;--i:0;">
                            <span class="icon is-large">
                                <ion-icon name="footsteps-outline"></ion-icon>
                            </span>
                            <span class="has-text-weight-semibold ml-2">Calzado</span>
                        </a>
                    </div>
                    <div class="column">
                        <a class="button_ani" href="./bolsos_maletines.php?page=6" style="--clr:#00c853;--i:0;">
                            <span class="icon is-medium">
                                <ion-icon name="bag-handle-outline"></ion-icon>
                            </span>
                            <span class="has-text-weight-semibold ml-2">Bolsos-Maletines</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>




    <script>
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
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>