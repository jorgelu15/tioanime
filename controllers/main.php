<?php 
    class Main extends Controller {
        function __construct() {
            parent::__construct();
            $this->view->usuario = '';
            $this->view->animes = [];
            $this->view->capitulos = [];
        }

        function render() {
            $this->view->capitulos = $this->model->getCapitulos();
            $this->view->animes = $this->model->getAnimes();
            $this->view->render('main/index');
        }
        
    }

?>