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

<?php
                    // enlaza los campos rellenados con las variables de php
                    $nombreUsuario=$_POST['nombreUsuario'];
                    $correoElectronico=$_POST['correoElectronico'];
                    $contraseña= $_POST['contraseña'];
                    $confirmarContraseña=$_POST['confirmarContraseña'];
                    
                    //comprueba si esta repetido el email y el nombre de usuario
                    //email
                    $checkeaEmail=mysqli_query($creaConexion,"SELECT * FROM usuarios WHERE email='$correoElectronico'");
                    $numeroVecesEmail=mysqli_num_rows($checkeaEmail);
                    //nombre de usuario
                    $checkeaNombreUsuario=mysqli_query($creaConexion,"SELECT * FROM usuarios WHERE nombre='$nombreUsuario'");
                    $numeroVecesNombreUsuario=mysqli_num_rows($checkeaNombreUsuario);
                        
                        if( ($contraseña === $confirmarContraseña) && ($contraseña !=="") && ($confirmarContraseña !=="") ){
                            if( ($numeroVecesEmail >0) || ($numeroVecesNombreUsuario >0)){
                                if($numeroVecesEmail >0){ 
                                    echo '<script language="javascript">alert("El email ya ha sido registrado");</script>';
                                }else{
                                    echo '<script language="javascript">alert("El nombre de usuario    '.$nombreUsuario .'   ya esta creado");</script>';
                                }
                            }
                            
                        }else{
                            echo '<script language="javascript">alert("las contraseñas son incorrectas o no has rellenado los campos");</script>';
                        }
                    
                    
                    // insertar usuario en la bbdd
               //    $registraUsuario = "INSERT INTO usuarios (email, nombre, contraseña) VALUES ('$correoElectronico','$nombreUsuario','$contraseña')";
               //    $creaConexion->query($registraUsuario);
               //    if($creaConexion->errno){
               //         die("<p>no ha sido posible insertar datos en la tabla . $creaConexion->error");
               //    }

            
        
		
?>
        
        