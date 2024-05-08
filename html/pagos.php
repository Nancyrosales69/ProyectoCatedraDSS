<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/128/1581/1581594.png" type="image/x-icon">

    <title>Pagos</title>
    <link rel="stylesheet" href="../css/usuario.css">
    <link rel="stylesheet" href="../css/formUsu.css">
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
                        <li><a href="tienda.php">Tienda</a></li>
                        <li><a></a></li>
                        <li><a href="citasAdmin.php">Cita</a></li>
                        <li><a></a></li>

                        <li><a href="agreMedico.php">Medicos</a></li>
                    </ul>

                </div>
                <button class="btn-1" onclick="window.location.href='login.html'">Cerrar Sesión</button>
            </nav><img src="https://i.pinimg.com/originals/5a/57/73/5a57732cab294276459f6280682c311b.gif"
                alt="Pequeña imagen" class="img-corner"></p>
        </div>
    </header>
    <div class="main-content">
        <h1>Agregar recibo</h1>
        <form id="citaForm" action="aggPago.php" method="post">
            <label for="nombre">Id del cliente:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>
            <select name="local" id="local">
                <option value="1">Sede Principal</option>
                <option value="2">Sede secundaria</option>
            </select>
            <label for="tipo_pago">Tipo de Pago:</label>
            <select id="tipo_pago" name="tipo_pago" required>
                <option value="cita">Cita</option>
                <option value="comida">Comida</option>
                <option value="accesorios">Accesorios</option>
                <option value="medicamentos">Medicamentos</option>
            </select><br><br>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" min="0.01" step="0.01" required><br><br>
            <button class="cancel-button2">Crear</button>
        </form>
        <h4>_ _ _ _ _ _ _ _ _ </h4>
        <h1>Recibos</h1>

        <ul class="cita-list">
            <?php
            $conn = new mysqli("localhost", "root", "", "cat_dog");

            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            $sql = "SELECT recibo.*, usuarios.nombre AS nombre_cliente
            FROM recibo
            JOIN usuarios ON recibo.id_cliente = usuarios.id;
            ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li class='cita-item'>";
                    echo "<h3>Cliente: " . $row["nombre_cliente"] . "</h3>";
                    echo "<p>Local: " . $row["local"] . "</p>";
                    echo "<p>Tipo de pago: " . $row["tipo"] . "</p>";
                    echo "<p>Precio: " . $row["precio"] . "</p>";
                    echo "</li>";
                }
            } else {
                echo "<h1>No se encontraron Recibos.</h1>";
            }
            $conn->close();
            ?>
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
                    <li>Bryan</li><img
                        src="https://i.pinimg.com/originals/76/d9/5f/76d95f447566b27efa91eea6fa87a42c.gif"
                        alt="Pequeña imagen" class="img-corner"></p>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>