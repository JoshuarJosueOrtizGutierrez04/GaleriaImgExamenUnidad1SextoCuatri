<?php
session_start();

$planUsuario = "Basico";
if ($planUsuario == "Basico") {
    $limiteImagenes = 5;
} elseif ($planUsuario == "Premium") {
    $limiteImagenes = 10;
} elseif ($planUsuario == "VIP") {
    $limiteImagenes = 20;
}


if (isset($_FILES['img'])) {
    
    // Incrementar lo contado de las  imágenes subidas
    if (!isset($_SESSION['imagenes_subidas'])) {
        $_SESSION['imagenes_subidas'] = 1;
    } else {
        $_SESSION['imagenes_subidas']++;
    }

    
    if ($_SESSION['imagenes_subidas'] > $limiteImagenes) {
        $mensajeLimite = "Has alcanzado el límite de imágenes para hoy. Podrás subir más imágenes mañana.";
        
        // Calcular el tiempo 
        $tiempoRestante = strtotime('tomorrow') - time();
        $horasRestantes = floor($tiempoRestante / 3600);
        $minutosRestantes = floor(($tiempoRestante % 3600) / 60);
        $segundosRestantes = $tiempoRestante % 60;
        $tiempoRestanteFormateado = sprintf("%02d:%02d:%02d", $horasRestantes, $minutosRestantes, $segundosRestantes);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="CSS/usuario.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <img src="fondo/logo2.png" alt="Teamshots Logo">
            </div>
            <nav>
                <ul>
                    <li><a href="CambiarContra.php">Datos personales</a></li>
                    <li><a href="pagos2.php">Pagos</a></li>
                    <li><a href="pagos.php">Plan</a></li>
                    <li><a href="inicio.php">Inicio</a></li>
                    <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
                </ul>
            </nav>
        </aside>
        <main class="content">
            <header class="header">
                <h1>Plan actual: <?php echo $planUsuario; ?></h1>
            </header>
            <section class="stats">
                <div class="stat">
                    <h2>Imágenes restantes hoy</h2>
                    <p><?php echo isset($_SESSION['imagenes_subidas']) ? $limiteImagenes - $_SESSION['imagenes_subidas'] : $limiteImagenes; ?></p>
                </div>
                <div class="stat">
                    <h2>Tiempo para próxima subida</h2>
                    <p><?php echo isset($tiempoRestanteFormateado) ? $tiempoRestanteFormateado : "24:00:00"; ?></p>
                </div>
            </section>
            <section class="uploads">
                <h2>Tus imágenes subidas</h2>
                <!-- Aquí se mostrarán las imágenes subidas -->
                
                <?php
                // Si hay un mensaje de límite, mostrarlo
                //fase beta todavia
                if (isset($mensajeLimite)) {
                    echo "<p>$mensajeLimite</p>";
                }
                ?>
            </section>
        </main>
    </div>
</body>
</html>
