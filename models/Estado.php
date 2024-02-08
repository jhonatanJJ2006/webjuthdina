<?php

namespace Model;

class Estado extends ActiveRecord {
    protected static $tabla = 'estados';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;
}