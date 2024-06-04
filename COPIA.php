<?php
session_start();
if(isset($_SESSION["usuario"])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Act.css">

    <title>subir archivos al servidor</title>
</head>
<body>
    <center>
    <h1>subir archivos</h1>

    <form action="subir_archivos.php" enctype="multipart/form-data" method="post">

        <input type="file" name="archivo" id="">
        <input type="submit" value="Enviar">
    </form>
</center>
</body>
</html>

<?php
} else {
    header("Location: login.php");
}
?>