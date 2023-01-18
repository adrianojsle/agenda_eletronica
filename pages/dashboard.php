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
        <h4 class="pt-3 pb-2">Contatos</h4>
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