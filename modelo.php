<?php
class conexionBBDD{
    private $conn;
    function __construct($usuario, $contra,$servidor, $bbdd){
        $this->conn = new mysqli($usuario, $contra,$servidor, $bbdd);
    }
    function obtenerDatos($consulta){
       return mysqli_query($this->conn, $consulta);
 
    }
    function convertirDatos($respuesta){
        $arrayDatos = array();
        // var_dump($respuesta);
        while($row = $respuesta->fetch_object()){
            $arrayDatos[] = $row;
        }
        return $arrayDatos;
    }
}
  /*   function modificacion($consulta){
        $consulta = mysqli_query($this->conn, $consulta);
        $lineas = $consulta->affected_rows($consulta);
        return "Se ha actulizado $lineas registros";
    } */


/* 
$conexion = new conexionBBDD("127.0.0.1:3307","root","","restaurante");
$datosCompletos = $conexion->obtenerDatos("SELECT * FROM empleados where id= ?");
$datosConvertidos = $conexion->convertirDatos($datosCompletos);
var_dump($datosConvertidos); */
