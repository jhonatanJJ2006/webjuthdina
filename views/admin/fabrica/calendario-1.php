<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="admin__contenedor">

    <?php if(!empty($pedidos)) { ?>


        <div class="calendario">

            <h2 class="calendario__h2">
                <?php
                    switch ($mostrar_meses->mes_actual) {
                        case 1:
                            echo 'Enero';
                            break;
                        case 2:
                            echo 'Febrero';
                            break;
                        case 3:
                            echo 'Marzo';
                            break;
                        case 4:
                            echo 'Abril';
                            break;
                        case 5:
                            echo 'Mayo';
                            break;
                        case 6:
                            echo 'Junio';
                            break;
                        case 7:
                            echo 'Julio';
                            break;
                        case 8:
                            echo 'Agosto';
                            break;
                        case 9:
                            echo 'Septiembre';
                            break;
                        case 10:
                            echo 'Octubre';
                            break;
                        case 11:
                            echo 'Noviembre';
                            break;
                        case 12:
                            echo 'Diciembre';
                            break;
                        default:
                            echo 'Mes Invalido';
                    }
                ?>
            </h2>

            <div class="calendario__head">
                <div class="calendario__head--dia">Lu</div>
                <div class="calendario__head--dia">Ma</div>
                <div class="calendario__head--dia">Mi</div>
                <div class="calendario__head--dia">Ju</div>
                <div class="calendario__head--dia">Vi</div>
                <div class="calendario__head--dia">Sa</div>
                <div class="calendario__head--dia">Do</div>
            </div>

            <div class="calendario__body">

                <?php  ?>

                <?php for( $i=1 ; $i <= $mostrar_meses->dias; $i ++ ) { ?>
                    
                    <?php 
                        date_default_timezone_set('America/Guayaquil');

                        $fechaActual = new DateTime();
                        $fecha_formateada = $fechaActual->format('Y-m-d');

                        $zona_horaria = 'America/Guayaquil';

                        $fecha = new DateTime("$i-$mostrar_meses->mes_actual-" . date("Y"), new DateTimeZone($zona_horaria));
                        $dia_de_la_semana = $fecha->format('w'); 
                        $fecha_completa = $fecha->format('Y-m-d');

                        $nombre_del_dia = ['domingo', 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado'];
                        $nombre_del_dia_resultante = $nombre_del_dia[$dia_de_la_semana];
                    ?>
                    <div class="calendario__body--dia <?php if($i == $dia_actual && $fecha_completa == $fecha_formateada  ) {echo 'calendario__dia-actual';} ?> calendario__body--dia-<?php echo $nombre_del_dia_resultante ?>">

                        <p class="calendario__dia">

                            <?php echo $i; ?>

                        </p>

                        <div class="calendario__enlace">

                            <?php
                                foreach($pedidos as $key => $pedido) {

                                    if(trim($pedido->fecha_entrega) === $fecha_completa) { ?>
                        
                                        <?php $numero ++; ?>
                        
                                        <a class="calendario__pedido" href="/fabrica-1/pedidos/informacion?id=<?php echo $pedido->id ?>"><?php echo $numero ?></a>
                        
                                    <?php }
                                }
                            ?>

                        </div>

                    </div>

                <?php } ?>
                
            </div>

        </div>

    <?php } else { ?>    
        <p class="text-center">No hay pedidos Aún</p>
    <?php } ?>    
</div>

<?php

use Model\Pedido;
    echo $paginacion;
?>