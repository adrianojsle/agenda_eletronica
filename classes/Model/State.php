<?php
require_once __DIR__ . '../../Db/DbConnect.php';

class State extends DbConnect
{
    private $tableName = 'states';

    public function getAll()
    {
        $query = "SELECT * FROM $this->tableName";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
