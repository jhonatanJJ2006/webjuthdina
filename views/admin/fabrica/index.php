<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="admin__tipos--rol">
    
    <div class="tarjeta">
        <div class="tarjeta__face tarjeta__front">
            <picture>
                <source srcset="<?php echo '/build/img/administrador.webp'?>" type="image/webp">
                <source srcset="<?php echo '/build/img/administrador.png'?>" type="image/png">
                <img class="tarjeta__face" src="<?php echo '/build/img/administrador.png'?>" alt="Imagen tipo">
            </picture>
            <div class="tarjeta__contenido">
                <h3 class="tarjeta__nombre">Administrador</h3>
            </div>
        </div>

        <div class="tarjeta__face tarjeta__back">
            <div class="tarjeta__contenido tarjeta__centrar table__carrito">
                <a class="table__accion--seleccionar" href="/admin/dashboard">Acceder</a>
            </div>
        </div>
    </div>

    <div class="tarjeta">
        <div class="tarjeta__face tarjeta__front">
            <picture>
                <source srcset="<?php echo '/build/img/local.webp'?>" type="image/webp">
                <source srcset="<?php echo '/build/img/local.png'?>" type="image/png">
                <img class="tarjeta__face" src="<?php echo '/build/img/local.png'?>" alt="Imagen tipo">
            </picture>
            <div class="tarjeta__contenido">
                <h3 class="tarjeta__nombre">Local</h3>
            </div>
        </div>

        <div class="tarjeta__face tarjeta__back">
            <div class="tarjeta__contenido tarjeta__centrar table__carrito">
                <a class="table__accion--seleccionar" href="/local/dashboard">Acceder</a>
            </div>
        </div>
    </div>

    <div class="tarjeta">
        <div class="tarjeta__face tarjeta__front">
            <picture>
                <source srcset="<?php echo '/build/img/fabrica.webp'?>" type="image/webp">
                <source srcset="<?php echo '/build/img/fabrica.png'?>" type="image/png">
                <img class="tarjeta__face" src="<?php echo '/build/img/fabrica.png'?>" alt="Imagen tipo">
            </picture>
            <div class="tarjeta__contenido">
                <h3 class="tarjeta__nombre">Fabrica</h3>
            </div>
        </div>

        <div class="tarjeta__face tarjeta__back">
            <div class="tarjeta__contenido tarjeta__centrar table__carrito">
                <a class="table__accion--seleccionar" href="/fabrica-1/dashboard">Acceder Fabrica 1</a>
                <a class="table__accion--seleccionar" href="/fabrica-2/dashboard">Acceder Fabrica 2</a>
            </div>
        </div>
    </div>
    
</div>