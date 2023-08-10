<?php
include("conexion.php");

$id = $_POST['eliminar'];

$sql = "DELETE FROM alimentos_ingeridos WHERE ID_AL_ING = '$id'";


if (!empty($id)) {

    if (is_numeric($id)) {

        if ($conexion->query($sql) === TRUE) {
            include('principal.php');
            echo '<script> alert("ALIMENTO ELIMINADO", "");</script>';
        } else {
            include("eliminarAlimentos.html");
            echo '<script> swal("ALIMENTO NO ELIMINADO", "");</script>';
        }
            
    }else {
        include("eliminarAlimentos.html");
    echo '<script> swal("INGRESE SOLO EL CODIGO DEL ALIMENTO", "");</script>';
    }
} else {
    include("eliminarAlimentos.html");
    echo '<script> swal("INGRESE TODOS LOS CAMPOS", "");</script>';
}


?>