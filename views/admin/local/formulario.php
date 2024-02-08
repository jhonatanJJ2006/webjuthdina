<fieldset class="formulario-admin__fieldset">

    <legend class="formulario-admin__legend">Datos del Cliente</legend>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="nombre_cliente">Nombre</label>
        <input class="formulario-admin__input" id="nombre_cliente" type="text" placeholder="Nombre del Cliente" name="nombre_cliente" value="<?php echo $cliente->nombre_cliente ?? '' ?>">
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="telefono">Teléfono</label>
        <input class="formulario-admin__input" id="telefono" type="number" placeholder="Teléfono del Cliente" name="telefono" value="<?php echo $cliente->telefono ?? '' ?>">
    </div>     

</fieldset>

<fieldset class="formulario-admin__fieldset">

    <legend class="formulario-admin__legend">Información</legend>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="nombre">Nombre</label>
        <input class="formulario-admin__input" id="nombre" type="text" placeholder="Nombre Pastel" name="nombre" value="<?php echo $pedido->nombre ?? '' ?>">
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="descripcion">Descripción</label>
        <textarea class="formulario-admin__input" placeholder="Una pequeña descripción del Pastel" name="descripcion" id="descripcion" rows="10"><?php echo $pedido->descripcion ?? '' ?></textarea>
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="imagen">Imagen</label>
        <input class="formulario-admin__input formulario-admin__input--file" id="imagen" type="file" name="imagen">
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="adicional">Imagen Adicional</label>
        <input class="formulario-admin__input formulario-admin__input--file" id="adicional" type="file" name="adicional">
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="forma">Forma</label>
        <select class="formulario-admin__input" id="forma" name="forma">
            <option disabled selected>-- Forma del Pastel --</option>
            <option value="pisos" <?php echo ($pedido->forma === 'pisos') ? 'selected' : '' ?>>Pisos</option>
            <option value="rectangular" <?php echo ($pedido->forma === 'rectangular') ? 'selected' : '' ?>>Rectangular</option>
            <option value="cuadrado" <?php echo ($pedido->forma === 'cuadrado') ? 'selected' : '' ?>>Cuadrado</option>
            <option value="redondo" <?php echo ($pedido->forma === 'redondo') ? 'selected' : '' ?>>Redondo</option>
        </select>
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="motivo">Motivo</label>
        <input class="formulario-admin__input" id="motivo" type="text" placeholder="Motivo Pastel" name="motivo" value="<?php echo $pedido->motivo ?? '' ?>">
    </div>
    

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="medidas">Tamaño</label>
        <input class="formulario-admin__input" id="medidas" type="text" placeholder="Medidas Pastel" name="medidas" value="<?php echo $pedido->tamaño ?? '' ?>">
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="color">Color</label>
        <input class="formulario-admin__input" id="color" type="text" placeholder="Color Pastel" name="color"  value="<?php echo $pedido->color ?? '' ?>">
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="sabor">Sabor</label>
        <input class="formulario-admin__input" id="sabor" type="text" placeholder="Sabor Pastel" name="sabor"  value="<?php echo $pedido->sabor ?? '' ?>">
    </div>

</fieldset>

<fieldset class="formulario-admin__fieldset">
    
    <legend class="formulario-admin__legend">Fecha de Entrega del Pedido</legend>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="fecha">Fecha de Entrega</label>
        <input class="formulario-admin__input" id="fecha" type="date" placeholder="Fecha de Pedido" name="fecha_entrega" min="<?php echo date('Y-m-d', strtotime('-2 day')); ?>"  value="<?php echo $pedido->fecha_entrega ?? '' ?>">
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="hora">Hora de Entrega</label>
        <input class="formulario-admin__input" id="hora" type="time" name="hora_entrega" value="<?php echo $pedido->hora_entrega ?? '' ?>">
    </div>

</fieldset>

<fieldset class="formulario-admin__fieldset">

    <legend class="formulario-admin__legend">Datos de Contrato</legend>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="responsable">Nombre</label>
        <input class="formulario-admin__input" id="responsable" type="text" placeholder="Nombre del Responsable" name="responsable" value="<?php echo $pedido->responsable ?? '' ?>">
    </div>   

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="precio">Precio</label>
        <input class="formulario-admin__input" id="precio" type="text" pattern="\d+(\.\d{1,2})?" placeholder="Ingresa un numero decima, maximo 2 decimales" name="precio" value="<?php echo $pedido->precio ?? '' ?>">
    </div>   

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="abono">Abono</label>
        <input class="formulario-admin__input" id="abono" type="text" pattern="\d+(\.\d{1,2})?" placeholder="Ingresa un numero decima, maximo 2 decimales" name="abono" value="<?php echo $pedido->abono ?? '' ?>">
    </div>   

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="pago">Pago</label>
        <select class="formulario-admin__input" id="pago" name="pago">
            <option disabled selected>-- Forma de Pago --</option>
            <option value="efectivo" <?php echo ($pedido->pago === 'efectivo') ? 'selected' : '' ?>>Efectivo</option>
            <option value="transferencia" <?php echo ($pedido->pago === 'transferencia') ? 'selected' : '' ?>>Transferencia</option>
        </select>
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="entrega">Entrega</label>
        <select class="formulario-admin__input" id="entrega" name="entrega">
            <option disabled selected>-- Lugar de entrega --</option>
            <option value="li" <?php echo ($pedido->entrega === 'li') ? 'selected' : '' ?>>L1</option>
            <option value="l2" <?php echo ($pedido->entrega === 'l2') ? 'selected' : '' ?>>L2</option>
            <option value="l3" <?php echo ($pedido->entrega === 'l3') ? 'selected' : '' ?>>L3</option>
            <option value="domicilio" <?php echo ($pedido->entrega === 'domicilio') ? 'selected' : '' ?>>Domicilio</option>
        </select>
    </div>

</fieldset>

