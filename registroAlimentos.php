<?php

include("conexion.php");

$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$porciones = $_POST['porciones'];
$proteinas = $_POST['proteinas'];
$carbos = $_POST['carbohidratos'];
$grasas = $_POST['grasas'];
$azucar = $_POST['azucar'];
$calorias = $_POST['calorias'];

$sql = "INSERT INTO alimentos (nom_ali, tip_ali, por_ali, pro_ali, car_ali, gra_ali, azu_ali, cal_ali) VALUES ('$nombre','$tipo', '$porciones', '$proteinas', '$carbos',
 '$grasas','$azucar','$calorias')";

 // Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

 if (!empty($nombre) && !empty($tipo) && !empty($porciones) && !empty($proteinas) && !empty($carbos) && !empty($grasas) && !empty($azucar) && !empty($calorias)) {
    
    if (preg_match('/^[0-9]+|gr$/i', $porciones) && preg_match('/^[0-9]+|gr$/i', $proteinas) && preg_match('/^[0-9]+|gr$/i', $carbos) && preg_match('/^[0-9]+|gr$/i', $grasas) && preg_match('/^[0-9]+|gr$/i', $azucar) && preg_match('/^[0-9]+|gr$/i', $calorias)) {

        if (preg_match('/^[a-zA-Z]+$/', $nombre) ) {

            if ($conexion->query($sql) === TRUE) {
                echo '<script> alert("ALIMENTO REGISTRADO","");</script>';
                include('principal.php');
            } else {
                echo '<script> swal("ALIMENTO  NO REGISTRADO", "");</script>';
            }
        } else {
            // El tipo no cumple con el formato esperado (solo letras)
            include('registroAlimentos.html');
            echo '<script> swal("SOLO SE ADMITE LETRAS EN EL NOMBRE", "");</script>';
        }
    } else {
        // Algunos de los campos numéricos no cumple con el formato esperado
        include('registroAlimentos.html');
        echo '<script> swal("INGRESE LAS CANTIDADES EN gr [32gr]", "");</script>';
    }
} else {
    // Alguno de los campos está vacío
    include('registroAlimentos.html');
    echo '<script> swal("INGRESE TODOS LOS CAMPOS", "");</script>';
}


?>