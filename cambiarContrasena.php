<?php

include("conexion.php");

$cambio = $_POST['cambio'];
$cambio2 = $_POST['cambio2'];
$correo = $_POST['correo'];

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('conexion.php');

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';



$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                       //Enable verbose debug output
    $mail->SMTPDebug = 0;                       //Enable verbose debug output           
    $mail->isSMTP();                                             //Send using SMTP

    $mail->Host         = "smtp-mail.outlook.com";
    $mail->SMTPAuth     = true;
    $mail->Username     = 'gabriel_1496@outlook.es';
    $mail->Password     = 'cristiano1996';
    $mail->SMTPSecure   = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port         = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $sql = "UPDATE administradores SET CON_USU = '$cambio' WHERE COR_USU = '$correo'";
    $sqlCorreo = "SELECT * FROM administradores WHERE COR_USU = '$correo'";
    $result2 = $conexion->query($sqlCorreo);

    if (!empty($cambio) && !empty($cambio2) && !empty($correo) ) {
        $email = $_POST['correo'];

        if ($cambio == $cambio2) {

            if (!($result2->num_rows == 0)) {

                if ($result2->num_rows > 0) {


                    if ($conexion->query($sql) === TRUE) {
                        //Recipients
                        $mail->setFrom('gabriel_1496@outlook.es', 'Online Order');
                        $mail->addAddress($_POST['correo']);     //Add a recipient
                        //$mail->addReplyTo('of.ibarra@uta.edu.ec', 'Jewellery');


                        //Attachments
                        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Cambio de Contraseña FITME';
                        $mail->Body    = 'El Sistema le Registro su Nueva Contraseña: ' . $cambio;


                        if ($mail->send()) {
                            include("login.html");
                            echo '<script> swal("CORREO ENVIADO", "");</script>';
                        } else {
                            include("recuperarContrasena.html");
                            echo '<script> swal("CORREO NO ENVIADO", "");</script>';
                        }
                        include("login.html");
                        echo '<script> swal("CONTRASEÑA MODIFICADA", "");</script>';
                    } else {
                        include("cambiarContrasena.html");
                        echo '<script> swal("COORREO SIN REGISTRAR EN EL SISTEMA", "");</script>';
                    }
                } else {
                    include("cambiarContrasena.html");
                    echo '<script> swal("COORREO SIN REGISTRAR EN EL SISTEMA", "");</script>';
                }
            } else {
                include("cambiarContrasena.html");
                echo '<script> swal("COORREO SIN REGISTRAR EN EL SISTEMA", "");</script>';
            }
        } else {
            include("cambiarContrasena.html");
            echo '<script> swal("LAS CONTRASEÑAS NO COINCIDEN", "");</script>';
        }
    } else {
        include("cambiarContrasena.html");
        echo'<script> swal("INGRESE TODOS LOS CAMPOS", "");</script>';
    }
} catch (Exception $e) {
    echo "CORREO NO ENVIADO: {$mail->ErrorInfo}";
}
