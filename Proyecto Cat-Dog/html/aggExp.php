<?php
$con = mysqli_connect("localhost", "root", "", "cat_dog");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
$nombre = $_POST['nombreDueño'];
$mascota = $_POST['nombreMascota'];
$medico = $_POST['medico'];
$local = $_POST['local'];
$medicamentos = $_POST['medicamentos'];
$cita = $_POST['cita'];
$vacunas = $_POST['vacunas'];

$stm = $con->prepare("INSERT INTO `expediente`(`id_usuario`, `id_mascota`, `id_medico`, `id_local`, `id_medicamentos`, `id_cita`, `id_vacunas`) VALUES (?,?,?,?,?,?,?)");
$stm->bind_param('iiiiiii', $nombre, $mascota, $medico, $local, $medicamentos, $cita, $vacunas);
$stm->execute();
header("Location: expediMedico.php");

