<?php 

    class RegistroModel extends Model {

        public function Log() {
            parent::__construct();
        }

        public function registrar($datos) {
            $statement = $this->db->connect()->prepare("INSERT INTO usuarios(username, correo, password) values(:correo, :nombre, :password)");
            $statement->execute([':correo' => $datos['username'], ':nombre' => $datos['correo'], ':password' => $datos['password']]);
        }
        

    }


?>