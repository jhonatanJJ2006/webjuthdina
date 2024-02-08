<aside class="admin__sidebar">
    <nav class="admin__menu">
        <a class="admin__enlace <?php echo pagina_actual('/admin/dashboard') ? 'admin__enlace--actual' : '' ?>" href="/admin/dashboard">
            <i class="admin__icono fa-solid fa-house"></i>
            <span class="admin__menu-texto">Inicio</span>
        </a>

        <a class="admin__enlace <?php echo pagina_actual('/admin/usuarios') ? 'admin__enlace--actual' : '' ?>" href="/admin/usuarios">
            <i class="admin__icono fa-solid fa-users"></i>
            <span class="admin__menu-texto">Usuarios</span>
        </a>

        <a class="admin__enlace <?php echo pagina_actual('/admin/clientes') ? 'admin__enlace--actual' : '' ?>" href="/admin/clientes">
            <i class="admin__icono fa-solid fa-users-line"></i>
            <span class="admin__menu-texto">Clientes</span>
        </a>

        <a class="admin__enlace <?php echo pagina_actual('/admin/ordenes') ? 'admin__enlace--actual' : '' ?>" href="/admin/ordenes">
            <i class="admin__icono fa-solid fa-cake-candles"></i>
            <span class="admin__menu-texto">Ordenes</span>
        </a>

        <a class="admin__enlace <?php echo pagina_actual('/admin/calendario') ? 'admin__enlace--actual' : '' ?>" href="/admin/calendario">
            <i class="fa-solid fa-calendar-days"></i>
            <span class="admin__menu-texto">Calendario</span>
        </a>
    </nav>
</aside>