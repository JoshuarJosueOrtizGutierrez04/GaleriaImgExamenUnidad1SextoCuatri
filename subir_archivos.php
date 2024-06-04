<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['title'];
    $descripcion = $_POST['description'];
    $nombre_imagen = uniqid() . "_" . basename($_FILES["img"]["name"]);
    $ruta_imagen = "imagenes/" . $nombre_imagen;
    $fecha_subida = date("Y-m-d");

    if (move_uploaded_file($_FILES["img"]["tmp_name"], $ruta_imagen)) {
        
        $nombre_usuario = $_SESSION["usuario"];

        $stmt = $conexion->prepare("INSERT INTO imagenes (nombre, descripcion, fecha_subida, vistas, subido_por) VALUES (?, ?, ?, 0, ?)");
        $stmt->bind_param("ssss", $nombre_imagen, $descripcion, $fecha_subida, $nombre_usuario);

        try {
            if ($stmt->execute()) {
                echo '<script>
                        function showLoginMessage3() {
                            alert("Imagen enviado con éxito");
                            window.location.replace("inicio.php"); // Redirigir al usuario al inicio
                        }
                        showLoginMessage3();
                      </script>';
                exit; 
            } else {
                throw new Exception("Error al ejecutar la consulta.");
            }
        } catch (Exception $e) {
            echo "Hubo un error al subir la imagen: " . $e->getMessage();
        }

        $stmt->close();
    } else {
        echo "Hubo un error al subir la imagen.";
    }
}
?>
