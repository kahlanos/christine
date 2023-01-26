<?php 

class Controller {

    public function cargaHome() {
        require("view/home.php");
    }

    public function cargaSpiner() {

        $db = new Db();
        $res = $db->getSpinerHome();

        return $res;
    }

    public function cargaLogin() {
        require("view/login.php");
    }

    public function cargaSignin() {
        require("view/signin.php");
    }

    public function cargaProfile() {
        require("view/profile.php");
    }

    public function cargaList() {
        $db = new Db();
        $res = $db->getItemsAll();


        require("view/list.php");
    }

    public function cargaItemsAll() {
        $db = new Db();
        $res = $db->getItemsAll();

        return $res;
    }

    public function cargaContact() {
        require("view/contact.php");
    }
}

