<?php
require_once __DIR__ . '../../../classes/Model/Contact.php';
$contact = new Contact();
$contacts = $contact->getAll();
?>
<?php
if ($contact->count() > 0) {
?>
    <nav aria-label="Paginação">
        <ul class="pagination justify-content-end">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                    <i class="fas fa-angle-left"></i>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item">
                <a class="page-link" href="#">
                    <i class="fas fa-angle-right"></i>
                </a>
            </li>
        </ul>
    </nav>
<?php
}
?>