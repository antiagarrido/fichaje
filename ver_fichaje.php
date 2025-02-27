<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichajes</title>
</head>
<body>
<h1>Fichajes</h1>  
<table>


<tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Tipo</th>
        <th>Activo</th>
    </tr>
    </thead>

    <thead>
       
    <tbody> 

<?php

include 'conexion.php';

$id = $_GET['id'];


$sql = "SELECT * FROM fichajes f INNER JOIN usuarios u  ON f.id_usu = u.id_usu  WHERE u.id_usu = $id";
$resultado = $conexion->query($sql);

foreach($resultado as $registro){

    $nombre= $registro['nom_usu'];
    $apellidos= $registro['ape_usu'];
    $fecha = $registro['fecha_fic'];
    $hora = $registro['hora_fic'];
    $tipo= $registro['tipo_fic'];
    $activo = $registro['activo_fic'];

?>

    <tr>
        <td><?php echo $nombre?> </td>
        <td><?php echo $apellidos?> </td>
        <td><?php echo $fecha?> </td>
        <td><?php echo $hora?> </td>
        <td><?php echo $tipo?> </td>
        <td><?php echo $activo?> </td>
    </tr>
   


<?php

}


?>

</tbody>

</body>
</html>