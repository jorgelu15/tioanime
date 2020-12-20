<?php

class LoginModel extends Model
{

    private $correo;
    private $username;


    public function __construct()
    {
        parent::__construct();
    }

    public function userExists($data)
    {
        $query = $this->db->connect()->prepare("SELECT * FROM usuarios WHERE correo = :correo AND password = :pass");
        $query->execute([':correo' => $data['correo'], ':pass' => $data['password']]);

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function setUser($correo)
    {
        $query = $this->db->connect()->prepare("SELECT * FROM usuarios WHERE correo = :correo");
        $query->execute([':correo' => $correo]);

        foreach ($query as $datos) {
            $this->username = $datos['username'];
            $this->correo = $datos['correo'];
        }

        return $this->username;
    }

    public function getUsername()
    {
        return $this->username;
    }
}
