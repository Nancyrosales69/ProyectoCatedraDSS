<?php
// Verifica si se ha enviado un ID de producto en la URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Realiza la conexión a la base de datos
    $conn = new mysqli("localhost", "root", "", "cat_dog");

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta SQL para obtener la información del producto
    $sql = "SELECT * FROM productos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Rellena los campos del formulario con la información del producto
        $nombreProducto = $row["nombre"];
        $imagenProducto = $row["url_producto"];
        $precioProducto = $row["precio"];
    } else {
        echo "No se encontró el producto.";
    }
    $conn->close();
} else {
    echo "ID de producto no proporcionado en la URL.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/128/1581/1581594.png" type="image/x-icon">

    <title>Modificar producto</title>
    <link rel="stylesheet" href="../css/usuario.css">
    <link rel="stylesheet" href="../css/formUsu.css">
</head>
<body>
<header>

<div class="main-content">
    <a href="tienda.php" class="cancel-button3">Tienda</a>

    <h1>Modificar producto </h1>
    <form id="citaForm" action="modificarProducto.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="nombreProducto">Nombre del Producto:</label>
        <input type="text" id="nombreProducto" name="nombreProducto" value="<?php echo $nombreProducto; ?>" required><br><br>
        <label for="imagen">Imagen del producto:</label>
        <input type="url" id="imagen" name="imagen" value="<?php echo $imagenProducto; ?>" required><br><br>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" min="0.01" step="0.01" value="<?php echo $precioProducto; ?>" required><br><br>
        <input type="submit" class="cancel-button2" value="Modificar"></input>
    </form>
</div>
<div class="main-content"></div>
</ul>
</div>
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <p>&copy; 2024 Cat-Dog</p>
            <ul class="footer-links">
                <li>Nico</li>
                <li>Nancy</li>
                <li>Guillermo</li>
                <li>Bryan</li><img src="https://i.pinimg.com/originals/76/d9/5f/76d95f447566b27efa91eea6fa87a42c.gif" alt="Pequeña imagen" class="img-corner"></p>
            </ul>
        </div>
    </div>
</footer>
</body>
</html>