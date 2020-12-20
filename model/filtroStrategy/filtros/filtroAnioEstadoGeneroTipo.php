<?php
include_once "model/filtroStrategy/use/useAnioEstadoGeneroTipo.php";
class FiltroAnioEstadoGeneroTipo extends UseAnioEstadoGeneroTipo {
    public $series;

    public function filtrar_AnioEstadoGeneroTipo($data, $page, $limit)
    {
        // $filtrado = [];
        // $items = [];
        // $genders = $data;

        // $consulta = "generos = '" . $genders[0] . "'";
        // for ($i = 1; $i < count($genders); $i++) {
        //     $consulta = $consulta . " OR generos = '" . $genders[$i] . "'";
        // }
        $statement = $this->connect()->query("SELECT * FROM animes WHERE anio = '$data[1]' AND TIPO = '$data[3]' AND ESTADO = '$data[2]");//LIMIT PARA LA PAGINACION

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