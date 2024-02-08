<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<?php if($admin) { ?>
    <div class="admin__contenedor-boton">
        <a class="admin__boton" href="/admin/ordenes">
            <i class="fa-solid fa-circle-arrow-left"></i>
            Volver
        </a>
    </div>        
<?php } else { ?>
    <div class="admin__contenedor-boton">
        <?php
            session_start();
            if($_SESSION['fabrica'] == 1 || $_SESSION['rol'] == 1 && str_contains($_SERVER['PATH_INFO'] ?? '/', '/fabrica-1')) { ?>                
                <a class="admin__boton" href="/fabrica-1/pedidos">
                    <i class="fa-solid fa-circle-arrow-left"></i>
                    Volver
                </a>
            <?php } else { ?>    
                <a class="admin__boton" href="/fabrica-2/pedidos">
                    <i class="fa-solid fa-circle-arrow-left"></i>
                    Volver
                </a>
            <?php }
        
        ?>
    </div>
<?php } ?>

<div class="informacion">

    <h3 class="dashboard__heading"><?php echo $pedido->nombre ?></h3>

    <?php if($pedido->estado_id == 2) { ?>

            <form class="table__formulario" method="POST">
                <label class="informacion__label" for="fecha">Confirme que el pedido esta listo para enviar</label>
                <input type="hidden" name="id" value="<?php echo $pedido->id ?>">
                <input class="formulario-admin__submit formulario-admin__submit--registrar filtrar__boton informacion__boton" type="submit" value="Confirmar">
            </form>

        <?php } ?>


    <div class="informacion__grid">
        <picture>
            <source class="" srcset="<?php echo '/build/img/pedidos/' . $pedido->imagen . '.webp'?>" type="image/webp">
            <source class="" srcset="<?php echo '/build/img/pedidos/' . $pedido->imagen . '.png'?>" type="image/png">
            <img class="informacion__imagen" src="<?php echo '/build/img/pedidos/' . $pedido->imagen . '.png'?>" alt="Imagen pedido">
        </picture>  

        <div class="informacion__descripcion">
            <?php echo $pedido->descripcion ?>
        </div>            
    </div>

    <div class="informacion__grid-caracteristicas">
        <div class="informacion__obligatoria">
            <div class="informacion__caracteristica">
                <p class="formulario-admin__legend">Forma</p>
                <p class="formulario-admin__label"><?php echo $pedido->forma ?? '' ?></p>
            </div>

            <div class="informacion__caracteristica">
                <p class="formulario-admin__legend">Tamaño</p>
                <p class="formulario-admin__label"><?php echo $pedido->tamaño ?? '' ?></p>
            </div>

            <div class="informacion__caracteristica">
                <p class="formulario-admin__legend">Color</p>
                <p class="formulario-admin__label"><?php echo $pedido->color ?? '' ?></p>
            </div>

            <div class="informacion__caracteristica">
                <p class="formulario-admin__legend">Sabor</p>
                <p class="formulario-admin__label"><?php echo $pedido->sabor ?? '' ?></p>
            </div>

            <div class="informacion__caracteristica">
                <p class="formulario-admin__legend">Motivo</p>
                <p class="formulario-admin__label"><?php echo $pedido->motivo ?? '' ?></p>
            </div>
        </div>

        <div class="informacion__opcional">
            <div class="informacion__caracteristica">
                <picture>
                    <source class="" srcset="<?php echo '/build/img/adicional/' . $pedido->imagen_adicional . '.webp'?>" type="image/webp">
                    <source class="" srcset="<?php echo '/build/img/adicional/' . $pedido->imagen_adicional . '.png'?>" type="image/png">
                    <img src="<?php echo '/build/img/adicional/' . $pedido->imagen_adicional . '.png'?>" alt="Imagen pedido">
                </picture>  
            </div>

            <div class="informacion__caracteristica">
                <p class="formulario-admin__legend">Lugar de Entrega</p>
                <p class="formulario-admin__label"><?php echo $pedido->entrega ?? '' ?></p>
            </div>
            
            <?php 
                session_start();
                if($_SESSION['rol'] == 1 ) { ?>                
                    <div class="informacion__caracteristica">
                        <p class="formulario-admin__legend">Precio</p>
                        <p class="formulario-admin__label">$ <?php echo $pedido->precio ?></p>
                    </div>

                    <div class="informacion__caracteristica">
                        <p class="formulario-admin__legend">Abono</p>
                        <p class="formulario-admin__label">$ <?php echo $pedido->abono ?></p>
                    </div>

                    <div class="informacion__caracteristica">
                        <p class="formulario-admin__legend">Restante</p>
                        <p class="formulario-admin__label">$ <?php echo $pedido->precio - $pedido->abono ?></p>
                    </div>
            <?php } ?> 

        </div>
    </div>
        
</div>