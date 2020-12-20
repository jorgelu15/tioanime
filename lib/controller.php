<?php
class Controller
{
    function __construct()
    {
        $this->view = new View();
        $this->session = new Session();
        $this->session->init();    
    }

    function loadModel($model)
    {
        $url = "model/" . $model . "model.php";

        if (file_exists($url)) {
            require $url;

            $modelName = $model . "Model";

            $this->model = new $modelName();
        }
    }
}
