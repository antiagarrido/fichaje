<?php


$id = $_GET['id'];

include("conexion.php");
include("funciones.php");


$sql = "SELECT email_usu,id_fic, token_fic
        FROM usuarios u
        INNER JOIN fichajes f
        ON u.id_usu = f.id_usu
        WHERE 
                 u.id_usu = $id 
            AND 
                activo_fic = 0 
            AND 
                fecha_fic = CURDATE()
        ORDER BY 
            id_fic DESC LIMIT 1";

$resultado = $conexion->query($sql);

if($resultado->num_rows == 1){
  


foreach($resultado as $registro){
    $email = $registro['email_usu'];
    $id_fic = $registro['id_fic'];
    $token = $registro['token_fic'];
}   

$id_publico = encriptar($id_fic);
$cabecera = "Content-type: text/html; charset=utf-8";
$para = $email;
$asunto = "Confirma tu fichaje";
$mensaje = "<h1> Confirmar fichaje</h1> <br>
<p>Para confirmar tu fichaje haz click en el siguiente enlace :</p> <br>
<a href='http://localhost/fichajes/activar.php?id=$id_publico&t=$token'>Activa tu fichaje</a>";

mail($para, $asunto, $mensaje, $cabecera);

echo "<p>Te hemos enviado de nuevo el correo de confirmación del fichaje. Para activar el fichaje, valídalo en tu e-mail</p>";

}else{

    echo "<h1> No hay fichajes pendientes de hoy</h1>
    <button><a href='fichar.php'>Fichar</a></button>";
}

?>