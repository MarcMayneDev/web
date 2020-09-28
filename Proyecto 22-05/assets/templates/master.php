<?php
    /**
     * MASTER FORM
     * Autor: Marc Martínez Mayné
     * Fecha: 20-12-2018
     */

    // Al estar activo, muestra todos los errores en el servidor.
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    // Se inicia la session.
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Idioma por defecto de la web.
    if (!isset($_SESSION['language'])) {
        $_SESSION['language'] = "es";
    }

    // Requeriremos que se abran los siguientes documentos
    require_once $_SERVER['DOCUMENT_ROOT'] . "/forms/vars/rutas.php";
    require_once $_SERVER['DOCUMENT_ROOT'] .  $rutas["lib_ti"];
?>

<!DOCTYPE html>
<html lang="<?php echo $_SESSION['language'] ?>">
    <head>
        <!-- Web -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Favicons -->
        <link rel="apple-touch-icon" href="<?php echo $rutas["img_logo_ico"] ?>">
        <link rel="icon" href="<?php echo $rutas["img_logo_ico"] ?>">
        <!-- Title -->
        <title><?php startblock('titulo')?><?php endblock() ?></title>
        <!-- Fonts and Icons -->
        <link rel="stylesheet" type="text/css" href="<?php echo $rutas["font_material_icons"] ?>"/>
        <link rel="stylesheet" href="<?php echo $rutas["font_font_awesome"] ?>"/>
        <!-- CSS -->
        <link rel="stylesheet"  href="<?php echo $rutas["lib_bootstrap_core_css"] ?>">
        <link rel="stylesheet" href="<?php echo $rutas["css_master"] ?>">
        <?php startblock('own_css') ?>
        <?php endblock() ?>
        <!-- Scripts -->
        <script src="<?php echo $rutas["lib_jquery"] ?>"></script>
        <script src="<?php echo $rutas["lib_popper"] ?>"></script>
        <script src="<?php echo $rutas["lib_bootstrap_js"] ?>"></script>
        <?php startblock('own_js_header')?><?php endblock() ?>
    </head>
    <body class="h-100">
        <header>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <!-- Logo -->
                <a class="navbar-brand" href="<?php echo $rutas["form_index"] ?>">
                    <img src="<?php echo $rutas["img_logo"] ?>" width="30" height="30" alt="LOGO">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <!-- Home -->
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo $rutas["form_index"] ?>">Home</a>
                        </li>
                        <!-- Series -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $rutas["form_series"] ?>">Series</a>
                        </li>
                        <!-- About -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $rutas["form_about"] ?>">About</a>
                        </li>
                        <!-- Admin -->
                        <?php  if ((isset($_SESSION['userInfo']['role'])) && ($_SESSION['userInfo']['role'] >= 1)) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php  echo $rutas["form_admin_main"] ?>">Admin</a>
                            </li>
                        <?php } ?>
                    </ul>
                    <!-- Dropdown -->
                    <ul class="navbar-nav">
                        <?php if (!isset($_SESSION['userInfo']['id'])) { ?>
                            <!-- Dropdown - Sesión no iniciada -->
                            <li class="dropdown nav-item">
                                <!-- Botón Dropdown -->
                                <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="material-icons">account_circle</i>
                                </a>
                                <!-- Dropdown Items -->
                                <div class="dropdown-menu dropdown-menu-right dropdown-with-icons sub mt-1">
                                    <a class="dropdown-item" href="<?php echo $rutas["form_login"] ?>">Login</a>
                                    <a class="dropdown-item" href="<?php echo $rutas["form_registro"] ?>">Registro</a>
                                </div>
                            </li>
                        <?php } else { ?>
                            <!-- Dropdown - Sesión inicida -->
                            <li class="dropdown nav-item">
                                <!-- Botón Dropdown -->
                                <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="material-icons">account_circle</i>
                                </a>
                                <!-- Dropdown Items -->
                                <div class="dropdown-menu dropdown-menu-right dropdown-with-icons sub mt-1">
                                    <a class="dropdown-item" href="<?php echo $rutas["profile"] ?>">Perfil</a>
                                    <a class="dropdown-item" href="<?php echo $rutas["api_logout"] ?>">Cerrar sesión</a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </header>
        <?php startblock('principal') ?>
        <?php endblock() ?>
    </body>
</html>