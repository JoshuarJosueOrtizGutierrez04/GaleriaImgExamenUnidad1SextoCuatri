<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Imagen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .details {
            margin-bottom: 20px;
        }
        .details p {
            margin: 0;
            padding: 5px 0;
            font-size: 18px;
        }
        .back-btn {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        .back-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        include 'conexion.php';

        $imagen = isset($_GET['imagen']) ? htmlspecialchars($_GET['imagen']) : '';

        if (!empty($imagen)) {
            
            // Incrementar el contador de vistas en la base de datos
            $stmt = $conexion->prepare("UPDATE imagenes SET vistas = vistas + 1 WHERE nombre = ?");
            $stmt->bind_param("s", $imagen);
            $stmt->execute();

            // Obtener el número de vistas actualizado y otros detalles
            $stmt = $conexion->prepare("SELECT vistas, fecha_subida, descripcion, subido_por FROM imagenes WHERE nombre = ?");
            $stmt->bind_param("s", $imagen);
            $stmt->execute();
            $stmt->bind_result($vistas, $fecha_subida, $descripcion, $subido_por);
            $stmt->fetch();
            $stmt->close();

            $ruta_imagen = 'imagenes/' . $imagen;
            if (file_exists($ruta_imagen)) {
                echo "<img src='$ruta_imagen' alt='Imagen'>";
                echo "<div class='details'>";
                echo "<p><strong>Descripción:</strong> $descripcion</p>";
                echo "<p><strong>Fecha de subida:</strong> $fecha_subida</p>";
                echo "<p><strong>Vistas:</strong> $vistas</p>";
                echo "<p><strong>Subido por:</strong> <a href='imagenes_usuario.php?usuario=$subido_por'>$subido_por</a></p>";
                echo "</div>";

                echo "<a href='javascript:history.go(-1)' class='back-btn'>Volver</a>";
            } else {
                echo "La imagen no existe.";
            }
        } else {
            echo "No se ha proporcionado ninguna imagen.";
        }
        ?>
    </div>
</body>
</html>
