<?php 
require_once __DIR__ . '../../../classes/Model/User.php';

$users = new User();

?>

<div class="col-12 col-md-6 p-2">
    <div class="bg-logos rounded p-4">
        <div class="row">
            <div class="col-8 col-md-10">
                <p class="h1 m-0">
                    <?php 
                    echo $users->count();
                    ?>
                </p>
                <small>Usuários</small>
            </div>
            <div class="col-4 col-md-2 d-flex align-items-center justify-content-center">
                <div class="bg-withopacity">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
    </div>
</div>