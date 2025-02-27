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

        <div>
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
                    $usuarios = $conexion->query($sql);

                    foreach($usuarios as $registro){

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
                                <a href="ver_fichaje.php?id=<?php echo $id?>">Ver fichajes</a>
                                <?php if($tipo != 2){?>
                                <a href="eliminar_usu.php?id=<?php echo $id?>">Eliminar</a>
                                <?php }?>
                            </td>
                        </tr>

<?php               } ?>
                </tbody>
            </table>
        </div>

        <div>
            <h1>Fichajes de hoy</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>DNI</th>
                        <th>Hora</th>
                        <th>Activo</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
<?php
                        $sql_fichajes= "SELECT * 
                                        FROM 
                                            fichajes f
                                        INNER JOIN 
                                            usuarios u
                                        ON f.id_usu = u.id_usu 
                                        WHERE f.fecha_fic = CURDATE()";

                        
                        $fichajes = $conexion->query($sql_fichajes);
                      
                        foreach($fichajes as $fichaje){
                            $nombre = $fichaje["nom_usu"];
                            $apellidos =$fichaje["ape_usu"];
                            $dni= $fichaje["dni_usu"];
                            $hora = $fichaje["hora_fic"];
                            $tipo = $fichaje["tipo_fic"];
                            $activo= $fichaje["activo_fic"];                    

?>
                        <tr>
                            <td><?php echo  $nombre?></td>
                            <td><?php echo  $apellidos?></td>
                            <td><?php echo $dni?></td>
                            <td><?php echo $hora?></td>
                            <td><?php echo $activo?></td>
                        </tr>
<?php
                        }
?>

                    </tbody>
            </table>
        </div>
            
            <a href="cerrar_sesion.php">Cerrar sesión</a>
            
    </body>
    </html>
<?php
    }
?>




