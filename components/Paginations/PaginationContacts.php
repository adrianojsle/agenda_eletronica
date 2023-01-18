<?php
require_once __DIR__ . '../../../classes/Model/Contact.php';
require_once __DIR__ . '../../../classes/Controller/PaginationController.php';
$contact = new Contact();
$perPage = 5;
$currentPage = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
$contacts = $contact->getAll($perPage, $currentPage);
$pagination = new PaginationController($perPage, 'contacts');
$data = $pagination->getData($currentPage);
$links = $pagination->getLinks($currentPage);
?>
<?php
if ($contact->count() > 0) {
?>
    <nav aria-label="Paginação">
        <ul class="pagination justify-content-end">
            <?php echo $links; ?>
        </ul>
    </nav>
<?php
}
?>