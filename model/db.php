<?php

class Db {

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
}