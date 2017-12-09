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
$idCliente = $_GET['id'];
$consultaNiveles = "SELECT COUNT(*) FROM nivelespasados where $tema = '$tema' and idCliente = $idCliente";
$ejecutaNiveles = $creaConexion->query($consultaNiveles);
$arrayNiveles = mysqli_fetch_all($ejecutaNiveles);
$totalNivelesPasados = $arrayNiveles[0][0];
echo $totalNivelesPasados;

