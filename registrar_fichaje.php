<?php

$id_usu = $_POST['id_usu'];
$tipo_fichaje = $_POST['tipo_fic'];


include("conexion.php");




$sql_fichaje = "INSERT INTO fichajes (id_usu, tipo_fic,activo_fic ) values ('$id_usu', '$tipo_fichaje', '0')";
if($conexion->query($sql_fichaje)){

    echo "<h1> Para finalizar el fichaje, validalo en tu e-mail</h1>";
}

?>

<button><a href="index.php">Inicio</a></button>