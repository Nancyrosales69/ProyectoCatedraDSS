<?php
$con = mysqli_connect("localhost", "root", "", "cat_dog");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
$vacuna = $_POST['vacuna'];

$stm = $con->prepare("INSERT INTO `vacunas`(`nombre`) VALUES(?)");
$stm->bind_param('s', $vacuna);
$stm->execute();
header("Location: vacunasMedico.php");

