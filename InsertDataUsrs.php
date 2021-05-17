<?php
include 'conexion.php';
require_once 'model.php';


$usrNomUsr = $_POST['txtusrNomUsr'];
$usrRol = '0';
$usrNombre = $_POST['txtusrNombre'];
$usrApellidos = $_POST['txtusrApellidos'];
$usrFechaNacimiento = $_POST['DateusrFechaNacimiento'];
$usrSexo = $_POST['rbtnGender'];
$usrCorreo = $_POST['txtusrCorreo'];
$usrContrasena = $_POST['txtusrContrasena'];

$model = new Validar();

$model->NomUsr=$_POST['txtusrNomUsr'];
$filaInserta=$model->ValidaUsr();

if($filaInserta > 0){
    echo'<script type="text/javascript">
    alert("El usuario ya existe.");
    window.location.href="register.php";
    </script>';
    exit();
}
else{
    NuevoUsr($usrNomUsr,$usrRol,$usrNombre,$usrApellidos,$usrFechaNacimiento,$usrSexo,$usrCorreo,$usrContrasena);
}

function NuevoUsr($usrNomUsr,$usrRol,$usrNombre,$usrApellidos,$usrFechaNacimiento,$usrSexo,$usrCorreo,$usrContrasena){
    include 'conexion.php';
    $sql = "INSERT INTO Usuario (usrNomUsr,usrRol,usrNombre,usrApellidos,usrFechaNacimiento,usrSexo,usrCorreo,usrContrasena) VALUES (?,?,?,?,?,?,?,?);";
    $params = array($usrNomUsr,$usrRol,$usrNombre,$usrApellidos,$usrFechaNacimiento,$usrSexo,$usrCorreo,$usrContrasena);
    $stmt = sqlsrv_query($conn,$sql,$params);
    if($stmt === false){
        die(print_r(sqlsrv_errors(), true));
    }
}
echo'<script type="text/javascript">
alert("Usuario registrado exitosamente.");
window.location.href="myPlace.php";
</script>';


?>