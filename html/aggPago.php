<?php
$con = mysqli_connect("localhost", "root", "", "cat_dog");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo_pago'];
$precio = $_POST['precio'];
$local= $_POST['local'];


$stm = $con->prepare("INSERT INTO `recibo`(`id_cliente`, `local`, `tipo`, `precio`) VALUES(?,?,?,?)");
$stm->bind_param('sssd', $nombre, $local, $tipo, $precio);
$stm->execute();
header("Location: pagos.php");