<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $servername = "localhost";
    $dbname = "cat_dog";
    $db_username = "root";
    $db_password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $db_username, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT u.usuario, u.password, r.descripcion AS rol
                                FROM usuarios u
                                INNER JOIN roles r ON u.id_rol = r.id
                                WHERE u.usuario = :username;
                                ");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $row = $stmt->fetch();

        if ($row && $password == $row['password']) {
            $_SESSION['username'] = $row['usuario'];
            $_SESSION['rol'] = $row['rol'];

            switch ($row['rol']) {
                case 'Medico':
                    header("Location: medico.html");
                    exit();
                case 'Administrador':
                    header("Location: admin.html");
                    exit();
                case 'Usuario':
                    header("Location: usuario.php");
                    exit();
                default:
                    header("Location: login.html");
                    exit();
            }
        } else {
            echo "Credenciales incorrectas. Por favor, inténtelo de nuevo.";
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
?>