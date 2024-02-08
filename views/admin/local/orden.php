<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="admin__tipos">
    
    <?php foreach($tipos as $tipo) { ?>
        <div class="tarjeta">
            <div class="tarjeta__face tarjeta__front">
                <picture>
                    <source srcset="<?php echo '/build/img/tipos/' . $tipo->imagen . '.webp'?>" type="image/webp">
                    <source srcset="<?php echo '/build/img/tipos/' . $tipo->imagen . '.png'?>" type="image/png">
                    <img class="tarjeta__face" src="<?php echo '/build/img/tipos/' . $tipo->imagen . '.png'?>" alt="Imagen tipo">
                </picture>
                <div class="tarjeta__contenido">
                    <h3 class="tarjeta__nombre"><?php echo $tipo->nombre ?></h3>
                </div>
            </div>
    
            <div class="tarjeta__face tarjeta__back">
                <div class="tarjeta__contenido tarjeta__centrar table__carrito">
                    <a class="table__accion--seleccionar" href="/local/orden/crear?tipo=<?php echo $tipo->id ?>">Seleccionar</a>
                </div>
            </div>
        </div>
    <?php } ?>   
    
</div>