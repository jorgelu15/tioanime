<?php 
    class Login extends Controller {
        function __construct() {
            parent::__construct();
            $this->errorLogin = '';
        }

        function render() {

            if(isset($_SESSION['email'])){
                $url = constant('URL') . 'panel';
                header('location: '.$url.'');
            }

            $this->view->render('login/index');
        }

        public function iniciarSesion() {
            $correo = $_POST['correo'];
            $password = $_POST['password'];


            $auth = $this->model->userExists(['correo' => $correo, 'password' => $password]);

            if($auth == true) {
                $this->session->init();
                $this->session->setCurrentEmail($correo);
                $usuario = $this->model->setUser($correo);
                $this->session->setCurrentUser($usuario);


                header('location: ../panel');
            } else {
                $this->session->closeSession();
                $this->errorLogin = "<div style='position: absolute; top: 0; right: 0; padding: 50px'><div class='alert alert-warning' id='alert' role='alert'>El correo o la contraseña son incorrectos.</div></div>";
                $this->render();
            }
        }

    }
