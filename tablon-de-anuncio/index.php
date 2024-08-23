<?php
include "basededatos.php";
session_start();
 if (!isset($_SESSION['usuario'])){
    echo '<script> 
    alert("por favor debe iniciar sesion ");
    window.location="/ESLA/login-register/index.php";
</script>';
session_destroy();
die();
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>tablos de anuncios</title>
</head>
<body >
<nav>
        <ul>
        <a href="/ESLA/chat/index.php">chat</a>
        <a href="/ESLA/login-register/cerrar_sesion.php">cerrar secion</a>
        </ul>
    </nav>
<h2 style="color: white" name="esla" id="esla">ESLA</h2>
<div id="contenedor">
    <h1 name="titulo">Tablón de Anuncios</h1>

    <h2>Nuevo Anuncio</h2>
    <form action="guardar_anuncio.php" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo">
        <label for="contenido">Contenido:</label>
        <textarea name="contenido" id="contenido"></textarea>
        <label for="autor">Autor:</label>
        <textarea name="autor" id="autor"></textarea>
        <input type="submit" value="Publicar" name="publicar">
      
    </form>

    <h2>Anuncios:</h2>
    <div id="contenedor">
    <div class="anuncios" id="anuncio">
        <?php
        // Obtener los anuncios de la base de datos
        $query = "SELECT * FROM anuncios";
        $resultado = mysqli_query($conexion, $query);

        // Mostrar los anuncios en la sección correspondiente del tablón
        while ($anuncio = mysqli_fetch_assoc($resultado)) {
            echo "<div class='anuncio' id='anuncio-" . $anuncio['id'] . "'>";
            echo "<h2>" . $anuncio['titulo'] . "</h2>";
            echo "<p>" . $anuncio['contenido'] . "</p>";
            echo "<h3>" . $anuncio['autor'] . "</h3>";
            echo "<h4>" . $anuncio['fecha'] . "</h4>";
            echo "</div>";
        }
        
        ?>
    </div>
    </div>  
</body>
</html>