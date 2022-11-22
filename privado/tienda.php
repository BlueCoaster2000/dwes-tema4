<?php
require 'modelo.php';
session_start();



if ($_POST) {
    
    $productoname=htmlentities( trim( $_POST['producto'] ) );
    $cantidad=(int)htmlentities( trim( $_POST['cantidad'] ) );
    
    if (isset($_SESSION['carrito'][$productoname])){
        
        $_SESSION['carrito'][$productoname]+=$cantidad;
        
    } else {
        
        $_SESSION['carrito'][$productoname] = $cantidad;
    }
}




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
            <h1>Tu Carro</h1>
        </header>
        
        <nav>
            <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../pagina_publica.php">Página pública</a></li>
            <li><strong>Tienda</strong></li>
            <li><a href="carrito.php">Carrito(<?php if(isset($_SESSION['carrito'])){$total = array_sum($_SESSION['carrito']); echo $total;}else{echo "0";}?>)</a></li>
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
                <form action="" method="post">
                    <p>
                        <label for="producto">Elige un producto</label>
                        <select name="producto" id="producto">
                            <?php
                        foreach ($productos as $producto) {
                            echo "<option value='{$producto['id']}'>{$producto['valor']}</option>";
                        }
                        ?>
                    </select>
                </p>
                <p>
                    <label for="cantidad">Elige la cantidad</label>
                    <input type="number" name="cantidad" id="cantidad">
                </p>
                <p>
                    <input type="submit" value="Añadir al carrito">
                </p>
            </form>
        </section>
        <?php
        
        ?>
    </main>

    <footer>
        <small><em>&copy; El SuperCarrito de la compra</em></small>
    </footer>
</body>

</html>