<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="admin__contenedor">
    <?php if(!empty($pedidos)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th class="table__th-display" scope="col">Pedido</th>
                    <th class="table__th table__th--ponentes" scope="col">Imagen</th>
                    <th class="table__th table__th--ponentes" scope="col">Nombre</th>
                    <th class="table__th table__th--ponentes" scope="col">Cliente</th>
                    <th class="table__th table__th--acciones" scope="col">Estado</th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($pedidos as $pedido) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <div class="formulario-admin__imagen">
                                <picture>
                                    <source class="" srcset="<?php echo '/build/img/pedidos/' . $pedido->imagen . '.webp'?>" type="image/webp">
                                    <source class="" srcset="<?php echo '/build/img/pedidos/' . $pedido->imagen . '.png'?>" type="image/png">
                                    <img class="formulario-admin__imagen--table" src="<?php echo '/build/img/pedidos/' . $pedido->imagen . '.png'?>" alt="Imagen pedido">
                                </picture>
                            </div>
                        </td>

                        <td class="table__td">
                            <?php echo $pedido->nombre ?? '' ?>
                        </td>

                        <td class="table__td">
                            <?php
                                foreach($clientes as $cliente) {
                                    if($pedido->cliente_telefono === $cliente->telefono) {
                                        echo $cliente->nombre_cliente . ' ' . $cliente->apellido ?? ''; 
                                    }
                                }
                            ?>                    
                        </td>

                        <td class="table__td">
                            <div class="table__td--hora-estado">
                                <?php 
                                    foreach($estados as $estado) {
                                        if($pedido->estado_id === $estado->id) {
                                            echo $estado->nombre;
                                        }
                                    }
                                ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>    
        <p class="text-center">No hay pedidos Aún</p>
    <?php } ?>    
</div>

<?php
    echo $paginacion;
?>