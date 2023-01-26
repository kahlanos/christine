<?php

class DbItem {

    public function getItems() {

        try {

            $items = [];

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT * FROM item";
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
                $items[] = $item;
            }

            

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;


        return json_encode($items);
    }


    //AÑADIR RESTO DE CAMPOS
    public function getItemById($id) {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT * FROM item WHERE id = '$id'";
            $r = $db->query($sql);
            $res = $r->fetch();

            $item = new Item($res['id'],$res['nombre'],$res['descripcion'], $res['precio'], $res['img1'], $res['puntuacion']);

            $cat = $res['idCat'];
            $sql2 = "SELECT nombre FROM categoria WHERE idCat ='".$cat."'";
            $res2 = $db->query($sql2);
            $p = $res2->fetch();

            if (isset($p) && $p != FALSE) {
                $item->setcategoria($p['nombre']);
            } else {
                $item->setCategoria("N/A");
            }  

            if ($res['img2'] == NULL || !isset($res)) {
                $item->setimg2("");
            } else {
                $item->setimg2($res['img2']);
            }

            if ($res['img3'] == NULL || !isset($res)) {
                $item->setimg3("");
            } else {
                $item->setimg3($res['img3']);
            }

            if ($res['latitud'] == NULL || !isset($res) || $res['latitud'] == 0) {
                $item->setLatitud("");
            } else {
                $item->setLatitud($res['latitud']);
            }

            if ($res['longitud'] == NULL || !isset($res) || $res['longitud'] == 0 ) {
                $item->setLongitud("");
            } else {
                $item->setLongitud($res['longitud']);
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return $item;

    }

    //AÑADIR RESTO DE CAMPOS
    public function editItem($id, $nombre, $descripcion, $categoria, $precio, $img1,$img2,$img3, $latitud, $longitud) { 
        
        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql2 = "SELECT idCat FROM categoria WHERE nombre = '$categoria'";
            $res2 = $db->query($sql2);
            $p = $res2->fetch();
            if (isset($p) && $p != FALSE) {
                $idCat = $p['idCat'];
            } else {
                $idCat = 0;
            }

            if ($img2 == "" || $img2 == NULL || !isset($img2)) {
                $img2 = 'NULL';
            } //else {
            //     //ruta img 
            // }

            if ($img3 == "" || $img3 == NULL || !isset($img3)) {
                $img3 = 'NULL';
            } //else {
            //     //ruta img 
            // }

            if ($latitud == "" || $latitud == 0) {
                $latitud = 'NULL';
            }
            if ($longitud == "" || $longitud == 0) {
                $longitud = 'NULL';
            }

            $sql = "UPDATE item set nombre = '$nombre', descripcion = '$descripcion', idCat = $idCat, precio = $precio, 
            img1 = '$img1', img2 = $img2, img3 = $img3, latitud = $latitud, longitud = $longitud WHERE id = '$id'";
            $db->query($sql);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteItem($id) {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "DELETE FROM item WHERE id = '$id'";
            $res = $db->query($sql);


        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function addItem($nombre, $descripcion, $categoria, $precio, $img1,$img2,$img3, $latitud, $longitud) {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql2 = "SELECT idCat FROM categoria WHERE nombre = '$categoria'";
            $res2 = $db->query($sql2);
            $p = $res2->fetch();
            if (isset($p) && $p != FALSE) {
                $idCat = $p['idCat'];
            } else {
                $idCat = 0;
            }

            if ($img2 == "" || $img2 == NULL || !isset($img2)) {
                $img2 = 'NULL';
            } //else {
            //     //ruta img 
            // }

            if ($img3 == "" || $img3 == NULL || !isset($img3)) {
                $img3 = 'NULL';
            } //else {
            //     //ruta img 
            // }

            if ($latitud == "" || $latitud == 0) {
                $latitud = 'NULL';
            }
            if ($longitud == "" || $longitud == 0) {
                $longitud = 'NULL';
            }

            $sql = "INSERT into item (nombre, descripcion, idCat, precio, img1, img2, img3, latitud, longitud)
             values('$nombre', '$descripcion', $idCat, $precio, '$img1', '$img2', '$img3', '$latitud', '$longitud')";
            $db->query($sql);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

}