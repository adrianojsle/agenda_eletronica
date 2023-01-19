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
        'city_id' => trim($_POST['city_id']),
        'id' => trim($_POST['id']),
        'address_id' => trim($_POST['address_id']),
    ];
    $msg = $controller->edit($data);
}
if (isset($_GET['id'])) {
    $contact = $controller->loadContact(trim($_GET['id']));
    $address = $controller->loadAddress(trim($contact['address_id']));
} else {
    header('Location: /?p=dashboard');
    exit;
}

include __DIR__ . '../../layout/header.php';
?>
<div class="col p-4">
    <h3>Editar contato</h3>
    <div class="row px-2">
        <?php
        include __DIR__ . '../../components/Forms/EditContact.php';
        ?>
    </div>
</div>
<?php include __DIR__ . '../../layout/footer.php'; ?>