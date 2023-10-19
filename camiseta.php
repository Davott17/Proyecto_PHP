<?=
require_once("modelo.php");
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $camiseta = new conexionBBDD("127.0.0.1:3307","root","","tienda");
    $datos = $camiseta->obtenerDatos("SELECT * FROM camisetas WHERE id='$id'");
    $camisetas = $camiseta->convertirDatos($datos);
    if(count($camisetas)){
        $nombre = $camisetas[0]->titulo;
        $descripcion = $camisetas[0]->descripcion;
        $precio = $camisetas[0]->precio;
        $URL = $camisetas[0]->url;
    }else{
        echo "No se encuentra el producto";
    }
}else{
    echo "ERROR";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="funciones.js"></script>
</head>

<body>
    <header >
        <div class="centrar plantilla tres arriba">
            <div>
                <img src="img/logo.png" alt="logo">
            </div>
            <div>
                <h1>Custom Print</h1>
            </div>
            <div class=" plantilla mitad centrar espacio">
                <div>
                    <button class="boton" id="boton-login">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </button>
                </div>
                <div>
                    <button class="boton" id="boton-registro">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                            class="bi bi-person-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                            <path
                                d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        </div>
        <div class="izq">
            <button id="buscar">
                <svg xmlns="http://www.w3.org/2000/svg" width="16.5" height="16.5" fill="currentColor"
                    class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </button>
            <input type="search">

    </header>
    <main class="plantilla mitad altura1 centrar">
        <div class="centrar">
            <div class="svg">
                <a href="index.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5ZM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5Z" />
                    </svg>
                </a>
            </div>
            <article>
                <img class="tamaño" src="<?=$URL?>" alt="">
            </article>
        </div>
        <div class="left  longitud">

            <h2><?=$nombre?></h2>
            <div class="plantilla mitad borde-abajo ">
                <p class="precio"><?=$precio?></p>
                <div>
                    <p>Opiniones</p>

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-star" viewBox="0 0 16 16">
                        <path
                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-star" viewBox="0 0 16 16">
                        <path
                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                    </svg>
                    3.0
                </div>
            </div>
            <div class="plantilla decimos margen ">
                <div class="colores rojo">
                    <button class="redondo rojob"> </button>
                </div>
                <div class="colores rojo">
                    <button class="redondo verdeb"> </button>
                </div>
                <div class="colores rojo">
                    <button class="redondo azulb"> </button>
                </div>
                <div class="colores rojo">
                    <button class="redondo amarillob"> </button>
                </div>
                <div class="colores rojo">
                    <button class="redondo orangeb"> </button>
                </div>
                <div class="colores rojo">
                    <button class="redondo violet"> </button>
                </div>
                <div class="colores rojo">
                    <button class="redondo black"> </button>
                </div>
                <div class="colores rojo">
                    <button class="redondo darkslategrey"> </button>
                </div>
                <div class="colores rojo">
                    <button class="redondo pink"> </button>
                </div>
                <div class="colores rojo">
                    <button class="redondo olivedrab"> </button>
                </div>


            </div>

            <div class=" plantilla  sextos">
                <div class="botones">
                    <button class="talla">XS</button>
                </div>
                <div class="botones">
                    <button class="talla">S</button>
                </div>
                <div class="botones">
                    <button class="talla">M</button>
                </div>
                <div class="botones">
                    <button class="talla">L</button>
                </div>
                <div class="botones">
                    <button class="talla">XL</button>
                </div>
                <div class="botones">
                    <button class="talla">XXL</button>
                </div>
            </div>
            <div class=" centrar">
                <button class="boton borde mitad plantilla">
                    <p>Añadir al carrito</p>
                </button>
            </div>
            <div class="bordeArriba">
                <h2>Acerca de este producto</h2>
                <ul>
                    <li><?=$descripcion?></li>
                    <li>18STRW00159A-001</li>
                    <li>Color solido: 100% Algodon; Gris: 90% Algodon, 10% Poliester; otros colores: 50% Algodon, 50%
                        Poliester</li>
                    <li>Cierre: Pull on</li>
                    <li>Lavar a máquina</li>
                    <li>Manga corta</li>
                    <li>Moderna</li>
                    <li>Ligero, Encaje clasico, Manga de doble puntada y bastilla baja</li>
                </ul>
            </div>
        </div>
    </main>

    <footer>
        <div class="plantilla centrar once borde-arriba">
            <a href="" class="padd">Quienes somos</a>
            <a href="" class="padd">Contacto</a>
            <a href="" class="padd">...</a>
            <a href="" class="padd">...</a>
            <a href="" class="padd">...</a>
            <a href="" class="padd">...</a>
            <a href="" class="padd">...</a>
            <a href="" class="padd">...</a>
            <a href="" class="padd">...</a>
            <a href="" class="padd">...</a>
            <a href="" class="padd">...</a>
        </div>
    </footer>
    <div id="login" class="oculto">
        <div class="modal">
            <form>
                <label>Usuario</label>
                <input class="input" type="text">
                <label>Contraseña</label>
                <input class="input" type="password">
                <button class="boton centrar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                        class="bi bi-send-plus-fill" viewBox="0 0 16 16">
                        <path
                            d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47L15.964.686Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                        <path
                            d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                    </svg>
                </button>
            </form>
        </div>
        <div class="fondo"></div>
    </div>
    <div id="registro" class="oculto">
        <div class="modal">
            <form>
                <label>Nombre</label>
                <input class="input" type="text">
                <label>Apellidos</label>
                <input class="input" type="text">
                <label>Correo</label>
                <input class="input" type="password">
                <label>DNI</label>
                <input class="input" type="text">
                <label>Telefono</label>
                <input class="input" type="password">
                <label>Dirección</label>
                <input class="input" type="text">
                <label>Contraseña</label>
                <input class="input" type="password">
                <button class="boton ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                        class="bi bi-send-plus-fill" viewBox="0 0 16 16">
                        <path
                            d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47L15.964.686Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                        <path
                            d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                    </svg>
                </button>
            </form>
        </div>
        <div class="fondo"></div>
    </div>
</body>

</html>