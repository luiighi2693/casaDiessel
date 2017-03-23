<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 22/3/2017
 * Time: 7:41 PM
 */
    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES["file"]["tmp_name"],"../img/uploads/" .$_GET['date']. $_FILES["file"]["name"]);
    }
