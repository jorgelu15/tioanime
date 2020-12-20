<?php 
    class Anime extends Controller {
        function __construct() {
            parent::__construct();
            $this->view->usuario = '';
        }

        function render() {
            $this->view->usuario = $this->session->getCurrentUser();
            $this->view->render('Anime/index');
        }
    }

?>