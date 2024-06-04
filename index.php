<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/index2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Mi galería de imágenes</title>
    <script>
        function showLoginMessage() {
            alert('Inicia sesión para obtener un plan');
        }
    </script>
    
     <script>
        function showLoginMessage2() {
            alert('Inicia sesión primero para poder subir imagenes');
        }
    </script>
</head>
<body>

<header>
    <div class="header-content">
        <div class="header-left">
            <img src="fondo/logo2.png" alt="Imagen de ejemplo">
        </div>
        <div class="header-right">
            <h1>Mi galería de imágenes</h1>
        </div>
    </div>
</header>
<br><br>
<div class="gallery">
    <h1>Galería de imágenes de nuestra comunidad</h1>

    <br><br>
    <div class="image-container">
        <?php
        $ruta_imagenes = "imagenes/"; 
        $imagenes = opendir($ruta_imagenes);
        $image_files = [];

        if ($imagenes) {
            while ($imagen = readdir($imagenes)) {
                if (is_file($ruta_imagenes . $imagen) && @getimagesize($ruta_imagenes . $imagen)) {
                    $image_files[] = $imagen;
                }
            }
            closedir($imagenes);
            shuffle($image_files); // Mezclar el array de nombres de archivos de imagen

            foreach ($image_files as $imagen) {
                echo "<a href='imagen_detalle.php?imagen=$imagen'><img src='$ruta_imagenes$imagen' class='small-image'></a>";
            }

            if (empty($image_files)) {
                echo "<p>No hay imágenes aún. Sube la primera.</p>";
            }
        } else {
            echo "Error: No se pudo abrir la carpeta de imágenes";
        }
        ?>
    </div>
</div>

<nav class="barra">
    <h2>Opciones de usuario<img src="fondo/icono.png" alt="Icono de menú"></h2>
    <ul>
<li><a href="login.php">Iniciar sesión</a></li>
<li><a href="registrate.php">Registrarse</a></li>
<li><a href="#" onclick="showLoginMessage2()">Subir imagen</a></li>

        
    
    </ul>
</nav>

<div class="plans">
    <h2>Nuestros Planes</h2>
    <div class="plan-container">
        <div class="plan basic">
            <h3>Basico</h3>
            <p>Límite diario: 5</p>
            <p>Límite máximo (MB): 2</p>
            <p>Precio: $0.00</p>
            <button onclick="showLoginMessage()">Obtener plan</button>
        </div>
        <div class="plan premium">
            <h3>Premium</h3>
            <p>Límite diario: 10</p>
            <p>Límite máximo (MB): 5</p>
            <p>Precio: $13.99</p>
            <button onclick="showLoginMessage()">Obtener plan</button>
        </div>
        <div class="plan vip">
            <h3>VIP</h3>
            <p>Límite diario: 15</p>
            <p>Límite máximo (MB): 15</p>
            <p>Precio: $30.99</p>
            <button onclick="showLoginMessage()">Obtener plan</button>
        </div>
    </div>
</div>

<div class="about-us">
    <h2>Sobre Nosotros</h2>
    <p>Bienvenido a Mi Galería de Imágenes, tu destino para compartir y disfrutar de imágenes asombrosas. Nos dedicamos a crear una comunidad donde todos puedan compartir su creatividad y explorar la de otros. Únete a nosotros hoy y empieza a subir tus imágenes.</p>
</div>

<br><br>
<div class="social-networks">
    <h2>Estas son nuestras redes sociales</h2>
    <a href="https://www.facebook.com/The-Gold-Ball-104223512329698" class="facebook"><i class="fab fa-facebook-f"></i></a>
    <a href="https://twitter.com/JosueJoshuar" class="twitter"><i class="fab fa-twitter"></i></a>
    <a href="https://www.google.com/intl/es-419/gmail/about/" class="correo"><i class="fas fa-envelope"></i></a>
    <a href="https://www.instagram.com/joshua_baut/" class="instagram"><i class="fab fa-instagram"></i></a>
</div>

</body>
</html>



</body>
</html>
