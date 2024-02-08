<aside class="admin__sidebar">
    <nav class="admin__menu">
        <a class="admin__enlace <?php echo pagina_actual('/local/dashboard') ? 'admin__enlace--actual' : '' ?>" href="/local/dashboard">
            <i class="admin__icono fa-solid fa-house"></i>
            <span class="admin__menu-texto">Inicio</span>
        </a>

        <a class="admin__enlace <?php echo pagina_actual('/local/ordenes') ? 'admin__enlace--actual' : '' ?>" href="/local/ordenes">
            <i class="fa-solid fa-table"></i>
            <span class="admin__menu-texto">Ordenes</span>
        </a>

        <a class="admin__enlace <?php echo pagina_actual('/local/orden/crear') ? 'admin__enlace--actual' : '' ?>" href="/local/orden/crear">
            <i class="admin__icono fa-solid fa-cake-candles"></i>
            <span class="admin__menu-texto">Nueva Orden</span>
        </a>
    </nav>
</aside>