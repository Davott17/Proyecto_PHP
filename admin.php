<?php
    require_once("modelo.php");
    $conn = new conexionBBDD("127.0.0.1:3307", "root", "", "tienda");
    $datos = $conn->obtenerDatos("SELECT * FROM camisetas");
    $datos2 = $conn->obtenerDatos("SELECT * FROM usuarios");
    $camisetas = $conn->convertirDatos($datos);
    $usuarios = $conn->convertirDatos($datos2);




    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>

 <body>
     <?php
        //  session_start();
        //     if(isset($_SESSION['roll'] )&& $_SESSION['roll']==0){
        ?>
     <div>
         <form action=""></form>
     </div>
     <div>
         <table>
             <tr>
                 <th>
                     <p>ID</p>
                 </th>
                 <th>
                     <p>titulo</p>
                 </th>
                 <th>
                     <p>descripción</p>
                 </th>
                 <th>
                     <p>precio</p>
                 </th>
                 <th>
                     <p>url</p>
                 </th>
             </tr>
             <?php
                for ($i = 0; $i < count($camisetas); $i++) {
                    $id = $camisetas[$i]->Id;
                    $nombre = $camisetas[$i]->titulo;
                    $precio = $camisetas[$i]->precio;
                    $descripcion = $camisetas[$i]->descripcion;
                    $URL = $camisetas[$i]->url;

                ?>
                 <tr>
                     <td id="id"><?= $id ?></td>
                     <td id="titulo"><?= $nombre ?></td>
                     <td id="descripción"><?= $descripcion ?></td>
                     <td id="precio"><?= $precio ?></td>
                     <td id="url"><?= $URL ?></td>
                 </tr>
             <?php
                }
                ?>
         </table>
     </div>
     <div>
         <table>
             <tr>
                 <th>ID</th>
                 <th>Nombre</th>
                 <th>Apellido</th>
                 <th>Correo</th>
                 <th>DNI</th>
                 <th>Telefono</th>
                 <th>Direccion</th>
             </tr>
             <?php
                for ($i = 0; $i < count($usuarios); $i++) {
                    $id = $usuarios[$i]->Id;
                    $nombre = $usuarios[$i]->Nombre;
                    $apellido = $usuarios[$i]->Apellido;
                    $correo = $usuarios[$i]->Correo;
                    $DNI = $usuarios[$i]->DNI;
                    $telefono = $usuarios[$i]->Telefono;
                    $direc = $usuarios[$i]->Direccion;
                ?>
                 <tr>
                     <td id="idU"><?= $id ?></td>
                     <td id="Nombre"><?= $nombre ?></td>
                     <td id="Apellido"><?= $apellido ?></td>
                     <td id="Correo"><?= $correo ?></td>
                     <td id="DNI"><?= $DNI ?></td>
                     <td id="Telefono"><?= $telefono ?></td>
                     <td id="Drieccion"><?= $direc ?></td>
                 </tr>
             <?php
                }
                ?>
         </table>

     </div>
     <div>

     </div>
     <?php
        // }
        // else{
        ?>
     <!-- <h1>ERROR, LA PAIGNA NO EXISTE</h1> -->
     <?php
        // }
        ?>
 </body>

 </html>