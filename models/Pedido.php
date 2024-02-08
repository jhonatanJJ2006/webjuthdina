<?php

namespace Model;

class Pedido extends ActiveRecord {
    protected static $tabla = 'pedidos';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'fabrica_id', 'estado_id', 'imagen', 'forma', 'tamaño', 'color', 'fecha_actual', 'hora_actual', 'sabor', 'motivo', 'pago', 'precio', 'responsable', 'fecha_entrega', 'hora_entrega', 'abono', 'entrega', 'medidas', 'adicional'];

    public $id;
    public $nombre;
    public $descripcion;
    public $fabrica_id;
    public $estado_id;
    public $imagen;
    public $forma;
    public $color;
    public $fecha_actual;
    public $hora_actual;
    public $sabor;
    public $motivo;
    public $pago;
    public $precio;
    public $abono;
    public $responsable;
    public $entrega;
    public $fecha_entrega;
    public $hora_entrega;
    public $medidas;
    public $adicional;

    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->fabrica_id = $args['fabrica_id'] ?? 0;
        $this->estado_id = $args['estado_id'] ?? 1;
        $this->imagen = $args['imagen'] ?? '';
        $this->forma = $args['forma'] ?? '';
        $this->color = $args['color'] ?? '';
        $this->fecha_actual = $args['fecha_actual'] ?? '';
        $this->hora_actual = $args['hora_actual'] ?? '';
        $this->sabor = $args['sabor'] ?? '';
        $this->motivo = $args['motivo'] ?? '';
        $this->pago = $args['pago'] ?? '';
        $this->precio = $args['precio'] ?? 0;
        $this->responsable = $args['responsable'] ?? '';
        $this->fecha_entrega = $args['fecha_entrega'] ?? '';
        $this->hora_entrega = $args['hora_entrega'] ?? '';
        $this->abono = $args['abono'] ?? 0;
        $this->entrega = $args['entrega'] ?? '';
        $this->medidas = $args['medidas'] ?? '';
        $this->adicional = $args['adicional'] ?? '';
    }

    // Validación para cuentas nuevas
    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error-admin'][] = 'El Nombre del Pastel es Obligatorio';
        }
        if(!$this->descripcion) {
            self::$alertas['error-admin'][] = 'La Descripcion del Pastel es Obligatorio';
        }
        if(!$this->imagen) {
            self::$alertas['error-admin'][] = 'La Imagen del Pastel es Obligatorio';
        }
        if(!$this->forma) {
            self::$alertas['error-admin'][] = 'La Forma del Pastel es Obligatorio';
        }
        if(!$this->medidas) {
            self::$alertas['error-admin'][] = 'El Tamaño del Pastel es Obligatorio';
        }
        if(!$this->color) {
            self::$alertas['error-admin'][] = 'El Color del Pastel es Obligatorio';
        }
        if(!$this->fecha_entrega) {
            self::$alertas['error-admin'][] = 'La Fecha de Entrega del Pastel es Obligatoria';
        }
        if(!$this->hora_entrega) {
            self::$alertas['error-admin'][] = 'La Hora de Entrega del Pastel es Obligatoria';
        }
        if(!$this->sabor) {
            self::$alertas['error-admin'][] = 'El Sabor del Pastel es Obligatorio';
        }
        if(!$this->motivo) {
            self::$alertas['error-admin'][] = 'El Motivo del Pastel es Obligatorio';
        }
        if(!$this->pago) {
            self::$alertas['error-admin'][] = 'El Pago del Pastel es Obligatorio';
        }
        if(!$this->precio) {
            self::$alertas['error-admin'][] = 'El Precio del Pastel es Obligatorio';
        }
        if(!$this->responsable) {
            self::$alertas['error-admin'][] = 'El Responsable del Pastel es Obligatorio';
        }
        if(!$this->entrega) {
            self::$alertas['error-admin'][] = 'El Lugar de la Entrega del Pastel es Obligatorio';
        }
        return self::$alertas;
    }
}