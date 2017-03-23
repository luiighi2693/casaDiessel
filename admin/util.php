<?php
/**
 * Created by PhpStorm.
 * User: luisc
 * Date: 16/11/2016
 * Time: 11:31 PM
 * Content-Type : application/x-www-form-urlencoded
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

if($_POST['method']=='findProductById'){
    findProductById();
}

if($_POST['method']=='createProduct'){
    createProduct();
}

if($_POST['method']=='updateProduct'){
    updateProduct();
}

if($_POST['method']=='getMaquinariasFromProduct'){
    getMaquinariasFromProduct();
}

if($_POST['method']=='findUserByUsernameAndPassword'){
    findUserByUsernameAndPassword();
}

if($_POST['method']=='saveImage'){
    saveImage();
}

if($_POST['method']=='findImagesByIdProduct'){
    findImagesByIdProduct();
}

if($_POST['method']=='deleteImage'){
    deleteImage();
}

if($_POST['method']=='deletePhotosByProduct'){
    deletePhotosByProduct();
}

if($_POST['method']=='deleteMaquineFromProduct'){
    deleteMaquineFromProduct();
}

if($_POST['method']=='addMaquineFromProduct'){
    addMaquineFromProduct();
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

function findProductById(){
    $query = 'SELECT * FROM producto WHERE id='.$_POST['id'];
    executeQuery($query);
}

function createProduct(){
    $query = 'INSERT INTO producto (nombre, codigo, descripcion, marca, idTipo, caracteristicas, referencia)  VALUES (\''.$_POST['nombre'].'\', \''.$_POST['codigo'].'\', \''.$_POST['descripcion'].'\', \''.$_POST['marca'].'\', '.$_POST['idTipo'].', \''.$_POST['caracteristicas'].'\', \''.$_POST['referencia'].'\')';
    executeQuery($query);
}

function updateProduct(){
    $query = 'UPDATE producto SET nombre=\''.$_POST['nombre'].'\', codigo=\''.$_POST['codigo'].'\', descripcion=\''.$_POST['descripcion'].'\', caracteristicas=\''.$_POST['caracteristicas'].'\', marca=\''.$_POST['marca'].'\', referencia=\''.$_POST['referencia'].'\', idTipo= '.$_POST['idTipo'].' WHERE id='.$_POST['id'];
    executeQuery($query);
}

function getMaquinariasFromProduct(){
    $query = 'SELECT idMaquinaria FROM producto_has_maquinaria WHERE idProducto= '.$_POST['id'];
    executeQuery($query);
}

function findUserByUsernameAndPassword(){
    $query = 'SELECT * FROM usuario WHERE nombre= \''.$_POST['username'].'\' AND clave= \''.$_POST['clave'].'\'';
    executeQuery($query);
}

function saveImage(){
    $query = 'INSERT INTO fotos (idProducto, nombre, fecha, id) VALUES ('.$_POST['idProducto'].', \''.$_POST['nombre'].'\', \''.$_POST['fecha'].'\', '.$_POST['id'].')';
    executeQuery($query);
}

function findImagesByIdProduct(){
    $query = 'SELECT * FROM fotos WHERE idProducto='.$_POST['id'];
    executeQuery($query);
}

function deleteImage(){
    $query = 'DELETE FROM fotos WHERE id= '.$_POST['id'].' AND idProducto='.$_POST['productId'];
    executeQuery($query);
}

function deletePhotosByProduct(){
    $query = 'DELETE FROM fotos WHERE idProducto= '.$_POST['id'];
    executeQuery($query);
}

function deleteMaquineFromProduct(){
    $query = 'DELETE FROM producto_has_maquinaria WHERE idProducto= '.$_POST['id'];
    executeQuery($query);
}

function addMaquineFromProduct(){
    $query = 'INSERT INTO producto_has_maquinaria (idProducto, idMaquinaria) VALUES ('.$_POST['idProducto'].', '.$_POST['idMaquinaria'].')';
    executeQuery($query);
}

function executeQuery($query){
    global $mysqli;
    $result = $mysqli->query($query);

    $array = array();
    error_reporting(E_ERROR | E_PARSE);

    if($result->num_rows ==null){
        $arr = array('id' => $mysqli->insert_id);
        $response = json_encode($arr);
    }else{
        for ($i = 0; $i < $result->num_rows; $i++) {
            array_push($array,$result->fetch_array(MYSQLI_ASSOC));
        }
        $response = json_encode($array);
    }

    mysqli_free_result($result);
    $mysqli->close();


    echo $response;
}