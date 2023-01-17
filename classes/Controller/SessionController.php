<?php

class SessionController {
    public function isLoggedIn() {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }
    public function logout() {
        session_destroy();
        header('Location: /index.php');
    }
}
