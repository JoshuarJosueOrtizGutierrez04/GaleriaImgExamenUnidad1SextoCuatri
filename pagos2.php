<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "id22240670_galeria";
$password = "!1234abcD";
$dbname = "id22240670_galeria";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$usuario = $_SESSION["usuario"];
$sql = $conn->prepare("SELECT plan, metodo_pago, fecha_compra FROM compras WHERE nombre_usuario = ? ORDER BY fecha_compra DESC");
$sql->bind_param("s", $usuario);
$sql->execute();
$result = $sql->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Pagos - Teamshots</title>
    <link rel="stylesheet" href="CSS/pagos2.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <img src="fondo/logo2.png" alt="Teamshots Logo">
            </div>
            <nav>
                <ul>
                    <li><a href="inicio.php">Inicio</a></li>
                    <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
                </ul>
            </nav>
        </aside>
        <main class="content">
            <header class="header">
                <h1>Historial de Pagos</h1>
            </header>
            <section class="payments">
                <table>
                    <thead>
                        <tr>
                            <th>Plan</th>
                            <th>Método de Pago</th>
                            <th>Fecha de Compra</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row["plan"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["metodo_pago"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["fecha_compra"]) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No hay registros de compras.</td></tr>";
                        }
                        $sql->close();
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
