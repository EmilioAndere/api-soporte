<?php

require_once '../config/Model.php';
require_once '../config/ConnectionDB.php';

class Reporte extends Model {

    protected $table;

    public function table($name){
        $this->table = $name;
    }

}