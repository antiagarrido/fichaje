<?php


function encriptar($dato){
    $llave= "Mi_clave";
    $metodo="AES-128-ECB";
    $datoencriptado = base64_encode(openssl_encrypt($dato, $metodo, $llave));

    return $datoencriptado;
}

function desencriptar($datoencriptado){
    $llave= "Mi_clave";
    $metodo="AES-128-ECB";
    $dato = openssl_decrypt(base64_decode($datoencriptado), $metodo, $llave);

    return $dato;
}





function comprobar_dni($dni){

    include("conexion.php");

    //buscamos si hay registro por el DNI que nos envía.
    $sql_usu = "SELECT * FROM usuarios WHERE dni_usu='$dni'";
    $resultado_usu = $conexion->query($sql_usu);

    //si localizamos el usuario pedimos el id
    if ($resultado_usu->num_rows == 1) {
        foreach ($resultado_usu as $registro_usu){
            $id_usu = $registro_usu['id_usu'];
        } 
        return $id_usu;    
    } else {

        echo "<script> alert('Error con el DNI proporcionado, vuelve a intentarlo o contacta con el administrador');
            window.location.href='fichar.php'</script>";    
    }

}



?>