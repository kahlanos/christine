<?php

class User {

    public int $id;
    public string $user;
    public string $passw;
    public string $nombre;
    public string $apellido;
    public int $tokens;
    public int $admin;
    public array $coments;


    function __construct($id, $user, $passw, $nombre, $apellido, $tokens, $admin)
    {
        $this->id = $id;
        $this->user = $user;
        $this->passw = $passw;
        if ($nombre ==  NULL) {
            $this->nombre = "";
        } else {
           $this->nombre = $nombre; //$this->nombre = $nombre ??'';
        }
        if ($apellido ==  NULL) {
            $this->apellido = "";
        } else {
           $this->apellido = $apellido;
        }        
        $this->tokens = $tokens;
        $this->admin = $admin;
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
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of passw
     */ 
    public function getPassw()
    {
        return $this->passw;
    }

    /**
     * Set the value of passw
     *
     * @return  self
     */ 
    public function setPassw($passw)
    {
        $this->passw = $passw;

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
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of tokens
     */ 
    public function getTokens()
    {
        return $this->tokens;
    }

    /**
     * Set the value of tokens
     *
     * @return  self
     */ 
    public function setTokens($tokens)
    {
        $this->tokens = $tokens;

        return $this;
    }

    /**
     * Get the value of coments
     */ 
    public function getComents()
    {
        return $this->coments;
    }

    /**
     * Set the value of coments
     *
     * @return  self
     */ 
    public function setComents($coments)
    {
        $this->coments = $coments;

        return $this;
    }

    public function addComent($coment) {
        // array_push($this->coments, $coment);
        $this->coments[] = $coment;
    }
}