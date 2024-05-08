<?php
$con = mysqli_connect("localhost", "root", "", "cat_dog");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$local = $_POST['local'];
$id_usuario = $_POST['id_user'];
$descripcion = $_POST['razon'];

$stm = $con->prepare("INSERT INTO `citas`(`descripcion`, `fecha`, `hora`, `id_local`, `id_usuario`)  VALUES(?,?,?,?,?)");
$stm->bind_param('sssss', $descripcion, $fecha, $hora, $local, $id_usuario,);
$stm->execute();
header("Location: citasAdmin.php");

