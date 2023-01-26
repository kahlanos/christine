<?php

class Conexion {
    public function getConexion() {
        return new PDO('mysql:host=localhost;dbname=christine','root','');
    }
}