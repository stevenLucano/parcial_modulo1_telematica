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

//Se determina la cantidad de articulos que iran por fila
$articulos_x_fila = 3;

//Se cuentan los articulos de la tabla para determinar el numero de filas necesarias
$total_articulos = $sentencia->rowCount();
$filas = $total_articulos / $articulos_x_fila;
//Se redondea al numero siguiente
$filas = ceil($filas);
?>

<!DOCTYPE html>
<html style="background-color: #283593;">

<head>
    <meta charset=" UTF-8">
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
    <div class="section contenido">
        <div class="container">
            <p class="title is-1 has-text-centered has-text-white">Bolsos - Maletines</p>
            <p class="is-size-4 has-text-centered has-text-white">Elige el articulo que desees comprar y añadelo al carrito de compras</p>
            <?php for ($i = 0; $i < $filas; $i++) : ?>
                <div class="columns is-variable is-8 mt-4" style="background-color: rgb(228, 231, 250); border-radius: 3px">
                    <?php if ($i == $filas - 1 && ($total_articulos % $articulos_x_fila) != 0) : ?>
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
                                                <p class="title is-4" id="desc-<?php echo $i * 3 + $j < 10 ? "0" . $i * 3 + $j : $i * 3 + $j ?>">
                                                    <?php echo $resultado[$i * 3 + $j]['nombre'] ?>
                                                </p>
                                                <p class="subtitle is-7">(<?php echo $resultado[$i * 3 + $j]['cantidad'] ?> disponibles)</p>
                                            </div>
                                            <div class="media-right">
                                                <p class="subtitle is-4">ID:
                                                    <span id="id-<?php echo $i * 3 + $j < 10 ? "0" . $i * 3 + $j : $i * 3 + $j ?>">
                                                        <?php echo $resultado[$i * 3 + $j]['id_producto'] ?>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="has-text-justified contenedor-texto">
                                                <?php echo $resultado[$i * 3 + $j]['descripcion'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="card-footer-item">Precio:
                                            <span class="ml-2 is-flex">
                                                $<span id="price-<?php echo $i * 3 + $j < 10 ? "0" . $i * 3 + $j : $i * 3 + $j ?>">
                                                    <?php echo $resultado[$i * 3 + $j]['precio'] ?>
                                                </span>
                                            </span>
                                        </div>
                                        <div class="card-footer-item is-flex is-align-items-center">
                                            <button class="button is-danger is-small" id="btnM-<?php echo $i * 3 + $j < 10 ? "0" . $i * 3 + $j : $i * 3 + $j ?>">
                                                -
                                            </button>
                                            <span id="sp-<?php echo $i * 3 + $j < 10 ? "0" . $i * 3 + $j : $i * 3 + $j ?>" class="px-3 mx-1" style="border: 1px solid grey; height:100%; display:flex; align-items:center; justify-content:center">
                                                0
                                            </span>
                                            <button class="button is-primary is-small" id="btnS-<?php echo $i * 3 + $j < 10 ? "0" . $i * 3 + $j : $i * 3 + $j ?>">
                                                +
                                            </button>
                                        </div>
                                        <div class="card-footer-item">
                                            <button class="button is-success is-small" id="btnSh-<?php echo $i * 3 + $j < 10 ? "0" . $i * 3 + $j : $i * 3 + $j ?>">
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
                                                <p class="title is-4" id="desc-<?php echo $i * 3 + $j < 10 ? "0" . $i * 3 + $j : $i * 3 + $j ?>">
                                                    <?php echo $resultado[$i * 3 + $j]['nombre'] ?>
                                                </p>
                                                <p class="subtitle is-7">(<?php echo $resultado[$i * 3 + $j]['cantidad'] ?> disponibles)</p>
                                            </div>
                                            <div class="media-right">
                                                <p class="subtitle is-4">ID:
                                                    <span id="id-<?php echo $i * 3 + $j < 10 ? "0" . $i * 3 + $j : $i * 3 + $j ?>">
                                                        <?php echo $resultado[$i * 3 + $j]['id_producto'] ?>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="has-text-justified contenedor-texto">
                                                <?php echo $resultado[$i * 3 + $j]['descripcion'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="card-footer-item">Precio:
                                            <span class="ml-2 is-flex">
                                                $<span id="price-<?php echo $i * 3 + $j < 10 ? "0" . $i * 3 + $j : $i * 3 + $j ?>">
                                                    <?php echo $resultado[$i * 3 + $j]['precio'] ?>
                                                </span>
                                            </span>
                                        </div>
                                        <div class="card-footer-item is-flex is-align-items-center">
                                            <button class="button is-danger is-small" id="btnM-<?php echo $i * 3 + $j < 10 ? "0" . $i * 3 + $j : $i * 3 + $j ?>">
                                                -
                                            </button>
                                            <span id="sp-<?php echo $i * 3 + $j < 10 ? "0" . $i * 3 + $j : $i * 3 + $j ?>" class="px-3 mx-1" style="border: 1px solid grey; height:100%; display:flex; align-items:center; justify-content:center">
                                                0
                                            </span>
                                            <button class="button is-primary is-small" id="btnS-<?php echo $i * 3 + $j < 10 ? "0" . $i * 3 + $j : $i * 3 + $j ?>">
                                                +
                                            </button>
                                        </div>
                                        <div class="card-footer-item">
                                            <button class="button is-success is-small" id="btnSh-<?php echo $i * 3 + $j < 10 ? "0" . $i * 3 + $j : $i * 3 + $j ?>">
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

    <div class="modal" id="advertencia">
        <div class="modal-background"></div>
        <div class="modal-content">
            <article class="message is-danger">
                <div class="message-header">
                    <p class="is-size-3">No se puede agregar al carrito</p>
                    <button class="delete" aria-label="delete"></button>
                </div>
                <div class="message-body is-size-5">
                    Debe añadir productos con el boton (+) para poder agregar productos al carrito.
                </div>
            </article>
        </div>
    </div>

    <script src="./JS/bolsos_maletines.js"></script>
    <script>
        list.forEach(item => item.classList.remove("active"));
        list[<?php echo $_GET['page']; ?>].classList.add('active');
    </script>
</body>

</html>