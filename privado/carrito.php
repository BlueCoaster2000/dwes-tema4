<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de la compra</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <header>
        <h1>SuperCarrito Shop</h1>
    </header>

    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="/privado/tienda.php">Tienda</a></li>
            <li><a href="../pagina_publica.php">Página pública</a></li>
            <li><strong>Carrito (<?php if(isset($_SESSION['carrito'])){$total = array_sum($_SESSION['carrito']); echo $total;}else{echo "0";}?>)</strong></li>
            <?php
                if(!isset($_SESSION['usuario'])){
                    echo<<< END
                    <li><a href='../registro.php'>Regístrate</a></li>
                    <li><a href='../login.php'>Iniciar sesión</a></li>
                    
                    END;
                }else{
                    echo <<<END
                    <li><a href='pagina_privada.php'>Página privada</a></li>
                    <li><a href='logout.php'>Cerrar sesión ()</a></li>
                    END;
                }
                ?>
        </ul>
    </nav>

    <main>
        <section>
            <h1>Cesta de la compra</h1>
            
            <?php
            if (empty( $_SESSION['carrito'] ) ){
                echo "<p>No hay productos en el carrito de la compra</p>";
            }else{
                if (isset( $_SESSION['carrito']['pan'] ) ){
                    $pan = $_SESSION['carrito']['pan'];
                    echo"<p>Pan: $pan </p>";
                    
                }
                if( isset( $_SESSION['carrito']['aceite']  )){
                    $aceite = $_SESSION['carrito']['aceite'];
                    echo"<p>Aceite: $aceite </p>";
                    
                }
                if( isset( $_SESSION['carrito']['platano']  )){
                    $platano = $_SESSION['carrito']['platano'];
                    echo"<p>Platano: $platano </p>";
                    
                }
                if( isset( $_SESSION['carrito']['arroz']  )){
                    $arroz = $_SESSION['carrito']['arroz'];
                    echo"<p>Aceite: $arroz </p>";
                    
                }
            
            }

            ?>
        </section>
    </main>

    <footer>
        <small><em>&copy; El SuperCarrito de la compra</em></small>
    </footer>
</body>
</html>
