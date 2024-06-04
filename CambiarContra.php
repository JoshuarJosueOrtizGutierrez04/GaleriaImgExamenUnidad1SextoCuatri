<!DOCTYPE html>
<html lang="en">
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

       
        <form action="validar2.php" method="post">
            <input class="controls" type="text" name="usuario_anterior" id="usuario_anterior" for="usuario_anterior" placeholder="Usuario anterior">
            <input class="controls" type="text" name="email" id="email" for="email" placeholder="Nuevo Correo">
            <input class="controls" type="text" name="user" id="user" for="user" placeholder="Nuevo Usuario">
            <input class="controls" type="password" name="pass" id="pass" for="pass" placeholder="Nueva Contraseña">
           
            <br>
            <p><input type="checkbox" name="Politicas">Acepto las condiciones de esta página</p>
                
            <input class="botons" type="submit" value="Enviar" id="boton">
            <input class="botons" type="reset" value="Borrar" id="boton">
        </form>
    </section>
     

    <br><br><br><br>
</body>
</html>
