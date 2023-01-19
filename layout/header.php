<?php
require_once __DIR__ . '../../classes/Controller/SessionController.php';
$session = new SessionController();
if (!$session->isLoggedIn()) {
    header('Location: /?p=login');
    exit;
}
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel - Agenda Eletrônica</title>
    <link rel="icon" href="./assets/images/favicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="./assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<?php
$page = '';
if (isset($_GET['p'])) {
    $page = $_GET['p'];
}
?>

<body>
    <div class="container-fluid h-100">
    <?php
        if (!empty($msg)) {
            include __DIR__ . '../../components/Toast.php';
        }
        ?>
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-logos">
                <div class="d-flex flex-column align-items-center align-items-sm-start pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pt-3 pb-4 mb-md-0 me-md-auto text-primary text-decoration-none w-100">
                    </a>
                    <!-- Itens do menu -->
                    <ul class="nav nav-pills flex-column mb-auto align-items-center align-items-sm-start w-100" id="menu">
                        <li class="nav-item w-100 px-2">
                            <a href="/?p=dashboard" class="nav-link 
                            <?php
                            if (in_array($page, ['dashboard', 'add_contact', 'edit_contact'])) {
                                echo 'nav-active';
                            } ?>
                            px-3 mb-2">
                                <i class="fas fa-users me-2"></i><span class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item w-100 px-2">
                            <a href="/?p=profile" class="nav-link 
                            <?php
                            if (in_array($page, ['profile'])) {
                                echo 'nav-active';
                            } ?>
                            px-3">
                                <i class="fas fa-cog me-2"></i> <span class="ms-1 d-none d-sm-inline">Perfil</span> </a>
                        </li>
                    </ul>
                    <!-- Final Itens do menu -->
                    <hr>
                    <div class="dropdown pb-4 ps-2">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/assets/images/profile.png" alt="perfil" width="30" height="30" class="rounded-circle me-2">
                            <span class="d-none d-sm-inline mx-1 w-50 text-truncate">
                                <?php 
                                echo $session->profile()['name'];
                                ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="/?p=profile">Editar Perfil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/?p=logout">Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>