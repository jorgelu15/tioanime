<?php 
    class AgregarCapitulo extends Controller {
        function __construct() {
            parent::__construct();
            $this->view->series = [];
        }

        function render() {
            if (!isset($_SESSION['email'])) {
                $url = constant('URL') . 'login';
                header('location: ' . $url . '');
            }
            
            $series = $this->model->getSeries();
            $this->view->series = $series;
            $this->view->render('agregarCapitulo/index');
        }

        function subir() {
            $nombre = $_POST['nombreCap'];
            $miniatura = $_POST['miniatura'];
            $opcion1 = $_POST['opcion-1'];
            $opcion2 = $_POST['opcion-2'];
            $animeid = $_POST['animeid'];

            $this->model->agregar(['titulo' => $nombre, 'miniatura' => $miniatura, 'opcion1' => $opcion1, 'opcion2' => $opcion2, 'animeid' => $animeid]);
            header('location: ../agregarCapitulo');
        }
    }

?>