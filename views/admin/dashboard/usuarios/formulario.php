<fieldset class="formulario-admin__fieldset">

    <legend class="formulario-admin__legend">Información Usuario</legend>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="nombre">Nombre</label>
        <input class="formulario-admin__input" id="nombre" type="text" placeholder="Nombre usuario" name="nombre" value="<?php echo $usuario->nombre ?? '' ?>">
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="email">Email</label>
        <input class="formulario-admin__input" id="email" type="mail" placeholder="Email usuario" name="email" value="<?php echo $usuario->email ?? '' ?>">
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="password">Password</label>
        <input class="formulario-admin__input" id="password" type="password" placeholder="Password usuario" name="password">
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="password2">Repetir Password</label>
        <input id="password2" class="formulario-admin__input" type="password" name="password2" placeholder="Repetir Password">
    </div>
        
    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="rol">Rol</label>
        <select class="formulario-admin__input" id="rol" name="rol" value="<?php echo $usuario->rol ?? '' ?>">
            <option disabled selected>-- Rol Admininistrativo --</option>
            <option value="1" <?php echo ($usuario->rol == 1) ? 'selected' : '' ?>>Admin</option>
            <option value="2" <?php echo ($usuario->rol == 2) ? 'selected' : '' ?>>Local</option>
            <option value="3" <?php echo ($usuario->rol == 3) ? 'selected' : '' ?>>Fabrica</option>
        </select>
    </div>

    <div class="formulario-admin__campo">
        <label class="formulario-admin__label" for="fabrica">Fabrica N°</label>
        <select class="formulario-admin__input" id="fabrica" name="fabrica" value="<?php echo $usuario->fabrica ?? '' ?>">
            <option disabled selected>-- Fabrica Numero --</option>
            <option value="1" <?php echo ($usuario->fabrica == 1) ? 'selected' : '' ?>>Fabrica 1</option>
            <option value="2" <?php echo ($usuario->fabrica == 2) ? 'selected' : '' ?>>Fabrica 2</option>
        </select>
    </div>
    
</fieldset>