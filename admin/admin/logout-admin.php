<?php 

    session_start();
    session_unset();
    session_destroy();

    header("Location: http://localhost/trainin/anime-main/admin/admin/login-admin.php");