<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 22/4/2017
 * Time: 2:17 PM
 */

    $to = "info@casadiesel.com.ve";
    $subject = $_POST['subject'];
    $contenido .= "Nombre: ".$_POST["name"]."\n";
    $contenido .= "Email: ".$_POST["fromEmail"]."\n\n";
    $contenido .= "Comentario: ".$_POST["message"]."\n\n";
    $header = "From: info@casadiesel.com.ve\nReply-To:".$_POST["email"]."\n";
    $header .= "Mime-Version: 1.0\n";
    $header .= "Content-Type: text/plain";
    mail($to, $subject, $contenido ,$header);
