<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/128/1581/1581594.png" type="image/x-icon">

    <title>Medicos </title>
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
                <button class="btn-1" onclick="window.location.href='login.html'">Cerrar Sesión</button>
            </nav><img src="https://i.pinimg.com/originals/5a/57/73/5a57732cab294276459f6280682c311b.gif"
                alt="Pequeña imagen" class="img-corner"></p>
        </div>
    </header>

    <div class="main-content">
        <h1>Registrar medicos</h1>
        <form id="citaForm" action="aggMedicos.php" method="post">
            <label for="mascota">Nombre:</label>
            <input type="text" id="medico" name="medico" required><br><br>
            <label for="user">Usuario:</label>
            <input type="text" id="user" name="user" required><br><br>
            <select name="local" id="local">
                <option value="1">Sede Principal</option>
                <option value="2">Sede secundaria</option>
            </select>
            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit" class="cancel-button2">Registrar</button>
        </form>
        <h4>_ _ _ _ _ _ _ _ _ </h4>
        <h1>Medicos</h1>

        <ul class="cita-list">
            <?php
            $conn = new mysqli("localhost", "root", "", "cat_dog");

            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            $sql = "SELECT usuarios.id, usuarios.nombre, usuarios.correo, usuarios.password, sede.ubicacion AS nombre_sede
                            FROM usuarios
                            LEFT JOIN sede ON usuarios.id_local = sede.id
                            WHERE usuarios.id_rol = 3;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li class='cita-item'>";
                    echo "<p>Medico: " . $row["nombre"] . "</p>";
                    echo "<p>local: " . $row["nombre_sede"] . "</p>";
                    echo "<p>correo: " . $row["correo"] . "</p>";
                    echo "<p>Contraseña: " . $row["password"] . "</p>";
                    echo "</li>";
                }
            } else {
                echo "No se encontraron Medicos.";
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