<?php

class DbComent {

    public function getComentByUser($idUser) {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT * FROM comentario WHERE idUser = $idUser";
            $res = $db->query($sql);

            $coms = [];

            foreach( $res as $c) {
                
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return $res;

    }

}