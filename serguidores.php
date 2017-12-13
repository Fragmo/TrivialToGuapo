<?php

    define("host", "localhost");
    define("usuario", "root");
    define("contrasena", "");
    define("bbdd", "trivial");
        $creaConexion = new mysqli(host, usuario, contrasena, bbdd);
        if($creaConexion->errno >0){
            die("No ha sido posible conectarse a la base de datos [". $creaConexion->connect_error. "]");
        }
    $seguido = $_GET['seguido'];
    $usuario =$_GET['seguidor'];
    $consultaguay= "select contrasena, id from usuarios where nombre = '$usuario'";
    print_r($consultaguay);
    $ejecutaconsultaguay = mysqli_query($creaConexion,$consultaguay);
    $arrayGuay = mysqli_fetch_all($ejecutaconsultaguay);
    $contrasena= $arrayGuay[0][0];
    $idMio = $arrayGuay[0][1];
    
    
    /////NO VA, SIEMPRE SE VA POR EL ELSE
    $consultaChekeaRegistro = 'SELECT usuario, seguidor from seguir where usuario='.$seguido.' and seguidor='.$usuario.'';
    $ejecutaChekea = mysqli_query($creaConexion, $consultaChekeaRegistro);
    $numeroVecesChekea = mysqli_num_rows($ejecutaChekea);
    if($numeroVecesChekea >0){
        echo "<script>location.href='loginToGuapo.php?pasasteNivel=true&id=$idMio&usuario=$usuario&contrasena=$contrasena'</script>";
    }else{
    
    

        $insertaSeguir = 'INSERT INTO seguir (usuario, seguidor) VALUES ("'.$_GET['seguido'].'", "'.$_GET['seguidor'].'")';
        print_r($insertaSeguir);
        $ejecutaSeguir = mysqli_query($creaConexion, $insertaSeguir);
        if($creaConexion->errno >0){
            die("No ha sido posible insertar el registro [". $creaConexion->connect_error. "]");
        }

           echo "<script>location.href='loginToGuapo.php?pasasteNivel=true&id=$idMio&usuario=$usuario&contrasena=$contrasena'</script>";
    }