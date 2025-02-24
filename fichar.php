<?php
include ("conexion.php");


if($_POST){
    $dni= $_POST['dni'];


     $sql = "SELECT * FROM usuarios WHERE dni_usu='$dni'";
        $resultado = $conexion->query($sql);

        foreach($resultado as $registro){
            $id_usu= $registro['id_usu'];
        }

        $sql= "SELECT tipo_fic FROM fichajes WHERE id_usu='$id_usu' AND activo_fic=1 ORDER BY fecha_fic AND hora_fic DESC LIMIT 1";
        $resultado = $conexion->query($sql);

        if($resultado->num_rows == 1){
            foreach($resultado as $registro){
                $tipo_fic= $registro['tipo_fic'];
            }

            if($tipo_fic == E){

                echo  "<button>Registrar salida</button>";
           
        }









?>