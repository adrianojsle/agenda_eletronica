<?php
require_once __DIR__ . '../../classes/Controller/ContactController.php';
include __DIR__ . '../../layout/header.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new ContactController;
    $msg = $controller->deleteById($_POST['contact_id']);
}
?>
<div class="col p-4">
    <h3>Dashboard</h3>
    <div class="row pt-2 px-2">
        <!-- Cards -->
        <?php
        include __DIR__ . '../../components/Cards/CardContacts.php';
        ?>
        <?php
        include __DIR__ . '../../components/Cards/CardUsers.php';
        ?>
        <!-- Final dos itens -->
        <!-- Tabela -->
        <div class="row pt-4 pb-2">
            <div class="col-12 col-md-6">
                <h4>Contatos</h4>
            </div>
            <div class="col-12 col-md-6 p-0">
                <form>
                    <div class="row">
                        <div class="col-6 p-1">
                            <input type="text" id="input_search" class="form-control form-control-sm border-primary" placeholder="Buscar...">
                        </div>
                        <div class="col-2 p-1">
                            <button type="button" onclick="search()" class="btn btn-primary btn-sm btn-block w-100">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <div class="col-4 p-1">
                            <a href="/?p=add_contact" class="btn btn-primary btn-sm btn-block w-100">Adicionar novo</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        include __DIR__ . '../../components/Tables/TableContacts.php';
        ?>
        <!-- Final da tabela -->
        <?php
        include __DIR__ . '../../components/Paginations/PaginationContacts.php';
        ?>
    </div>
</div>
<script>
    function search() {
        let input = document.getElementById("input_search").value;
        console.log("Pesquisando por: " + input);
    }
</script>
<?php include __DIR__ . '../../layout/footer.php'; ?>