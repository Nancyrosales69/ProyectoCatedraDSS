<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $conn = new mysqli("localhost", "root", "", "cat_dog");

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta para eliminar el producto
    $sql = "DELETE FROM productos WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Producto eliminado correctamente";
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }

    $conn->close();
}
?>
