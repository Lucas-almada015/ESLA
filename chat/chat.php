<?php
    include "db.php";
    $consulta ="SELECT * FROM chat ORDER BY id ASC ";
    $ejecutar = $conexion -> query ($consulta);
    while ($fila= $ejecutar -> fetch_array()):
?>

            <div id="datos-chat">
                <span style="color: deepskyblue;"><?php echo $fila['nombre'];?> : </span>
                <span style="color: gray;"><?php echo $fila ['mensaje'];?></span>
                <span style="float: right;"><?php echo formatearfecha ($fila['fecha']);?></span>
            </div>
<?php endwhile ?>