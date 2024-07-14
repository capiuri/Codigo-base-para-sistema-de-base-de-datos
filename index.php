<?php
    //Comprobar la conexion a la base de datos (conexionBD.php) y comprobar inicio de sesion (login.php)
    require ('conexionBD.php');
    require ('login.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videoteca</title>
    <link rel="stylesheet" href="styleindex.css">
</head>
<body class="body">
    <header>
        <h1 class="titulo">Videoteca</h1>
    </header>
    <article>
        <table class="tabla">
            <form method="POST" action="login.php" class="formulario">
                <tr>
                    <th class="th1">Inicio de sesión</th>
                </tr>
                <tr>
                    <td><input type="text" name="usuario" id="usuario" placeholder="Usuario"></td>
                </tr>
                <tr>
                    <td><input type="password" name="contraseña" id="contraseña" placeholder="Contraseña"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Entrar" class="boton"></td>
                </tr>
            </form>
        </table>
    </article>
</body>
</html>