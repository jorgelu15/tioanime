<?php
include_once "model/filtroStrategy/iestragia.php";
class Context
{

    private $estrategia;

    public function __construct(IEstrategia $estrategia)
    {
        $this->estrategia = $estrategia;
    }

    public function filtrar($data, $page, $limit)
    {
        return $this->estrategia->filtrar($data, $page, $limit);
    }
}
