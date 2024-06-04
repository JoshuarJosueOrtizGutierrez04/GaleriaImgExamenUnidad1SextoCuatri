<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/login.css">
    <title>Iniciar sesión</title>
   
</head>
<body>
    <div class="container">
        <h1>Registrar</h1>
        <form action="validar_login.php" method="post">
            <label for="user">Ingrese usuario</label>
            <input type="text" name="user" id="user" required>
            <label for="user">Ingrese Email</label>
            <input type="text" name="email" id="email" required>
            <label for="pass">Ingrese Contraseña</label>
            <input type="password" name="pass" id="pass" required>
            <input type="submit" value="Enviar">
            <br><br>
            <center>
                <a href="index.php">Volver al inicio</a>
                </center>

    
            
        </form>
    </div>
    
</body>

</html>

