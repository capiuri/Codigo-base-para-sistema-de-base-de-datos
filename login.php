<?php
    //Comprobar la conexion a la base de datos (conexionBD.php)
    require ('conexionBD.php');

    //Se inicia la sesion
    session_start();

    //Se comprueban los datos que se introducen para el inicio de sesion
    if(isset($_POST['usuario'], $_POST['contraseña'])){
        $usuario=$_POST['usuario'];
        $contraseña=$_POST['contraseña'];

        //Se comprueba el usuario y la contraseña con la tabla de usuarios de la base de datos
        $sql="SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña='$contraseña'";
        $cursor=$con->query($sql);
        if($usuario=$cursor->fetchObject()){
            if($usuario->contraseña==$contraseña){
                $login=true;
                $_SESSION['usuario']=$usuario->usuario;
                header('Location:peliculas.php');
                exit();
            }
        }
    }
?>