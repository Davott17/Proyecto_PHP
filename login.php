<?php
session_start();
$usuario = $_POST['usuario'];
$pass = $_POST['pass'];
require_once("modelo.php");
$conexion = new conexionBBDD("127.0.0.1:3307", "root", "", "tienda");
$datos = $conexion->obtenerDatos("SELECT * FROM usuario where Nombre='$usuario' and Contraseña=$pass");
if($datos->num_rows<1){
    echo"Erro: El usuario y la contraseña no coinciden";
}else{
    $usuario= $conexion->convertirDatos($datos);
    $_SESSION["id"]= $usuario[0]->id;
    $_SESSION["Nombre"]= $usuario[0]->Nombre;
    $_SESSION["rol"]= $usuario[0]->rol;
}
?>
Te has logeado bien<a href="/">volver al inicio</a>