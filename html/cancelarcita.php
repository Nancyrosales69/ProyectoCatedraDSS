<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cat_dog";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

if(isset($_GET['id'])) {
    $id_cita = $_GET['id'];

    $sql = "DELETE FROM citas WHERE id = $id_cita";

    if ($conn->query($sql) === TRUE) {
        header("Location: prograCitaUsu.html");
        exit(); 
    } else {
        echo "Error al intentar cancelar la cita: " . $conn->error;
    }
} else {
    echo "No se proporcionó un ID de cita válido.";
}

$conn->close();
?>