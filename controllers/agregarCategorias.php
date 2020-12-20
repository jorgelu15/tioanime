<?php 
    class AgregarCategorias extends Controller {
        function __construct() {
            parent::__construct();
        }

        function render() {
            if (!isset($_SESSION['email'])) {
                $url = constant('URL') . 'login';
                header('location: ' . $url . '');
            }
            
            $this->view->render('agregarCategorias/index');
        }
    }

?>