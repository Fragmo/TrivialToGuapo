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
$usuarioNivel = $_GET['usuario'] ;
$contrasenaNivel = $_GET['contrasena'];
$tema = $_GET['tema'];
$consultaSQL = "INSERT INTO nivelespasados (idCliente, $tema) VALUES ($id,'$tema')"; 
print_r($consultaSQL);
$ejecutaConsulta = $creaConexion->query($consultaSQL);
        if($creaConexion->errno >0){
            die("No ha sido posible realizar la consulta [". $creaConexion->connect_error. "]");
        }
       // echo $usuarioNivel.'  '. $contrasenaNivel;
echo "<script>location.href='loginToGuapo.php?pasasteNivel=true&id=$id&usuario=$usuarioNivel&contrasena=$contrasenaNivel'</script>";
?>

