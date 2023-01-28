<?php



class DbUser {


    
    /**
     * getUser
     *
     * @param  mixed $user
     * @param  mixed $passw
     * @return void
     */
    public function getUser($user, $passw) {

        try {

            // $db = new PDO('mysql:host=localhost;dbname=christine','root','');

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT user, passw, admin FROM usuario WHERE user = '$user' AND passw = '$passw' AND admin = 1 ";
            $res = $db->query($sql);

            $data = $res->fetch();
            
            if ($data != false) {
                return true;
            } else {
                return false;
            }
            

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }
    
    /**
     * getUserById
     *
     * @param  mixed $id
     * @return void
     */
    public function getUserById($id) {

        $con = new Conexion();
        $db = $con->getConexion();

        $sql = "SELECT * FROM usuario WHERE idUser = '$id'";
        $r = $db->query($sql);
        $res = $r->fetch();

        //query de comentarios y query de nombres de producto en comentario
        //devolver objeto User con comentarios en array dentro -- Ej: $coms['usuario] =$res['user];

        return $res;

    }
    
    /**
     * getUsers
     *
     * @return void
     */
    public function getUsers() {

        try {

            $users = [];

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT * FROM usuario LIMIT 12";
            $res = $db->query($sql);

            foreach($res as $u) {
                $user = new User($u['idUser'],$u['user'],$u['passw'],$u['nombre'],$u['apellido'],$u['tokens'],$u['admin']);
                $users[] = $user;
            }

            

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;


        return json_encode($users);
        
    }
    
    /**
     * deleteUser
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteUser($id) {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "DELETE FROM usuario WHERE idUser = '$id'";
            $res = $db->query($sql);


        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    /**
     * addUser
     *
     * @param  mixed $user
     * @param  mixed $passw
     * @param  mixed $nombre
     * @param  mixed $apellido
     * @param  mixed $admin
     * @param  mixed $tokens
     * @return void
     */
    public function addUser($user, $passw, $nombre, $apellido, $admin, $tokens) {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "INSERT into usuario (user, passw, nombre, apellido, admin, tokens) values('$user', '$passw', '$nombre', '$apellido', '$admin', '$tokens')";
            $db->query($sql);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }
    
    /**
     * editUser
     *
     * @param  mixed $id
     * @param  mixed $user
     * @param  mixed $passw
     * @param  mixed $nombre
     * @param  mixed $apellido
     * @param  mixed $admin
     * @param  mixed $tokens
     * @return void
     */
    public function editUser($id, $user, $passw, $nombre, $apellido, $admin, $tokens) {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "UPDATE usuario set user = '$user', passw = '$passw', nombre = '$nombre', apellido = '$apellido', admin = '$admin', tokens = '$tokens'
             WHERE idUser = '$id'";
            $db->query($sql);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    


}