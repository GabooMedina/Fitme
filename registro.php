<?php
 include('conexion.php');
/*
REGISTRO DE USUARIO DE TIPO ADMINISTRADOR EN LA BASE DE DATOS
*/
$ALIAS_USU = $_POST['usuario'];
$NOM_USU = $_POST['nombre'];
$APE_USU = $_POST['apellido'];
$CON_USU = $_POST['password'];
$CON2_USU = $_POST['password2'];
$COR_USU = $_POST['correo'];
$TEL_USU = $_POST['telefono'];

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Preparar la consulta SQL
$sql = "INSERT INTO administradores (ALI_USU, NOM_USU, APE_USU, CON_USU, COR_USU, TEL_USU) VALUES ('$ALIAS_USU','$NOM_USU','$APE_USU', '$CON_USU', '$COR_USU', '$TEL_USU')";
$sqlCorreo = "SELECT * FROM administradores WHERE COR_USU = '$COR_USU'";
$sqlAlias = "SELECT * FROM administradores WHERE ALI_USU = '$ALIAS_USU'";
$result = $conexion->query($sqlAlias);
$result2 = $conexion->query($sqlCorreo);
// Ejecutar la consulta SQL
 
if (!empty($ALIAS_USU) && !empty($NOM_USU) && !empty($APE_USU) && !empty($CON_USU) && !empty($COR_USU) && !empty($TEL_USU)) {
    
    if ($result->num_rows == 0) {
       
        if ($result2->num_rows == 0) {
           
            if ($CON_USU == $CON2_USU) {
               
                if (strlen($TEL_USU) == 10) {
                   
                    if (preg_match('/^[a-zA-Z]+$/', $NOM_USU)) {
                       
                        if (preg_match('/^[a-zA-Z]+$/', $APE_USU)) {
                           
                            if (filter_var($COR_USU, FILTER_VALIDATE_EMAIL)) {
                               
                                if ($conexion->query($sql) === TRUE) {
                                    include('login.html');
                                    echo '<script> swal("USUARIO CREADO", "");</script>';
                                } else {
                                    include('registro.html');
                                }
                            } else {
                                include('registro.html');
                                echo '<script> swal("CORREO NO VÁLIDO", "");</script>';
                            }
                        } else {
                            include('registro.html');
                            echo '<script> swal("INGRESE SOLO TEXTO EN EL APELLIDO", "");</script>';
                        }
                    } else {
                        include('registro.html');
                        echo '<script> swal("INGRESE SOLO TEXTO EN EL NOMBRE", "");</script>';
                    }
                } else {
                    include('registro.html');
                    echo '<script> swal("TELÉFONO DEBE TENER 10 DÍGITOS", "");</script>';
                }
            } else {
                include('registro.html');
                echo '<script> swal("LAS CONTRASEÑAS NO COINCIDEN", "");</script>';
            }
        } else {
            include('registro.html');
            echo '<script> swal("CORREO YA EXISTENTE", "");</script>';
        }
    } else {
        include('registro.html');
        echo '<script> swal("ALIAS YA EXISTENTE", "");</script>';
    }
} else {
    include('registro.html');
    echo '<script> swal("INGRESE TODOS LOS CAMPOS", "");</script>';
}




// Cerrar la conexión
$conexion->close();
