<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="admin__formulario">
    
    <?php include_once __DIR__ . '/../../templates/alertas.php' ?>

    <form class="formulario-admin" enctype="multipart/form-data" method="POST">

        <?php include_once __DIR__ . '/formulario.php' ?>

        <input class="formulario-admin__submit formulario-admin__submit--registrar" type="submit" value="Registrar Orden">
    </form>
</div>