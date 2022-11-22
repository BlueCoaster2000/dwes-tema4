<?php
session_start();

//Si el usuario está logeado no lo dejamos entrar.
if (isset( $_SESSION['usuario'] ) ){
    header('location: index.php');
    exit();
}
require 'lib/gestionUsuarios.php';

if ($_POST){
    $errores = registroUsuario(
        isset($_POST['usuario'])?$_POST['usuario']:'',
        isset($_POST['clave'])?$_POST['clave']:'',
        isset($_POST['repite_clave'])?$_POST['repite_clave']:''
    );
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro de usuarios</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <?php /*
    if ($_POST && empty($errores)){
        echo"<h1>Usuario registrado con exito</h1>";
        echo"<a href='./login.php'>Click aquí para ir al login</a>";
        exit();
    }*/
    ?>
    
    <header>
        <h1>Sistema de autenticación</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="pagina_publica.php">Página pública</a></li>
            <li><a href='login.php'>Iniciar sesión</a></li>
            <li><strong>Regístrate</strong></li>
        </ul>
    </nav>

    <main>
        <h1>Regístrate</h1>
        <?php if(!$_POST || (isset($errores) )){ ?>
        <form action="registro.php" method="post">
            <p>
                <label for="usuario">Nombre de usuario</label><br>
                <input type="text" name="usuario" id="usuario"
                 value="<?php 
                 if($_POST && isset( $_POST['usuario'] ) ){
                    echo $_POST['usuario'];
                }else{
                     echo '';

                 }?>">
                <?php 
      
                    if (isset( $errores['usuario'] ) ){
                        echo "<br/>".$errores['usuario'];
                    }
                
                
                ?>
            </p>
            <p>
                <label for="clave">Contraseña</label><br>
                <input type="password" name="clave" id="clave">
               
            </p>
            <p>
                <label for="repite_clave">Repite la contraseña</label><br>
                <input type="password" name="repite_clave" id="repite_clave">
                
                <?php 
                   
                    if (isset( $errores['clave'] ) ){
                        echo "<br/>".$errores['clave'];
                    }
                    
                
                ?>
                
            </p>
            <p>
                <input type="submit" value="Registrarse">
            </p>
        </form>
        <?php } else{
         echo"<h1>Usuario registrado con exito</h1>";
         echo"<a href='./login.php'>Click aquí para ir al login</a>";
        }    
        ?>
    </main>

    <footer>
        <small>&copy; sitio web</small>
    </footer>
</body>
</html>
