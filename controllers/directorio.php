<?php
class Directorio extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->usuario = '';
        $this->view->paginas = '';
        $this->view->generos = [];
        $this->view->animesFiltrados = [];
    }

    function render()
    {
        $this->view->usuario = $this->session->getCurrentUser();
        $this->view->generos = $this->model->getGeneros();
        $this->view->render('directorio/index');
    }

    function filtrar()
    { 
        $numeroPagina = 12;
        $page = isset($_GET['page']) ? $_GET['page'] : '1';
        if(isset($_GET['q'])) {
            //Estos son los datos del formulario de busqueda
            $q = isset($_GET['q']) ? $_GET['q'] : '';
            $filtrado = $this->model->buscar($q, ($page - 1)*$numeroPagina);
        }else{
            if(isset($_GET['tipo']) || isset($_GET['estado']) || isset($_GET['genre']) || isset($_GET['anio'])) {
                $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : 'DEFAULT';
                $estado = isset($_GET['estado']) ? $_GET['estado'] : 'DEFAULT';
                $anio = isset($_GET['anio']) ? $_GET['anio'] : 'DEFAULT';
                $genre = isset($_GET['genre']) ? $_GET['genre'] : 'DEFAULT';
            }

            $filtrado = $this->model->filtrar($genre, $anio, $estado, $tipo, ($page - 1)*$numeroPagina, $numeroPagina);
            $this->view->paginas = ceil(count($filtrado) / $numeroPagina);

            $this->view->animesFiltrados = $filtrado;
        }
        $this->render();
    }
}
