<?php
    session_start();
    require_once 'classes/Controller/SessionController.php';
    $session = new SessionController();
    if ($session->isLoggedIn()) {
        require_once 'pages/dashboard.php';
    } else {
        if (isset($_GET['p'])) {
            $page = $_GET['p'];
            if (file_exists("pages/$page.php")) {
                include "pages/$page.php";
            } else {
                require_once 'pages/err.php';
            }
        } else {
            require_once 'pages/login.php';
        }
    }
?>