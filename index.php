<?php
session_start();
require_once("modelo.php");
$camiseta = new conexionBBDD("127.0.0.1:3307", "root", "", "tienda");
$datos = $camiseta->obtenerDatos("SELECT * FROM camisetas");
$camisetas = $camiseta->convertirDatos($datos);
// var_dump($camisetas);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <script src="funciones.js"></script>
</head>

<body class="">
    <section class="layout">
        <header class="">
            <div class="centrar plantilla tres arriba">
                <div>
                    <img src="img/logo.png" alt="logo">
                </div>
               
                <div>
                    <h1>Custom Print</h1>
                    <nav class="plantilla tercios esp centrar ">
                        <a href="">Camisetas</a>
                        <a href="">Personaliza</a>
                        <a href="">Creaciones de la comunidad</a>
                    </nav>
                    <div class="izq">
                        <button id="buscar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                        <input type="search">
                </div>
                </div>
                <?php
                if (isset($_SESSION["id"])) { ?>
                    <div class="plantilla tercios centrar espacio">
                        <button class="boton" id="boton-login">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </button>
                        <button>Ajustes</button>
                        <a href="logout.php">logout</a>
                        <?php if ($_SESSION["rol"]= 1) { ?>
                            <button>Ajustes de usuarios</button>
                            
                        <?php } ?>
                        
                    </div>
                <?php } else { ?>
                    <div class="plantilla mitad centrar espacio">
                        <div>
                            <button class="boton" id="boton-login">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                            </button>
                        </div>
                        <div>
                            <div>
                                <button class="boton" id="boton-login"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                                        <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                                    </svg>
                                </button>
                            </div>

                    <?php } ?>
                    

        </header>
        <main>
            <div class="elementoDiv centrar">
                <h2 class="centrar margen elementoH">Ofertas</h2>
                <div class="plantilla tercios centrar cerca">
                    <?php

                    for ($i = 0; $i < count($camisetas); $i++) {
                        $id = $camisetas[$i]->Id;
                        $nombre = $camisetas[$i]->titulo;
                        $precio = $camisetas[$i]->precio;
                        $URL = $camisetas[$i]->url;

                    ?>

                        <article>
                            <div class="hover"><a href="camiseta.php?id=<?= $id ?>"><img src="<?= $URL ?>" alt="<?= $nombre ?>" class="tamaño"></a></div>
                            <div class="absoluto plantilla cuartos">
                                <button class="talla">S</button>
                                <button class="talla">M</button>
                                <button class="talla">L</button>
                                <button class="talla">XL</button>
                            </div>
                            <h3><?= $nombre ?></h3>
                            <div class="plantilla  centro mitad ">
                                <button class=" boton compra">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg>
                                </button>
                                <p><?= $precio ?>€</p>
                            </div>
                        </article>

                    <?php
                    }
                    ?>

                </div>
            </div>
            <div class="elementoDiv centrar">
                <h2 class="centrar margen elementoH">Novedad</h2>
                <div class="plantilla tercios centrar cerca">
                    <?php

                    for ($i = 0; $i < count($camisetas); $i++) {
                        $id = $camisetas[$i]->Id;
                        $nombre = $camisetas[$i]->titulo;
                        $precio = $camisetas[$i]->precio;
                        $URL = $camisetas[$i]->url;

                    ?>

                        <article>
                            <div class="hover"><a href="camiseta.php?id=<?= $id ?>"><img src="<?= $URL ?>" alt="<?= $nombre ?>" class="tamaño"></a></div>
                            <div class="absoluto plantilla cuartos">
                                <button class="talla">S</button>
                                <button class="talla">M</button>
                                <button class="talla">L</button>
                                <button class="talla">XL</button>
                            </div>
                            <h3><?= $nombre ?></h3>
                            <div class="plantilla  centro mitad ">
                                <button class=" boton compra">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg>
                                </button>
                                <p><?= $precio ?>€</p>
                            </div>
                        </article>

                    <?php
                    }
                    ?>
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
    </section>
    <div id="login" class="oculto">
        <div class="modal">
            <form action="login.php" method="post">
                <label>Usuario</label>
                <input class="input" type="text" name="usuario">
                <label>Contraseña</label>
                <input class="input" type="password" name="pass">
                <button class="boton centrar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-send-plus-fill" viewBox="0 0 16 16">
                        <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47L15.964.686Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                        <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                    </svg>
                </button>
            </form>
        </div>
        <div class="fondo"></div>
    </div>
    <div id="registro" class="oculto">
        <div class="modal">
            <form action="login.php" method="post">
                <label>Nombre</label>
                <input class="input" type="text">
                <label>Apellidos</label>
                <input class="input" type="text">
                <label>Correo</label>
                <input class="input" type="password">
                <label>DNI</label>
                <input class="input" type="text">
                <label>Teléfono</label>
                <input class="input" type="password">
                <label>Dirección</label>
                <input class="input" type="text">
                <label>Contraseña</label>
                <input class="input" type="password">
                <button class="boton ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-send-plus-fill" viewBox="0 0 16 16">
                        <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47L15.964.686Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                        <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                    </svg>
                </button>
            </form>
        </div>
        <div class="fondo"></div>
    </div>
</body>

</html>

<!-- 
    1- Maquetar todo a mano
    2- Conectar a base de datos
    3- Pintar 1 articulo desde la base de datos
    4- Hacer un for para pintar todos los articulos
 -->