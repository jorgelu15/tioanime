<?php 
    class Ver extends Controller {
        function __construct() {
            parent::__construct();
            $this->view->usuario = '';
        }

        function render() {
            $this->view->usuario = $this->session->getCurrentUser();
            $this->view->render('ver/index');
        }
    }

?>