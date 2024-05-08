<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/128/1581/1581594.png" type="image/x-icon">

    <title>Citas</title>
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
                        <ul>
                            <li><a href="admin.html">Inicio</a></li>
                            <li><a></a></li>
                            <li><a href="tienda.php">Tienda</a></li>
                            <li><a></a></li>
                            <li><a href="agreMedico.php">Medicos</a></li>
                            <li><a href="pagos.html">Pagos</a></li>
                        </ul>
                    </ul>
                </div>
                <button class="btn-1" onclick="window.location.href=''">Cerrar Sesión</button>
            </nav><img src="https://i.pinimg.com/originals/5a/57/73/5a57732cab294276459f6280682c311b.gif"
                alt="Pequeña imagen" class="img-corner"></p>
        </div>
    </header>

    <div class="main-content">
        <h1>Programar cita médica</h1>
        <form id="citaForm" action="aggCita.php" method="post">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required><br><br>
            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" required><br><br>
            <label for="local">Seleccione un local:</label>
            <select name="local" id="local">
                <option value="1">Sede Principal</option>
                <option value="2">Sede secundaria</option>
            </select>
            <label for="id_user">Su id:</label>
            <input type="text" id="mascota" name="id_user" required><br><br>
            <label for="razon">Razón de la cita:</label><br>
            <textarea id="razon" name="razon" rows="4" cols="50" required></textarea><br><br>
            <input type="submit" class="cancel-button2" value="Programar Cita">
        </form>
        <h4>_ _ _ _ _ _ _ _ _ </h4>
        <h1>Lista de citas programadas</h1>

        <ul class="cita-list">
            <?php
            $conn = new mysqli("localhost", "root", "", "cat_dog");

            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            $sql = "SELECT citas.id, citas.descripcion, citas.fecha, citas.hora, sede.ubicacion AS local, usuarios.nombre AS usuario
                FROM citas
                INNER JOIN sede ON citas.id_local = sede.id
                INNER JOIN usuarios ON citas.id_usuario = usuarios.id;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li class='cita-item'>";
                    echo "<h3>Fecha: " . $row["fecha"] . "</h3>";
                    echo "<p>Hora: " . $row["hora"] . "</p>";
                    echo "<p>Local: " . $row["local"] . "</p>";
                    echo "<p>Usuario: " . $row["usuario"] . "</p>";
                    echo "<p>Razon de la cita: " . $row["descripcion"] . "</p>";
                    echo "<button class='boton' onclick='cancelarCita(" . $row["id"] . ")'>Eliminar</button>";
                    echo "</a>";
                    echo "</li>";
                }
            } else {
                echo "No se encontraron productos.";
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


<script>
    function cancelarCita(id) {
        if (confirm("¿Estás seguro de que deseas cancelar esta cita?")) {
            // Envía una solicitud AJAX al servidor para eliminar el producto
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // Si se elimina correctamente, recarga la página para actualizar la lista de productos
                    window.location.reload();
                }
            };
            xhttp.open("POST", "cancelar_cita.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("id=" + id);
        }
    }
</script>

</html>