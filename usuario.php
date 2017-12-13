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
        
        $idUsuario = $_GET['id'];
        $contrasenaPasada = $_GET['contrasenaBuena'];
        $nombreUsuarioDeLosCojones = $_GET['usuario'];
        error_reporting(0);
        ?>
    <head>
        <title>Trivial de <?php echo $nombreUsuarioDeLosCojones;?></title>
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
         
         $creaConexion = new mysqli(host, usuario, contrasena, bbdd);
         if($creaConexion->errno >0){
            die("No ha sido posible conectarse a la base de datos [". $creaConexion->connect_error. "]");
         }
        $consultaTOPUsuarios = "SELECT usuarios.nombre , COUNT( * ) AS num FROM nivelespasados join usuarios on nivelespasados.idCliente = usuarios.id GROUP BY idCliente ORDER BY num DESC LIMIT 0 , 3";
        $ejecutaConsultaTOP = mysqli_query($creaConexion, $consultaTOPUsuarios);
        $arrayTop = mysqli_fetch_all($ejecutaConsultaTOP);
        
        
        ?>

<!--ALGUNAS VARIABLES DE PHP ESTAN ARRIBA DEL TODO-->
        <div class="container " id="containerTrivial">
            <div class="row">
                <div class="col-md-3" id="trucoRastrero" ></div>
                <div class="col-md-6" ><h1 class="text-center cambiaColorTexto"><?php echo $_GET['usuario']; ?></h1></div>
                <div class="col-md-3" ><a href="index.php"><button id="botonSalirSesion" class="btn btn-primary pull-right"> <i class="fa fa-sign-out" aria-hidden="true"></i>Salir</button></a></div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"><button class="btn btn-success" style="width: 50%;">Seguidores:</button><button class="btn btn-success" style="width: 50%;">Siguiendo:</button></div>
                <div class="col-md-4"></div>
            </div>
        </div><!--Container-->

        <script>
           </script>
    </body>
</html>