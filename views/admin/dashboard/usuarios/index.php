<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="admin__contenedor-boton">
    <a class="admin__boton" href="/admin/usuarios/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Usuario
    </a>
</div>

<div class="admin__contenedor">
    <?php if(!empty($usuarios)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th class="table__th-display" scope="col">Usuarios</th>
                    <th class="table__th table__th--ponentes" scope="col">Nombre</th>
                    <th class="table__th table__th--ponentes" scope="col">Email</th>
                    <th class="table__th table__th--acciones" scope="col">Admin</th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($usuarios as $usuario) { ?>

                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $usuario->nombre ?>
                        </td>

                        <td class="table__td">
                            <?php echo $usuario->email ?>
                        </td>

                        <td class="table__td">
                            <div class="usuario">
                                
                            <form method="POST" action="/admin/usuario/admin">

                                <select class="formulario-admin__input--usuario" id="fabrica" name="rol" value="<?php echo $usuario->fabrica ?? '' ?>">
                                    <option disabled selected>-- Escoger el rol --</option>
                                    <option value="1" <?php echo ($usuario->rol == 1) ? 'selected' : '' ?>>Administrador</option>
                                    <option value="2" <?php echo ($usuario->rol == 2) ? 'selected' : '' ?>>Local</option>
                                    <option value="3" <?php echo ($usuario->rol == 3) ? 'selected' : '' ?>>Fabrica</option>
                                </select>

                                <div class="usuario__admin-plus">
                                    <input type="hidden" name="id" value="<?php echo $usuario->id ?>">
                                    <input class="usuario__admin-plus--color" type="submit" value="Guardar">
                                </div>
                            </form>                                   

                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>    
        <p class="text-center">No hay usuarios Aún</p>
    <?php } ?>    
</div>

<?php
    echo $paginacion;
?>