<?php
include_once "model/anime.php";
class ListaModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getAnimes()
    {
        $items = [];
        $statement = $this->db->connect()->query("SELECT * FROM animes");
        while ($row = $statement->fetch()) {
            $item = new Anime();
            $item->id = $row['id'];
            $item->titulo = $row['titulo'];
            $item->descripcion = $row['portada'];
            $item->miniatura = $row['sinopsis'];

            array_push($items, $item);
        }
        return $items;
    }
}
