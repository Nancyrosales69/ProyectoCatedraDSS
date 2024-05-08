<?php
$con = mysqli_connect("localhost", "root", "", "cat_dog");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
$nombre = $_POST['medico'];
$user = $_POST['user'];
$password = $_POST['password'];
$correo = $_POST['email'];
$local= $_POST['local'];
$id_rol = 3;


$stm = $con->prepare("INSERT INTO `usuarios`(`nombre`, `usuario`, `password`, `correo`, `id_rol`, `id_local`) VALUES(?,?,?,?,?,?)");
$stm->bind_param('ssssii', $nombre, $user, $password, $correo, $id_rol, $local,);
$stm->execute();
header("Location: agreMedico.php");