window.onload = () => {
    const verCarrito = document.querySelector("#vercarrito");
verCarrito.addEventListener("click", () => {
    const productos = localStorage.getItem("carrito");
    const arrayProductos = productos.split("&");
    let html = "";
    arrayProductos.forEach(producto => {
        const productoJSON = JSON.parse(producto);
        const id = productoJSON.idProducto;
        const cantidad = productoJSON.cantidad;
        html += `
                <div class="centrar fondo">
                    <h2>${id}</h2>
                    <img></img>
                    <small>Cantidad: ${cantidad}</small>
                </div>
                `
    })
    const contenedor = document.querySelector("#producto-carrito");
    contenedor.innerHTML = html;
}); 
}