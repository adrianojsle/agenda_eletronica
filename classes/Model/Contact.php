<?php
require_once __DIR__ . '../../Db/DbConnect.php';

class Contact extends DbConnect
{
    private $tableName = 'contacts';

    public function count()
    {
        $query = "SELECT COUNT(*) FROM $this->tableName";
        $stmt = $this->connect()->prepare($query);
        if ($stmt->execute()) {
            $countItems = $stmt->fetchColumn();
            return $countItems;
        } else {
            return 0;
        }
    }
}