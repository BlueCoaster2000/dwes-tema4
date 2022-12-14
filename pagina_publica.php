<?php
session_start();
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
            <li><strong>Página pública</strong></li>
            <?php
                if(!isset($_SESSION['usuario'])){
                    echo<<< END
                    <li><a href='registro.php'>Regístrate</a></li>
                    <li><a href='login.php'>Iniciar sesión</a></li>
                    
                    END;
                }else{
                    echo <<<END
                    <li><a href='privado/pagina_privada.php'>Página privada</a></li>
                    <li><a href='privado/logout.php'>Cerrar sesión ()</a></li>
                    END;
                }
                ?>
        </ul>
    </nav>

    <main>
        <section>
            <article>
                <h1>Página pública</h1>
                <p>
                    Esta es la página pública, aquí puede acceder todo el mundo, estén o 
                    registrados y hayan o no iniciado sesión.
                </p>
            </article>
        </section>
    </main>

    <footer>
        <small>&copy; sitio web</small>
    </footer>
</body>
</html>
