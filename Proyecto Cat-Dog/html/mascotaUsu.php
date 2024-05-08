<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis mascotas</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/128/1581/1581594.png" type="image/x-icon">

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
                        <li><a href="usuario.html">Tienda</a></li>
                        <li><a href="usuario.html">Tienda</a></li>
                        <li><a href="prograCitaUsu.html">Programar Cita</a></li>
                        <li><a href="verCitaUsu.html">Citas</a></li>
                    </ul>
                </div>
                <button class="btn-1" onclick="window.location.href=''">Cerrar Sesión</button>
            </nav><img src="https://i.pinimg.com/originals/5a/57/73/5a57732cab294276459f6280682c311b.gif" alt="Pequeña imagen" class="img-corner"></p>
            </nav>
        </div>
    </header>
 
    <div class="main-content"></div>
    <h1>Programar cita médica</h1>
    <form id="citaForm" action="aggMascota.php" method="post">
        <label for="local">Su id:</label>
        <input type="number" id="nombre" name="nombre" required><br><br>
        <label for="local">Nombre de la mascota:</label>
        <input type="text" id="mascota" name="mascota" required><br><br>
        <label for="peso">Peso:</label>
        <input type="number" id="peso" name="peso" step="0.1" min="0.1" required><br><br>
        <label for="especie">Especie:</label> 
        <select id="especie" name="especie" required>
            <option value="">Seleccionar especie</option>
            <option value="Perro">Perro</option>
            <option value="Gato">Gato</option>
            <option value="Ave">Ave</option>
            <option value="Roedor">Roedor</option>
            <option value="Reptil">Reptil</option>
            <option value="Otro">Otro</option>
        </select><br><br>
        <button class="cancel-button2">Registrar</button>
    </form>
    <h4>_ _ _ _ _ _ _ _ _ </h4>
    <h1>Mis mascotas</h1>
    
    <ul class="cita-list2">
    <?php
                $conn = new mysqli("localhost", "root", "", "cat_dog");

                if ($conn->connect_error) {
                    die("Error de conexión: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM mascotas";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li  class='cita-item'>";
                        echo "<h3>Nombre: " . $row["nombre"] . "</h3>";
                        echo "<p>Peso: " . $row["peso"] . "lb</p>";
                        echo "<p>Especie: " . $row["especie"] . "lb</p>";
                        echo "</li>";
                    }
                } else {
                    echo "No se encontraron productos.";
                }
                $conn->close();
                ?>
    </ul>
</div>
<div class="gif-container">
    <img src="https://i.pinimg.com/originals/4c/15/78/4c1578f8d10a9829bac84d00800388d3.gif" alt="GIF">
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