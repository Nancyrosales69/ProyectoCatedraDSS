<?php
$con = mysqli_connect("localhost", "root", "", "cat_dog");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
$nombre = $_POST['nombre'];
$mascota = $_POST['mascota'];
$peso = $_POST['peso'];
$especie = $_POST['especie'];

$stm = $con->prepare("INSERT INTO `mascotas`(`nombre`, `peso`, `id_usuario`, `especie`) VALUES(?,?,?,?)");
$stm->bind_param('ssss', $mascota, $peso, $nombre, $especie);
$stm->execute();
header("Location: mascotaUsu.php");