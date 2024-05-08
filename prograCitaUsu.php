<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cat_dog";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$nombre_mascota = $_POST['mascota'];
$sql = "INSERT INTO citas (descripcion, fecha, hora, ) VALUES ('$razon', '$fecha', '$hora', )";

if ($conn->query($sql) === TRUE) {
    echo "Cita programada correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>