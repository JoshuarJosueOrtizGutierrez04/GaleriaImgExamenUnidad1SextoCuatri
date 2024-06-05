<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-UA-compatible" content="ie=edge">
    
    <link rel="stylesheet" href="CSS/Formularioestilo.css">

    <title>Cambiar Contraseña</title>
    <link rel="shortcut icon" type="image/x-icon" href="imagenes/balon.jpg"> 
</head>
<body>
    <section class="form-register">
        <center>
            <h4>CAMBIAR DATOS</h4>
        </center>
       
        <form action="Validar2.php" method="post">
            <input class="controls" type="text" name="email_actual" id="email_actual" placeholder="Correo actual">
            <input class="controls" type="text" name="nuevo_usuario" id="nuevo_usuario" placeholder="Nuevo Usuario">
            <input class="controls" type="password" name="nueva_contraseña" id="nueva_contraseña" placeholder="Nueva Contraseña">
           
            <br>
            <p><input type="checkbox" name="Politicas"> Acepto las condiciones de esta página</p>
                
            <input class="botons" type="submit" value="Enviar" id="boton">
            <input class="botons" type="reset" value="Borrar" id="boton">
        </form>
    </section>
</body>
</html>
