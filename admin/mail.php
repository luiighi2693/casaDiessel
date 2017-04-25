<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 22/4/2017
 * Time: 2:17 PM
 */

    $to = "info@casadiesel.com.ve";
    $subject = $_POST['subject'];
    $contenido .= $_POST["content"];
    $header = "From: info@casadiesel.com.ve\nReply-To:".$_POST["fromEmail"]."\n";
    $header .= "Mime-Version: 1.0\n";
    $header .= "Content-Type: text/plain";
    mail($to, $subject, $contenido ,$header);
