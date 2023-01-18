<?php include __DIR__ . '../../layout/header.php'; ?>
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
            <div class="col-12 col-md-6 d-flex justify-content-end p-0">
                <a href="/?p=add_contact"><button type="button" class="btn btn-outline-dark btn-sm">Adicionar novo</button></a>
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
<?php include __DIR__ . '../../layout/footer.php'; ?>