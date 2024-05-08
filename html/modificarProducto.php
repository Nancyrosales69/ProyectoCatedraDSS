<?php
$con = mysqli_connect("localhost", "root", "", "cat_dog");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}

$id = $_POST['id'];
$nombreProducto = $_POST['nombreProducto'];
$imagen = $_POST['imagen'];
$precio = $_POST['precio'];

$stm = $con->prepare("UPDATE `productos` SET `url_producto` = ?, `nombre` = ?, `precio` = ? WHERE id = ?");
$stm->bind_param('ssdi', $imagen, $nombreProducto, $precio, $id);
$result = $stm->execute();

if ($result) {
    header("Location: tienda.php");
} else {
    echo "Error al actualizar el producto: " . $stm->error;
}

$stm->close();
$con->close();
