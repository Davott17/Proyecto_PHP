<?php
session_start();
require_once("modelo.php");
$camiseta = new conexionBBDD("127.0.0.1:3307", "root", "", "tienda");
$datos = $camiseta->obtenerDatos("SELECT * FROM camisetas");
$camisetas = $camiseta->convertirDatos($datos);

for ($i = 0; $i < count($camisetas); $i++) {
}


?>
<script>
    const meterAlCarrito = (idProducto, idUsuario = false) => {
        if (idUsuario == false) {
            if (localStorage.getItem("carrito") == null) {
                localStorage.setItem("carrito", JSON.stringify({
                    idProducto: idProducto,
                    cantidad: 1
                }));


            } else {

                const carritoJSON = JSON.parse(localStorage.getItem("carrito"));
                const productos = carrito.split("&")
                let existe = false;
                let texto = "";
                for (let i = 0; i < productos.length; i++) {
                    producto = JSON.parse(productos[i]);
                    if (producto.idProducto == idProducto) {
                        existe = true;
                        productos[i].contidad += 1;
                    }
                    texto += JSON.stringify(producto)+"&";
                    
                    
                }
                if (!existe) {
                    const productoNuevo = JSON.stringify({
                        idProducto: idProducto,
                        cantidad: 1
                    });
                    localStorage.setItem("carrito", localStorage.getItem("carrito" + "&" + productoNuevo));

                }else{
                    texto = texto.substr(0,texto.length-1);
                    localStorage.setItem("carrito",texto);
                }
            }
        }else{
            fetch(`agregarProducto`);
        }
    }
</script>