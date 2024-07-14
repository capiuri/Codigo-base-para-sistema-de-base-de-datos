<?php
    //Recoger datos de conexionBD.php y de query.php
    require('conexionBD.php');
    require ('query.php');

    //Iniciar sesion
    session_start();

    //Si no coincide el usuario que inicio sesion se vuelve al index.php
    if(!isset($_SESSION['usuario'])){
        header("Location:index.php");
        exit;
    }
    $usuario = $_SESSION['usuario'];

    //Se comprueban los datos que hay en la base de datos
    $sql="SELECT * 
        FROM /*Se ponen las tablas que se quieren enlazar. EJEMPLO: peliculas p INNER JOIN usuarios u
        ON p.codusuario=u.codusuario*/"; 
    $cursor=$con->query($sql);
    //Se pone una variable para guardar el cursor. EJEMPLO: $variable0=$cursor->fetchAll(PDO::FETCH_OBJ);

     //Se comprueban los datos que se van a introducir en la base de datos y se guardan en variables
    if(isset($_POST['variable1'], $_POST['variable2'], $_POST['variable3'], $_POST['variable4'])){
        $variable1 = $_POST['variable1'];
        $variable2 = $_POST['variable2'];
        $variable3 = $_POST['variable3'];
        $variable4 = $_POST['variable4'];

    //Buscar el codusuario basado en el nombre de usuario
        $sql="SELECT codusuario FROM usuarios WHERE usuario=:usuario";
        $stmt=$con->prepare($sql);
        $stmt->bindParam(':variable4', $variable4);
        $stmt->execute();
        $busqueda=$stmt->fetch(PDO::FETCH_OBJ);

        //Si el usuario coincide se insertan los datos en la base de datos
        if ($busqueda){
            $variable4=$busqueda->codusuario;

                $sql="INSERT INTO /*tabla (columna1, columna2, columna3, columna4)*/ VALUES (:variable1, :variable2, :variable3, :variable4)";
                $stmt=$con->prepare($sql);
                $stmt->bindParam(':variable1', $variable1);
                $stmt->bindParam(':variable2', $variable2);
                $stmt->bindParam(':variable3', $variable3);
                $stmt->bindParam(':variable4', $variable4);
                $stmt->execute(); 
        }
    }

    //Se comprueban los datos introducidos
    require ('query.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylepagina.css">
    <title>Videoteca</title>
</head>
<body class="body">
    <header>
        <h1 class="titulo"></h1>
    </header>
    <article class="tablaform">
        <table class="tabla">
        <form method="POST">
            <tr>
                <td><a href="logout.php"><?=$usuario?></a></td>
            </tr>
            <tr>
                <td><input type="text" name="variable1" id="variable1" placeholder="variable1"></td>
            </tr>
            <tr>
                <td><input type="number" name="variable2" id="variable2" placeholder="variable2"></td>
            </tr>
            <tr>
                <td><input type="date" name="variable3" id="variable3" placeholder="variable3"></td>
            </tr>
            <tr>
                <td><input type="text" name="variable4" id="variable4" placeholder="variable5"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Guardar"></td>
            </tr>        
        </form>
        </table>
    </article>
    <br>
    <article class="tablaspeliculas">
        <table border="2">
            <tr>
                <th>Pelicula</th>
                <th>Puntuacion</th>
                <th>Fecha</th>
                <th>Usuario</th>
            </tr>
            <?php /*Bucle para recorrer los datos introducidos. EJEMPLO: foreach($variable0 as $var0): ?>
            <tr>
                <td><?=$var0->columna1?></td>
                <td><?=$var0->columna2?></td>
                <td><?=date('d/m/Y', strtotime($var0->columna3))?></td>
                <td><?=$var0->columna4?></td>
                <td><a href="delete.php?pelicula=<?=$var0->columna1?>">X</a></td>
            </tr>
            <?php endforeach; */?>
        </table>
    </article>
</body>
</html>