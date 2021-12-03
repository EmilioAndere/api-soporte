<?php

require_once '../config/ConnectionDB.php';
require_once '../config/Model.php';

class Usuario extends Model {

    protected $table = "usuarios";
    protected $primaryKey = "id";

}