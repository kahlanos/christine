<?php

class Db {
    
    /**
     * getSpinerHome
     *
     * @return void
     */
    public function getSpinerHome() {

        try {

            $items = [];

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT * FROM item ORDER BY puntuacion LIMIT 10";
            $res = $db->query($sql);

            foreach($res as $u) {
                $item = new Item($u['id'],$u['nombre'],$u['descripcion'], $u['precio'], $u['img1'], $u['puntuacion']);

                $items[] = $item;
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;


        return json_encode($items);

    }
    
    /**
     * getItemsAll
     *
     * @return void
     */
    public function getItemsAll() {
        try {

            $items = [];

            $con = new Conexion();
            $db = $con->getConexion();
            

            $sql = "SELECT * FROM item ORDER BY puntuacion LIMIT 12";
            $res = $db->query($sql);

            foreach($res as $u) {
                $item = new Item($u['id'],$u['nombre'],$u['descripcion'], $u['precio'], $u['img1'], $u['puntuacion']);
                $idCat = $u['idCat'];
                $sql2 = "SELECT nombre FROM categoria WHERE idCat ='".$idCat."'";
                $res2 = $db->query($sql2);
                $p = $res2->fetch();
                if (isset($p) && $p != FALSE) {
                    $item->setcategoria($p['nombre']);
                } else {
                    $item->setCategoria("N/A");
                } 
                if (isset($u['img2'])) {
                    $item->setimg2($u['img2']);
                }
                if (isset($u['img3'])) {
                    $item->setimg3($u['img3']);
                }
                
                $items[] = $item;
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;


        return $items;
    }
    
    /**
     * getUser
     *
     * @param  mixed $user
     * @param  mixed $passw
     * @return void
     */
    public function getUser($user, $passw) {
        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $p = sha1($passw);

            $sql = "SELECT user, passw, admin FROM usuario WHERE user = '$user' AND passw = '$p'";
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
     * addUser
     *
     * @param  mixed $user
     * @param  mixed $passw
     * @param  mixed $nombre
     * @param  mixed $apellido
     * @return bool
     */
    public function addUser($user, $passw, $nombre, $apellido) {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $p = sha1($passw);

            $sql = "INSERT into usuario (user, passw, nombre, apellido, tokens) values ('$user', '$p', '$nombre', '$apellido', 100)";
            $res = $db->query($sql);

            if ($res != false) {
                return true;
            } else {
                return false;
            }

        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    /**
     * getUserByName
     *
     * @param  mixed $user
     * @return void
     */
    public function getUserByName($user) {

        try {

            $con = new Conexion();
            $db = $con->getConexion();


            $sql = "SELECT * FROM usuario WHERE user = '$user'";
            $res = $db->query($sql);
            
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $res;
    }


}