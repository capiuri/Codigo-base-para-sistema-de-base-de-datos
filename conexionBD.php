<?php
    $usuario='root';
    $contraseña='';
    $servidor='localhost';
    $bd=''; //Poner el nombre de la base de datos que se va a utilizar
    $dsn = "mysql:host=$servidor;dbname=$bd";
        try {
            $con = new PDO($dsn, $usuario, $contraseña);
        }
        catch (PDOException $ex) {
            exit('No se ha podido conectar con la BD:<br/>'.$ex->getMessage());
        }
?>