<?php
session_start();
         define("host", "localhost");
         define("usuario", "root");
         define("contrasena", "");
         define("bbdd", "trivial");
        
?>

<?php
        $creaConexion = new mysqli(host, usuario, contrasena, bbdd);
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
             $arrayPreguntas = array(); //creamos un array
             $i=0;

    while($row = mysqli_fetch_array($preguntas)){
    
        $arrayPreguntas[$i] = $row;
        $i++;
    }
    
//    print_r($arrayPreguntas);
        }
//}
        ?>

<?PHP
//echo json_encode($arrayPreguntas);
$_SESSION['preguntasAJS'] = $arrayPreguntas;
//$_POST['preguntasAJS'] = $arrayPreguntas;
//echo $_SESSION['preguntasAJS'][1][1];
?>

