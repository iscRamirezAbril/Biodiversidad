<?php
class ValidarDatos{
var $NomUsr;
var $Contrasena;

function ValidaLogin(){
    $cadenaCnx = "sqlsrv:Server=mercadito.axolotlteam.com;Database=hackMyPlace";
    $user = "apiPlace";
    $pass = "Axolotlteam3312";
    
    $cnx = new PDO($cadenaCnx,$user,$pass);

    //Variables de conexión

    try{
        $consulta=$cnx->prepare("SELECT * FROM Usuario WHERE usrNomUsr=:parametro1 AND usrContrasena=:parametro2");

         $consulta->bindValue(":parametro1",$this->NomUsr);
         $consulta->bindValue(":parametro2",$this->Contrasena);

         $consulta->execute();

         $filaUser = $consulta->fetch();
         return $filaUser;
    }
    catch(PDOException $e){
        echo "Error en la conexión ->".$e;
    }
}
}
?>