<?php
//Servidor de trabajo
$serverName = "mercadito.axolotlteam.com";
//Datos referentes a la conexión
$connectioninfo=array(
        "database" => "hackMyPlace",
        "uid" => "apiPlace",
        "pwd" => "Axolotlteam3312"
    );

    $conn = sqlsrv_connect($serverName,$connectioninfo);

     //  if ($conn === false) {

    //   printf("Conexion fallida.");
    // }else

    //printf("Conexion exitosa.");
?>