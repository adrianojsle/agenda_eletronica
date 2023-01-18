<?php 
require_once __DIR__ . '../../classes/Controller/SessionController.php';
$user = new SessionController();
$user->logout();
?>