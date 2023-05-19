<?php
session_start();

$mensaje="";

if(isset($_POST['btnAccion'])){
    switch($_POST['btnAccion']){
        case 'Agregar':
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                $mensaje.="ID: ".$ID."<br/>";
            }else{
                $mensaje.="ID Incorrecto: ".$ID."<br/>";
            }
            if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
                $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
                $mensaje.="Nombre: ".$NOMBRE." ";
            }else{
                $mensaje.="Nombre Incorrecto"."<br/>";break;
            }
            if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
                $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
                $mensaje.="(".$CANTIDAD.")"."<br/>";
            }else{
                $mensaje.="Cantidad Incorrecto"."<br/>";break;
            }
            if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
                $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
                $mensaje.="Precio: ".$PRECIO."<br/>";
            }else{
                $mensaje.="Precio Incorrecto"."<br/>";break;
            }

            if(!isset($_SESSION['CARRITO'])){
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );
                $_SESSION['CARRITO'][0]=$producto;
                $mensaje= "Producto Agregado al Carrito";

            }else{

                $idProductos=array_column($_SESSION['CARRITO'],"ID");
                if (in_array($ID,$idProductos)) {
                    echo "<script>alert('El producto ya ha siso seleccionado')</script>";

                }else{
                    $numeroProductos=count($_SESSION['CARRITO']);
                    $producto=array(
                        'ID'=>$ID,
                        'NOMBRE'=>$NOMBRE,
                        'CANTIDAD'=>$CANTIDAD,
                        'PRECIO'=>$PRECIO
                    );
                    $_SESSION['CARRITO'][$numeroProductos]=$producto;
                    $mensaje= "Producto Agregado al Carrito";
                }
            }
            // $mensaje=print_r($_SESSION,true);
        break;
        case 'Eliminar':
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);

                foreach ($_SESSION['CARRITO'] as $indice=>$producto) {
                    if ($producto['ID']==$ID) {
                        unset($_SESSION['CARRITO'][$indice]);
                        // echo "<script>alert('Elemento Borrado...');</script>";
                    }
                }

            }
        break;
    }     
}
?>