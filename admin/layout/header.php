<?php 
define("ADMINURL", "http://localhost/trainin/anime-main/admin");
define("APPURL", "http://localhost/trainin/anime-main/");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<!-- index.html 13:25:11 GMT -->

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Admin Anime</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Font -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet"> -->

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo ADMINURL?>/dist/css/vendor.min.css">
    <link rel="stylesheet" href="<?php echo ADMINURL?>/dist/vendor/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo ADMINURL?>/dist/vendor/aos/dist/aos.css">
    <link rel="stylesheet" href="<?php echo ADMINURL?>/dist/vendor/hs-mega-menu/dist/hs-mega-menu.min.css">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?php echo ADMINURL?>/dist/css/theme.minc619.css?v=1.0">
</head>

<body>
    <!-- ========== HEADER ========== -->
    <header id="header" class="navbar navbar-expand-lg navbar-end navbar-absolute-top navbar-dark bg-dark">
        <div class="container ">
            <nav class="js-mega-menu navbar-nav-wrap">
                <!-- Default Logo -->
                <a class="navbar-brand" href="../index.html" aria-label="Front">
                    <img class="navbar-brand-logo" src="../dist/svg/logos/logo.svg" alt="Logo">
                </a>
                <!-- End Default Logo -->

                <!-- Toggler -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-default">
                        <i class="bi-list"></i>
                    </span>
                    <span class="navbar-toggler-toggled">
                        <i class="bi-x"></i>
                    </span>
                </button>
                <!-- End Toggler -->

                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <?php if(!isset($_SESSION['adminname'])) : ?>
                        <!-- Account -->
                        <li class="hs-has-sub-menu nav-item">
                            <a id="accountMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>

                            <!-- Mega Menu -->
                            <div class="hs-sub-menu dropdown-menu" aria-labelledby="accountMegaMenu"
                                style="min-width: 14rem;">
                                <!-- Authentication -->
                                <div class="hs-has-sub-menu nav-item">
                                    <a id="authenticationMegaMenu"
                                        class="hs-mega-menu-invoker dropdown-item dropdown-toggle" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">Authentication</a>

                                    <div class="hs-sub-menu dropdown-menu" aria-labelledby="authenticationMegaMenu"
                                        style="min-width: 14rem;">
                                        <div class="dropdown-divider"></div>
                                        <?php if(!isset($_SESSION['adminname'])) : ?>
                                        <a class="dropdown-item" href="../admin/admin/login-admin.php">Login</a>

                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- End Authentication -->
                            </div>
                            <!-- End Mega Menu -->
                        </li>
                        <?php endif; ?>
                        <!-- End Account -->
                        <!-- Portfolio -->
                        <?php if(isset($_SESSION['adminname'])) : ?>
                        <li class="hs-has-sub-menu nav-item">
                            <a id="portfolioMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle" href="#"
                                role="button" data-bs-toggle="dropdown"
                                aria-expanded="false"><?php echo $_SESSION['adminname']; ?></a>

                            <!-- Mega Menu -->
                            <div class="hs-sub-menu dropdown-menu" aria-labelledby="portfolioMegaMenu"
                                style="min-width: 14rem;">
                                <?php if(isset($_SESSION['adminname'])) : ?>
                                <a class="dropdown-item" href="../admin/admin/logout-admin.php">Logout</a>
                                <?php endif; ?>
                            </div>
                            <!-- End Mega Menu -->
                        </li>
                        <?php endif; ?>
                        <!-- End Portfolio -->

                    </ul>
                </div>
                <!-- End Collapse -->
            </nav>
        </div>
    </header>