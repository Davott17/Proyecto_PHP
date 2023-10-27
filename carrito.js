window.onload = () => {
var boton = document.querySelectorAll(".carrito");
for( var i = 0; i< boton.length;i++){
    var carrito = boton[i];
    carrito.addEventListener('click', (idUsuario = false) => {
    let idProducto = carrito.getAttribute("data-id-producto");
    if (idUsuario == false) {
        if (localStorage.getItem("carrito") == null) {
            localStorage.setItem("carrito", JSON.stringify({
                idProducto: idProducto,
                cantidad: 1
            }));

            
        } else {

            const carritoJSON = JSON.parse(localStorage.getItem("carrito"));
            const productos = carrito.split("&");
            let existe = false;
            let texto = "";
            //Para cada producto
            for (let i = 0; i < productos.length; i++) {
                //Compruebo si existe el producto
                productos = JSON.parse(productos[i]);
                if (productos.idProducto == idProducto) {
                    // si existe sumo 1 y cambio la variable de cantidad
                    existe = true;
                    productos[i].contidad += 1;
                }
                texto += JSON.stringify(productos)+"&";
                
                
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
        fetch(`agregarProducto.php?id=${idProducto}`)
        .then(respuesta => {
            return respuesta.json();
        })
        .then(respuestaJSON => {
            if(respuestaJSON.ok){
                alert("Bien");
            }else{
                alert("Mal");
            }
        })
        alert(1);
    }

});
}

}