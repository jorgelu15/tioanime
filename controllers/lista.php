<?php 
    class Lista extends Controller {
        function __construct() {
            parent::__construct();
            $this->view->animes = [];
            $this->view->usuario = '';
        }

        function render() {
            $this->view->usuario = $this->session->getCurrentUser();
            $animes = $this->model->getAnimes();
            $this->view->animes = $animes;
            $this->view->render('lista/index');
        }

    }
