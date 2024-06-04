<?php
session_start();
include 'conexion.php'; // mi otra conexion

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $imagen_id = $_POST['imagen_id'];
    $comentario = $_POST['comentario'];
    $usuario = $_SESSION['usuario'];
    $fecha = date('Y-m-d');

    $sql = "INSERT INTO comentarios (imagen_id, usuario, comentario, fecha) VALUES ('$imagen_id', '$usuario', '$comentario', '$fecha')";
    if (mysqli_query($conexion, $sql)) {
        echo "Comentario agregado correctamente.";
    } else {
        echo "Error al agregar el comentario: " . mysqli_error($conexion);
    }

    header("Location: imagen_detalle.php?imagen=$imagen_id");
    exit();
}
?>
