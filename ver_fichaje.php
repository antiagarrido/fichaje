<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichajes</title>
</head>
<body>
    

<?php

$id = $_GET['id'];


$sql = "SELECT * FROM fichajes INNER JOIN usuarios WHERE id_fic = $id";
$resultado = $conexion->query($sql);

foreach($resultado as $registro){

    $nombre= $registro['nom_usu'];
    $apellidos= $registro['ape_usu'];
    $fecha = $registro['fecha_fic'];
    $hora = $registro['hora_fic'];
    $tipo= $registro['tipo_fic'];
    $activo = $registro['activo_fic'];


?>


<?php

}


?>

</body>
</html>