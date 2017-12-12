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
$id = $_GET['id'];
$tema = $_GET['tema'];
$consultaSQL = "INSERT INTO nivelespasados (idCliente, $tema) VALUES ($id,'$tema')"; 
print_r($consultaSQL);
$ejecutaConsulta = $creaConexion->query($consultaSQL);
        if($creaConexion->errno >0){
            die("No ha sido posible realizar la consulta [". $creaConexion->connect_error. "]");
        }
echo "<script>location.href='index.php'</script>";
?>

