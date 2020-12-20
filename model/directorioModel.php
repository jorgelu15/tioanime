<?php
include_once "model/anime.php";
include_once "model/generos.php";
include_once "model/filtroStrategy/context.php";
include_once "model/filtroStrategy/filtros/filtroAnioEstadoGeneroTipo.php";
include_once "model/filtroStrategy/filtros/filtroGeneroAnioEstado.php";
include_once "model/filtroStrategy/filtros/filtroTipo.php";
include_once "model/filtroStrategy/filtros/filtroEstado.php";
include_once "model/filtroStrategy/filtros/filtroGenero.php";

class DirectorioModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function filtrar($genre, $anio, $estado, $tipo, $page, $limit)
    {

        $data = [$genre, $anio, $estado, $tipo];
        /******************************************************************************
         * EL SIGUIENTE FILTRO ES PARA CUANDO TODAS LAS CATEGORIAS ESTAN POR DEFECTO
         * *************************************************************************** */
       
        if (($genre == 'DEFAULT') && ($anio == 'DEFAULT') && ($estado == 'DEFAULT') && ($tipo == 'DEFAULT')) {
            $item = $this->getAllAnime($page, $limit);
            echo print_r($item);
            return;
            return $item;
        }
        // /******************************************************************************
        //  * EL SIGUIENTE FILTRO ES PARA CUANDO TODAS LAS CATEGORIAS ESTAN SETEADAS
        //  * *************************************************************************** */
        // if (!($genre == 'DEFAULT') && !($anio == 'DEFAULT') && !($estado == 'DEFAULT') && !($tipo == 'DEFAULT')) {
        //     $filtro = new Context(new FiltroAnioEstadoGeneroTipo);
        // }
        // /******************************************************************************
        //  * EL SIGUIENTE FILTRO ES PARA CUANDO LAS CATEGORIAS GENERO ANIO Y ESTADO ESTEN SETEADAS
        //  * *************************************************************************** */
        // if (!($genre == 'DEFAULT') && !($anio == 'DEFAULT') && !($estado == 'DEFAULT')) {
        //     $filtro = new Context(new FiltroGeneroAnioEstado);
        //     $item = $filtro->filtrar($data, $page, $limit);
        //     return $item;
        // }
        // /******************************************************************************
        //  * EL SIGUIENTE FILTRO ES PARA CUANDO LAS CATEGORIAS GENERO Y ANIO ESTEN SETEADAS
        //  * *************************************************************************** */
        // if (!($genre == 'DEFAULT') && !($tipo == 'DEFAULT') && !($estado == 'DEFAULT') && ($anio == 'DEFAULT')) {
        //     $filtro = new Context(new FiltroGeneroAnioEstado);
        //     $item = $filtro->filtrar($data, $page, $limit);
        //     return $item;
        // }

        // /******************************************************************************
        //  * EL SIGUIENTE FILTRO ES PARA CUANDO LAS CATEGORIAS GENERO TIPO Y ANIO ESTEN SETEADAS
        //  * *************************************************************************** */
        // if (!($genre == 'DEFAULT') && !($tipo == 'DEFAULT') && ($estado == 'DEFAULT') && !($anio == 'DEFAULT')) {
        //     $filtro = new Context(new FiltroGeneroTipoAnio);
        //     $item = $filtro->filtrar($data, $page, $limit);
        //     return $item;
        // }
        // /******************************************************************************
        //  * EL SIGUIENTE FILTRO ES PARA CUANDO LAS CATEGORIAS GENERO ESTADO Y ANIO ESTEN SETEADAS
        //  * *************************************************************************** */
        // if (!($genre == 'DEFAULT') && ($tipo == 'DEFAULT') && !($estado == 'DEFAULT') && !($anio == 'DEFAULT')) {
        //     $filtro = new Context(new FiltroGeneroAnioEstado);
        //     $item = $filtro->filtrar($data, $page, $limit);
        //     return $item;
        // }
        // /******************************************************************************
        //  * EL SIGUIENTE FILTRO ES PARA CUANDO LAS CATEGORIAS TIPO ESTADO Y ANIO ESTEN SETEADAS
        //  * *************************************************************************** */
        // if (($genre == 'DEFAULT') && !($tipo == 'DEFAULT') && !($estado == 'DEFAULT') && !($anio == 'DEFAULT')) {
        //     $filtro = new Context(new FiltroGeneroAnioEstado);
        //     $item = $filtro->filtrar($data, $page, $limit);
        //     return $item;
        // }

        // /******************************************************************************
        //  * EL SIGUIENTE FILTRO ES PARA CUANDO LAS CATEGORIAS GENERO Y TIPO ESTEN SETEADAS
        //  * *************************************************************************** */
        // if (!($genre == 'DEFAULT') && !($tipo == 'DEFAULT') && ($estado == 'DEFAULT') && ($anio == 'DEFAULT')) {
        //     $filtro = new Context(new FiltroGeneroTipo);
        //     $item = $filtro->filtrar($data, $page, $limit);
        //     return $item;
        // }
        // /******************************************************************************
        //  * EL SIGUIENTE FILTRO ES PARA CUANDO LAS CATEGORIAS GENERO Y ESTADO ESTEN SETEADAS
        //  * *************************************************************************** */
        // if (!($genre == 'DEFAULT') && ($tipo == 'DEFAULT') && !($estado == 'DEFAULT') && ($anio == 'DEFAULT')) {
        //     $filtro = new Context(new FiltroGeneroEstado);
        //     $item = $filtro->filtrar($data, $page, $limit);
        //     return $item;
        // }
        // /******************************************************************************
        //  * EL SIGUIENTE FILTRO ES PARA CUANDO LAS CATEGORIAS ESTADO Y TIPO ESTEN SETEADAS
        //  * *************************************************************************** */
        // if (($genre == 'DEFAULT') && !($tipo == 'DEFAULT') && !($estado == 'DEFAULT') && ($anio == 'DEFAULT')) {
        //     $filtro = new Context(new FiltroEstadoTipo);
        //     $item = $filtro->filtrar($data, $page, $limit);
        //     return $item;
        // }
        /******************************************************************************
         * EL SIGUIENTE FILTRO ES PARA CUANDO LAS CATEGORIAS GENERO ESTEN SETEADAS
         * *************************************************************************** */
        if (!($genre == 'DEFAULT') && ($tipo == 'DEFAULT') && ($estado == 'DEFAULT') && ($anio == 'DEFAULT')) {
            $filtro = new Context(new FiltroGenero);
            $item = $filtro->filtrar($data, $page, $limit);
            return $item;
        }
        /******************************************************************************
         * EL SIGUIENTE FILTRO ES PARA CUANDO LAS CATEGORIAS ANIO ESTEN SETEADAS
         * *************************************************************************** */
        if (($genre == 'DEFAULT') && ($tipo == 'DEFAULT') && ($estado == 'DEFAULT') && !($anio == 'DEFAULT')) {
            $filtro = new Context(new FiltroAnio);
            $item = $filtro->filtrar($data, $page, $limit);
            return $item;
        }
        /******************************************************************************
         * EL SIGUIENTE FILTRO ES PARA CUANDO LAS CATEGORIAS TIPO ESTEN SETEADAS
         * *************************************************************************** */
        if (($genre == 'DEFAULT') && !($tipo == 'DEFAULT') && ($estado == 'DEFAULT') && ($anio == 'DEFAULT')) {
            $filtro = new Context(new FiltroTipo);
            $item = $filtro->filtrar($data[3], $page, $limit);
            return $item;
        }
        /******************************************************************************
         * EL SIGUIENTE FILTRO ES PARA CUANDO LAS CATEGORIAS ESTADO ESTEN SETEADAS
         * *************************************************************************** */
        if (($genre == 'DEFAULT') && ($tipo == 'DEFAULT') && !($estado == 'DEFAULT') && ($anio == 'DEFAULT')) {
            $filtro = new Context(new FiltroEstado);
            $item = $filtro->filtrar($data, $page, $limit);
            return $item;
        }
    }

    function getGeneros()
    {
        $statement = $this->db->connect()->query("SELECT * FROM generos");//LIMIT PARA LA PAGINACION

        $items = [];

        while ($row = $statement->fetch()) {
            $item = new Generos();
            $item->id = $row['id_genero'];
            $item->genero = $row['generos'];
            array_push($items, $item);
            // $i++;
        }
        // $filtrado = [$i, $items];

        return $items;
    }


    function getAllAnime($page, $limit)
    {
        $statement = $this->db->connect()->query("SELECT * FROM animes ORDER BY id DESC LIMIT $page, $limit");

        while ($row = $statement->fetch()) {
            $item = new Anime();
            $item->id = $row['id'];
            $item->titulo = $row['titulo'];
            $item->sinopsis = $row['sinopsis'];
            $item->portada = $row['portada'];
            $item->miniatura = $row['miniatura'];
            array_push($items, $item);
            // $i++;
        }
        // $filtrado = [$i, $items];

        return $items;
    }
}
