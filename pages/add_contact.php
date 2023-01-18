<?php
require_once __DIR__ . '../../classes/Controller/ContactController.php';
$controller = new ContactController;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'street' => $_POST['street'],
        'number' => $_POST['number'],
        'zipcode' => $_POST['zipcode'],
        'neighborhood' => $_POST['neighborhood'],
        'complement' => $_POST['complement'],
        'name' => $_POST['name'],
        'phone' => $_POST['phone'],
        'state_id' => $_POST['state_id'],
        'city_id' => $_POST['city_id']
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