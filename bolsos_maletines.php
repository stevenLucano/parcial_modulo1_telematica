<?php
//Se incluye el menu
include 'menu_bar.php';
//Se realiza la conexion con la base de datos
include_once 'conexion.php';

//Se llama a todos los articulos de la tabla lucano_bolsos
$sql = 'SELECT * FROM lucano_bolsos';
$sentencia = $pdo->prepare($sql);
$sentencia->execute();

//En la variable resultado se obtiene todos los articulos en forma de array
$resultado = $sentencia->fetchAll();

//Se determina la cantidad de articulos que iran por fila
$articulos_x_fila = 3;

//Se cuentan los articulos de la tabla para determinar el numero de filas necesarias
$total_articulos = $sentencia->rowCount();
$filas = $total_articulos / $articulos_x_fila;
//Se redondea al numero siguiente
$filas = ceil($filas);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/style.css">
    <title>Bolsos - maletines</title>
</head>

<body>
    <nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="#">
                <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item">
                    Home
                </a>

                <a class="navbar-item">
                    Documentation
                </a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        More
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item">
                            About
                        </a>
                        <a class="navbar-item">
                            Jobs
                        </a>
                        <a class="navbar-item">
                            Contact
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">
                            Report an issue
                        </a>
                    </div>
                </div>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-primary">
                            <strong>Sign up</strong>
                        </a>
                        <a class="button is-light">
                            Log in
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="section contenido">
        <div class="container">
            <?php for ($i = 0; $i < $filas; $i++) : ?>
                <div class="columns is-variable is-8">
                    <?php if ($i == $filas - 1) : ?>
                        <?php for ($j = 0; $j < $total_articulos % $articulos_x_fila; $j++) : ?>
                            <div class="column is-one-third">
                                <div class="card">
                                    <div class="card-image">
                                        <figure class="image is-4by3">
                                            <img src="<?php echo $resultado[$i * 3 + $j]['imagen'] ?>" alt="">
                                        </figure>
                                    </div>
                                    <div class="card-content">
                                        <div class="media">
                                            <div class="media-content">
                                                <p class="title is-4"><?php echo $resultado[$i * 3 + $j]['nombre'] ?></p>
                                                <p class="subtitle is-7">(<?php echo $resultado[$i * 3 + $j]['cantidad'] ?> disponibles)</p>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="has-text-justified">
                                                <?php echo $resultado[$i * 3 + $j]['descripcion'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="card-footer-item">Precio: <span class="ml-2">$<?php echo $resultado[$i * 3 + $j]['precio'] ?></span></div>
                                        <div class="card-footer-item is-flex is-align-items-center">
                                            <button class="button is-danger is-small">
                                                -
                                            </button>
                                            <span class="px-3 mx-1" style="border: 1px solid grey; height:100%; display:flex; align-items:center; justify-content:center">
                                                0
                                            </span>
                                            <button class="button is-primary is-small">
                                                +
                                            </button>
                                        </div>
                                        <div class="card-footer-item">
                                            <button class="button is-success is-small">
                                                <ion-icon name="cart-outline" class="mr-2"></ion-icon>Comprar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor ?>
                    <?php else : ?>
                        <?php for ($j = 0; $j < 3; $j++) : ?>
                            <div class="column is-one-third">
                                <div class="card">
                                    <div class="card-image">
                                        <figure class="image is-4by3">
                                            <img src="<?php echo $resultado[$i * 3 + $j]['imagen'] ?>" alt="">
                                        </figure>
                                    </div>
                                    <div class="card-content">
                                        <div class="media">
                                            <div class="media-content">
                                                <p class="title is-4"><?php echo $resultado[$i * 3 + $j]['nombre'] ?></p>
                                                <p class="subtitle is-7">(<?php echo $resultado[$i * 3 + $j]['cantidad'] ?> disponibles)</p>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="has-text-justified">
                                                <?php echo $resultado[$i * 3 + $j]['descripcion'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="card-footer-item">Precio: <span class="ml-2">$<?php echo $resultado[$i * 3 + $j]['precio'] ?></span></div>
                                        <div class="card-footer-item is-flex is-align-items-center">
                                            <button class="button is-danger is-small">
                                                -
                                            </button>
                                            <span class="px-3 mx-1" style="border: 1px solid grey; height:100%; display:flex; align-items:center; justify-content:center">
                                                0
                                            </span>
                                            <button class="button is-primary is-small">
                                                +
                                            </button>
                                        </div>
                                        <div class="card-footer-item">
                                            <button class="button is-success is-small">
                                                <ion-icon name="cart-outline" class="mr-2"></ion-icon>Comprar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor ?>
                    <?php endif ?>
                </div>
            <?php endfor ?>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // Get all "navbar-burger" elements
            const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

            // Check if there are any navbar burgers
            if ($navbarBurgers.length > 0) {

                // Add a click event on each of them
                $navbarBurgers.forEach(el => {
                    el.addEventListener('click', () => {

                        // Get the target from the "data-target" attribute
                        const target = el.dataset.target;
                        const $target = document.getElementById(target);

                        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                        el.classList.toggle('is-active');
                        $target.classList.toggle('is-active');

                    });
                });
            }

        });
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

        console.log("<?php echo $resultado[0]['nombre']; ?>");
        console.log("<?php echo $total_articulos % $articulos_x_fila; ?>");
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>