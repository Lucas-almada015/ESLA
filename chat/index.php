<?php
include "db.php";

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
    <title>CHAT ESLA</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
        function AJAX() {
            var req = new XMLHttpRequest();
             
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                    document.getElementById("chat").innerHTML = req.responseText;
                }
            }
            req.open("GET", "chat.php", true);
            req.send();
        }
        setInterval(function() {
            AJAX();
        }, 1000);
    </script>
</head>
<body ONLOAD='AJAX();'>
    <h1 style="color: white">ESLA</h1>
    <div id="contenedor">
        <div id="caja-chat">
            <div id="chat"></div>
        </div>
        <form method="post" action="index.php">
            <input type="text" name="nombre" placeholder="ingresa tu nombre">
            <textarea name="mensaje" placeholder="ingresa tu mensaje" ></textarea>
            <input type="submit" name="Enviar" value="Enviar">
            <a href="/ESLA/tablon-de-anuncio/index.php">home</a>
        </form>
        <?php
        
        if (isset($_POST['Enviar'])) {
            $nombre = $_POST['nombre'];
            $mensaje = $_POST ['mensaje'];
        

        $consulta ="INSERT INTO chat (nombre , mensaje) VALUES ('$nombre' , '$mensaje') ";
        $ejecutar = $conexion -> query ($consulta);

        if ($ejecutar) {
            echo "<embed loop='false' src='playSound()' hidden='true' autoplay='true'>";
        }

    }
        
        ?>
    </div>
</body>
</html>