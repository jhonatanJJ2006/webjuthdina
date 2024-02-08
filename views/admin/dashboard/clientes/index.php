<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="admin__contenedor">
    <?php if(!empty($clientes)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th class="table__th-display" scope="col">clientes</th>
                    <th class="table__th table__th--ponentes" scope="col">Nombre</th>
                    <th class="table__th table__th--ponentes" scope="col">Telefono</th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($clientes as $cliente) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $cliente->nombre_cliente . " " . $cliente->apellido ?? '' ?>
                        </td>

                        <td class="table__td">
                            <?php echo $cliente->telefono ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>    
        <p class="text-center">No hay clientes Aún</p>
    <?php } ?>    
</div>

<?php
    echo $paginacion;
?>