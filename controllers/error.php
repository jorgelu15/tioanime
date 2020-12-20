<?php 
    class Errores extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->mensaje = "ERROR 404, NO SE ENCONTRO LA PAGINA";
            $this->view->render('errores/index');
        }
    }
?>