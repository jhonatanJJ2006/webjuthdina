<?php

namespace Model;

class Tipo extends ActiveRecord {
    protected static $tabla = 'tipos';
    protected static $columnasDB = ['id', 'nombre', 'imagen'];

    public $id;
    public $nombre;
    public $imagen;
}