<aside class="admin__sidebar">
    <nav class="admin__menu">
        <a class="admin__enlace <?php echo pagina_actual('/fabrica-2/dashboard') ? 'admin__enlace--actual' : '' ?>" href="/fabrica-2/dashboard">
            <i class="admin__icono fa-solid fa-house"></i>
            <span class="admin__menu-texto">Inicio</span>
        </a>

        <a class="admin__enlace <?php echo pagina_actual('/fabrica-2/pedidos') ? 'admin__enlace--actual' : '' ?>" href="/fabrica-2/pedidos">
            <i class="admin__icono fa-solid fa-cake-candles"></i>
            <span class="admin__menu-texto">Ordenes</span>
        </a>

        <a class="admin__enlace <?php echo pagina_actual('/fabrica-2/calendario') ? 'admin__enlace--actual' : '' ?>" href="/fabrica-2/calendario">
            <i class="fa-solid fa-calendar-days"></i>
            <span class="admin__menu-texto">Calendario</span>
        </a>
    </nav>
</aside>