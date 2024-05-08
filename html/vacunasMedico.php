<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/128/1581/1581594.png" type="image/x-icon">

    <title>Vacunas</title>
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
                        <li><a ></a></li>
                        <li><a href="expediMedico.php">Crear expediente</a></li>
                        <li><a href="verExpedi.php">Ver expedientes</a></li>
                    </ul>
                </div>
                <button class="btn-1" onclick="window.location.href=''">Cerrar Sesión</button>
            </nav><img src="https://i.pinimg.com/originals/5a/57/73/5a57732cab294276459f6280682c311b.gif" alt="Pequeña imagen" class="img-corner"></p>
            </nav>
        </div>
    </header>
    <div class="main-content">
        <h1>Añadir Vacuna</h1>
        <form id="citaForm" action="aggVacuna.php" method="post">
            <label for="vacuna">Nombre de la vacuna:</label>
            <input type="text" id="vacuna" name="vacuna" required><br><br>
            <button class="cancel-button2">Agregar Vacuna</button>
        </form>
    </div>
    <div class="main-content"></div>
    <ul class="cita-list2">
        <li class="cita-item">
            <h1>Listado de las vacunas</h1>
            <?php
        $conn = new mysqli("localhost", "root", "", "cat_dog");

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM `vacunas`;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>Nombre de la vacuna: " . $row["nombre"] . "</p>";
            }
        } else {
            echo "No se encontraron Vacunas.";
        }
        $conn->close();
        ?>
        </li>
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