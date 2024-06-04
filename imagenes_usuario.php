<?php
session_start();
include 'conexion.php';

// Obtener el nombre de usuario de la URL
$nombre_usuario = isset($_GET['usuario']) ? htmlspecialchars($_GET['usuario']) : '';

// Comprobar si se ha proporcionado un nombre de usuario
if (empty($nombre_usuario)) {
    echo "No se ha proporcionado ningún usuario.";
    exit;
}

// Consultar la base de datos para obtener las imágenes subidas por el usuario
$stmt = $conexion->prepare("SELECT nombre, descripcion, fecha_subida, vistas FROM imagenes WHERE subido_por = ?");
$stmt->bind_param("s", $nombre_usuario);
$stmt->execute();
$stmt->bind_result($nombre_imagen, $descripcion, $fecha_subida, $vistas);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Index.css">
    <title>Imágenes de <?php echo $nombre_usuario; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }
        .gallery img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .gallery .imagen {
            flex: 1 1 200px;
            background-color: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <h1>Galeria imagenes de <?php echo $nombre_usuario; ?></h1>
    <div class="gallery">
        <?php
        $hay_imagenes = false;
        while ($stmt->fetch()) {
            $ruta_imagen = 'imagenes/' . $nombre_imagen;
            if (file_exists($ruta_imagen)) {
                echo "<div class='imagen'>";
                echo "<a href='imagen_detalle.php?imagen=$nombre_imagen'><img src='$ruta_imagen' alt='Imagen'></a>";
                echo "<p><strong>Descripción:</strong> $descripcion</p>";
                echo "<p><strong>Fecha de subida:</strong> $fecha_subida</p>";
                echo "<p><strong>Vistas:</strong> $vistas</p>";
                 // Botón para volver
                echo "<a href='javascript:history.go(-1)' class='back-btn'>Volver</a>";
                echo "</div>";
                $hay_imagenes = true;
            }
        }
        $stmt->close();
        $conexion->close();

        if (!$hay_imagenes) {
            echo "<p>No hay imágenes aún. Sube la primera.</p>";
        }
        ?>
    </div>
</body>
</html>
