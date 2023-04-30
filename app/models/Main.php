<?php

namespace app\models;
use app\core\Model;

class Main extends Model
{
    public function sendform($color, $skin_color, $handle_color, $width, $height, $opening, $accessories)
    {
        $this->db->add("INSERT INTO `doors`(`id`, `color`, `skin_color`, `handle_color`, `width`, `height`, `opening`, `accessories`) VALUES (null, '$color', '$skin_color', '$handle_color', '$width', '$height', '$opening', '$accessories')");
    }

    public function getpdf($table)
    {
        $data = $this->db->get("SELECT * FROM $table");
        return $data->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getRow($table)
    {
        $data = $this->db->get("SELECT * FROM $table");
        return $data->fetchAll(\PDO::FETCH_COLUMN);
    }
}