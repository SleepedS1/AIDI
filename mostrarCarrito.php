<?php
include 'global/config.php';
include 'Carrito.php';
include './templates/Cabezera.php';
?>

<br>
<h3><span class="co">Lista del Carrito</span></h3>
<?php if(!empty($_SESSION['CARRITO'])){ ?>
<table class="table table-dark table-bordered">
    <tbody>
        <tr>
            <th width="40%">Descripcion</th>
            <th width="15%" class="text-center">Cantidad</th>
            <th width="20%" class="text-center">Precio</th>
            <th width="20%" class="text-center">Total</th>
            <th width="5%" class="text-center">--</th>
        </tr>

        <?php $total=0; ?>

        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){ ?>
            
            <tr>
                <td width="40%"><?php echo $producto['NOMBRE'] ?></td>
                <td width="15%" class="text-center"><?php echo $producto['CANTIDAD'] ?></td>
                <td width="20%" class="text-center"><?php echo number_format($producto['PRECIO']) ?></td>
                <td width="20%" class="text-center"><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2);?></td>
                <td width="5%">

                <form action="" method="post"> 

                    <input type="hidden" 
                    name="id" 
                    id="id" 
                    value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">

                    <button class="btn btn-danger" type="submit" name="btnAccion"
                    value="Eliminar"
                    >Eliminar</button>
                </form>
            </tr>
            
        <?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']); ?>

        <?php } ?>
        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="right"><h3>$<?php echo number_format($total); ?></h3></td>
            <td></td>
        </tr>

        <tr>    
            <td colspan="5">
                <form method="post" action="Pagar.php">
                    <div class="alert alert-success" role="alert">
                        <div class="form-group div-dark">
                            <label for="my-input">Correo de Contacto:</label>
                            <input id="email" name="email" class="form-control" type="email" 
                            placeholder="Por favor escribe tu correo" required>
                        </div>  
                        <small id="emailHelp" class="form-text text-muted">Los productos se enviarán a este correo</small>
                    </div>
                    <button 
                        name="btnAccion" 
                        class="btn btn-primary btn-lg btn-block btn-dark"    
                        type="submit"   
                        value="proceder">
                            Proceder a Pagar >>
                    </button>
                </form>
            </td>
        </tr>
    </tbody>
</table>
<?php }else{ ?>
        <div class="alert alert-success" role="alert">
            No hay productos dentro del carrito...
        </div>
<?php } ?>
<?php
include 'templates/Pie.php'
?>