<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=tienda_lucano', "root", "root");
    echo '<script>console.log("Conectado")</script>';
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
