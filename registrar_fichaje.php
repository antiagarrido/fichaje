<?php

$id_usu = $_POST['id_usu'];
$tipo_fichaje = $_POST['tipo_fic'];


include("conexion.php");

$token = uniqid();


$sql_fichaje = "INSERT INTO fichajes (id_usu, tipo_fic,activo_fic,token_fic ) values ('$id_usu', '$tipo_fichaje', '0', '$token')";
if($conexion->query($sql_fichaje)){

    $id = $conexion->insert_id;
    $sql_usu = "SELECT email_usu FROM usuarios WHERE id_usu = $id_usu";

    $resultado = $conexion->query($sql_usu);
    foreach($resultado as $registro){
        $email = $registro['email_usu'];
    }

    $cabecera = "Content-type: text/html; charset=utf-8";
    $para = $email;
    $asunto = "Confirma tu fichaje";
    $mensaje = "<h1> Confirmar fichaje</h1> <br>
    <p>Para confirmar tu fichaje haz click en el siguiente enlace :</p> <br>
    <a href='http://localhost/fichajes/activar.php?id=$id&t=$token'>Activa tu fichaje</a>";

    mail($para, $asunto, $mensaje, $cabecera);

    echo "<h1> Para finalizar el fichaje, valídalo en tu e-mail</h1>";
}

?>

<button><a href="index.php">Inicio</a></button>