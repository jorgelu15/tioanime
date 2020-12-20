<?php
include_once "model/filtroStrategy/iestragia.php";
abstract class UseGenero implements IEstrategia
{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function connect()
    {
        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset = constant('CHARSET');
        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            $pdo = new PDO($connection, $this->user, $this->password, $options);

            return $pdo;
        } catch (PDOException $e) {
            print_r('Error connection: ' . $e->getMessage());
        }
    }

    
    public function filtrar($data, $page, $limit)
    {
        return $this->filtrar_genero($data, $page, $limit);
    }

    abstract function filtrar_genero($data, $page, $limit);
}
