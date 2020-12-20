<?php
class Panel extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->usuario = '';
    }

    function render()
    {
        /*if (!isset($_SESSION['email'])) {
            $url = constant('URL') . 'login';
            header('location: ' . $url . '');
        }*/

        if ($this->session->getCurrentEmail() === null) {
            $url = constant('URL') . 'login';
            header('location: ' . $url . '');
        }

        $this->view->usuario = $this->session->getCurrentUser();
        $this->view->render('panel/index');
    }

    function cerrarSession()
    {   
        $this->session->closeSession();
    }
}
