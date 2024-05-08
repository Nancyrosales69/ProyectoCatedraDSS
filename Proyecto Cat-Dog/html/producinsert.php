<?php
$con = mysqli_connect("localhost", "root", "", "cat_dog");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
$nombre = $_POST['nombreProducto'];
$imagen = $_POST['imagen'];
$precio = $_POST['precio'];

$stm = $con->prepare("INSERT INTO `productos`(`url_producto`, `nombre`, `precio` ) VALUES(?,?,?)");
$stm->bind_param('ssd', $imagen, $nombre, $precio);
$stm->execute();
header("Location: tienda.php");

