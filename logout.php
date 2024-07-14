<?php
    //Se cierra session y se vuelve al index.php
    session_start();
    session_destroy();
    header('Location:.');
?>