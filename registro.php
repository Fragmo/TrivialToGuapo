<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Trivial</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="js/jquery.raty.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/propioCss.css" rel="stylesheet" type="text/css"/>
        <style>
            td{width: 150px;}
            body{background-image: url("imagenes/logro_2.jpg"); background-size: cover;}
        </style>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.raty.js" type="text/javascript"></script>
    </head>
    <body>
        <?php error_reporting(0)?>
        <div class="container " id="containerRegistro" >
            <header>
            <div class="row"> <!--MENU ARRIBA-->
                <div class="col-md-3" ></div>
                <div class="col-md-6" ><h1 class="text-center cambiaColorTexto">TRIVIAL TO GUAPO!</h1></div>
                <div class="col-md-3" ></div>
            </div><!--FIN MENU ARRIBA-->
            </header>
            
            <div  class="row" style="margin-top: 13%; "><!--CUERPO NORMAL-->
                <div class="col-md-4" id="espacioIz"> </div>
                      
                <div class="col-md-4" id="espacioDer">
                    <div id="contenedorFormularioRegistro"  style="width: 100%; ">
                     <h1 class="text-center" >Juega Gratis</h1>
                    <form name="formularioRegistro" action="" method="POST" >  <!--ACTION VACIOOOOOOOOO HE PENSADO QUE VAYA A OTRA PAGINA-->
                       
                        <table border="0" cellspacing="6" style="margin: 0 auto;">
                            <tbody>
                                <tr>
                                    <td id="correoElectronico">Correo Electrónico</td>
                                    <td id="textoCorreoElectronico"><input type="email" required="Ingresa este campo"  name="correoElectronico" placeholder="alguien@example.com"  /></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <table border="0"  cellspacing="6" style="margin: 0 auto;">
                            <tbody>
                                <tr>
                                    <td>Nombre de usuario</td>
                                    <td> <input type="text"  required="Ingresa este campo" name="nombreUsuario" placeholder="pepito" /> </td>
                                </tr>
                                <tr>
                                    <td>Contraseña</td>
                                    <td> <input type="password" required="Ingresa este campo" name="contrasena"  /></td>
                                </tr>
                            </tbody>
                        </table>
                        <table border="0" cellspacing="6" style="margin: 0 auto;">
                            <tbody>
                                <tr>
                                    <td id="confirmarContraseña">Confirmar Contraseña</td>
                                    <td id="textoConfirmarContraseña"><input type="password" required="Ingresa este campo" name="confirmarContraseña"  /></td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="submit" value="Enviar" name="botonEnviarFormularioRegistro" id="botonEnviarFormularioRegistro" class="btn btn-primary btn-success " style="margin-left: 15%;" /> 
                        <input type="reset" value="Borrar" name="botonBorrarFormularioRegistro" id="botonBorrarFormulariRegistroo"  class="btn btn-primary  btn-danger "   />
                        <a href="index.php"><input type="button" class="btn btn-info" value="Ya tienes Cuenta?" name="yaTienesCuenta" /></a>
                        </div><!--contenedor formulario registros-->
                </div>
            </div><!--row-->
        </div><!--Container-->
        <?php
		if(isset($_REQUEST['botonEnviarFormularioRegistro'])){
			require("registroToGuapo.php");
		}
                
                if(isset($_REQUEST['botonEnviarFormulario'])){
                    
			require("loginToGuapo.php");
		}
                
	?>

    </body>
</html>