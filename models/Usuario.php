<?php

namespace Model;

class Usuario extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'email', 'password', 'rol', 'fabrica'];

    public $id;
    public $nombre;
    public $email;
    public $password;
    public $password2;
    public $rol;
    public $fabrica;

    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->rol = $args['rol'] ?? null;
        $this->fabrica = $args['fabrica'] ?? 'null';
    }

    // Validación para cuentas nuevas
    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error-admin'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->email) {
            self::$alertas['error-admin'][] = 'El Email es Obligatorio';
        }
        if(!$this->password) {
            self::$alertas['error-admin'][] = 'El Password no puede ir vacio';
        }
        if(strlen($this->password) < 6) {
            self::$alertas['error-admin'][] = 'El password debe contener al menos 6 caracteres';
        }
        if($this->password !== $this->password2) {
            self::$alertas['error-admin'][] = 'Los password son diferentes';
        }
        if(!$this->rol) {
            self::$alertas['error-admin'][] = 'El Rol es Obligatorio';
        }
        return self::$alertas;
    }

    public function hashPassword() : void {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    // Validar Login
    public function validarLogin() {
        if(!$this->email) {
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        if(!$this->password) {
            self::$alertas['error'][] = 'El Password es Obligatorio';
        }
        return self::$alertas;
    }
}