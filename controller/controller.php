<?php 

class Controller {
    
    /**
     * cargaHome
     *
     * @return void
     */
    public function cargaHome() {
        
        require("view/home.php");
    }
    
    /**
     * cargaSpiner
     *
     * @return void
     */
    public function cargaSpiner() {

        $db = new Db();
        $res = $db->getSpinerHome();

        return $res;
    }
    
    /**
     * cargaLogin
     *
     * @return void
     */
    public function cargaLogin() {
        
        require("view/login.php");
    }
    
    /**
     * loginProcess
     *
     * @return void
     */
    public function loginProcess() {

        $db = new Db();

        $res = $db->getUser($_POST['user'], $_POST['passw']);

        if ($res) {
            $_SESSION['userNormal'] = $_POST['user'];
            header("location: ../../index.php/home");
        } else {
            echo("Error de autentificación");
            header("location: ../../index.php/login");
        }
        
    }
    
    /**
     * logout
     *
     * @return void
     */
    public function logout() {
        session_destroy();

        header("location: ../index.php/home");
    }
    
    /**
     * cargaSignin
     *
     * @return void
     */
    public function cargaSignin() {
       

        require("view/signin.php");
    }
    
    /**
     * signinProcess
     *
     * @return void
     */
    public function signinProcess() {
        $db = new Db();

        if (!filter_var($_POST['user'], FILTER_VALIDATE_EMAIL)) {
            echo "El usuario debe de ser un email válido";
            header("location: ../../index.php/signin");
        } else if(!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$', $_POST['passw'])) {
            echo "La contraseña debe de ser al menos 8 caracteres, una minuscula, una mayuscula y un numero";
            header("location: ../../index.php/signin");
            
        } else {
            $res = $db->addUser($_POST['user'], $_POST['passw'], $_POST['nombre'], $_POST['apellido']);

            if ($res) {
                header("location: ../../index.php/login");
            } else {
                header("location: ../../index.php/signin");
            }
        }
  
    }
    
    /**
     * cargaProfile
     *
     * @return void
     */
    public function cargaProfile() {

        $db = new Db();

        $res = $db->getUserByName($_SESSION['userNormal']);

        require("view/profile.php");
    }
    
    /**
     * cargaList
     *
     * @return void
     */
    public function cargaList() {
        $db = new Db();
        $res = $db->getItemsAll();


        require("view/list.php");
    }
    
    /**
     * cargaItemsAll
     *
     * @return void
     */
    public function cargaItemsAll() {
        $db = new Db();
        $res = $db->getItemsAll();

        return $res;
    }
    
    /**
     * cargaContact
     *
     * @return void
     */
    public function cargaContact() {
        require("view/contact.php");
    }
}

