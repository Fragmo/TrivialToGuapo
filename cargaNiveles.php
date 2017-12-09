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
$tema = $_GET['tema'];
$consultaNiveles = "SELECT COUNT(*) FROM nivelespasados where $tema = '$tema'";
$ejecutaNiveles = $creaConexion->query($consultaNiveles);
$arrayNiveles = mysqli_fetch_all($ejecutaNiveles);
$totalNivelesPasados = $arrayNiveles[0][0];
echo $totalNivelesPasados;

