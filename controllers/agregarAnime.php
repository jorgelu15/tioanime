<?php 
    class AgregarAnime extends Controller {
        function __construct() {
            parent::__construct();
            $this->view->categorias = [];
        }

        function render() {
            if (!isset($_SESSION['email'])) {
                $url = constant('URL') . 'login';
                header('location: ' . $url . '');
            }
            
            $categorias = $this->model->getCategorias();
            $this->view->categorias = $categorias;
            $this->view->render('agregarAnime/index');
        }

        function subir() {
            $titulo = $_POST['nombreAnime'];
            $img = $_POST['img'];
            $miniatura = $_POST['miniatura'];
            $sinopsis = $_POST['sinopsis'];

            $generos = $_POST['categorias'];
            $datos = ['titulo' => $titulo, 'img' => $img, 'miniatura' => $miniatura, 'sinopsis' => $sinopsis];

            $subida = $this->model->agregar($datos, $generos);

            header('location: ../agregarAnime');

        }
    }

?>