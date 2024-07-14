<?php
    //Se comprueban los datos que hay en la base de datos
    $sql="SELECT * 
    FROM peliculas p INNER JOIN usuarios u 
    ON p.codusuario=u.codusuario";
    $cursor=$con->query($sql);
    $peliculas=$cursor->fetchAll(PDO::FETCH_OBJ);
?>