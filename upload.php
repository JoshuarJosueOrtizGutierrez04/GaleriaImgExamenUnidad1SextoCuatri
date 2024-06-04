<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Act.css">
    <title>Subir Imágenes</title>
</head>
<body>
    <div class="Archivos">
        <h1>Subir Imágenes</h1>
        <form action="subir_archivos.php" enctype="multipart/form-data" method="post">
            
            <div class="letra">
            <label for="title">Título de la imagen:</label>
            <input type="text" name="title" id="title" required>
            <br><br>
            <label for="description">Descripción de la imagen:</label>
            </div>
            <textarea name="description" id="description" rows="4" required></textarea>
            <input type="file" name="img" id="img" required>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>