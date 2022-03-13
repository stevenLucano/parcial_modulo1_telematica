<?php
//Se incluye el menu
include_once 'menu_bar.php';
//Se realiza la conexion con la base de datos
include_once 'conexion.php';

//Se llama a todos los articulos de la tabla lucano_bolsos
$sql = 'SELECT * FROM lucano_compra_temporal';
$sentencia = $pdo->prepare($sql);
$sentencia->execute();

//En la variable resultado se obtiene todos los articulos en forma de array
$resultado = $sentencia->fetchAll();

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
    <title>Carrito</title>
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

    <div class="section contenido ml-6">
        <div class="container">
            <p class="is-size-1">Carrito de compras</p>
            <table class="table table is-fullwidth is-striped">
                <thead>
                    <tr>
                        <th>ID del producto</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultado as $articulo) : ?>
                        <tr>
                            <td><?php echo $articulo['id_producto'] ?></td>
                            <td><?php echo $articulo['descripcion'] ?></td>
                            <td><?php echo $articulo['cantidad'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="./JS/carrito.js"></script>
    <script>
        list.forEach(item => item.classList.remove("active"));
        list[<?php echo $_GET['page']; ?>].classList.add('active');
    </script>
</body>

</html>