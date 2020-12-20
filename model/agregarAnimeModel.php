<?php

include_once "model/categorias.php";

class AgregarAnimeModel extends Model
{


    function __construct()
    {
        parent::__construct();
    }

    function agregar($datos, $categorias)
    {
        $statement = $this->db->connect()->prepare("INSERT INTO animes(titulo, portada, miniatura, sinopsis) values(:titulo, :portada, :miniatura, :sinopsis)");
        $statement->execute([':titulo' => $datos['titulo'], ':portada' => $datos['img'], ':miniatura' => $datos['miniatura'], ':sinopsis' => $datos['sinopsis']]);

        for ($i = 0; $i < count($categorias); $i++) {
            $cat = $this->getIdAnime($categorias[$i]);
            $anime = $this->db->connect()->query("SELECT * FROM animes WHERE titulo = '" . $datos['titulo'] . "'");

            while($serie = $anime->fetch()) {
                $statement = $this->db->connect()->prepare("INSERT INTO entrada(id_anime, id_categoria) values(:idanime, :idcat)");
                $statement->execute([':idanime' => $serie['id'], ':idcat' => $cat]);
            }
        }
        return true;
    }

    function getIdAnime($nombre) {
        $statement = $this->db->connect()->query("SELECT * FROM categorias WHERE nombre_categoria = '" . $nombre . "'");
        while($row = $statement->fetch()) {
            $id = $row['id_categoria'];
        }
        return $id;
    }

    function getCategorias()
    {
        $items = [];

        try {
            $statement = $this->db->connect()->query("SELECT * FROM categorias");

            while ($row = $statement->fetch()) {
                $item = new Categorias();
                $item->id = $row['id_categoria'];
                $item->categoria = $row['nombre_categoria'];


                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
}
