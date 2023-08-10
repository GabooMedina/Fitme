<?php

include('conexion.php');

/*
VALIDACION DE USUARIO DE TIPO ADMINISTRADOR CON LA BASE DE DATOS (LOGIN)
- CREACION DE VARIABLES PARA LA CONEXION Y CONFIRMACION DE LOS CAMPOS PARA EL ACCESO AL USUARIO
*/
$ADMINISTRADOR = $_POST['usuario'];
$PASSWORD = $_POST['password'];
$mensaje = "ERROR";

$consulta = "SELECT* FROM administradores where ALI_USU = '$ADMINISTRADOR' and CON_USU ='$PASSWORD' ";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas) {
    include("principal.php");
} else {
    include("login.html");
    echo '<script> swal("ERROR DE CREDENCIALES", "");</script>';
    
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>