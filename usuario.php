<?php         session_start(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
            <?php

//        require ('phpPagina2.php');
//        //session_start();
//        $preguntas = ($_SESSION['preguntasAJS']);
        
        error_reporting(0);
        $usuarioNom= $_GET['usuario'];
        ?>
    <head>
        
        <title>Trivial de <?php echo $usuarioNom;?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="js/jquery.raty.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/propioCss.css" rel="stylesheet" type="text/css"/>
        <style>
            body{background-image: url("imagenes/logro_2.jpg"); background-size: cover;} 
        </style>
        
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.raty.js" type="text/javascript"></script>
        <script src="js/preguntasSelectividad.js" type="text/javascript"></script>
    </head> 
    <body>
        <?php
         define("host", "localhost");
         define("usuario", "root");
         define("contrasena", "");
         define("bbdd", "trivial");
         //MIRAAAAAAR ARRIBA ESTA LA VARIABLE DEL NOMBRE DE USUARIO, MIRAAAAAAAAR!!!!!
         $creaConexion = new mysqli(host, usuario, contrasena, bbdd);
         if($creaConexion->errno >0){
            die("No ha sido posible conectarse a la base de datos [". $creaConexion->connect_error. "]");
         }
         // PARA VER LOS QUE LE SIGUEN A ESTE USUARIO (HASTA AHORA SOLO TENGO EL NUMERO)
        $consultaseguidores ="select count(usuario) from seguir where usuario ='$usuarioNom' ";
        $ejecutaSeguidores = mysqli_query($creaConexion, $consultaseguidores);
        $arraySeguidores = mysqli_fetch_all($ejecutaSeguidores);
        //PARA VER A CUANTOS SIGUE
        $consultasiguiendo ="select count(seguidor) from seguir where seguidor ='$usuarioNom' ";
//        print_r($consultasiguiendo);
        $ejecutasiguiendo = mysqli_query($creaConexion, $consultasiguiendo);
        $arraysiguiendo = mysqli_fetch_all($ejecutasiguiendo);
        
        function pinchaSeguidores ($creaConexion, $usuarioNom){   
        $consultaPinchaSeguidores = "select seguidor from seguir where usuario ='$usuarioNom'";
        $ejecutaPinchaSeguidores = mysqli_query($creaConexion, $consultaPinchaSeguidores);
        $arrayPinchaSeguidores = mysqli_fetch_all($ejecutaPinchaSeguidores);

        for ($i = 0; $i<count($arrayPinchaSeguidores); $i++){
            $nombreSeguidor = $arrayPinchaSeguidores [$i][0];
           
            print ('<div><h2 class="text-center">'.(1+$i).' : '.$nombreSeguidor.' </h2></div>');

         }
        }
        
        function pinchaSeguidos($creaConexion, $usuarioNom){ 
        $consultaPinchaSeguido = "select usuario from seguir where seguidor ='$usuarioNom'";
        $ejecutaPinchaSeguido = mysqli_query($creaConexion, $consultaPinchaSeguido);
        $arrayPinchaSeguido = mysqli_fetch_all($ejecutaPinchaSeguido);

        for ($i = 0; $i<count($arrayPinchaSeguido); $i++){
            $nombreSeguidor = $arrayPinchaSeguido [$i][0];
            print ('<div><h2 class="text-center">'.(1+$i).' : '.$nombreSeguidor.' </h2></div>');

         }
        }
        
        
        
        ?>

<!--ALGUNAS VARIABLES DE PHP ESTAN ARRIBA DEL TODO-->
        <div class="container " id="containerTrivial">
            <div class="row">
                <div class="col-md-3" id="trucoRastrero" ></div>
                <div class="col-md-6" ><h1 class="text-center cambiaColorTexto"><?php echo $_GET['usuario']; ?></h1></div>
                <div class="col-md-3" >   <a href="index.php"><button id="botonSalirSesion" class="btn btn-primary pull-right"> <i class="fa fa-sign-out" aria-hidden="true"></i>Salir</button></a></div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"><form method="post"><input type="submit" name="botonSeguidores" class="btn btn-success" style="width: 50%;" value="Seguidores:<?php echo $arraySeguidores[0][0]?>"/></button><input type="submit" name="botonSeguidos" class="btn btn-success" style="width: 50%;" value="Siguiendo:<?php echo $arraysiguiendo[0][0]?>"/></form></div>
                <div class="col-md-4"></div>
            </div>
            
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <?php
                    if(isset($_POST['botonSeguidores'])){
                        pinchaSeguidores($creaConexion,$usuarioNom);
                        
                    }
                    
                    if(isset($_POST['botonSeguidos'])){
                        pinchaSeguidos($creaConexion,$usuarioNom);
                        
                    }
                    
                    ?>
                </div>
                <div class="col-md-3"></div>
            </div>
            
            
        </div><!--Container-->

        <script>
           </script>
    </body>
</html>