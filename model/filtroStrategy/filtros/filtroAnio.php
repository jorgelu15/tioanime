<?php
include_once "model/filtroStrategy/use/useAnio.php";
class FiltroAnio extends UseAnio {
    public $series;

    public function filtrar_anio($data, $page, $limit)
    {
        // $filtrado = [];
        // $items = [];
        // $genders = $data;

        // $consulta = "generos = '" . $genders[0] . "'";
        // for ($i = 1; $i < count($genders); $i++) {
        //     $consulta = $consulta . " OR generos = '" . $genders[$i] . "'";
        // }
        $statement = $this->connect()->query("SELECT * FROM animes WHERE anio = '$data'");//LIMIT PARA LA PAGINACION

        while ($row = $statement->fetch()) {
            $item = new Anime();
            $item->id = $row['id'];
            $item->titulo = $row['titulo'];
            $item->descripcion = $row['descripcion'];
            $item->portada = $row['portada'];
            $item->miniatura = $row['miniatura'];
            array_push($items, $item);
            // $i++;
        }
        // $filtrado = [$i, $items];

        return $items;

    }
}