<?php
require_once __DIR__ . '../../classes/Controller/UserController.php';
require_once __DIR__ . '../../classes/Controller/SessionController.php';
$controller = new UserController();
$session = new SessionController();
$user = $session->profile();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'name' => trim($_POST['name']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'conf_password' => trim($_POST['conf_password'])
    ];
    $msg = $controller->edit($data);
}

include __DIR__ . '../../layout/header.php';
?>
<div class="col p-4">
    <h3>Perfil</h3>
    <div class="row px-2">
        <?php
        include __DIR__ . '../../components/Forms/Profile.php';
        ?>
    </div>
</div>
<?php include __DIR__ . '../../layout/footer.php'; ?>