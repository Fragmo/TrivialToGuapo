<?php
session_start();
         define("host", "localhost");
         define("usuario", "root");
         define("contrasena", "");
         define("bbdd", "trivial");
        
?>

<?php
        $creaConexion = new mysqli(host, usuario, contrasena, bbdd);
        $codificacion = $creaConexion ->query("SET NAMES 'utf8'");
        if($creaConexion->errno >0){
            die("No ha sido posible conectarse a la base de datos [". $creaConexion->connect_error. "]");
        }
?>

<?php
//function cogePreguntas(){
    

$cogeArrayPreguntas = "SELECT * FROM preguntas";

$preguntas = $creaConexion->query($cogeArrayPreguntas);
        if($creaConexion->errno){
            die("<p>no ha sido posible realizar la consulta y coger el array de preguntas [". $creaConexion->error ."] </p>");            
        
        }
        
        else{

                $preguntasAArray = mysqli_fetch_all($preguntas);
//                $preguntasToString = serialize($preguntasAArray); 
//                $preguntasEscapadas = mysqli_real_escape_string($creaConexion,$preguntasToString);
//                $preguntasLashes =  addslashes($preguntasEscapadas);
//                print_r($preguntasLashes);
                
                
                       // print_r($preguntas);
      //  $preguntasToString = serialize($preguntas);
       // $preguntasConBarras = addslashes($preguntasToString);
        //print_r($preguntasConBarras);
//        $implodeDelLosCojones = implode(",", $preguntas);
      //  print_r($implodeDelLosCojones);
        //$preguntasFiltradas = htmlspecialchars($preguntasToString);
       // print_r("dddd" . $preguntasToString . "aaaa");
        //print_r($preguntasFiltradas);
//       print_r($preguntas);
            }
            $jsonPreguntas = json_encode($preguntasAArray);
            print_r($jsonPreguntas);
        ?>

<?PHP
$_SESSION['preguntasAJS'] = $preguntasAArray;

?>

