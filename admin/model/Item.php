<?php

class Item {

    public int $id;
    public string $nombre;
    public string $descripcion;
    public string $categoria;
    public float $precio;
    public string $img1;
    public string $img2;
    public string $img3;
    public string $latitud;
    public string $longitud;
    public int $n_compras;
    public int $n_comentarios;
    public int $puntuacion;


    function __construct($id, $nombre, $descripcion, $precio, $img1, $puntuacion) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->categoria = $categoria ??'';
        $this->precio = $precio ??0;
        $this->img1 = $img1??'';
        $this->puntuacion = $puntuacion??0;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of categoria
     */ 
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of categoria
     *
     * @return  self
     */ 
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of img1
     */ 
    public function getimg1()
    {
        return $this->img1;
    }

    /**
     * Set the value of img1
     *
     * @return  self
     */ 
    public function setimg1($img1)
    {
        $this->img1 = $img1;

        return $this;
    }

    /**
     * Get the value of img2
     */ 
    public function getimg2()
    {
        return $this->img2;
    }

    /**
     * Set the value of img2
     *
     * @return  self
     */ 
    public function setimg2($img2)
    {
        $this->img2 = $img2;

        return $this;
    }

    /**
     * Get the value of img3
     */ 
    public function getimg3()
    {
        return $this->img3;
    }

    /**
     * Set the value of img3
     *
     * @return  self
     */ 
    public function setimg3($img3)
    {
        $this->img3 = $img3;

        return $this;
    }

    /**
     * Get the value of latitud
     */ 
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set the value of latitud
     *
     * @return  self
     */ 
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get the value of longitud
     */ 
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Set the value of longitud
     *
     * @return  self
     */ 
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get the value of n_compras
     */ 
    public function getN_compras()
    {
        return $this->n_compras;
    }

    /**
     * Set the value of n_compras
     *
     * @return  self
     */ 
    public function setN_compras($n_compras)
    {
        $this->n_compras = $n_compras;

        return $this;
    }

    /**
     * Get the value of n_comentarios
     */ 
    public function getN_comentarios()
    {
        return $this->n_comentarios;
    }

    /**
     * Set the value of n_comentarios
     *
     * @return  self
     */ 
    public function setN_comentarios($n_comentarios)
    {
        $this->n_comentarios = $n_comentarios;

        return $this;
    }

    /**
     * Get the value of puntuacion
     */ 
    public function getPuntuacion()
    {
        return $this->puntuacion;
    }

    /**
     * Set the value of puntuacion
     *
     * @return  self
     */ 
    public function setPuntuacion($puntuacion)
    {
        $this->puntuacion = $puntuacion;

        return $this;
    }
}