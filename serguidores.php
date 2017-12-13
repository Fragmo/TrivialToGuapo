<?php

    define("host", "localhost");
    define("usuario", "root");
    define("contrasena", "");
    define("bbdd", "trivial");
    $creaConexion = new mysqli(host, usuario, contrasena, bbdd);
        if($creaConexion->errno >0){
            die("No ha sido posible conectarse a la base de datos [". $creaConexion->connect_error. "]");
        }
        $insertaSeguir = 'INSERT INTO seguir (usuario, seguidor) VALUES ('.$_GET['seguidor'].','.$_GET['seguido'].')';
        print_r($insertaSeguir);
        $ejecutaSeguir = mysqli_query($creaConexion, $insertaSeguir);
        if($creaConexion->errno >0){
            die("No ha sido posible insertar el registro [". $creaConexion->connect_error. "]");
        }