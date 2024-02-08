<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juthdina - <?php echo $titulo; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body class="auth">

    <div class="auth__imagen">
        <picture>
            <source srcset="<?php echo '/build/img/login.webp'?>" type="image/webp">
            <source srcset="<?php echo '/build/img/login.png'?>" type="image/png">
            <img class="auth__imagen--tamaño" src="<?php echo '/build/img/login.png'?>" alt="Imagen Login">
        </picture>
        <div class="auth__opacity"></div>
    </div>

    <div class="auth__formulario">
        <?php
            include_once __DIR__ .'/templates/login.php';  
        ?>
            
    </div>

    <script src="/build/js/bundle.min.js" defer></script>
</body>
</html>