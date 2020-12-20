<?php 
    class Registro extends Controller {
        function __construct() {
            parent::__construct();
        }

        function render() {
            $this->view->render('registro/index');
        }

        function crear_usuario() {
            $username = $_POST['username'];
            $correo = $_POST['user'];
            $password = $_POST['password'];

            $this->model->registrar(['username' => $username, 'correo' => $correo, 'password' => $password]);
        }
    }

?>