<main class="auth__centrar-texto auth__blur auth__tamaño">
    <div class="auth__contenedor auth__contenedor--disabled">
        <h2 class="auth__heading"><?php echo $titulo ?></h2>
        <p class="auth__texto">Inicia Sesión en Juthdina</p>

        <?php
            include_once __DIR__ .  '/../templates/alertas.php';
        ?>
    
        <form class="formulario" method="POST">
    
            <div class="formulario__campo">
                <label class="formulario__label" for="email">Email</label>
                <input id="email" class="formulario__input" type="email" name="email" placeholder="Tu Email" value="<?php echo $usuario->email ?>">
            </div>
            
            <div class="formulario__campo">
                <label class="formulario__label" for="password">Password</label>
                <input id="password" class="formulario__input" type="password" name="password" placeholder="Tu Password">
            </div>
    
            <input class="formulario__submit formulario__submit--auth" type="submit" value="Iniciar Sesión">
        </form>
    
    </div>
</main>