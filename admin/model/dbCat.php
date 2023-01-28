<?php 

class DbCat {
    
    /**
     * getCategorias
     *
     * @return void
     */
    public function getCategorias() {

        try {

            $cats = [];

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT * FROM categoria LIMIT 12";
            $res = $db->query($sql);

            

            foreach($res as $u) {
                $cat = new Categoria($u['idCat'],$u['nombre'],$u['descripcion'],$u['imagen'],$u['puntuacion']);
                $padre = $u['padre'];
                $sql2 = "SELECT nombre FROM categoria WHERE idCat ='".$padre."'";
                $res2 = $db->query($sql2);
                $p = $res2->fetch();
                if (isset($p) && $p != FALSE) {
                    $cat->setPadre($p['nombre']);
                } else {
                    $cat->setPadre("N/A");
                }              
                $cats[] = $cat;
            }

            

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;


        return json_encode($cats);
    }
    
    /**
     * getCategoriasNombre
     *
     * @return void
     */
    public function getCategoriasNombre() {
         try {

            $cats = [];

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT nombre FROM categoria";
            $res = $db->query($sql);

            foreach( $res as $c) {
                $cats[] = $c['nombre'];
            }



         } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;

        return json_encode($cats);
    }
    
    /**
     * getCategoriaById
     *
     * @param  mixed $id
     * @return void
     */
    public function getCategoriaById($id) {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT * FROM categoria WHERE idCat = '$id'";
            $r = $db->query($sql);
            $res = $r->fetch();

            $cat = new Categoria($res['idCat'],$res['nombre'],$res['descripcion'],$res['imagen'],$res['puntuacion']);

            $padre = $res['padre'];
            $sql2 = "SELECT nombre FROM categoria WHERE idCat ='".$padre."'";
            $res2 = $db->query($sql2);
            $p = $res2->fetch();
            if (isset($p) && $p != FALSE) {
                $cat->setPadre($p['nombre']);
            } else {
                $cat->setPadre("N/A");
            } 

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } 

        return $cat;
    }
    
    /**
     * editCategoria
     *
     * @param  mixed $id
     * @param  mixed $nombre
     * @param  mixed $descripcion
     * @param  mixed $imagen
     * @param  mixed $padre
     * @return void
     */
    public function editCategoria($id, $nombre, $descripcion, $imagen, $padre) {
        
        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql2 = "SELECT idCat FROM categoria WHERE nombre = '$padre'";
            $res2 = $db->query($sql2);
            $p = $res2->fetch();
            if (isset($p) && $p != FALSE) {
                $idPadre = $p['idCat'];
            } else {
                $idPadre = 'NULL';
            }

            if ($imagen == "") {
                $imagen = NULL;
            }

            $sql = "UPDATE categoria set nombre = '$nombre', descripcion = '$descripcion', imagen = '$imagen', padre = $idPadre WHERE idCat = '$id'";
            $db->query($sql);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    /**
     * deleteCategoria
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteCategoria($id) {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "DELETE FROM categoria WHERE idCat = '$id'";
            $res = $db->query($sql);


        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    /**
     * addCategoria
     *
     * @param  mixed $nombre
     * @param  mixed $descripcion
     * @param  mixed $imagen
     * @param  mixed $padre
     * @return void
     */
    public function addCategoria($nombre, $descripcion, $imagen, $padre) {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql2 = "SELECT idCat FROM categoria WHERE nombre = '$padre'";
            $res2 = $db->query($sql2);
            $p = $res2->fetch();
            if (isset($p) && $p != FALSE) {
                $idPadre = $p['idCat'];
            } else {
                $idPadre = 'NULL';
            }

            if ($imagen == "") {
                $imagen = NULL;
            }

            $sql = "INSERT into categoria (nombre, descripcion, imagen, padre) values('$nombre', '$descripcion', '$imagen', $idPadre)";
            $db->query($sql);

            $id = $db->lastInsertId();

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return $id;

    }



}