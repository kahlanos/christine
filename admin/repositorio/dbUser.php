<?php



class DbUser {


    // public function getProductos($idCat) {

    //     $prods = [];

    //     try {

    //     $db = new PDO('mysql:host=localhost;dbname=practica12','root','');

    //     $sql = "SELECT * FROM producto WHERE idCat = '$idCat'";
    //     $res = $db->query($sql);

    //     foreach($res as $p) {
    //         $prod = new Producto($p["idProd"],$p["nombre"],$p["descripcion"],$p["peso"],$p["stock"]);
    //         // $prod->setId($p["idProd"]);
    //         // $prod->setNombre($p["nombre"]);
    //         // $prod->setDescripcion($p["descripcion"]);
    //         // $prod->setPeso($p["peso"]);
    //         // $prod->setStock($p["stock"]);

    //         $prods[] = $prod;
    //     }

    //     } catch (PDOException $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    //     //$db = NULL;

    //     return $prods;
    // }


    public function getUser($user, $passw) {

        try {

            // $db = new PDO('mysql:host=localhost;dbname=christine','root','');

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT user, passw, admin FROM usuario WHERE user = '$user' AND passw = '$passw' AND admin = 1 ";
            $res = $db->query($sql);

            $data = $res->fetch();
            
            
            return $data;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    public function getUserById($id) {

        $con = new Conexion();
        $db = $con->getConexion();

        $sql = "SELECT * FROM usuario WHERE idUser = '$id'";
        $r = $db->query($sql);
        $res = $r->fetch();

        return $res;

    }

    public function getUsers() {

        try {

            $users = [];

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT * FROM usuario";
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

    public function getCategorias() {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT * FROM categoria";
            $res = $db->query($sql);

            
            return json_encode($res);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    // public function addProducto($p, $n) {
    //     $_SESSION["carrito"] = [$p->getId() => $n];
    // }

    // public function getProducto ($id) {
    //     $db = new PDO('mysql:host=localhost;dbname=practica12','root','');

    //     $sql = "SELECT * FROM producto WHERE idProd = $id";
    //     $res = $db->query($sql);

    //     foreach($res as $p) {
    //         $prod = new Producto($p["idProd"],$p["nombre"],$p["descripcion"],$p["peso"],$p["stock"]);
    //     //     $prod->setId($p["idProd"]);
    //     //     $prod->setNombre($p["nombre"]);
    //     //     $prod->setDescripcion($p["descripcion"]);
    //     //     $prod->setPeso($p["peso"]);
    //     //     $prod->setStock($p["stock"]);
    //     }

        

    //     return $prod;

    // }

    public function restaStock($id, $n) {
        $db = new PDO('mysql:host=localhost;dbname=practica12','root','');

        $sql = "UPDATE producto SET stock = stock-$n WHERE idProd = $id";
        $res = $db->query($sql);

        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function addPedido($carrito, $correo) {
        $db = new PDO('mysql:host=localhost;dbname=practica12','root','');

        $sql = "SELECT idRes FROM restaurante WHERE correo = '$correo'";
        $res = $db->query($sql);
        $idRes = $res->fetch();
        var_dump($idRes);
        $fecha = new DateTime('now');
        $fechaForm = $fecha->format('Y-m-d');
        var_dump($fechaForm);
        $sql = "INSERT into pedido(idRes,fecha) values(".$idRes['idRes'].",'$fechaForm')";
        $db->query($sql);
        $idPed = $db->lastInsertId();
        $keys = array_keys($carrito);
        
        for ($i=0; $i < count($carrito); $i++) { 
            var_dump($keys[$i]);
            $cant = $carrito[$keys[$i]];
            $c = (int)$cant;
            var_dump($c);
            echo $keys[$i]."<br>";
            echo $c."<br>";
            $sql = "INSERT into pedido_producto(idPed,idProd,cantidad) values(".$idPed.",".$keys[$i].",".$c.")";
            $db->query($sql);
        }
        
    }

    public function getCategoria($idCat) {

        $db = new PDO('mysql:host=localhost;dbname=practica12','root','');

        $sql = "SELECT * FROM categoria WHERE idcat = '$idCat'";
        $r = $db->query($sql);
        $res = $r->fetch();

        return $res;

    }



}