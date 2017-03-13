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

if($_POST['method']=='getAllProducts'){
    getAllProducts();
}

if($_POST['method']=='findByProduct'){
    findByProduct();
}

if($_POST['method']=='getAllRoles'){
    getAllRoles();
}

if($_POST['method']=='getAllMaquinarias'){
    getAllMaquinarias();
}

if($_POST['method']=='getAllTipos'){
    getAllTipos();
}

if($_POST['method']=='deleteUser'){
    deleteUser();
}

if($_POST['method']=='findUserById'){
    findUserById();
}

if($_POST['method']=='createUser'){
    createUser();
}

if($_POST['method']=='updateUser'){
    updateUser();
}

if($_POST['method']=='deleteProduct'){
    deleteProduct();
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

function getAllProducts(){
    $query = 'SELECT id, nombre, codigo, marca, referencia FROM producto';
    executeQuery($query);
}

function findByProduct(){
    $data = "'%".$_POST['search']."%'";
    $query = 'SELECT id, nombre, codigo, marca, referencia FROM producto WHERE nombre LIKE '.$data.' UNION
        SELECT id, nombre, codigo, marca, referencia FROM producto WHERE codigo LIKE '.$data.' UNION
        SELECT id, nombre, codigo, marca, referencia FROM producto WHERE marca LIKE '.$data.' UNION
        SELECT id, nombre, codigo, marca, referencia FROM producto WHERE referencia LIKE '.$data;
    executeQuery($query);
}

function getAllRoles(){
    $query = 'SELECT * FROM rol';
    executeQuery($query);
}

function getAllMaquinarias(){
    $query = 'SELECT * FROM maquinaria';
    executeQuery($query);
}

function getAllTipos(){
    $query = 'SELECT * FROM tipo';
    executeQuery($query);
}

function deleteUser(){
    $query = 'DELETE FROM usuario WHERE id= '.$_POST['id'];
    executeQuery($query);
}

function findUserById(){
    $query = 'SELECT * FROM usuario WHERE id='.$_POST['id'];
    executeQuery($query);
}

function createUser(){
    $query = 'INSERT INTO usuario (nombre, cedula, clave, idRol) VALUES (\''.$_POST['nombre'].'\', '.$_POST['cedula'].', '.$_POST['clave'].', '.$_POST['idRol'].')';
    executeQuery($query);
}

function updateUser(){
    $query = 'UPDATE usuario SET nombre=\''.$_POST['nombre'].'\', cedula= '.$_POST['cedula'].', clave= '.$_POST['clave'].', idRol= '.$_POST['idRol'].' WHERE id='.$_POST['id'];
    executeQuery($query);
}

function deleteProduct(){
    $query = 'DELETE FROM producto WHERE id= '.$_POST['id'];
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