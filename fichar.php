<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichaje</title>
</head>
<body>

<?php
    include("funciones.php");
    if ($_POST) {        
        include("conexion.php");

        $dni = $_POST["dni"];
        $id_usu = comprobar_dni($dni);

        $tipo_ult = "N"; 
        $activo_fic = "";
        $fecha_fic = ""; 
        
        //comprobamos si existe un fichaje anterior del día de hoy 
        $sql_fic = "SELECT tipo_fic, activo_fic, fecha_fic FROM fichajes WHERE id_usu='$id_usu' AND fecha_fic= CURDATE() ORDER BY id_fic DESC LIMIT 1";
        $resultado_fic = $conexion->query($sql_fic);

        if ($resultado_fic->num_rows == 1) {
        foreach ($resultado_fic as $registro_fic){


            $tipo_ult = $registro_fic['tipo_fic'];
            $activo_fic = $registro_fic['activo_fic'];
    

                // en el caso de que el último fichaje de hoy no esté activo damos la opción de reenviar el correo 
                if ($activo_fic == 0 ) {

                        echo "<p>No es posible realizar el fichaje. Tienes pendiente un fichaje por confirmar, revisa tu correo</p>
                        <button><a href='index.php'>Inicio</a></button>
                        <a href='reenviar.php?id=$id_usu'>Reenviar correo</a>";
                }  else{
                    if ($tipo_ult == "E") {
                        $tipo_fic = "S";
                    } else {
                        $tipo_fic = "E";
                    }    
                }           
            } 

        } if($activo_fic != 0 ){
        
        ?>

        <form action="registrar_fichaje.php" method="POST">
            <input type="hidden" name="id_usu" value="<?php echo $id_usu; ?>">
            <input type="hidden" name="tipo_fic" value="<?php echo $tipo_fic?>">
            <button type="submit">
                <?php echo ($tipo_ult == "E") ? "Registrar salida" : "Registrar entrada"; ?>
            </button>
        </form>


    

    <?php
    }
    } else {
    ?>

        <form action="fichar.php" method="POST">
            <label for="dni">DNI</label>
            <input type="text" name="dni" id="dni" required>
            <button type="submit">Fichar</button>
        </form>

    <?php
    }
?>

</body>
</html>
