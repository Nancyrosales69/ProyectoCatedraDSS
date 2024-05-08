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
$local = $_POST['local'];
$razon = $_POST['razon'];

$sql = "INSERT INTO citas (fecha, hora, descripcion) VALUES ('$fecha', '$hora', '$razon')";

if ($conn->query($sql) === TRUE) {
    $id_nueva_cita = $conn->insert_id;

    $sql_nueva_cita = "SELECT fecha, hora, descripcion FROM citas WHERE id = $id_nueva_cita";
    $result = $conn->query($sql_nueva_cita);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fecha = $row["fecha"];
        $hora = $row["hora"];
        $razon = $row["descripcion"];
        
        echo "<li class='cita-item'>
                <h3>Fecha: $fecha</h3>
                <p>Hora: $hora</p>
                <p>Local: $local</p>
                <p>Razón de la cita: $razon</p>
                <button class='cancel-button' onclick=\"window.location.href='cancelarcita.php?id=$id_nueva_cita'\">Cancelar cita</button>
              </li>";
    } else {
        echo "No se encontraron citas.";
    }
} else {
    echo "Error al insertar la cita: " . $conn->error;
}

$conn->close();
?>

