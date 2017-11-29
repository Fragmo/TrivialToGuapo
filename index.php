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
        <script src="js/verbos.js" type="text/javascript"></script>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.raty.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container " id="containerRegistro" >
            
            <div class="row"> <!--MENU ARRIBA-->
                <div class="col-md-3" ></div>
                <div class="col-md-6" ><h1 class="text-center cambiaColorTexto">TRIVIAL TO GUAPO!</h1></div>
                <div class="col-md-3" > holaU</div>
            </div><!--FIN MENU ARRIBA-->
            
            
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
                        <input type="button" value="Registrarse" name="botonRegistrarse" id="botonRegistrarse" class="btn btn-primary  btn-info "  onclick="muestraFormularioRegistro();" />
                    </form>
                </div><!--divFormulario-->
                
                
                
                <div class="col-md-4" id="espacioDer">
                    <div id="contenedorFormularioRegistro"  style="width: 100%;">
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
                        <input type="submit" value="Enviar" name="botonEnviarFormularioRegistro" id="botonEnviarFormularioRegistro" class="btn btn-primary btn-success " style="margin-left: 20%;" /> 
                        <input type="reset" value="Borrar" name="botonBorrarFormularioRegistro" id="botonBorrarFormulariRegistroo"  class="btn btn-primary  btn-danger "   />
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
        <script>
          $('#contenedorFormularioRegistro').hide(); // funcion a hacer nada mas empezar
          
          function muestraFormularioRegistro(){
              $('#espacioIz').hide();
              $('#divFormulario').removeClass('col-md-4').addClass('col-md-6');
              $('#espacioDer').removeClass('col-md-4').addClass('col-md-6');
              $('#contenedorFormularioRegistro').fadeIn('fast');
          }
          

        </script>
    </body>
</html>