<?php
require_once __DIR__ . '../../Db/DbConnect.php';

class PaginationController extends DbConnect
{
    private $perPage;
    private $tableName;

    public function __construct($perPage, $tableName)
    {
        $this->perPage = $perPage;
        $this->tableName = $tableName;
    }

    public function getData($pagination)
    {
        $session = new SessionController();
        $start = ($pagination - 1) * $this->perPage;
        $userId = $session->profile()['id'];
        $query = "SELECT * FROM $this->tableName WHERE user_id = $userId ORDER BY id DESC LIMIT $start, $this->perPage";
        $stmt = $this->connect()->query($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getLinks($current_page, $p = 'dashboard')
    {
        $session = new SessionController();
        $userId = $session->profile()['id'];
        $query = "SELECT COUNT(*) FROM $this->tableName WHERE user_id = $userId";
        $totalRows = $this->connect()->query($query)->fetchColumn();
        $totalPages = ceil($totalRows / $this->perPage);
        $links = '';
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $current_page) {
                $links .= "<li class='page-item active'><a class='page-link' href='?p=$p&pagination=$i'>$i</a></li>";
            } else {
                $links .= "<li class='page-item'><a class='page-link' href='?p=$p&pagination=$i'>$i</a></li>";
            }
        }
        return $links;
    }
}
