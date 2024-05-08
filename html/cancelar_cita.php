<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $conn = new mysqli("localhost", "root", "", "cat_dog");

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta para eliminar el producto
    $sql = "DELETE FROM citas WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Cita cancelada correctamente";
    } else {
        echo "Error al cancelar la cita: " . $conn->error;
    }

    $conn->close();
}
?>
