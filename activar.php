<?php

if($_GET){

$id= $_GET['id'];
$token = $_GET['t'];

include("conexion.php");

$consulta = "UPDATE fichajes SET activo_fic = 1, token_fic='' WHERE id_fic = $id AND token_fic = '$token'";

$otros_fic ="UPDATE fichajes SET token_fic = '' 
            WHERE 
                id_usu = (SELECT 
                                id_usu 
                            FROM 
                                fichajes
                            WHERE 
                                id_fic = $id) 
            AND fecha_fic = CURDATE() 
            AND activo_fic = 0";

if($conexion->query($consulta)){

    $conexion->query($otros_fic);
    echo "<script>alert('Fichaje activado correctamente');
    window.location.href='index.php' </script>";}else{

    echo "<script>alert('Error al activar el fichaje, vuelve a intentarlo');
    window.location.href='index.php' </script>";
    }
}else{
    echo "<script>alert('Error al activar el fichaje');
    window.location.href='index.php' </script>";
}
?> 