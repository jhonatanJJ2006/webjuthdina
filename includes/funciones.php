<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}
function pagina_actual($path) : bool {
    return str_contains($_SERVER['PATH_INFO'], $path) ? true : false;
}
function is_admin() : bool {
    session_start();
    return isset($_SESSION['rol']) && $_SESSION['rol'] == 1;
}
function is_local() : bool {
    session_start();
    return isset($_SESSION['rol']) && $_SESSION['rol'] == 1 || $_SESSION['rol'] == 2;
}
function is_fabrica1() : bool {
    session_start();
    return isset($_SESSION['rol']) && $_SESSION['rol'] == 1 || $_SESSION['rol'] == 3  && $_SESSION['fabrica'] == 1;
}
function is_fabrica2() : bool {
    session_start();
    return isset($_SESSION['rol']) && $_SESSION['rol'] == 1 || $_SESSION['rol'] == 3  && $_SESSION['fabrica'] == 2;
}
