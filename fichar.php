<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichaje</title>
</head>
<body>

<?php
include("conexion.php");

$tipo_ult = "N"; 
$activo_fic = "";
$fecha_fic = "";

if ($_POST) {
    $dni = $_POST['dni'];

    $sql_usu = "SELECT * FROM usuarios WHERE dni_usu='$dni'";
    $resultado_usu = $conexion->query($sql_usu);

    if ($resultado_usu->num_rows == 1) {
        foreach ($resultado_usu as $registro_usu){
            $id_usu = $registro_usu['id_usu'];
        }
      

        $sql_fic = "SELECT tipo_fic, activo_fic, fecha_fic FROM fichajes WHERE id_usu='$id_usu' ORDER BY id_fic DESC LIMIT 1";
        $resultado_fic = $conexion->query($sql_fic);

        if ($resultado_fic->num_rows == 1) {
           foreach ($resultado_fic as $registro_fic){

            $tipo_ult = $registro_fic['tipo_fic'];
            $activo_fic = $registro_fic['activo_fic'];
            $fecha_fic = $registro_fic['fecha_fic'];

           }
        } 


        if ($activo_fic == 0 && $fecha_fic == date("Y-m-d")) {



                echo "<p>No es posible realizar el fichaje. Tienes pendiente un fichaje por confirmar, revisa tu correo</p>
                <button><a href='index.php'>Inicio</a></button>
                <a href='reenviar.php?id=$id_usu'>Reenviar correo</a>";
        } else{

        if ($tipo_ult == "E") {
            $tipo_fic = "S";
        } else {
            $tipo_fic = "E";
        }

        
        
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
        echo "El DNI no existe";
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
