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
                <div class="col-md-3" > Hola Marc <button id="botonSalirSesion" class="btn btn-primary pull-right">Salir</button></div>
            </div>
            <div  class="row" style="margin-top: 15%; ">
                <div class="col-md-4"> </div>
                <div class="col-md-4" id="divFormulario">
                    <h1 class="text-center" >Juega Gratis</h1>
                    <form name="formularioRegistro" action="Pagina2.php" method="POST" >  <!--ACTION VACIOOOOOOOOO HE PENSADO QUE VAYA A OTRA PAGINA-->
                       
                        <table border="0" cellspacing="6" style="margin: 0 auto;">
                            <tbody>
                                <tr>
                                    <td id="correoElectronico">Correo Electrónico</td>
                                    <td id="textoCorreoElectronico"><input type="email" name="correoElectronico" placeholder="alguien@example.com"  /></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <table border="0"  cellspacing="6" style="margin: 0 auto;">
                            <tbody>
                                <tr>
                                    <td>Nombre de usuario</td>
                                    <td> <input type="text" name="nombreUsuario" placeholder="pepito" /> </td>
                                </tr>
                                <tr>
                                    <td>Contraseña</td>
                                    <td> <input type="password" name="contraseña"  /></td>
                                </tr>
                            </tbody>
                        </table>
                        <table border="0" cellspacing="6" style="margin: 0 auto;">
                            <tbody>
                                <tr>
                                    <td id="confirmarContraseña">Confirmar Contraseña</td>
                                    <td id="textoConfirmarContraseña"><input type="password" name="confirmarContraseña"  /></td>
                                </tr>
                            </tbody>
                        </table>

                        <br>
                       <!-- <p class="text-center">Mostrar contraseña<input style=" margin-left: 10px;" type="checkbox" name="botonMuestraContraseña" id="botonMuestraContraseña" value="OFF" /></p>-->
                        <input type="submit" value="Enviar" name="botonEnviarFormulario" id="botonEnviarFormulario" class="btn btn-primary btn-success " style="margin-left: 20%;" onclick="$('#containerRegistro').fadeOut('slow'); $('#containerTrivial').fadeIn('slow') " /> 
                        <input type="reset" value="Borrar" name="botonBorrarFormulario" id="botonBorrarFormulario"  class="btn btn-primary  btn-danger "   />
                        <input type="button" value="Registrarse" name="botonRegistrarse" id="botonRegistrarse" class="btn btn-primary  btn-info "   />
                    </form>
                </div><!--colmd5-->
                <div class="col-md-4"> </div>
                
               
            </div><!--row-->
            
        </div><!--Container-->
        <?php
         define("host", "localhost");
         define("usuario", "root");
         define("contraseña", "");
         define("bbdd", "trivial");
        
        ?>
        <?php
        $creaConexion = new mysqli(host, usuario, contraseña, bbdd);
        if($creaConexion->errno >0){
            die("No ha sido posible conectarse a la base de datos [". $creaConexion->connect_error. "]");
        }
        
        ?>
        <script>
          ocultaCosas(); // funcion a hacer nada mas empezar
          
          //funciones evento
          $('#botonRegistrarse').click(function(){
//              var contador = 0; 
//                if(contador === 0){
//                    ocultaCosas();
//                    contador ++;
//                }else{
                    registrarse(); 
//                    contador = 0;
//                }
                
            });
            //fin funciones evento
            
          
          function ocultaCosas(){            
            $('#correoElectronico').hide();
            $('#textoCorreoElectronico').hide();
            $('#confirmarContraseña').hide();
            $('#textoConfirmarContraseña').hide();
          }
          
          function registrarse(){
            $('#correoElectronico').fadeIn('fast');
            $('#textoCorreoElectronico').fadeIn('fast');
            $('#confirmarContraseña').fadeIn('fast');
            $('#textoConfirmarContraseña').fadeIn('fast');
            
          }
          
 
        </script>
    </body>
</html>