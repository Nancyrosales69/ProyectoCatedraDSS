<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/128/1581/1581594.png" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="../css/usuario.css">
</head>

<body>
    <header>
        <div class="menu container">
            <img class="logo-1" src="https://i.pinimg.com/564x/d2/f7/75/d2f7756393d214d95adb3dd227fec1d6.jpg" alt="">
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="img/menu.png" class="menu-icono" alt="">
            </label>
            <nav class="navbar">
                <div class="menu-1">
                    <ul>

                        <li><a href="admin.html">Inicio</a></li>
                        <li><a></a></li>
                        <li><a href="citasAdmin.php">Citas </a></li>
                        <li><a></a></li>
                        <li><a href="agreMedico.php">Medicos</a></li>
                        <li><a></a></li>

                        <li><a href="pagos.php">Pagos</a></li>
                    </ul>
                </div>
                <button class="btn-1" onclick="window.location.href=''">Cerrar Sesión</button>
            </nav><img src="https://i.pinimg.com/originals/5a/57/73/5a57732cab294276459f6280682c311b.gif"
                alt="Pequeña imagen" class="img-corner"></p>

            </nav>
        </div>
    </header>
    <main>

        <section class="productos">
            <a href="agreProduc.html" class="cancel-button3">Agregar producto</a>

            <ul>
                <?php
                $conn = new mysqli("localhost", "root", "", "cat_dog");

                if ($conn->connect_error) {
                    die("Error de conexión: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM productos";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>";
                        echo "<a href=''>";
                        echo "<img src='" . $row["url_producto"] . "' alt='" . $row["nombre"] . "'>";
                        echo "<h3>" . $row["nombre"] . "</h3>";
                        echo "<p>Precio: $" . $row["precio"] . "</p>";
                        echo "<a href='modifProduc.php?id=" . $row["id"] . "' class='boton2'>Modificar</a>";
                        echo "<button class='boton' onclick='eliminarProducto(" . $row["id"] . ")'>Eliminar</button>";
                        echo "</a>";
                        echo "</li>";
                    }
                } else {
                    echo "No se encontraron productos.";
                }
                $conn->close();
                ?>
            </ul>
        </section>
    </main>
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <p>&copy; 2024 Cat-Dog</p>
                <ul class="footer-links">
                    <li>Nico</li>
                    <li>Nancy</li>
                    <li>Guillermo</li>
                    <li>Bryan</li><img
                        src="https://i.pinimg.com/originals/76/d9/5f/76d95f447566b27efa91eea6fa87a42c.gif"
                        alt="Pequeña imagen" class="img-corner"></p>
                </ul>
            </div>
        </div>
    </footer>
</body>
<script>
    function eliminarProducto(id) {
        if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
            // Envía una solicitud AJAX al servidor para eliminar el producto
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // Si se elimina correctamente, recarga la página para actualizar la lista de productos
                    window.location.reload();
                }
            };
            xhttp.open("POST", "eliminar_producto.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("id=" + id);
        }
    }
</script>


</html>