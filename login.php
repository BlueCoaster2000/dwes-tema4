<?php
session_start();
//Si el usuario está logeado no lo dejamos entrar.
if (isset( $_SESSION['usuario'] ) ){
    exit();
}
require 'lib/gestionUsuarios.php';
$logeado = false;
if($_POST){
    $res = loginUsuario($_POST['usuario'],$_POST['clave']);
    if ($res == true){
        $error ="<h1>Usuario Logeado correctamente </h1>"."<br/>". '<a href="./index.php">Click aquí para ir al inicio</a>';
        header('location: index.php');
        $logeado = true;
        $_SESSION['usuario'] = $_POST['usuario'];
    }else{
        $logeado = false;
    $error="Error el usuario o contraseña es incorrecto";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de autenticación</title>
    <link rel="stylesheet" href="style.css">
    
    
</head>
<body>
    <header>
        <h1>Sistema de autenticación</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="pagina_publica.php">Página pública</a></li>
            <li><strong>Iniciar sesión</strong></li>
            <li><a href='registro.php'>Regístrate</a></li>
        </ul>
    </nav>

    <main>
        <h1>Inicia sesión</h1>

    <?php 
        if($logeado==true){
            echo "<h1>$error</h1>";
            }else{
                echo <<<END
                    <form action="login.php" method="post">
                    <p>
                        <label for="usuario">Nombre de usuario</label><br>
                        <input type="text" name="usuario" id="usuario">
                    </p>
                    <p>
                        <label for="clave">Contraseña</label><br>
                        <input type="password" name="clave" id="clave">
                    </p>
                END;
               if(!empty($error)){
                 echo"<p>$error</p>";
               } 
                echo <<<END
           
            <p>
                <input type="submit" value="Inicia sesión">
            </p>
        </form>
        END;
        }
     ?>
           
    </main>

    <footer>
        <small>&copy; sitio web</small>
    </footer>
</body>
</html>
