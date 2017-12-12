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
            
            <div  class="row" style="margin-top: 15%; "><!--CUERPO NORMAL-->
                <div class="col-md-4" id="espacioIz"> </div>
                
                
                <div class="col-md-4" id="divFormulario">
                    <h1 class="text-center" >Juega Gratis</h1>
                    <form name="formularioLogin" action="" method="POST" >  <!--ACTION VACIOOOOOOOOO HE PENSADO QUE VAYA A OTRA PAGINA-->  
                        <table border="0"  cellspacing="6" style="margin: 0 auto;">
                            <tbody>
                                <tr>
                                    <td>Nombre de usuario</td>
                                    <td> <input value="wacamole"type="text" required="Ingresa tu nick" name="nombreUsuario" placeholder="pepito" /> </td>
                                </tr>
                                <tr>
                                    <td>Contraseña</td>
                                    <td> <input value="waca" type="password" required="Ingresa tu contraseña"  name="contrasena"  /></td>
                                </tr>
                            </tbody>
                        </table>

                        <br>
                       <!-- <p class="text-center">Mostrar contrasena<input style=" margin-left: 10px;" type="checkbox" name="botonMuestraContraseña" id="botonMuestraContraseña" value="OFF" /></p>-->
                        <input type="submit" value="Enviar" name="botonEnviarFormulario" id="botonEnviarFormulario" class="btn btn-primary btn-success " style="margin-left: 20%;" /> 
                        <input type="reset" value="Borrar" name="botonBorrarFormulario" id="botonBorrarFormulario"  class="btn btn-primary  btn-danger "   />
                        <a href="registro.php"> <input type="button" value="Registrarse" name="botonRegistrarse" id="botonRegistrarse" class="btn btn-primary  btn-info "  onclick="muestraFormularioRegistro();" /></a>
                    </form>
                </div><!--divFormulario-->
                
                
                
                <div class="col-md-4 pull-left" id="espacioDer"></div>
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