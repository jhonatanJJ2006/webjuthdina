<?php

namespace Classes;

class Meses {
    public $mes_actual;
    public $dias;
    
    public function __construct($mes_actual = '', $dias = 31) {
        $this->mes_actual = (int) $mes_actual;
        $this->dias = (int) $dias;
    }

    public function pagina_anterior() {
        $anterior = $this->mes_actual -1;
        return ($anterior > 0) ? $anterior : false;
    }

    public function pagina_siguiente() {
        $siguiente = $this->mes_actual +1;
        return ($siguiente) ? $siguiente : false;
    }

    public function enlace_anterior() {
        $html = '';
        if($this->pagina_anterior()) {
            $html .= "<a class=\"paginacion__enlace paginacion__enlace--texto\" href=\"?mes={$this->pagina_anterior()}\">&laquo; Mes Anterior</a>";
        }
        return $html;
    }

    public function enlace_siguiente() {
        $html = '';
        if($this->pagina_siguiente()) {
            $html .= "<a class=\"paginacion__enlace paginacion__enlace--texto\" href=\"?mes={$this->pagina_siguiente()}\">Mes Siguiente &raquo;</a>";
        }
        return $html;
    }

    public function paginacion() {
        $html = '';

        $html .= "<div class=\"paginacion\">";
        $html .= $this->enlace_anterior();
        $html .= $this->enlace_siguiente();
        $html .= "</div>";

        return $html;
    }
}
