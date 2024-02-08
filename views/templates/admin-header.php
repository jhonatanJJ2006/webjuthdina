<?php
    session_start();
?>

<header class="admin__header <?php echo ($_SESSION['fabrica'] == 1) ? 'admin__amarillo' : 'admin__azul' ?>">
    <div class="admin__header-grid">
        <div>
            <h2 class="admin__logo">Juthdina</h2>
        </div>

        <nav class="admin__nav">
            <form class="admin__form" action="/logout" method="POST">
                <input class="admin__submit--logout" type="submit" value="Cerrar Sesión">
            </form>
        </nav>
    </div>
</header>