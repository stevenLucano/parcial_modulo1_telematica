<?php
//Se inicia la conexion con la base de datos
include_once 'conexion.php';
echo "Hola como estamos";

//Se prepara la sentencia para eliminar todos los registros de la tabla temporal
$sql_eliminar = 'DELETE FROM `lucano_compra_temporal`';
$sentencia_eliminar = $pdo->prepare($sql_eliminar);
$sentencia_eliminar->execute();

//Cerramos conexión de base de datos y sentencia
$sentencia_eliminar = null;
$pdo = null;
header('location:carrito.php?page=7');

// if ($_GET) {
//     //Se obtienen los datos enviados por el metodo GET
//     $id = $_GET['id'];
//     $desc = $_GET['desc'];
//     $cant = $_GET['cant'];

//     //Se prepara la sentencia 
//     $sql_agregar = 'INSERT INTO `lucano_compra_temporal`(`id_producto`, `descripcion`, `cantidad`) VALUES (?,?,?)';
//     $sentencia_agregar = $pdo->prepare($sql_agregar);
//     $sentencia_agregar->execute(array($id, $desc, $cant));

//     //cerramos conexión de base de datos y sentencia
//     $sentencia_agregar = null;
//     $pdo = null;
//     header('location:bolsos_maletines.php?page=6');
// }
