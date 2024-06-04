<?php
session_start();

// Conectar a la base de datos
$servername = "localhost";
$username = "id22240670_galeria";
$password = "!1234abcD";
$dbname = "id22240670_galeria";

$conexion = new mysqli($servername, $username, $password, $dbname);
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

// Obtener el plan actual del usuario
$usuario = $_SESSION["usuario"];
$sql = "SELECT plan_actual FROM usuarios WHERE nombre_usuario='$usuario'";
$result = $conexion->query($sql);
$planActual = "Básico";
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $planActual = $row["plan_actual"];
}

// Procesar la selección de un nuevo plan fase beta
$planSeleccionado = isset($_POST['plan']) ? $_POST['plan'] : null;
$metodoPago = isset($_POST['metodo_pago']) ? $_POST['metodo_pago'] : null;
$mensajeCompra = "";

if ($planSeleccionado && $metodoPago) {
    // Actualiza el plan de los usuario en la base de datos
    $sql = "UPDATE usuarios SET plan_actual='$planSeleccionado' WHERE nombre_usuario='$usuario'";
    if ($conexion->query($sql) === TRUE) {
        // Insertar el registro de la compra en la tabla de compras
        $sql = "INSERT INTO compras (nombre_usuario, plan, metodo_pago, fecha_compra) VALUES ('$usuario', '$planSeleccionado', '$metodoPago', NOW())";
        if ($conexion->query($sql) === TRUE) {
            $mensajeCompra = "Gracias por su compra. Ha seleccionado el plan $planSeleccionado y pagado con $metodoPago.";
            echo "<script>
                    alert('Tu pago fue exitoso');
                    window.location.href = 'inicio.php';
                  </script>";
        } else {
            $mensajeCompra = "Error: " . $sql . "<br>" . $conexion->error;
        }
    } else {
        $mensajeCompra = "Error: " . $sql . "<br>" . $conexion->error;
    }
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/inicio.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Bienvenido a tu galería de imágenes, <?php echo isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : "Invitado"; ?></title>
    <script>
        function validateForm() {
            const plans = document.getElementsByName('plan');
            let planSelected = false;

            for (const plan of plans) {
                if (plan.checked) {
                    planSelected = true;
                    break;
                }
            }

            if (!planSelected) {
                alert('Por favor, seleccione un plan.');
                return false;
            }

            return true;
        }
    </script>
</head>
<body>

<header>
    <div class="header-content">
        <div class="header-left">
            <img src="fondo/logo2.png" alt="Imagen de ejemplo">
        </div>
        <div class="header-right">
            <h1>Bienvenido a los paquetes de la galeria /<?php echo isset($_SESSION["usuario"]) ? $_SESSION["usuario"]: "Invitado"; ?></h1>
        </div>
    </div>
</header>
<br><br>

<nav class="barra">
    <h2>Opciones de usuario<img src="fondo/icono.png" alt="Icono de menú"></h2>
    <ul>
    <a href="usuario.php" class="button">Usuario</a>
    <a href="upload.php" class="button">Subir imagen</a>
    <a href="cerrar_sesion.php" class="button">Cerrar sesión</a>
    </ul>
</nav>

<div class="plans">
    <h2>Nuestros Planes</h2>
    <form method="POST" action="" onsubmit="return validateForm()">
        <div class="plan-container">
            <div class="plan basic">
                <h3>Basico</h3>
                <p>Límite diario: 5</p>
                <p>Límite máximo (MB): 2</p>
                <p>Precio: $0.00</p>
                <input type="radio" name="plan" value="Basico" <?php echo ($planActual == 'Basico') ? 'checked' : ''; ?>>
            </div>
            <div class="plan premium">
                <h3>Premium</h3>
                <p>Límite diario: 10</p>
                <p>Límite máximo (MB): 5</p>
                <p>Precio: $9.99</p>
                <input type="radio" name="plan" value="Premium" <?php echo ($planActual == 'Premium') ? 'checked' : ''; ?>>
            </div>
            <div class="plan vip">
                <h3>VIP</h3>
                <p>Límite diario: 15</p>
                <p>Límite máximo (MB): 15</p>
                <p>Precio: $19.99</p>
                <input type="radio" name="plan" value="VIP" <?php echo ($planActual == 'VIP') ? 'checked' : ''; ?>>
            </div>
        </div>

        <h2>Seleccione el método de pago</h2>
        <select name="metodo_pago">
            <option value="Tarjeta de Crédito o Débito">Tarjeta de Crédito o Débito</option>
            <option value="PayPal">PayPal</option>
            <option value="Compañía de Teléfono">Compañía de Teléfono</option>
        </select>

        <br><br>
        <button type="submit">Pagar</button>
    </form>
    <?php if ($mensajeCompra): ?>
        <p><?php echo $mensajeCompra; ?></p>
    <?php endif; ?>
</div>

<div class="about-us">
    <h2>Sobre Nosotros</h2>
    <p>Bienvenido a tu Galería de Imágenes, <?php echo isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : "Invitado"; ?>. Tu destino para compartir y disfrutar de imágenes asombrosas. Nos dedicamos a crear una comunidad donde todos puedan compartir su creatividad y explorar la de otros. Únete a nosotros hoy y empieza a subir tus imágenes.</p>
</div>

<br><br>
<div class="social-networks">
    <h2>Estas son nuestras redes sociales</h2>
    <a href="https://www.facebook.com/The-Gold-Ball-104223512329698" class="facebook"><i class="fab fa-facebook-f"></i></a>
    <a href="https://twitter.com/JosueJoshuar" class="twitter"><i class="fab fa-twitter"></i></a>
    <a href="https://www.google.com/intl/es-419/gmail/about/" class="correo"><i class="fas fa-envelope"></i></a>
    <a href="https://www.instagram.com/joshua_baut/" class="instagram"><i class="fab fa-instagram"></i></a>
</div>

</body>
</html>
