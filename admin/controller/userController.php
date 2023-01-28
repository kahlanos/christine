<?php

class userController {

    public function login() {
        require("view/login.php");
    }

    public function process() {
       
        $db = new DbUser();
        $res = $db->getUser($_POST["user"], $_POST["passw"]);
        var_dump($res);

        if ($res) {
            $_SESSION["user"] = $_POST["user"];
            $_SESSION["passw"] = $_POST["passw"];
            
            header("location: ../../index.php/home"); //usar header
            //require("view/categorias.php");
        } else {
            //require("view/login.php");
            header("location: ../../index.php/login");
        }
        
    }

    public function recuperacion() {
        require("view/recuperacion.php");
    }
    
    public function home() {
        require("view/home.php");
    }

    public function usuarios() {

       // header('Content-Type: application/json');   
        require("view/listado_usuarios.php");
    }

    public function cargaUsuarios() {
        $db = new DbUser();
        $res = $db->getUsers();

        return $res;
    }

    public function fichaUsuario($id) {

        $db = new DbUser();
        $res = $db->getUserById($id);
        
        require("view/ficha_usuarios.php");
    }

    public function editaUsuario($id) {

        $db = new DbUser();

        if (isset($_POST['admin']) && $_POST['admin'] == 1) {
            $admin = 1;
        } else {
            $admin = 0;
        }

        $db->editUser($id,$_POST['user'],$_POST['passw'],$_POST['nombre'],$_POST['apellido'],$admin,$_POST['tokens']);

        header("location: ../../../index.php/usuarios");
    }

    public function borraUsuario($id) {
        $db = new DbUser();
        $db->deleteUser($id);

        header("location: ../../index.php/usuarios");
    }

    public function addUsuario() {
        
        require("view/add_usuarios.php");
    }

    public function addUsuarioProcess() {

        $db = new DbUser();
       
        if (isset($_POST['admin']) && $_POST['admin'] == 1) {
            $admin = 1;
        } else {
            $admin = 0;
        }
        $db->addUser($_POST['user'],$_POST['passw'],$_POST['nombre'],$_POST['apellido'],$admin,$_POST['tokens']);

        header("location: ../../../index.php/usuarios");

    }
}
