<?php
    //Se comprueba la conexion a la base de datos
    require('conexionBD.php');

    //Se obtiene el valor de la variable
    //EJEMPLO: $pelicula=($_GET['pelicula'])??'';

    //Codigo que borra los datos referido a un valor
    $sql='DELETE FROM /*Tabla de la base de datos*/ WHERE /*Valor que se quiere borrar. EJEMPLO: pelicula=:pelicula */';
    $cursor=$con->prepare($sql);
    $cursor->bindParam(/*'Parametro que se va a borrar. EJEMPLO ':pelicula',$pelicula,PDO::PARAM_STR*/);
    $cursor->execute();
    $cursor=null;

    //Punto al que se quiere ir despues de borrar
    header(/*EJEMPLO: 'Location:peliculas.php'*/);
?>