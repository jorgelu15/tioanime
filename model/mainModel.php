<?php
include_once "model/anime.php";
include_once "model/capitulo.php";
class MainModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getCapitulos()
    {
        $items = [];
        $statement = $this->db->connect()->query("SELECT * FROM capitulos LIMIT 10");
        while ($row = $statement->fetch()) {
            $item = new Capitulo();
            $item->id = $row['id_capitulo'];
            $item->nombre = $row['titulo'];
            $item->miniatura = $row['miniatura'];

            array_push($items, $item);
        }
        return $items;
    }

    function getAnimes()
    {
        $items = [];
        $statement = $this->db->connect()->query("SELECT * FROM animes LIMIT 10");
        while ($row = $statement->fetch()) {
            $item = new Anime();
            $item->id = $row['id'];
            $item->titulo = $row['titulo'];
            $item->portada = $row['portada'];
            $item->miniatura = $row['sinopsis'];

            array_push($items, $item);
        }
        return $items;
    }
}
