<?php

include("conexion.php");
include("check_login.php");

if(!$admin){

    error_sesion();
}else{


if($_POST){
    $nom= $_POST['nombre'];
    $ape= $_POST['apellidos'];
    $ema= $_POST['email'];
    $dni= $_POST['dni'];
    $tipo= 1;

    $sql = "INSERT INTO usuarios (nom_usu, ape_usu, email_usu, dni_usu, tipo_usu) VALUES ('$nom', '$ape', '$ema', '$dni', '$tipo')";
    $conexion->query($sql);


    header("Location:admin.php");

}else{

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo alumno</title>
</head>
<body>

<H1> Nuevo alumno</H1>

<form method="POST">

    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="apellidos" placeholder="Apellidos" required>
    <input type="email" name="email" placeholder="e-mail" required>
    <input type="text" name="dni" placeholder="DNI" required>
    <input type="submit" value="Guardar">

</form>


    
</body>
</html>




<?php


}


}
?>