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
 <!--la url DEL BODY BACKGROUND esta bien pero he puesto la BARRA EN MEDIO PARA QUE NO VAYA Y TRABAJAR MIENTRAS SIN ELLO-->
        <style>
            body{background-image: url("imagenes/logro_2.jpg"); background-size: cover;} 
        </style>
        <script src="js/preguntasSelectividad.js" type="text/javascript"></script>
        <script src="js/verbos.js" type="text/javascript"></script>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.raty.js" type="text/javascript"></script>
    </head> 
    <body>
        <div class="container " id="containerTrivial">
            <div class="row">
                <div class="col-md-3" ></div>
                <div class="col-md-6" ><h1 class="text-center cambiaColorTexto">TRIVIAL TO GUAPO!</h1></div>
                <div class="col-md-3" > Hola Marc <button id="botonSalirSesion" class="btn btn-primary pull-right">Salir</button></div>
            </div>
            
            <div class="row" style="margin-top: 10%;"> <!-- TIENE EL CONTENIDO BUENO CON LAS PREGUNTAS ETC-->
                <div class="col-md-3" id="espacioIz"> </div>
                <div class="col-md-6" > <!----------->
                    <h3 class="text-center"><b id="negritaTemas">Elige un tema!</b></h3>
                    <input  type="button" value="Historia" id="botonHistoria" class="btn btn-success btn-block" name="botonHistoria" onclick="desplazaBotones(this.id)" />
                    <input type="button" value="Economia" id="botonEconomia" class="btn btn-warning btn-block"name="botonEconomia" onclick="desplazaBotones(this.id)" />
                    <input type="button" value="Filosofía" id="botonFilosofia" class="btn btn-primary btn-block"  name="botonFilosofia" onclick="desplazaBotones(this.id)"/>
                    <input type="button" value="Lengua" id="botonLengua" class="btn btn-info btn-block" name="botonLengua" onclick="desplazaBotones(this.id)"/>
                    <input type="button" value="Inglés" id="botonIngles" class="btn btn-danger btn-block" name="botonIngles" onclick="desplazaBotones(this.id)"/>
                </div><!--colmd5-->
                <div class="col-md-3 text-center" id="espacioDer" > <!----------->
                    <div id="contenedorNiveles" class="col-md-3 btn-group " style=" width: 50%; height: 100%;"><!----------->
                        <h3 style="margin-top:70px;"><b>Selecciona un nivel;)</b></h3>
                        
                    </div>
                    
                    <div id="contenedorPreguntas" class="col-md-3" style=" width: 50%; height: 100%;" ><!----------->
                    </div>
                    
                </div><!--ESPACIODER-->
            </div><!--row-->
         
        </div><!--Container-->

        
        <script>
    //ordenes a realizar inmediatamente
    $('#contenedorNiveles').hide();
    $('#contenedorPreguntas').hide();
    colocaBotonesEnEligeNivel();
    
    //creacion de funciones
    function desplazaBotones(id){
        // el que le pase el id funciona pero aun no he especificado ninguna funcion en concreto para nincugno       
                $('#espacioIz').hide();
                $('#containerTrivial').css({ 'float': 'left', 'margin-left' : '30px'});
                $('#espacioDer').removeClass('col-md-3').addClass('col-md-6');
                $('#contenedorNiveles').fadeIn("slow");
                $('#contenedorPreguntas').hide();
                // para que no se repita el texto
                $('#contenedorPreguntas').text('').unbind();
                // se le cambia el color porque en el desplazamiento se mueve a una zona mas oscura
                $('#negritaTemas').css({'color': 'white'});
           
                
    }
    
    
    function colocaBotonesEnEligeNivel (){
        for(var i = 1; i<10; i++){
            $('#contenedorNiveles').append('<button id="nivel'+i+'" class="btn btn-info" style="margin-left: 3px; margin-top: 3px;" onclick="colocaBotonesEnContenedorPreguntasYSeleccionaNivel()"> Nivel '+ i + ' </button> ');
        }
    }
    
    function comprobarRespuesta(value){
       // document.write(preguntas[iz][der]);
        if(value === preguntas[0][5]){// hay que hacerlo con el doble igual porque como son tipos diferntes, auqnue la palabra sea la misma dará mal
            $('#botonIngles').hide();
        }
    }
    function colocaBotonesEnContenedorPreguntasYSeleccionaNivel(id){
                //ajusto las preguntas al resto de la pantalla y elimino los niveles para mayor visibilidad
                $('#contenedorNiveles').hide();
        
                $('#contenedorPreguntas').removeClass('col-md-3').addClass('col-md-6').css({ 'width': '100%'}).fadeIn("slow"); 
                
                //coloco los botones de las preguntas
                for(var i = 0; i<5; i++){
                    if(i === 0){
                        $('#contenedorPreguntas').append('<input type="button" id="Pregunta" class="btn btn-info btn-block" value="'+ preguntas[0][0] +'" style="margin-top: 56px;"></button> ');
                    }else{
                        $('#contenedorPreguntas').append('<input type="button" id="respuesta'+i+'" class="btn btn-warning btn-block" value="'+ preguntas[0][i] +'" onclick="comprobarRespuesta(this.value)"> </button> ');

                    }
        }
    }
    

        </script>
    </body>
</html>