<?php
require_once __DIR__ . '../../classes/Controller/UserController.php';
$controller = new UserController;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $msg = $controller->login($email, $password);
}
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Agenda Eletrônica</title>
    <link rel="icon" href="./assets/images/favicon.png" />
    <!-- Bootstrap CSS para estilização -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="./assets/css/styles.css" rel="stylesheet" />
</head>

<body>
    <div class="container-fluid vh-100">
        <?php
        if (!empty($msg)) {
            include __DIR__ . '../../components/Toast.php';
        }
        ?>
        <div class="row h-100">
            <div class="col-5 h-100">
                <div class="d-flex align-items-center justify-content-center h-100">
                    <img class="w-100 p-3 h-auto" src="./assets/images/contatos.png" />
                </div>
            </div>
            <div class="col-7 bg-logos h-100 pt-5">
                <div class="px-5">
                    <div class="p-5 text-white">
                        <h1 class="font-weight-bold">Efetue seu login</h1>
                    </div>
                    <div class="px-5 text-white">
                        <form method="post" action="/?p=login">
                            <input class="form-control p-3 rounded-pill mt-4" type="text" placeholder="E-mail" aria-label="Seu e-mail" id="email" name="email" required>
                            <input class="form-control p-3 rounded-pill mt-4" type="password" placeholder="Senha" aria-label="Seu e-mail" id="password" name="password" required>
                            <div class="row pt-5">
                                <div class="col-6 d-flex align-items-center justify-content-center">
                                    <a href="/?p=register" class="w-100"><button type="button" class="btn btn-gold rounded-pill w-100 py-2">Cadastre-se</button></a>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-center">
                                    <button type="submit" class="btn btn-outline-light w-100 py-2 rounded-pill ">Entrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS para estilização -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var element = document.getElementById("errorToast");
            var myToast = new bootstrap.Toast(element);
            myToast.show();
        });
    </script>
</body>

</html>