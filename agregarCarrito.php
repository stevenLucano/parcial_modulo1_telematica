<?php
//Se inicia la conexion con la base de datos
include_once 'conexion.php';
echo "Hola como estamos";

if ($_GET) {
    //Se obtienen los datos enviados por el metodo GET
    $id = $_GET['id'];
    $desc = $_GET['desc'];
    $cant = $_GET['cant'];
    $precio = $_GET['precio'];

    //Revisar si existe el registro
    $sql_detectar = 'SELECT `id_producto`, `descripcion`, `cantidad` FROM `lucano_compra_temporal` WHERE id_producto=?';
    $sentencia_detectar = $pdo->prepare($sql_detectar);
    $sentencia_detectar->execute(array($id));
    $resultado_deteccion = $sentencia_detectar->fetchAll();

    if (count($resultado_deteccion)) {
        //Se prepara la sentencia para editar un registro existente
        $cant = $cant + $resultado_deteccion[0]['cantidad'];
        $precio = $precio * $cant;
        $sql_editar = 'UPDATE lucano_compra_temporal SET cantidad=?,precio=? WHERE id_producto=?';
        $sentencia_editar = $pdo->prepare($sql_editar);
        $sentencia_editar->execute(array($cant, $precio, $id));

        //Cerramos la sentencia
        $sentencia_editar = null;
    } else {
        //Se prepara la sentencia para insertar nuevo registro
        $precio = $precio * $cant;
        $sql_agregar = 'INSERT INTO `lucano_compra_temporal`(`id_producto`, `descripcion`, `cantidad`, `precio`) VALUES (?,?,?,?)';
        $sentencia_agregar = $pdo->prepare($sql_agregar);
        $sentencia_agregar->execute(array($id, $desc, $cant, $precio));

        //Cerramos la sentencia
        $sentencia_agregar = null;
    }
    //Cerramos la conexión a la base de datos y redirigimos a bolsos_maletines.php
    $pdo = null;
    header('location:bolsos_maletines.php?page=6');
}
