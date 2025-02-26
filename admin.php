<?php

include("conexion.php");
include("check_login.php");

if(!$admin){

    error_sesion();
}else{

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
</head>
<body>


    <h1>Alumnos</h1>
    <a href="nuevo_alumno.php">Nuevo alumno</a>
    <table>
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
			<th>DNI</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM usuarios";
        $resultado = $conexion->query($sql);

        foreach($resultado as $registro){

            $nombre= $registro['nom_usu'];
            $apellidos= $registro['ape_usu'];
            $email= $registro['email_usu'];
            $dni= $registro['dni_usu'];
            $id = $registro['id_usu'];
			$tipo= $registro['tipo_usu'];
			

?>
    <tr>
        <td><?php echo $nombre?> </td>
        <td><?php echo $apellidos?> </td>
        <td><?php echo $email?> </td>
        <td><?php echo $dni?> </td>
        <td>
            <a href="editar_usu.php?id=<?php echo $id?>">Editar</a>
            <a href="ver_fichaje.php?id=<?php echo $id?>">Editar</a>
<?php

if($tipo != 2){

 

?>
            <a href="eliminar_usu.php?id=<?php echo $id?>">Eliminar</a>

<?php
}
?>
	</td>
    </tr>

<?php
        }
        ?>
        </tbody>

    </table>

    
    <a href="cerrar_sesion.php">Cerrar sesión</a>
    
</body>
</html>
<?php
}
?>




