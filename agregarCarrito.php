<?php
//Se inicia la conexion con la base de datos
include_once 'conexion.php';
echo "Hola como estamos";


echo "<script>console.log('$id')</script>";
echo "<script>console.log('$desc')</script>";
echo "<script>console.log('$cant')</script>";


if ($_GET) {
    //Se obtienen los datos enviados por el metodo GET
    $id = $_GET['id'];
    $desc = $_GET['desc'];
    $cant = $_GET['cant'];

    //Se prepara la sentencia 
    $sql_agregar = 'INSERT INTO `lucano_compra_temporal`(`id_producto`, `descripcion`, `cantidad`) VALUES (?,?,?)';
    $sentencia_agregar = $pdo->prepare($sql_agregar);
    $sentencia_agregar->execute(array($id, $desc, $cant));

    //cerramos conexión de base de datos y sentencia
    $sentencia_agregar = null;
    $pdo = null;
    header('location:bolsos_maletines.php?page=6');
}
