<?php
session_start();

include 'db1.php';

 $correo= $_POST['correo'];
 $contrasena=$_POST['contrasena'];

 $validar_login= mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo = '$correo' and contrasena ='$contrasena' " ) ;
 
 if (mysqli_num_rows($validar_login)> 0 ) {
    $_SESSION['usuario'] = $correo;
    header("location:/ESLA/tablon-de-anuncio/index.php");
    exit();
 }else{
    echo '<script> 
    alert("el usuario no exite, por favor verifique los datos introducidos ");
    window.location="index.php";
</script>';
exit();
 }


?>