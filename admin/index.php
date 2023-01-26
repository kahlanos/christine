<?php
session_start();
require("model/User.php");
require("model/Categoria.php");
require("model/Item.php");

require("controller/userController.php");
require("controller/catController.php");
require("controller/itemController.php");

require("repositorio/control.php");

require("model/dbUser.php");
require("model/dbCat.php");
require("model/dbItem.php");
require("model/dbComent.php");

require("repositorio/conexion.php");
require("repositorio/mail.php");
require('vendor/autoload.php');

//Instancio el controlador
$userController = new userController;
$catController = new catController;
$itemController = new itemController;

//Ruta de la home
$home = "/christine/admin/index.php/";
//Quito la home de la ruta de la barra de direcciones (ACCION)
$ruta = str_replace($home, "", $_SERVER["REQUEST_URI"]);

//Creo el array de ruta (filtrando los vacíos)
$array_ruta = array_filter(explode("/", $ruta));



if (isset($array_ruta[0]) && $array_ruta[0] == "login" && empty($array_ruta[1])) {
    $userController->login();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "login" && $array_ruta[1] == "process") {
    $userController->process();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "recuperacion" && empty($array_ruta[1])) {
    $userController->recuperacion();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && empty($array_ruta[1])) {
    $userController->home();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "usuarios" && empty($array_ruta[1])) {
    //echo $controller->usuarios();
    $userController->usuarios();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "usuariosCarga" && empty($array_ruta[1])) {
    //echo $controller->usuarios();
    echo $userController->cargaUsuarios();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "usuarios" && is_numeric($array_ruta[1]) && !empty($array_ruta[2]) && $array_ruta[2] == "process") {
    $userController->editaUsuario($array_ruta[1]);
}  else if (isset($array_ruta[0]) && $array_ruta[0] == "usuarios" && is_numeric($array_ruta[1])) {
    $userController->fichaUsuario($array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "usuariosDelete" && is_numeric($array_ruta[1])) {
    $userController->borraUsuario($array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "usuarios" && $array_ruta[1] == "add" && !empty($array_ruta[2]) && $array_ruta[2] == "process") {   
    $userController->addUsuarioProcess();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "usuarios" && $array_ruta[1] == "add") {
    $userController->addUsuario();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "categorias" && empty($array_ruta[1])) {
    $catController->categorias();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "categoriasCarga" && empty($array_ruta[1])) {
    //echo $controller->usuarios();
    echo $catController->cargaCategorias();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "categorias" && is_numeric($array_ruta[1]) && !empty($array_ruta[2]) && $array_ruta[2] == "process") {
    $catController->editaCategoria($array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "categorias" && is_numeric($array_ruta[1])) {
    $catController->fichaCategoria($array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "categoriasDelete" && is_numeric($array_ruta[1])) {
    $catController->borraCategoria($array_ruta[1]);
} else if (($array_ruta[0]) && $array_ruta[0] == "categorias" && $array_ruta[1] == "add" && !empty($array_ruta[2]) && $array_ruta[2] == "process") {
    $catController->addCategoriaProcess();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "categorias" && $array_ruta[1] == "add"  && empty($array_ruta[2])) {
    $catController->addCategoria();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "categorias" && $array_ruta[1] == "add" && $array_ruta[2] == "categoriasCarga") {
    echo $catController->cargaCategoriasNombre();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "items" && empty($array_ruta[1])) {
    $itemController->items();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "itemsCarga" && empty($array_ruta[1])) {
    //echo $controller->usuarios();
    echo $itemController->cargaItems();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "items" && is_numeric($array_ruta[1]) && !empty($array_ruta[2]) && $array_ruta[2] == "process") {
    $itemController->editaItem($array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "items" && is_numeric($array_ruta[1])) {
    $itemController->fichaItem($array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "itemsDelete" && is_numeric($array_ruta[1])) {
    $itemController->borraItem($array_ruta[1]);
} else if (($array_ruta[0]) && $array_ruta[0] == "items" && $array_ruta[1] == "add" && !empty($array_ruta[2]) && $array_ruta[2] == "process") {
    $itemController->addItemProcess();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "items" && $array_ruta[1] == "add" && empty($array_ruta[2])) {
    $itemController->addItem();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "items" && $array_ruta[1] == "add" && $array_ruta[2] == "categoriasCarga") {
    echo $itemController->cargaCategoriasNombre();
}

 // else if (isset($array_ruta[0]) && $array_ruta[0] == "logout" && empty($array_ruta[1])) {
//     $userController->logout();
// } else if (isset($array_ruta[0]) && $array_ruta[0] == "carrito" && empty($array_ruta[1])) {
//     $userController->carrito();
// } else if (isset($array_ruta[0]) && $array_ruta[0] == "carrito" && $array_ruta[1] == "agregar") {
//     $userController->agregar();
// } else if (isset($array_ruta[0]) && $array_ruta[0] == "carrito" && $array_ruta[1] == "actualizar") {
//     $userController->actualizar();
// } else if (isset($array_ruta[0]) && $array_ruta[0] == "pedido" && empty($array_ruta[1])) {
//     $userController->pedido();
// }



// //Decido la ruta en función de los elementos del array
// if (isset($array_ruta[0]) && $array_ruta[0] == "show" && is_numeric($array_ruta[1])){   
//     //Llamo al método ver pasándole la clave que me están pidiendo
//     $controller->show($array_ruta[1]);
// }else{
//     //Llamo al método por defecto del controlador
//     $controller->index();
// }
