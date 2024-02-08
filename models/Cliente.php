<?php

namespace Model;

class Cliente extends ActiveRecord {
    protected static $tabla = 'cliente';
    protected static $columnasDB = ['id', 'nombre_cliente', 'telefono'];

    public $id;
    public $nombre_cliente;
    public $telefono;

    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre_cliente = $args['nombre_cliente'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar() {
        if(!$this->nombre_cliente) {
            self::$alertas['error'][] = 'El Nombre del Cliente es Obligatorio';
        }
        if(!$this->telefono) {
            self::$alertas['error-admin'][] = 'El Teléfono es Obligatorio';
        }
        return self::$alertas;
    }
}