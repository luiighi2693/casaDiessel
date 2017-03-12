<?php
/**
 * Created by PhpStorm.
 * User: luisc
 * Date: 16/11/2016
 * Time: 11:31 PM
 */

$mysqli = new mysqli("localhost", "root", "", "casadiessel");

if($_POST['method']=='getAllUsers'){
    getAllUsers();
}

if($_POST['method']=='findByUser'){
    findByUser();
}

function getAllUsers(){
    $query = 'SELECT id, nombre, cedula FROM usuario';
    executeQuery($query);
}

function findByUser(){
    $data = "'%".$_POST['search']."%'";
    $query = 'SELECT id, nombre, cedula FROM usuario WHERE nombre LIKE '.$data.' UNION
        SELECT id, nombre, cedula FROM usuario WHERE cedula LIKE '.$data;
    executeQuery($query);
}

function executeQuery($query){
    global $mysqli;
    $result = $mysqli->query($query);

    $array = array();

    for ($i = 0; $i < $result->num_rows; $i++) {
        array_push($array,$result->fetch_array(MYSQLI_ASSOC));
    }

    mysqli_free_result($result);
    $mysqli->close();

    echo json_encode($array);
}