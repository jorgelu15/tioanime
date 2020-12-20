<?php
include_once "model/anime.php";
class AgregarCapituloModel extends Model
{


    function __construct()
    {
        parent::__construct();
    }

    function agregar($data)
    {
        $opciones = [$data['opcion1'], $data['opcion2']];
        $statement = $this->db->connect()->prepare("INSERT INTO capitulos(titulo, miniatura) values(:titulo, :miniatura)");
        $statement->execute([':titulo' => $data['titulo'], ':miniatura' => $data['miniatura'] ]);

        for ($i = 0; $i < count($opciones); $i++) {
            $idCap = $this->getId($data['titulo']);
            $statement = $this->db->connect()->prepare("INSERT INTO opciones(embed, id_capitulo) values(:embed, :id)");
            $statement->execute([':embed' => $opciones[$i], ':id' => $idCap]);
        }
    }

    function getId($nombre)
    {
        $statement = $this->db->connect()->query("SELECT * FROM capitulos WHERE titulo = '" . $nombre . "'");
        while ($row = $statement->fetch()) {
            $id = $row['id_capitulo'];
        }
        return $id;
    }

    function getSeries()
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
