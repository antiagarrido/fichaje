<?php


function error_login(){
    echo "<script>
            alert('Usuario o contraseña incorrectos');
            window.location='login.php';
         </script>";
}

if($_POST){

    $ema= $_POST['email'];
    $pass= $_POST['pass'];

    include("conexion.php");

    $sql = "SELECT * FROM usuarios WHERE email_usu='$ema'";
    $resultado = $conexion->query($sql);


    if($resultado->num_rows == 1){

        foreach($resultado as $registro){
            var_dump($registro);
            if($pass == $registro['pass_usu']){
                session_start();
                $_SESSION['usuario'] = $registro['id_usu'];
                $_SESSION['nombre'] = $registro['nom_usu'];
           
           
                if($registro['tipo_usu'] == 2) {
                    $_SESSION['admin'] = true;
                    header("Location:admin.php");

                }else{

                    $_SESSION['admin'] = false;

                    header("Location:index.php");
                }           

            
            
            }else{
            
                error_login();        
            }
        }

    } else{
        error_login();
         } 

} else {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar sesión</title>
    </head>
    <body>
        <h1> Inicia sesión</h1>

        <form action="login.php" method="POST">
            <input type="text" name="email" placeholder="e-mail" required>
            <input type="password" name="pass" placeholder="Contraseña" required>
            <input type="submit" value="Iniciar sesión">
        </form>
        
    </body>
    </html>


    <?php

    };
    ?>