<?php
session_start();

$admin = false;

if(isset($_SESSION['usuario'])){
    if($_SESSION['admin']){

        $admin=true;
        
    }

}else{
    error_sesion();
}


function error_sesion(){
    echo "<script>
            alert('Debes iniciar sesión');
            window.location='login.php';
         </script>";
}

?>