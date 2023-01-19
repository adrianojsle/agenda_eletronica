<?php
require_once __DIR__ . '../../../classes/Model/Contact.php';
require_once __DIR__ . '../../../classes/Model/Address.php';
$contact = new Contact();
$address = new Address();
$perPage = 5;
$search = isset($_GET['s']) ? $_GET['s'] : '';
$currentPage = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
$contacts = $contact->getAll($perPage, $currentPage, $search);
?>
<?php
if ($contact->count() > 0) {
?>
    <?php
    if ($search !== '') {
    ?>
        <div class="card mb-3 p-2">
            <span><a href="/?p=dashboard" class="text-decoration-none cursor-pointer tet-secondary">Busca por: <strong><?php echo $search; ?></strong> <strong class="text-danger">&times;</strong></a></span>
        </div>
    <?php
    }
    ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($contacts as $item) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $item['id'] . "</th>";
                    echo "<td>" . $item['name'] . "</td>";
                    echo "<td>" . $item['phone'] . "</td>";
                    echo "<td>" . $address->getAddressById($item['address_id']) . "</td>";
                ?>
                    <td>
                        <div class="btn-group" role="group" aria-label="Ações nos contatos">
                            <a href="/?p=edit_contact&id=<?php echo $item['id']; ?>"><button type="button" class="btn btn-sm">
                                    <i class="fas fa-edit"></i>
                                </button></a>
                            <button type="button" class="btn btn-sm open-modal" data-item-id="<?php echo $item['id']; ?>" data-item-name="<?php echo $item['name']; ?>">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                <?php
                    echo "</tr>";
                }
                include __DIR__ . '../../Modals/ModalDelete.php';
                ?>
            </tbody>
        </table>
    </div>
<?php
} else {
    echo "<div class='card p-5 mt-3 d-flex align-items-center justify-center'><h3>Nenhum contato registrado ainda</h3></div>";
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('.open-modal').click(function() {
            let itemId = this.getAttribute('data-item-id');
            let itemName = this.getAttribute('data-item-name');
            console.log(itemId, itemName);
            $('#modalDelete .modal-title').text('Deletar item');
            $('#modalDelete .description').text('Tem certeza que deseja deletar o contato de ' + itemName + '?');
            $('#contact_id').val(itemId);
            $('#modalDelete').modal('show');
        });
        $('.close').click(function() {
            $('#modalDelete').modal('hide');
        });
    });
</script>