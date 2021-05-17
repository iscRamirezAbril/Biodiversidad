<?php
include 'conexion.php';
require_once 'model2.php';

$model = new ValidarDatos();

$model->NomUsr = $_POST['txtusrNomUsr'];
$model->Contrasena = $_POST['txtusrContrasena'];

$filaMain = $model->ValidaLogin();

if($filaMain>0){
    $sql = "SELECT * FROM Usuario WHERE usrNomUsr='$model->NomUsr'";
    $stmt = sqlsrv_query($conn,$sql);
    if($stmt === false){
        die(print_r(sqlsrv_errors(),true));
        printf("Algo salio mal");
    }
    while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
        echo "Bienvenido "; echo $row['usrNombre'];
    }
}
else{
    
    echo'<script type="text/javascript">
    alert("Usuario y/o contraseña incorrectos.");
    window.location.href="myPlace.php";
    </script>';
      exit();
}


?>