<?php
//Se incluye el menu
include_once 'menu_bar.php';
//Se inclute el nav_bar
include_once 'nav_bar.php';
//Se realiza la conexion con la base de datos
include_once 'conexion.php';

//Se llama a todos los articulos de la tabla lucano_bolsos
$sql = 'SELECT * FROM lucano_compra_temporal order by id_producto';
$sentencia = $pdo->prepare($sql);
$sentencia->execute();

//En la variable resultado se obtiene todos los articulos en forma de array
$resultado = $sentencia->fetchAll();
$total = 0;

?>
<!DOCTYPE html>
<html style="background-color: #283593;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/style.css">
    <title>Carrito</title>
</head>

<body>
    <div class="section contenido ml-6">
        <div class="container">
            <p class="is-size-1 has-text-white has-text-centered mb-5">Carrito de compras</p>
            <?php if (count($resultado)) : ?>
                <table class="table table is-fullwidth is-striped" id="tabla-articulos">
                    <thead>
                        <tr>
                            <th class="has-text-centered">ID</th>
                            <th>Descripción</th>
                            <th class="has-text-centered">Cantidad</th>
                            <th class="has-text-centered">Precio por unidad</th>
                            <th class="has-text-centered">Precio total</th>
                            <th class="has-text-centered">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultado as $articulo) :
                            $total = $total + $articulo['precio'];
                        ?>
                            <tr>
                                <td class="has-text-centered" id="<?php echo $articulo['id_producto'] ?>">
                                    <?php echo $articulo['id_producto'] ?>
                                </td>
                                <td><?php echo $articulo['descripcion'] ?></td>
                                <td class="has-text-centered"><?php echo $articulo['cantidad'] ?></td>
                                <td class="has-text-centered">$<?php echo $articulo['precio'] / $articulo['cantidad'] ?></td>
                                <td class="has-text-centered">$<?php echo $articulo['precio'] ?></td>
                                <td class="has-text-centered">
                                    <button class="button is-danger is-small" id="el1-<?php echo $articulo['id_producto'] < 10 ? "0" . $articulo['id_producto'] : $articulo['id_producto'] ?>">
                                        <span id="el2-<?php echo $articulo['id_producto'] < 10 ? "0" . $articulo['id_producto'] : $articulo['id_producto'] ?>">
                                            <ion-icon name="close-outline" id="el3-<?php echo $articulo['id_producto'] < 10 ? "0" . $articulo['id_producto'] : $articulo['id_producto'] ?>"></ion-icon>
                                        </span>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        <tr>
                            <td colspan="3"></td>
                            <th class="has-text-centered">Total:</th>
                            <th class="has-text-centered">$<?php echo $total ?></th>
                        </tr>
                    </tbody>
                </table>
                <div class="level-right">
                    <a href="./vaciar_carrito.php" class="button is-danger is-rounded">Vaciar Carrito</a>
                </div>
            <?php else : ?>
                <article class="message is-info">
                    <div class="message-header">
                        <p class="is-size-3">Carrito vacío</p>
                    </div>
                    <div class="message-body">
                        <p class="is-size-5">No ha agregado ningún articulo a su carrito de compras.</p>
                        <p class="is-size-5">Empiece a comprar ingresando <a href="./index.php?page=0"><b>Aquí</b></a>.</p>
                    </div>
                </article>
            <?php endif ?>
        </div>
    </div>

    <script src="./JS/carrito.js"></script>
    <script>
        list.forEach(item => item.classList.remove("active"));
        list[<?php echo $_GET['page']; ?>].classList.add('active');
    </script>
</body>

</html>