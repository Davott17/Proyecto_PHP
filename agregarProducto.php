<?php
session_start();
require_once("modelo.php");
$id_producto = $_GET["id"];
$id_usuario = $_SESSION["id"];

$camiseta = new conexionBBDD("127.0.0.1:3307", "root", "", "tienda");
$datos = $camiseta->obtenerDatos("INSERT INTO carrito(id_producto, id_usuario,cantidad) VALUES ($id_producto,$id_usuario,1)");