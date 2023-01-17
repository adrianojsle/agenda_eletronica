<?php
session_start();
require_once 'classes/Controller/SessionController.php';
$session = new SessionController();
if (isset($_GET['p'])) {
    $page = $_GET['p'];
    if (file_exists("pages/$page.php")) {
        if ($session->isLoggedIn()) {
            include "pages/$page.php";
        } else {
            require_once 'pages/login.php';
        }
    } else {
        require_once 'pages/err.php';
    }
} else {
    header("Location: /?p=login");
}
