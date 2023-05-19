<?php
    include 'global/config.php';
    include 'global/conexion.php';
    include 'Carrito.php';
    include 'templates/Cabezera.php';
?>
    <style>
        .banner{
            width: 50vw;
            height: 345px;
            animation: girar 30s linear infinite;
            background-size: 100% 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
        }   


        @keyframes girar{
            0%, 10%{
                background-image: url(https://s10.gifyu.com/images/Diseno-sin-tituloda3f0dbdea02b2bc.gif); 
            }
            15%, 35%{
                background-image: url(https://s2.gifyu.com/images/Asus.gif); 
            }
            40%, 75%{
                background-image: url(https://s10.gifyu.com/images/lapropia.gif); 
            }
            80%, 100%{
                background-image: url(https://s2.gifyu.com/images/as485059846c596753.gif); 
            } 
        }
    </style>
    <div class="banner">

    </div>

        <br><br>
        <?php if ($mensaje!="") { ?>

            <div class="alert alert-success" role="alert">
                <?php echo($mensaje); ?>
                <a href="http://localhost/AIDI%20Tech.php/mostrarCarrito.php" class="badge badge-success">Ver Carrito</a>
            </div>

        <?php  } ?>

        <div class="row">
            <?php
                $sentencia = $pdo->prepare("SELECT * FROM `tblproductos`");
                $sentencia->execute();
                $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                // print_r($listaProductos);
            ?>
            <br><br>
            <?php foreach ($listaProductos as $producto) { ?>
                <div class="col-3">
                    <div class="item">
                        <div class="card">
                            <img title="<?php echo $producto['Nombre']; ?>" alt="Titulo" class="card-img-top" src="<?php echo $producto['Imagen']; ?>" data-toggle="popover" data-trigger="hover" data-content="<?php echo $producto['Descripcion']; ?>"
                            height="180px">
                            <div class="card-body">
                                <span><?php echo $producto['Nombre']; ?></span>
                                <h5 class="card-title">$<?php echo number_format($producto['Precio']); ?> COP</h5>
                                <p class="card-text">Descripcion</p>

                                <form method="post" action="">
                                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
                                    <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Nombre'],COD,KEY); ?>">
                                    <input type="hidden" name="precio" id="precio" value="<?php echo  openssl_encrypt($producto['Precio'],COD,KEY); ?>">
                                    <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY); ?>">
                                    <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al Carrito</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        })
    </script>
    <br>
<?php
include 'templates/Pie.php'
?>