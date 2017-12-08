
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
 <!--la url DEL BODY BACKGROUND esta bien pero he puesto la BARRA EN MEDIO PARA QUE NO VAYA Y TRABAJAR MIENTRAS SIN ELLO-->
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
//        require ('phpPagina2.php');
//        //session_start();
//        $preguntas = ($_SESSION['preguntasAJS']);

        
        ?>

        <div class="container " id="containerTrivial">
            <div class="row">
                <div class="col-md-3" ></div>
                <div class="col-md-6" ><h1 class="text-center cambiaColorTexto">Trivial To Guapo!</h1></div>
                <div class="col-md-3" > <button name="botonNombreUsuario" class="btn btn-warning text-center"><b>Hola <?php echo $_GET['usuario']; ?></b></button>  <a href="index.php"><button id="botonSalirSesion" class="btn btn-primary pull-right">Salir</button></a></div>
            </div>
            
            <div class="row" style="margin-top: 10%;"> <!-- TIENE EL CONTENIDO BUENO CON LAS PREGUNTAS ETC-->
                <div class="col-md-3" id="espacioIz"> </div>
                <div class="col-md-6" > <!----------->
                    <h3 class="text-center"><b id="negritaTemas">Elige un tema!</b></h3>
                    <input  type="button" value="Historia" id="Historia" class="btn btn-success btn-block" name="botonHistoria" onclick="desplazaBotones(this.id)" />
                    <input type="button" value="Economia" id="Economia" class="btn btn-warning btn-block"name="botonEconomia" onclick="desplazaBotones(this.id)" />
                    <input type="button" value="Filosofía" id="Filosofia" class="btn btn-primary btn-block"  name="botonFilosofia" onclick="desplazaBotones(this.id)"/>
                    <input type="button" value="Lengua" id="Lengua" class="btn btn-info btn-block" name="botonLengua" onclick="desplazaBotones(this.id)"/>
                    <input type="button" value="Inglés" id="Ingles" class="btn btn-danger btn-block" name="botonIngles" onclick="desplazaBotones(this.id)"/>
                </div><!--colmd5-->
                <div class="col-md-3 text-center" id="espacioDer"> <!----------->
                    <div id="contenedorNiveles" class="col-md-3 btn-group " style=" width: 50%; height: 100%;"><!----------->
                        <h3 style="margin-top:70px;"><b>Selecciona un nivel;)</b></h3>
                        
                    </div> 
                    
                    <div id="contenedorPreguntas" class="col-md-3" style=" width: 50%; height: 100%;" ><!----------->
                        
                    </div>
                    
                </div><!--ESPACIODER-->
            </div><!--row-->
        </div><!--Container-->

        <script>
    var preguntasRepetidas = []; 
    var PreguntasTema = [];
    var puntuacion = 0;
    var numeroFallos = 0;
    var contador =0;
    var tema = "";
    $('#contenedorNiveles').hide();
    $('#contenedorPreguntas').hide();
    
//    var preguntas; ESTO FUNCIONA PERO NOSE COMO RELACIONAR PHP Y JAVASCRIPT
//    $('#'+ preguntas).load('phpPagina2.php');  
      
      var preguntas;
       
    
    

    //creacion de funciones
    function desplazaBotones(id){
        // igualo el tema para returnarlo desde el primer momento y tenerlo almacenado       
               tema = id;

                
                $('#espacioIz').hide();
                $('#containerTrivial').css({ 'float': 'left', 'margin-left' : '30px'});
                $('#espacioDer').removeClass('col-md-3').addClass('col-md-6');
                $('#contenedorNiveles').fadeIn("slow");
                $('#contenedorPreguntas').hide();
                // para que no se repita el texto
                $('#contenedorPreguntas').text('').unbind();
                // se le cambia el color porque en el desplazamiento se mueve a una zona mas oscura
                $('#negritaTemas').css({'color': 'white'});
           
                colocaBotonesEnEligeNivel();
                
        return tema;
    }
    
    
    function colocaBotonesEnEligeNivel (){
        
        if(contador <1 ){
        for(var i = 1; i<10; i++){
            if(i <=1){
               $('#contenedorNiveles').append('<button id="nivel'+i+'" class="btn btn-info" style="margin-left: 3px; margin-top: 3px;" onclick="ocutaNivelesMuestraPregunta()"> Nivel '+ i + ' </button> '); 
            }else{
                $('#contenedorNiveles').append('<button id="nivel'+i+'"   class="btn btn-info disabled  " style="margin-left: 3px; margin-top: 3px;"> Nivel <i class="fa fa-lock" aria-hidden="true"></i> </button> ');
            }
            
        }
        contador++;
      }
      poneBienTema();
      return contador;
    }
    function comprobarRespuesta( id){
        // este método comprueba la pregunta y pasa a la siguiente en caso de que la respuesta sea correcta
       var numeroPregunta = id; 

        if(numeroPregunta.charAt(numeroPregunta.length-1) === preguntas[numeroAleatorio][8]){
            preguntasRepetidas.push(numeroAleatorio); 
            if(numeroFallos === 0){
               puntuacion += 10; 
            }
            //$('#respuesta1,#respuesta2,#respuesta3,#respuesta4').removeAttr('onclick');
            $('#'+id+'').removeClass('btn-warning').addClass('btn-success');
            $('#'+id+'').fadeOut('slow');//efecto to guapo para decir que has acertado
            numeroFallos = 0;
            $('#'+id+'').fadeIn('slow', function (){
                                        $('#contenedorPreguntas').text('').unbind();
                                        // para que no se bugge
                                        ocutaNivelesMuestraPregunta();
            });
           
        }else{
            numeroFallos++;
            $('#'+id+'').removeClass('btn-warning').addClass('btn-danger');
            if(numeroFallos === 0){
            puntuacion -= 10;
        }
            $('#respuesta'+preguntas[numeroAleatorio][8] +'').removeClass('btn-warning').addClass('btn-success');
            
        }

    }
    function ocutaNivelesMuestraPregunta(){//poner id en el pasador de parametros??              
//               numeroRepetido();

                
                numeroAleatorio = Math.floor(Math.random() * PreguntasTema.length);
                 //ajusto las preguntas al resto de la pantalla y elimino los niveles para mayor visibilidad                
                $('#contenedorNiveles').hide();
        
                $('#contenedorPreguntas').removeClass('col-md-3').addClass('col-md-6').css({ 'width': '100%'}).fadeIn("slow"); 
                
                //coloco los botones de las preguntas
                $('#contenedorPreguntas').append('<h3 class="text-center"><b>Puntuación:'+ puntuacion +'</b></h3>');
                for(var i = 0; i<5; i++){
                    if(i === 0){
                        $('#contenedorPreguntas').append('<input type="button" id="Pregunta" class="btn btn-info btn-block" value="'+ PreguntasTema[numeroAleatorio][3] +'" style="margin-top: 11px;"></button> ');
                    }else{
                        $('#contenedorPreguntas').append('<input type="button" id="respuesta'+i+'" class="btn btn-warning btn-block" value="'+ PreguntasTema[numeroAleatorio][3+i] +'" onclick="comprobarRespuesta(this.id)"> </button> ');

                    }
        }
        //return numeroAleatorio;
    }
    
    
    
    function poneBienTema (){
    
            var posicion = 0;
        
        // mete en el array preguntas las preguntas correctas
        for (var i=0; i<preguntas.length; i++){
            if(preguntas[i][2] === tema){
                
                PreguntasTema[posicion] = preguntas[i];
                posicion++;
                
            }    
        }
        
        return PreguntasTema;
        
    }
    
//    function numeroRepetido() {
//    numeroAleatorio = Math.floor(Math.random() * preguntas.length);
//        if(preguntasRepetidas > 0){
//            for(var i = 0; i<preguntasRepetidas.length; i ++){
//                if(numeroAleatorio === preguntasRepetidas[i]){
//                        numeroRepetido();
//                }
//            }   
//    }    
//}
        </script>
    </body>
</html>