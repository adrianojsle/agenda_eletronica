<?php
require_once __DIR__ . '../../../classes/Model/Contact.php';
$contact = new Contact();
$perPage = 5;
$currentPage = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
$contacts = $contact->getAll($perPage, $currentPage);
?>
<?php
if ($contact->count() > 0) {
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
                    echo "<td>" . $item['address_id'] . "</td>";
                ?>
                    <td>
                        <div class="btn-group" role="group" aria-label="Ações nos contatos">
                            <button type="button" class="btn btn-sm">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                <?php
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
} else {
    echo "<div class='card p-5 mt-3 d-flex align-items-center justify-center'><h3>Nenhum contato registrado ainda</h3></div>";
}
?>