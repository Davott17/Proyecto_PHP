window.onload = () => {
    const login = document.querySelector("#login");
    const registro = document.querySelector("#registro");
    const botonLogin = document.querySelector("#boton-login");
    const botonRegistro = document.querySelector("#boton-registro");
    const fondoLogin = document.querySelector("#login .fondo");
    const fondoRegistro = document.querySelector("#registro .fondo");
    botonLogin.onclick = () => {
        login.classList.remove("oculto");
    }
    fondoLogin.onclick = () => {
        login.classList.add("oculto");
    }
    botonRegistro.onclick = () => {
        registro.classList.remove("oculto");
    }
    fondoRegistro.onclick = () => {
        registro.classList.add("oculto");
    }
} 