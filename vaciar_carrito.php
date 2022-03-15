<?php
//Se inicia la conexion con la base de datos
include_once 'conexion.php';

//Se prepara la sentencia para eliminar todos los registros de la tabla temporal
$sql_eliminar = 'DELETE FROM `lucano_compra_temporal`';
$sentencia_eliminar = $pdo->prepare($sql_eliminar);
$sentencia_eliminar->execute();

//Cerramos conexión de base de datos y sentencia
$sentencia_eliminar = null;
$pdo = null;
header('location:carrito.php?page=7');
