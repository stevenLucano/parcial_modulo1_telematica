<?php
//Se inicia la conexion con la base de datos
include_once 'conexion.php';

//Se obtiene el id enviado por GET
$id = $_GET['id'];
echo '<script>console.log(' . $id . ')</script>';

//Se prepara la sentencia para eliminar todos los registros de la tabla temporal
$sql_eliminar_art = 'DELETE FROM `lucano_compra_temporal` WHERE id_producto=?';
$sentencia_eliminar_art = $pdo->prepare($sql_eliminar_art);
$sentencia_eliminar_art->execute(array($id));

//Cerramos conexión de base de datos y sentencia
$sentencia_eliminar_art = null;
$pdo = null;
header('location:carrito.php?page=7');
