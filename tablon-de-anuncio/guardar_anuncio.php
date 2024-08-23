<?php
include "basededatos.php";

// Obtener los datos del formulario
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$autor = $_POST['autor'];


// Insertar el nuevo anuncio en la base de datos
$query = "INSERT INTO anuncios (titulo, contenido,autor) VALUES ('$titulo', '$contenido','$autor')";
mysqli_query($conexion, $query);

// Redirigir a la página principal del tablón de anuncios
header('Location: index.php');
// Obtener los anuncios de la base de datos
$query = "SELECT * FROM anuncios";
$resultado = mysqli_query($conexion, $query);

// Crear un array para almacenar los anuncios
$anuncios = array();

// Recorrer los resultados y agregarlos al array
while ($anuncio = mysqli_fetch_assoc($resultado)) {
    $anuncios[] = $anuncio;
}

// Devolver los anuncios en formato JSON
header('Content-Type: application/json');
echo json_encode($anuncios);
?>