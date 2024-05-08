<?php
$conn = new mysqli("localhost", "root", "", "cat_dog");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
$id = $_POST["b"];
$sql = "SELECT u.nombre AS nombre_usuario,
        m.nombre AS nombre_mascota,
        m.especie,
        m.peso,
        med.nombre AS nombre_medico,
        s.ubicacion AS nombre_local,
        me.nombre AS nombre_medicamento,
        v.nombre AS nombre_vacuna
        FROM expediente e
        JOIN usuarios u ON e.id_usuario = u.id
        JOIN mascotas m ON e.id_mascota = m.id
        JOIN usuarios med ON e.id_medico = med.id
        JOIN sede s ON e.id_local = s.id
        LEFT JOIN medicamentos me ON e.id_medicamentos = me.id
        LEFT JOIN vacunas v ON e.id_vacunas = v.id
        WHERE e.id = $id;
            ";
$result = $conn->query($sql);

$conn->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/128/1581/1581594.png" type="image/x-icon">

    <title>Ver expedientes</title>
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
                        <li><a href="medico.html">Inicio</a></li>
                        <li><a></a></li>
                        <li><a href="expediMedico.php">Crear expediente</a></li>
                        <li><a></a></li>
                        <li><a href="vacunasMedico.html">Vacunas</a></li>
                    </ul>
                </div>
                <button class="btn-1" onclick="window.location.href=''">Cerrar Sesión</button>
            </nav><img src="https://i.pinimg.com/originals/5a/57/73/5a57732cab294276459f6280682c311b.gif"
                alt="Pequeña imagen" class="img-corner"></p>
            </nav>
        </div>
    </header>
    <div class="main-content">
        <a href="verExpedi.php" class="cancel-button3">Volver</a>
        <h1>Expediente</h1>
        <ul class="cita-list">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li class='cita-item'>";
                    echo "<h3>Dueño: " . $row["nombre_usuario"] . "</h3>";
                    echo "<p>Mascota: " . $row["nombre_mascota"] . "</p>";
                    echo "<p>Especie: " . $row["especie"] . "</p>";
                    echo "<p>peso: " . $row["peso"] . "lb</p>";
                    echo "<p>Medico: " . $row["nombre_medico"] . "</p>";
                    echo "<p>Local: " . $row["nombre_local"] . "</p>";
                    echo "<p>Medicamentos: " . $row["nombre_medicamento"] . "</p>";
                    echo "<p>Vacunas: " . $row["nombre_vacuna"] . "</p>";
                    echo "</li>";
                }
            } else {
                echo "No se encontraron Medicos.";
            }
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