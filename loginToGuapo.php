<?php
session_start(); // iniciamos sesion

         define("host", "localhost");
         define("usuario", "root");
         define("contrasena", "");
         define("bbdd", "trivial");
         
         $creaConexion = new mysqli(host, usuario, contrasena, bbdd);
         if($creaConexion->errno >0){
            die("No ha sido posible conectarse a la base de datos [". $creaConexion->connect_error. "]");
         }
         
         $nombreUsuarioLogin = $_POST["nombreUsuario"];
         $contrasenaLogin = $_POST["contrasena"];
//COMPROBAR SI LA MIERDA DEL SESSION ESTA BIEN
//para pasar la variable a todos los sitios (global)
//$_SESSION["nombreUsuario"] = $_POST[$nombreUsuarioLogin];
         
         $queryCompruebaNombre = mysqli_query($creaConexion, "SELECT * FROM usuarios WHERE nombre = '$nombreUsuarioLogin'") ;
         // coge la contraseña de verdad para más tarde compararla con la puesta y ver si esta bien
         $querySeleccionaContrasena = mysqli_query($creaConexion,"SELECT contrasena FROM usuarios WHERE contrasena ='$contrasenaLogin'");
         $arrayCompruebaNombre = mysqli_fetch_all($queryCompruebaNombre);
         $numeroVecesNombreUsuarioLogin=mysqli_num_rows($queryCompruebaNombre);
         
         if($numeroVecesNombreUsuarioLogin > 0){
             if( $contrasenaLogin = mysqli_fetch_assoc($querySeleccionaContrasena)){
                 
                 $id= $arrayCompruebaNombre[0][0];
                 echo "<script>location.href='Pagina2.php?usuario=$nombreUsuarioLogin&id=$id'</script>";
                  
             }else{
                  echo ' <script language="javascript">alert("Contraseña incorrecta");</script> ';
             }
         }else{
             echo ' <script language="javascript">alert("Usuario no registrado");</script> ';
         }
?>


