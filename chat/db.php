<?php
$servidor="localhost";
$usuario="root";
$password="ESLA123";
$basededatos="esla";

$conexion= new mysqli ($servidor,$usuario,$password,$basededatos);

function formatearfecha( $fecha){
    return date ('g:i a', strtotime( $fecha));
}

?>
