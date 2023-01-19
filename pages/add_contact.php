<?php
require_once __DIR__ . '../../classes/Controller/ContactController.php';
$controller = new ContactController;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'street' => trim($_POST['street']),
        'number' => trim($_POST['number']),
        'zipcode' => trim($_POST['zipcode']),
        'neighborhood' => trim($_POST['neighborhood']),
        'complement' => trim($_POST['complement']),
        'name' => trim($_POST['name']),
        'phone' => trim($_POST['phone']),
        'state_id' => trim($_POST['state_id']),
        'city_id' => trim($_POST['city_id'])
    ];
    $msg = $controller->create($data);
}

include __DIR__ . '../../layout/header.php';
?>
<div class="col p-4">
    <h3>Adicionar contato</h3>
    <div class="row px-2">
        <?php
        include __DIR__ . '../../components/Forms/AddContact.php';
        ?>
    </div>
</div>
<?php include __DIR__ . '../../layout/footer.php'; ?>