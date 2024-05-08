<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/128/1581/1581594.png" type="image/x-icon">

    <title>CatDog</title>
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
                        <li><a href="prograCitaUsu.php">Programar Cita</a></li>
                        <li><a href="expediUsu.php">Expediente</a></li>
                        <li><a href="verCitaUsu.php">Citas</a></li>
                        <li><a href="mascotaUsu.php">Mascotas</a></li>
                    </ul>
                </div>
                <button class="btn-1" onclick="window.location.href=''">Cerrar Sesión</button>
                <div class="container-icon">
                    <div class="container-cart-icon">
                        <img src="https://e7.pngegg.com/pngimages/833/426/png-clipart-black-shopping-cart-icon-for-free-black-shopping-cart.png" alt="carrito" class="icon-cart" />
                        <div class="count-products">
                            <span id="contador-productos">0</span>
                        </div>
                    </div>
                    <div class="container-cart-products hidden-cart">
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main>
    
        <section class="productos">
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
                    <li>Bryan</li><img src="https://i.pinimg.com/originals/76/d9/5f/76d95f447566b27efa91eea6fa87a42c.gif" alt="Pequeña imagen" class="img-corner"></p>
                </ul>
            </div>
        </div>
    </footer>
    

</body>
</html>
