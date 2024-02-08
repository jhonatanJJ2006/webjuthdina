<h2 class="dashboard__heading"><?php echo $titulo ?></h2>


<div class="filtrar">
    
    <div class="filtrar__block">

        <h3 class="table__thead filtrar__h3">Opciones de Busqueda</h3>
        
        <div class="filtrar__grid">

            <div>
                <form class="table__formulario" method="POST">
                    <label class="formulario-admin__label filtrar__label" for="fecha">Fecha</label>
                    <input class="formulario-admin__input filtrar__input" id="fecha" type="date" placeholder="Fecha de Pedido" name="fecha">
                    <input class="formulario-admin__submit formulario-admin__submit--registrar filtrar__boton" type="submit" value="Buscar Fecha">
                </form>
            </div>
    
            <div>
                <label class="formulario-admin__label filtrar__label">Estado</label>
                <div class="formulario-admin__input">
                    <form class="table__formulario" method="POST">
                        <input type="hidden" name="estado" value="1">
                        <button class="table__accion--estado" type="submit">
                            <i class="fa-solid fa-cake-candles"></i>
                            Sin Confirmar 
                        </button>
                    </form>
            
                    <form class="table__formulario" method="POST">
                        <input type="hidden" name="estado" value="2">
                        <button class="table__accion--estado" type="submit">
                            <i class="fa-solid fa-cake-candles"></i>
                            Orden Confirmada
                        </button>
                    </form>
            
                    <form class="table__formulario" method="POST">
                        <input type="hidden" name="estado" value="3">
                        <button class="table__accion--estado" type="submit">
                            <i class="fa-solid fa-cake-candles"></i>
                            Orden Lista
                        </button>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>

<div class="admin__contenedor">
    <?php if(!empty($pedidos)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th class="table__th-display" scope="col">Pedido</th>
                    <th class="table__th table__th--ponentes" scope="col">Imagen</th>
                    <th class="table__th table__th--ponentes" scope="col">Nombre</th>
                    <th class="table__th table__th--ponentes" scope="col">Cliente</th>
                    <th class="table__th table__th--ponentes" scope="col">Fecha de Entrega</th>
                    <th class="table__th table__th--acciones" scope="col">Estado</th>
                    <th class="table__th table__th--acciones" scope="col">Información</th>
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
                            <div class="table__td--fecha"><?php echo $pedido->fecha_entrega ?></div>
                            <div class="table__td--hora"><?php echo $pedido->hora_entrega ?></div>
                        </td>

                        <td class="table__td">
                            <?php echo $pedido->estado ?? 'Sin Confirmar' ?>
                        </td>

                        <td class="table__td">
                            <a class="table__td--boton" href="/admin/ordenes/informacion?id=<?php echo $pedido->id ?>">Ver Más</a>
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