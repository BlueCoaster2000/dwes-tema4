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
            <li><strong>Home</strong></li>
            <li><a href="pagina_publica.php">Página pública</a></li>
            <?php
            if( !isset($_SESSION['usuario'])){
                echo <<<END
                <li><a href='login.php'>Iniciar sesión</a></li>
                <li><a href='registro.php'>Regístrate</a></li>
                END;
            }else{
                echo <<<END
                <li><a href='privado/pagina_privada.php'>Página privada</a></li>
                <li><a href='privado/logout.php'>Cerrar sesión</a></li>
                <li><a href="/privado/tienda.php">Tienda</a></li>
                
                END;
            }
            ?>
            
        </ul>
    </nav>

    <main>
        <section>
            <article>
                <h1>Página inicial</h1>
                <p>
                    Esta es la página principal de la web de ejemplo con un sistema de autenticación
                    de usuarios con PHP.
                </p>
            </article>
        </section>
    </main>

    <footer>
        <small>&copy; sitio web</small>
    </footer>
</body>
</html>
